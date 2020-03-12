@extends('superadmin.layouts.dashboard')
@section('page_heading','Keywords')
@section('section')
        <div class="row">
            <div class="col-md-8">
              @if (session('success'))
                  <div class="alert alert-success">
                      <ul>
                         <li>{{session('success')}}</li>
                      </ul>
                  </div>
              @endif
              <div class="card">
                <div class="card-body">
                  <ul class="list-group">
                    @foreach ($activity as $region)
                      <li class="list-group-item" style="display: inline-block;width: 100%;">
                        <div class=" d-flex col-md-6 justify-content-between">
                          {{ $region->name }}
                        </div>
                        <div class=" d-flex col-md-6 justify-content-between">
                          {{ $region->priority }}
                        </div>
                      </li>
                    @endforeach
                  </ul>
                </div>
              </div>
            </div>

            <div class="col-md-4">
              @if ($errors->any())
                  <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
              @endif
              <div class="card">
                <div class="card-header">
                  <h3>Create Activity</h3>
                </div>
                <div class="card-body">
                  <form action="{{ route('keyword.store') }}" method="POST">
                    @csrf

                   
                    <div class="form-group">
                      <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="Keyword" required>
                    </div>
                    <div class="form-group">
                      <input type="text" name="priority" class="form-control" value="{{ old('priority') }}" placeholder="Priority" required>
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
