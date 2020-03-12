<?php

namespace App\Http\Controllers;

use App\ContentWritter;
use Illuminate\Http\Request;
use App\Graphicdesigner;
use App\projects;
use Bitfumes\Multiauth\Model\Admin;
use App\Http\Controllers\Auth;

class ContentWritterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $graphics = ContentWritter::where('Required_By', auth('admin')->user()->id )->paginate(10);
        return view('superadmin.contentwritter.index', compact('graphics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $admin = [];
        $admins = Admin::all();
        $projects = projects::all();


        foreach ($admins as $a) {
            foreach ($a->roles as $role) {
                if ($role->name == "graphic designer") {
                   array_push($admin, $a);
                }
            }
        }
        return view('superadmin.contentwritter.create', compact(['admin','projects']));
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

        ContentWritter::create($request->all());
        \Session::flash('message', "Data Added successfully!");
        return redirect()->to('/admin/contents');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ContentWritter  $contentWritter
     * @return \Illuminate\Http\Response
     */
    public function show(ContentWritter $contentWritter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ContentWritter  $contentWritter
     * @return \Illuminate\Http\Response
     */
    public function edit(ContentWritter $contentWritter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ContentWritter  $contentWritter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ContentWritter $contentWritter)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ContentWritter  $contentWritter
     * @return \Illuminate\Http\Response
     */
    public function destroy(ContentWritter $contentWritter)
    {
        //
    }
}
