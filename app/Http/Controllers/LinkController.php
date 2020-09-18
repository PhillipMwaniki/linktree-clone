<?php

namespace App\Http\Controllers;

use App\Link;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $links = Auth::user()->links()->get();

        return view('links.index', [
            'links' => $links
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('links.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'name'  =>  'required|max:255',
            'link'  =>  'required|url'
        ]);

        $link = Auth::user()->links()
            ->create($request->only(['name', 'link']));

        if ($link) {
            return redirect()->to('/dashboard/links');
        }

        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Link $link
     * @return void
     */
    public function edit(Link $link)
    {

        if ($link->user_id !== Auth::id()){
            return abort(404);
        }

        return view('links.edit', ['link' => $link]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Link $link
     * @return void
     */
    public function update(Request $request, Link $link)
    {
        if ($link->user_id !== Auth::id()){
            return abort(403);
        }

        $request->validate([
            'name'  =>  'required|max:255',
            'link'  =>  'required|url'
        ]);

        $link->update($request->only(['name', 'link']));

        return redirect()->to('/dashboard/links');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Link $link
     * @return void
     */
    public function destroy(Link $link)
    {
        //
    }
}
