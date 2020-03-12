<?php

namespace App\Http\Controllers;

use App\Leads;
use App\projects;
use App\Category;
use Illuminate\Http\Request;
use App\Activity;
use App\Regions;
use DB;
use App\Keyword;
use App\Task;
use App\Note;

class LeadsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($project)
    {
        $employee = projects::find($project);
        return view('superadmin.panel',['employee'=> $employee]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $id)
    {
        $employee = projects::find($id);
        foreach ($employee  as $employ) {
            $lcation = $employ->region;
        }
        $location = DB::table('regions')->where('name', '=', $lcation)->get();
        foreach ($location as  $loion) {
            $ress = $loion->id;
        }
        $as = DB::table('regions')->where('parent_id', '=', $ress)->get();
        $categories = Category::with('children')->whereNull('parent_id')->get();
        $Activity = Activity::all();
        $Keyword = Keyword::all();

        return view('superadmin.leadcreate',['employee'=> $employee , 'categories'=> $categories , 'Activity' => $Activity , 'as'=> $as , 'Keyword'=> $Keyword ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
          ]);

       
        $data = $request->except(['_token']);
      

        Leads::create($data);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Leads  $leads
     * @return \Illuminate\Http\Response
     */
    public function show($leads)
    {
        $lead = Leads::find($leads);
        $users = DB::table('admins')->get();
        $tasks = Task::where('leads_id', $leads )->paginate(10);
        $note = Note::where('leads_id', $leads )->paginate(10);
        return view('superadmin.singlelead',['lead'=> $lead , 'users' => $users , 'tasks' => $tasks , 'note' => $note]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Leads  $leads
     * @return \Illuminate\Http\Response
     */
    public function edit(Leads $leads)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Leads  $leads
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Leads $leads)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Leads  $leads
     * @return \Illuminate\Http\Response
     */
    public function destroy(Leads $leads)
    {
        //
    }

    public function selectAjax(Request $request)
    {
        if($request->ajax()){
            $states = DB::table('categories')->where('parent_id',$request->id_country)->pluck("name","id")->all();
            $data = view('ajax-select',compact('states'))->render();
            return response()->json(['options'=>$data]);
        }
    }

    public function reporting(Request $request, Leads $leads)
    {   
        

        if ($request->project != null || $request->subcategory != null || $request->maincategory != null || $request->keyword != null || $request->region != null || $request->activity != null) {
            $leads = Leads::where('Project', $request->project)
            ->orWhere('Main_Category', $request->maincategory)
            ->orWhere('Sub_Category', $request->subcategory)
            ->orWhere('Keyword', $request->keyword)
            ->orWhere('Region', $request->region)
            ->orWhere('Activity_Type', $request->activity)
            ->get();
        }else if($request->bycalendar == "day"){
            $today =  \Carbon\Carbon::now();
            if ($request->daytype == "prev") {
                $today = \Carbon\Carbon::parse($request->date);
                $today = $today->sub(1, 'day');
            }if($request->daytype == "next"){
                $today = \Carbon\Carbon::parse($request->date);
                $today = $today->add(1, 'day');
            }
            $leads = Leads::where('created_at', $today->format('Y-m-d'))->get();
            $view = $today->format('D');
        }else if($request->bycalendar == "weekly"){
            $today =  \Carbon\Carbon::now();
            $firstDay = $today->modify('this week')->format('Y-m-d');
            $lastDay = $today->modify('this week +6 days')->format('Y-m-d');

            if ($request->daytype == "prev") {
                $today = \Carbon\Carbon::parse($request->date);
                $today = $today->sub(1, 'week');
                $firstDay = $today->modify('this week')->format('Y-m-d');
                $lastDay = $today->modify('this week +6 days')->format('Y-m-d');
            }if($request->daytype == "next"){
                $today = \Carbon\Carbon::parse($request->date);
                $today = $today->add(1, 'week');
                $firstDay = $today->modify('this week')->format('Y-m-d');
                $lastDay = $today->modify('this week +6 days')->format('Y-m-d');
            }
            $leads = Leads::where('created_at', '>=', $firstDay)->where('created_at', '<=', $lastDay)->get();
            $view = $firstDay.' - '.$lastDay;
        }else if($request->bycalendar == "monthly"){
            $today =  \Carbon\Carbon::now();
            $firstDay = $today->firstOfMonth()->format('Y-m-d');
            $lastDay = $today->lastOfMonth()->format('Y-m-d');
            if ($request->daytype == "prev") {
                $today = \Carbon\Carbon::parse($request->date);
                $today = $today->firstOfMonth();
                $today = $today->subMonths(1);
                $firstDay = $today->firstOfMonth()->format('Y-m-d');
                $lastDay = $today->lastOfMonth()->format('Y-m-d');
            }if($request->daytype == "next"){
                $today = \Carbon\Carbon::parse($request->date);
                $today = $today->firstOfMonth();
                $today = $today->addMonths(1);
                $firstDay = $today->firstOfMonth()->format('Y-m-d');
                $lastDay = $today->lastOfMonth()->format('Y-m-d');
            }
            $leads = Leads::where('created_at', '>=', $firstDay)->where('created_at', '<=', $lastDay)->get();
            $view = $today->format('M, Y');
        }else if($request->bycalendar == "customdate" && $request->fromdate != null && $request->todate != null){
            $leads = Leads::where('created_at', '>=', $request->fromdate)->where('created_at', '<=', $request->todate)->get();
        }else{
            $leads = Leads::paginate(10);
        }
        
        $categories = Category::where('parent_id','!=', null)->get();
        $maincategories = Category::where('parent_id', null)->get();
        $keywords = Keyword::all();
        $regions = Regions::all();
        $activitys = Activity::all();
        $projects = projects::all();

        return view('superadmin.reporting.index', compact('leads', 'today', 'view', 'projects', 'maincategories', 'categories', 'keywords', 'regions', 'activitys'));
    }

    public function showreporting($id)
    {   
        $leads = Leads::find($id);
        return view('superadmin.reporting.show', compact('leads'));
    }
}
