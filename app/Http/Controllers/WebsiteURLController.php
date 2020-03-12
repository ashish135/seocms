<?php

namespace App\Http\Controllers;

use App\WebsiteURL;
use Illuminate\Http\Request;

class WebsiteURLController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $graphics = WebsiteURL::all();
        return view('Websiteurl.index', compact('graphics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
  
        ]);

        WebsiteURL::create($request->all());
        \Session::flash('message', "Data Added successfully!");
        return redirect()->to('/admin/website');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\WebsiteURL  $websiteURL
     * @return \Illuminate\Http\Response
     */
    public function show(WebsiteURL $websiteURL)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\WebsiteURL  $websiteURL
     * @return \Illuminate\Http\Response
     */
    public function edit(WebsiteURL $websiteURL)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\WebsiteURL  $websiteURL
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WebsiteURL $websiteURL)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\WebsiteURL  $websiteURL
     * @return \Illuminate\Http\Response
     */
    public function destroy(WebsiteURL $websiteURL)
    {
        //
    }
}
