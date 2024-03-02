<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $res = Article::paginate(10);
        return view('dashboard.articles');
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
            'userID' => 'required',
            'title' => 'required',
            'content' => 'required',
            'featured' => 'required'
        ]);

        $res = Article::create([
            'user_id' => $request->userID,
            'title' => $request->title,
            'content'=> $request->content,
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
