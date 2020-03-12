<?php

namespace App\Http\Controllers;

use App\projects;
use Illuminate\Http\Request;
use DB;
use App\Regions;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = DB::table('projects')->get();
        return view('superadmin.projects' , compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$region = Regions::whereNull('parent_id')->get();
        return view('superadmin.projectcreate' , compact('region'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ticket = new projects();
        $data = $this->validate($request, [
            'projectname'=>'required',
            'projectregion'=> 'required'
        ]);
       
        $ticket->saveTicket($data);
        return redirect('/admin/projects')->with('success', 'New Project has been updated. Please wait for some time for further process. Thanks ! ');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\projects  $projects
     * @return \Illuminate\Http\Response
     */
    public function show($project)
    {
       
        $employee = projects::find($project);
        $region = $employee->region;
        $project = $employee->projectname;
        $location = DB::table('leads')->where([['Project', '=', $project] , ['Region', '=', $region]])->get();


        
        return view('superadmin.panel',['employee'=> $employee , 'leads'=> $location]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\projects  $projects
     * @return \Illuminate\Http\Response
     */
    public function edit(projects $projects)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\projects  $projects
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, projects $projects)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\projects  $projects
     * @return \Illuminate\Http\Response
     */
    public function destroy(projects $projects)
    {
        //
    }
}
