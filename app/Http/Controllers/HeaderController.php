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
            'title' => 'required|max:255',
            'desc' => 'required|string'
        ]);

        $res = Header::create([
            'title' => $request->title,
            'desc' => $request->desc
        ]);

        $res->save()
        ? redirect()->route('header.create')->with('success', 'Save content successfully!')
        : redirect()->route('header.create')->with('success', 'Saving content failed!');

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
        // $res->save() ? redirect()->route('header.index') : redirect()->route('header.index')->with('error', 'Publishing content failed!');
    }
}
