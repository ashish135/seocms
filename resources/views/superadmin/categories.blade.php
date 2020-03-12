@extends('superadmin.layouts.dashboard')
@section('page_heading','Dashboard')
@section('section')
        <div class="row">
            <div class="col-md-8">

              <div class="card">
                <div class="card-header">
                  <h3>Categories</h3>
                </div>
                <div class="card-body">
                  <ul class="list-group">
                    @foreach ($categories as $category)
                      <li class="list-group-item">
                        <div class="d-flex justify-content-between">
                          {{ $category->name }}
                        </div>

                        @if ($category->children)
                          <ul class="list-group mt-2">
                            @foreach ($category->children as $child)
                              <li class="list-group-item">
                                <div class="d-flex justify-content-between">
                                  {{ $child->name }}
                                </div>
                              </li>
                            @endforeach
                          </ul>
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
                  <h3>Create Category</h3>
                </div>
                <div class="card-body">
                  <form action="{{ route('categories.store') }}" method="POST">
                    @csrf

                    <div class="form-group">
                      <select class="form-control" name="parent_id">
                        <option value="">Select Parent Category</option>

                        @foreach ($categories as $category)
                          <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                      </select>
                    </div>

                    <div class="form-group">
                      <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="Category Name" required>
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
