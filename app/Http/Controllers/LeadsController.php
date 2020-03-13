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
        $today = $view = $nexturl = $prevurl = null;

        $leads = $leads->newQuery();

        if ($request->project != null){
            $leads->where('Project', $request->project);
        }if($request->subcategory != null){
            $leads->where('Sub_Category', $request->subcategory);
        } if($request->maincategory != null){
            $leads->where('Main_Category', $request->maincategory);
        } if($request->keyword != null){
            $leads->where('Keyword', $request->keyword);
        } if($request->region != null){
            $leads->where('Region', $request->region);
        } if($request->activity != null) {
            $leads->where('Activity_Type', $request->activity);
        } if($request->bycalendar == "day"){

            $today =  \Carbon\Carbon::now();
            
            $prevurl = url()->current().'?project='.$request->project.'&maincategory='.$request->maincategory.'&subcategory='.$request->subcategory.'&keyword='.$request->keyword.'&region='.$request->region.'&activity='.$request->activity.'&bycalendar=day&date='.\Carbon\Carbon::now()->sub(1, 'day')->format('Y-m-d').'&daytype=prev';
            $nexturl = url()->current().'?project='.$request->project.'&maincategory='.$request->maincategory.'&subcategory='.$request->subcategory.'&keyword='.$request->keyword.'&region='.$request->region.'&activity='.$request->activity.'&bycalendar=day&date='.\Carbon\Carbon::now()->add(1, 'day')->format('Y-m-d').'&daytype=next';

            if ($request->daytype == "prev") {
                
                $prevurl = url()->current().'?project='.$request->project.'&maincategory='.$request->maincategory.'&subcategory='.$request->subcategory.'&keyword='.$request->keyword.'&region='.$request->region.'&activity='.$request->activity.'&bycalendar=day&date='.\Carbon\Carbon::parse($request->date)->sub(1, 'day')->format('Y-m-d').'&daytype=prev';
                
                $nexturl = url()->current().'?project='.$request->project.'&maincategory='.$request->maincategory.'&subcategory='.$request->subcategory.'&keyword='.$request->keyword.'&region='.$request->region.'&activity='.$request->activity.'&bycalendar=day&date='.\Carbon\Carbon::parse($request->date)->add(1, 'day')->format('Y-m-d').'&daytype=next';
            }if($request->daytype == "next"){

                $prevurl = url()->current().'?project='.$request->project.'&maincategory='.$request->maincategory.'&subcategory='.$request->subcategory.'&keyword='.$request->keyword.'&region='.$request->region.'&activity='.$request->activity.'&bycalendar=day&date='.\Carbon\Carbon::parse($request->date)->sub(1, 'day')->format('Y-m-d').'&daytype=prev';

                $nexturl = url()->current().'?project='.$request->project.'&maincategory='.$request->maincategory.'&subcategory='.$request->subcategory.'&keyword='.$request->keyword.'&region='.$request->region.'&activity='.$request->activity.'&bycalendar=day&date='.\Carbon\Carbon::parse($request->date)->add(1, 'day')->format('Y-m-d').'&daytype=next';
            }
            $leads->where('created_at', \Carbon\Carbon::parse($request->date)->format('Y-m-d'));
            $view = \Carbon\Carbon::parse($request->date)->format('D');
        } if($request->bycalendar == "weekly"){
            $today =  \Carbon\Carbon::now();
            $firstDay = $today->modify('this week')->format('Y-m-d');
            $lastDay = $today->modify('this week +6 days')->format('Y-m-d');

            $prevurl = url()->current().'?project='.$request->project.'&maincategory='.$request->maincategory.'&subcategory='.$request->subcategory.'&keyword='.$request->keyword.'&region='.$request->region.'&activity='.$request->activity.'&bycalendar=weekly&date='.\Carbon\Carbon::now()->sub(1, 'week')->format('Y-m-d').'&daytype=prev';

            $nexturl = url()->current().'?project='.$request->project.'&maincategory='.$request->maincategory.'&subcategory='.$request->subcategory.'&keyword='.$request->keyword.'&region='.$request->region.'&activity='.$request->activity.'&bycalendar=weekly&date='.\Carbon\Carbon::now()->add(1, 'week')->format('Y-m-d').'&daytype=next';

            if ($request->daytype == "prev") {

                $prevurl = url()->current().'?project='.$request->project.'&maincategory='.$request->maincategory.'&subcategory='.$request->subcategory.'&keyword='.$request->keyword.'&region='.$request->region.'&activity='.$request->activity.'&bycalendar=weekly&date='.\Carbon\Carbon::parse($request->date)->sub(1, 'week')->format('Y-m-d').'&daytype=prev';

                $nexturl = url()->current().'?project='.$request->project.'&maincategory='.$request->maincategory.'&subcategory='.$request->subcategory.'&keyword='.$request->keyword.'&region='.$request->region.'&activity='.$request->activity.'&bycalendar=weekly&date='.\Carbon\Carbon::parse($request->date)->add(1, 'week')->format('Y-m-d').'&daytype=next';

                $firstDay = \Carbon\Carbon::parse($request->date)->modify('this week')->format('Y-m-d');
                $lastDay = \Carbon\Carbon::parse($request->date)->modify('this week +6 days')->format('Y-m-d');
            }if($request->daytype == "next"){
                $prevurl = url()->current().'?project='.$request->project.'&maincategory='.$request->maincategory.'&subcategory='.$request->subcategory.'&keyword='.$request->keyword.'&region='.$request->region.'&activity='.$request->activity.'&bycalendar=weekly&date='.\Carbon\Carbon::parse($request->date)->sub(1, 'week')->format('Y-m-d').'&daytype=prev';

                $nexturl = url()->current().'?project='.$request->project.'&maincategory='.$request->maincategory.'&subcategory='.$request->subcategory.'&keyword='.$request->keyword.'&region='.$request->region.'&activity='.$request->activity.'&bycalendar=weekly&date='.\Carbon\Carbon::parse($request->date)->add(1, 'week')->format('Y-m-d').'&daytype=next';

                $firstDay = \Carbon\Carbon::parse($request->date)->modify('this week')->format('Y-m-d');
                $lastDay = \Carbon\Carbon::parse($request->date)->modify('this week +6 days')->format('Y-m-d');
                }
            $leads->where('created_at', '>=', $firstDay)->where('created_at', '<=', $lastDay);
            $view = $firstDay.' - '.$lastDay;
        }if($request->bycalendar == "monthly"){
            $today =  \Carbon\Carbon::now();
            $firstDay = $today->firstOfMonth()->format('Y-m-d');
            $lastDay = $today->lastOfMonth()->format('Y-m-d');

            $prevurl = url()->current().'?project='.$request->project.'&maincategory='.$request->maincategory.'&subcategory='.$request->subcategory.'&keyword='.$request->keyword.'&region='.$request->region.'&activity='.$request->activity.'&bycalendar=monthly&date='.\Carbon\Carbon::now()->subMonths(1)->format('Y-m-d').'&daytype=prev';

            $nexturl = url()->current().'?project='.$request->project.'&maincategory='.$request->maincategory.'&subcategory='.$request->subcategory.'&keyword='.$request->keyword.'&region='.$request->region.'&activity='.$request->activity.'&bycalendar=monthly&date='.\Carbon\Carbon::now()->addMonths(1)->format('Y-m-d').'&daytype=next';

            if ($request->daytype == "prev") {

                $prevurl = url()->current().'?project='.$request->project.'&maincategory='.$request->maincategory.'&subcategory='.$request->subcategory.'&keyword='.$request->keyword.'&region='.$request->region.'&activity='.$request->activity.'&bycalendar=monthly&date='.\Carbon\Carbon::parse($request->date)->firstOfMonth()->subMonths(1)->format('Y-m-d').'&daytype=prev';

                $nexturl = url()->current().'?project='.$request->project.'&maincategory='.$request->maincategory.'&subcategory='.$request->subcategory.'&keyword='.$request->keyword.'&region='.$request->region.'&activity='.$request->activity.'&bycalendar=monthly&date='.\Carbon\Carbon::parse($request->date)->firstOfMonth()->addMonths(1)->format('Y-m-d').'&daytype=next';

                $firstDay = \Carbon\Carbon::parse($request->date)->firstOfMonth()->format('Y-m-d');
                $lastDay = \Carbon\Carbon::parse($request->date)->lastOfMonth()->format('Y-m-d');

            }if($request->daytype == "next"){

                $prevurl = url()->current().'?project='.$request->project.'&maincategory='.$request->maincategory.'&subcategory='.$request->subcategory.'&keyword='.$request->keyword.'&region='.$request->region.'&activity='.$request->activity.'&bycalendar=monthly&date='.\Carbon\Carbon::parse($request->date)->firstOfMonth()->subMonths(1)->format('Y-m-d').'&daytype=prev';

                $nexturl = url()->current().'?project='.$request->project.'&maincategory='.$request->maincategory.'&subcategory='.$request->subcategory.'&keyword='.$request->keyword.'&region='.$request->region.'&activity='.$request->activity.'&bycalendar=monthly&date='.\Carbon\Carbon::parse($request->date)->firstOfMonth()->addMonths(1)->format('Y-m-d').'&daytype=next';

                $firstDay = \Carbon\Carbon::parse($request->date)->firstOfMonth()->format('Y-m-d');
                $lastDay = \Carbon\Carbon::parse($request->date)->lastOfMonth()->format('Y-m-d');

            }
            $leads->where('created_at', '>=', $firstDay)->where('created_at', '<=', $lastDay);
            $view = \Carbon\Carbon::parse($request->date)->format('M, Y');
            
        } if($request->bycalendar == "customdate" && $request->fromdate != null && $request->todate != null){
            $leads->where('created_at', '>=', $request->fromdate)->where('created_at', '<=', $request->todate);
        }

        if (!$request->has('project') && !$request->has('subcategory') && !$request->has('maincategory') && !$request->has('keyword') && !$request->has('region') && !$request->has('activity')) {
          $leads = Leads::paginate(5);
        }else{
          $leads = $leads->paginate(5);
        }
        
        $categories = Category::where('parent_id','!=', null)->get();
        $maincategories = Category::where('parent_id', null)->get();
        $keywords = Keyword::all();
        $regions = Regions::all();
        $activitys = Activity::all();
        $projects = projects::all();

        return view('superadmin.reporting.index', compact('leads', 'today', 'view', 'projects', 'maincategories', 'categories', 'keywords', 'regions', 'activitys', 'nexturl', 'prevurl'));
    }

    public function showreporting($id)
    {   
        $leads = Leads::find($id);
        return view('superadmin.reporting.show', compact('leads'));
    }
}
