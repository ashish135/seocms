<?php

namespace App\Http\Controllers;

use App\Graphicdesigner;
use Illuminate\Http\Request;
use App\projects;
use Bitfumes\Multiauth\Model\Admin;
use App\Http\Controllers\Auth;

class GraphicdesignerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $graphics = Graphicdesigner::where('Required_By', auth('admin')->user()->id )->paginate(10);
        return view('superadmin.graphicdesigner.index', compact('graphics'));
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
        return view('superadmin.graphicdesigner.create', compact(['admin','projects']));
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

        Graphicdesigner::create($request->all());
        \Session::flash('message', "Data Added successfully!");
        return redirect()->to('/admin/graphics');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Graphicdesigner  $graphicdesigner
     * @return \Illuminate\Http\Response
     */
    public function show(Graphicdesigner $graphicdesigner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Graphicdesigner  $graphicdesigner
     * @return \Illuminate\Http\Response
     */
    public function edit(Graphicdesigner $graphicdesigner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Graphicdesigner  $graphicdesigner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Graphicdesigner $graphicdesigner)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Graphicdesigner  $graphicdesigner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Graphicdesigner $graphicdesigner)
    {
        //
    }
}
