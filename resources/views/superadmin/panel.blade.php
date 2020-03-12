@extends('superadmin.layouts.dashboard')

@section('page_heading', $employee->projectname )

@section('section')
	<div class="col-sm-12">
		
		@section ('collapsible_panel_title', $employee->region)
		@section ('collapsible_panel_link', route('lead.create',['id'=>$employee->id]) )
		@section ('collapsible_panel_body')
		<table class="leadstable">
			<thead>
				<tr>
					<th>Location</th>
					<th>Main Category</th>
					<th>Sub Category</th>
					<th>Activty</th>
					<th>Keyowrd</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach($leads as $lea)
				<tr>
					<td>{{ $lea->Location }}</td>
					<td>{{ $lea->Main_Category }}</td>
					<td>{{ $lea->Sub_Category }}</td>
					<td>{{ $lea->Activity_Type }}</td>
					<td>{{ $lea->Keyword }}</td>
					<td><a href="/admin/project/lead/{{ $lea->id }}">View</a></td>
				</tr>
				@endforeach
			</tbody>
		</table>
		@endsection
		@include('superadmin.widgets.panel', array('header'=>true, 'as'=>'collapsible'))
	</div>
@stop