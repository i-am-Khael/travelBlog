<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $res = Article::paginate(10);
        return view('dashboard.articles', [ 'data' => $res ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.createArticle');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'required|mimes:jpg,png,webp|max:25700',
            'featured' => 'required'
        ]);

        $image = $request->file('image');
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $imagePath = $image->storeAs('uploads', $imageName, 'public');

        $res = Article::create([
            'user_id' => auth()->user()->id,
            'title' => $request->title,
            'content'=> $request->content,
            'image' => $imagePath,
            'featured' => $request->featured
        ]);

        if($res->save()) {

            return redirect()->route('article.create')->with('success', 'Successfully created article.');

        } else {

            return redirect()->route('article.create')->with('error', 'Failed creating article.');

        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $res = Article::findOrFail($id);
        return view('dashboard.editArticle', [ 'data' => $res ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'max:25700',
            'featured' => 'required'
        ]);

        $res = Article::findOrFail($id);
        $res->user_id = auth()->user()->id;
        $res->title = $request->title;
        $res->content = $request->content;
        $res->featured = $request->featured;

        if ($request->hasFile('image')) {

            $request->validate([
                'image' => 'image|mimes:jpg,png,webp|max:25700'
            ]);

            if ($res->image) {
                Storage::disk('public')->delete($res->image);
            }

            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $imagePath = $image->storeAs('uploads', $imageName, 'public');
            $res->image = $imagePath;

        }

        if( $res->save() ) {

            return redirect()->route('article.edit', $id)->with('success', 'Updated Successfully!');

        } else {

            return redirect()->route('article.edit', $id)->with('error', 'Updating failed!');

        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $res = Article::findOrFail($id);

        if ($res->image && Storage::disk('public')->exists($res->image)) {
            Storage::disk('public')->delete($res->image);
        }


        if( $res->delete() ) {

            return redirect()->route('article.index')->with('success', 'Deleted article successfully!');

        } else {

            return redirect()->route('article.index')->with('error', 'Deleting article failed!');

        }

    }
}
