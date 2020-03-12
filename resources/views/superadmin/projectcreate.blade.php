@extends('superadmin.layouts.dashboard')
@section('page_heading','Projects')
@section('section')

<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <form action="/admin/projects" method="post">
            <input type="hidden" value="{{csrf_token()}}" name="_token" />
            <div class="form-group">
              <label for="usr">Project Name</label>
              <input type="text" class="form-control" id="usr" name="projectname">
            </div>
            <div class="form-group">
                <label for="sel1">Region</label>
                <select class="form-control" id="sel1" name="projectregion">
					<option selected disabled>Select Region</option>
					@foreach($region as $regio)
                    <option value="{{ $regio->name }}">{{ $regio->name }}</option>
					@endforeach
                </select>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-info" value="Submit">
            </div>
        </form> 
    </div>
</div>   
            
            
@stop
