@extends('superadmin.layouts.dashboard')
@section('page_heading','Reporting')
@section('section')
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    @if (session('message'))
                        <div class="alert alert-success alert-dismissible">
                          <button type="button" class="close" data-dismiss="alert">&times;</button>
                          <strong>Success!</strong> {{ session('message') }}
                        </div>
                    @endif
                <div class="card-body">
                    <table class="table table-striped">
                        <tbody>
                          <tr>
                            <th>Project</th>
                            <td>{{ $leads->Project }}</td>
                          </tr>
                          <tr>
                            <th>Region</th>
                            <td>{{ $leads->Region }}</td>
                          </tr>
                          <tr>
                            <th>Main Category</th>
                            <td>{{ App\Category::find($leads->Main_Category)->name }}</td>
                          </tr>
                          <tr>
                            <th>Sub Category</th>
                            <td>{{ $leads->Sub_Category }}</td>
                          </tr>
                          <tr>
                            <th>Keyword</th>
                            <td>{{ $leads->Keyword }}</td>
                          </tr>
                          <tr>
                            <th>Activity Type</th>
                            <td>{{ $leads->Activity_Type }}</td>
                          </tr>
                          <tr>
                            <th>Location</th>
                            <td>{{ $leads->Location }}</td>
                          </tr>
                          <tr>
                            <th>Targeted URL</th>
                            <td>{{ $leads->Targeted_URL }}</td>
                          </tr>
                          <tr>
                            <th>URL After Submission</th>
                            <td>{{ $leads->URL_After_Submission }}</td>
                          </tr>

                        </tbody>
                    </table>
        </div>
    </div>
</div>
@endsection
