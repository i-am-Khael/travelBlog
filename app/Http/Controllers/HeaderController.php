<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Header;

class HeaderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $res = Header::all();
        return view('dashboard.headerSection', [ 'headerContent' => $res ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.addHeaderContent');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'userID' => 'required',
            'title' => 'required|max:255',
            'desc' => 'required|string'
        ]);

        $res = Header::create([
            'user_id' => $request->userID,
            'title' => $request->title,
            'desc' => $request->desc
        ]);

        if($res->save()){
            return redirect()->route('header.index')->with('success', 'Save content successfully!');
        }else {
            return redirect()->route('header.create')->with('success', 'Saving content failed!');
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
        $res = Header::findOrFail($id);
        return view('dashboard.updateHeaderContent', ['content' => $res]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $request->validate([
            'title' => 'required|max:255',
            'desc' => 'required|string',
            'isPublished' => 'required'
        ]);

        $res = Header::findOrFail($id);
        $res->id = $id;
        $res->title = $request->title;
        $res->desc = $request->desc;
        $res->isPublished = $request->isPublished;

        if( $res->save() ){
            return redirect()->route('header.edit', $id)->with('success', 'Updated Successfully!');
        }else{
            return redirect()->route('header.edit', $id)->with('error', 'Updating failed!');
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $res = Header::findOrFail($id);
        if($res->delete()){
            return redirect()->route('header.index')->with('success', 'Deleted Content Sucessfully!');
        }else{
            return redirect()->route('header.index')->with('error', 'Deleting content failed!');
        }
    }


    public function updatePublished(Request $request, string $id) {
        $published = false;
        $request->isPublished === "on" ? $published = true : $published = false;
        $res = Header::findOrFail($id);
        $res->isPublished = $published;
        if( $res->save() ){
            return redirect()->route('header.index');
        } else {
            return redirect()->route('header.index')->with('error', 'Publishing content failed!');
        }
    }
}
