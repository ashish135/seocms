@extends('superadmin.layouts.dashboard')
@section('section')
<div class="row">
    <div class="col-md-6">
      <h2 class="leadgnskjf">Create Lead</h2>
    </div>
    <div class="col-md-6 text-right">
        <a href="/admin/projects/<?php echo $_GET['id']; ?>" class="btn btn-primary" >Back</a>
    </div>
    <div class="col-md-12">
        <form action="/admin/project/lead" method="post">
            <input type="hidden" value="{{csrf_token()}}" name="_token" />
            <div class="form-group col-md-6">
                <label for="sel1">Project</label>
                @foreach( $employee as $employe)
                <input type="text" name="Project" value="{{ $employe->projectname }}"  class="form-control" readonly>
                @endforeach
            </div>
            <div class="form-group col-md-6">
                <label for="sel1">Region</label>
                 @foreach( $employee as $employe)
                <input type="text" name="Region" value="{{ $employe->region }}"  class="form-control" readonly>
                @endforeach
            </div>
            <div class="form-group col-md-6">
              <label for="sel1">Main Category</label>
                <select class="form-control" id="sel1" name="Main_Category">
                        <option disabled selected>Main Category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-6">
              <label for="sel1">Sub Category</label>
                <select class="form-control" id="sel1" name="Sub_Category">
                    
                </select>
            </div>
            <div class="form-group col-md-6 sajadas">
              <label for="sel1">Keyword</label>
              <select class="form-control" id="sel1" name="Keyword">
                  @foreach ($Keyword as $Keyword)
                          <option value="{{ $Keyword->name }}">{{ $Keyword->name }}</option>
                  @endforeach
              </select>
            </div>
            <div class="form-group col-md-6">
              <label for="sel1">Activity Type</label>
                <select class="form-control" id="sel1" name="Activity_Type">
                    <option disabled selected>Activity</option>
                    @foreach ($Activity as $Activit)
                        <option>{{ $Activit->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-6">
              <label for="sel1">Location</label>
                <select class="form-control" id="sel1" name="Location">
                    <option disabled selected>Location</option>
                    @foreach ($as as $asd)
                        <option>{{ $asd->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-6">
              <label for="usr">Targeted URL</label>
              <input type="text" class="form-control" id="usr" name="Targeted_URL">
            </div>
            <div class="form-group col-md-6">
              <label for="usr">URL After Submission</label>
              <input type="text" class="form-control" id="usr" name="URL_After_Submission">
            </div>
            <div class="form-group col-md-6">
              <label for="usr">DA</label>
              <input type="text" class="form-control" id="usr" name="DA">
            </div>
            <div class="form-group col-md-6">
              <label for="usr">PA</label>
              <input type="text" class="form-control" id="usr" name="PA">
            </div>
            <div class="form-group col-md-6">
              <label for="usr">SS</label>
              <input type="text" class="form-control" id="usr" name="SS">
            </div>
            <div class="form-group col-md-6">
              <label for="usr">Username</label>
              <input type="text" class="form-control" id="usr" name="Username">
            </div>
            <div class="form-group col-md-6">
              <label for="usr">Password</label>
              <input type="text" class="form-control" id="usr" name="Password">
            </div>
            <div class="form-group col-md-6">
              <label for="usr">Email</label>
              <input type="text" class="form-control" id="usr" name="Email">
            </div>
            <div class="form-group col-md-6">
              <label for="usr">Status</label>
              <input type="text" class="form-control" id="usr" name="Status">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-info" value="Submit">
            </div>
        </form> 
    </div>
</div>   
            
            
@stop
