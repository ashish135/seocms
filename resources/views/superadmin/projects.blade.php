@extends('superadmin.layouts.dashboard')
@section('page_heading','Projects')
@section('section')
 @if(\Session::has('success'))
        <div class="alert alert-success">
            {{\Session::get('success')}}
        </div>
@endif
<div class="row">
    <div class="topheading">
        <div class="col-md-6 text-left">
        </div>
        <div class="col-md-6 text-right">
            <a href="/admin/projects/create" class="btn btn-primary">Add New</a>
        </div>
    </div>
    <div class="col-md-12">
        <div class="lstofproject">
            @foreach ( $projects as $project)
            <div class="col-lg-3 col-md-4">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-comments fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">26</div>
                                    <div>{{ $project->projectname }}</div>
                                    <div><span>Region : </span>{{ $project->region }}</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{route('projects.show',['project'=>$project->id])}}">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
             </div>
            @endforeach

        </div>
    </div>
</div>   
            
            
@stop
