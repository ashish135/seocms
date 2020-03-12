@extends('superadmin.layouts.dashboard')
@section('page_heading','Dashboard')
@section('section')
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Graphics <a class="btn btn-primary float-right" href="{{ url('/admin/graphics/create') }}">Add</a></div>
                    @if (session('message'))
                        <div class="alert alert-success alert-dismissible">
                          <button type="button" class="close" data-dismiss="alert">&times;</button>
                          <strong>Success!</strong> {{ session('message') }}
                        </div>
                    @endif
                    <div class="card-body">
                            <table class="table table-hover">
                                <thead>
                                  <tr>
                                    <th>Project</th>
									<th>Project name </th>
                                    <th>Issue Date</th>
                                    <th>Topic</th>
                                    <th>Target Date</th>
                                    <th>Action</th>
                                  </tr>
                                </thead>
                                 <tbody>
                                @foreach($graphics as $page)
                                  <tr>
                                    <td>{{ $page->Project }}</td>
									<td>{{ $page->projectname }}</td>
                                    <td>{{ \Carbon\Carbon::parse($page->issue_date)->format('F j, Y') }}</td>
                                    <td>{{ $page->Topic }}</td>
                                    <td>{{ \Carbon\Carbon::parse($page->target_date)->format('F j, Y') }}</td>
                                    <td><a href="{{ asset('/admin/graphics/'.$page->id.'/edit') }}"><i class="far fa-edit"></i></a> <a href="{{ asset('/admin/graphics/'.$page->id) }}"><i class="far fa-eye"></i></a></td>
                                  </tr>
                              @endforeach
                            </tbody>
                              </table>
                       
                    </div>
                </div>
            </div>
        </div>
@endsection
