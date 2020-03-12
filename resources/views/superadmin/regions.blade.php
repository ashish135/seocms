@extends('superadmin.layouts.dashboard')
@section('page_heading','Dashboard')
@section('section')
        <div class="row">
            <div class="col-md-8">

              <div class="card">
                <div class="card-header">
                  <h3>Regions</h3>
                </div>
                <div class="card-body">
                  <ul class="list-group">
                    @foreach ($regions as $region)
                      <li class="list-group-item">
                        <div class="d-flex justify-content-between">
                          {{ $region->name }}
                        </div>
                        <h4>Locations</h4>
                        @if ($region->children)
                          <ol class="list-group mt-2">
                            @foreach ($region->children as $child)
                              <li class="list-group-item">
                                <div class="d-flex justify-content-between">
                                  {{ $child->name }}
                                </div>
                              </li>
                            @endforeach
                          </ol>
                        @endif
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
                  <h3>Create Location</h3>
                </div>
                <div class="card-body">
                  <form action="{{ route('regions.store') }}" method="POST">
                    @csrf

                    <div class="form-group">
                      <select class="form-control" name="parent_id">
                        <option value="">Select Region</option>

                        @foreach ($regions as $region)
                          <option value="{{ $region->id }}">{{ $region->name }}</option>
                        @endforeach
                      </select>
                    </div>

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
