@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3">
            <ul class="navbar-nav ml-auto">
                <li class="card-header"><a href="/home">Dashboard</a></li>
                <li class="card-header"><a href="/offpage">Off Page</a></li>
                <li class="card-header"><a href="/content">Content</a></li>
                <li class="card-header"><a href="/graphics">Graphics</a></li>
            </ul>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">Graphics <a class="btn btn-primary float-right" href="{{ url('graphics') }}">Back</a></div>
                <div class="card-body">
                    <table class="table table-striped">
                        <tbody>
                          <tr>
                            <th>Assign To</th>
                            <td>{{ $graphic->getName($graphic->assign_to) }}</td>
                          </tr>
                          <tr>
                            <th>Issue Date</th>
                            <td>{{ \Carbon\Carbon::parse($graphic->issue_date)->format('F j, Y') }}</td>
                          </tr>
                          <tr>
                            <th>Target Date</th>
                            <td>{{ \Carbon\Carbon::parse($graphic->target_date)->format('F j, Y') }}</td>
                          </tr>
                          <tr>
                            <th>Project</th>
                            <td>{{ $graphic->project }}</td>
                          </tr>
                          <tr>
                            <th>Image Type</th>
                            <td>{{ $graphic->image_type }}</td>
                          </tr>
                          <tr>
                            <th>Topic</th>
                            <td>{{ $graphic->topic }}</td>
                          </tr>
                          <tr>
                            <th>Image Content</th>
                            <td>{{ $graphic->image_content }}</td>
                          </tr>
                          <tr>
                            <th>Remarks</th>
                            <td>{{ $graphic->remarks }}</td>
                          </tr>
                          <tr>
                            <th>Required By</th>
                            <td>{{ $graphic->required_by }}</td>
                          </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
