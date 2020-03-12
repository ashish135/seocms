@extends('superadmin.layouts.dashboard')
@section('page_heading','Dashboard')
@section('section')
        <div class="row">
            <div class="col-md-8">

              <div class="card">
                <div class="card-header">
                  <h3>Activity</h3>
                </div>
                <div class="card-body">
                  <ul class="list-group">
                    @foreach ($activity as $region)
                      <li class="list-group-item">
                        <div class="d-flex justify-content-between">
                          {{ $region->name }}
                        </div>
                      </li>
                    @endforeach
                  </ul>
                </div>
              </div>
            </div>

            <div class="col-md-4">
              <div class="card">
                <div class="card-header">
                  <h3>Create Activity</h3>
                </div>
                <div class="card-body">
                  <form action="{{ route('activity.store') }}" method="POST">
                    @csrf

                   
                    <div class="form-group">
                      <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="Region Name" required>
                    </div>

                    <div class="form-group">
                      <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
    </div>
@stop
