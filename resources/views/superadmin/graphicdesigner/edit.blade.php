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
                <div class="card-header">Add Graphics <a class="btn btn-primary float-right" href="{{ url('graphics') }}">Back</a></div>
                <div class="card-body">
                    <form action="{{ url('graphics/'.$graphic->id ) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <!-- <label class="form-label">Issue Date</label> -->
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                            <select name="assign_to" class="form-control @error('assign_to') is-invalid @enderror">
                                <option value="">Assign To</option>
                                @if(count($admin) > 0 )
                                    @foreach($admin as $a)
                                        <option value="{{ $a->id }}" {{ $a->id == $graphic->assign_to ? 'selected' : '' }}>{{ $a->name }}</option>
                                    @endforeach
                                @endif    
                            </select>
                            @error('assign_to')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="text" onfocus="(this.type='date')" value="{{ \Carbon\Carbon::parse($graphic->issue_date)->format('Y-m-d') }}" name="issue_date" placeholder="Issue Date" class="form-control @error('issue_date') is-invalid @enderror" />
                            @error('issue_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <!-- <label class="form-label">Target Date</label> -->
                            <input type="text" onfocus="(this.type='date')" value="{{ \Carbon\Carbon::parse($graphic->target_date)->format('Y-m-d') }}" name="target_date" placeholder="Target Date" class="form-control @error('target_date') is-invalid @enderror" />
                            @error('target_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <!-- <label class="form-label">Project</label> -->
                            <input type="text" name="project" value="{{ $graphic->project }}" placeholder="Project" class="form-control @error('project') is-invalid @enderror" />
                            @error('project')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <!-- <label class="form-label">Image Type</label> -->
                            <input type="text" value="{{ $graphic->image_type }}" name="image_type" placeholder="Image Type" class="form-control @error('image_type') is-invalid @enderror" />
                            @error('image_type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <!-- <label class="form-label">Topic</label> -->
                            <input type="text" value="{{ $graphic->topic }}" name="topic" placeholder="Topic" class="form-control @error('topic') is-invalid @enderror" />
                            @error('topic')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <!-- <label class="form-label">Image Content</label> -->
                            <input type="text" value="{{ $graphic->image_content }}" name="image_content" placeholder="Image Content" class="form-control @error('image_content') is-invalid @enderror" />
                            @error('image_content')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <!-- <label class="form-label">Remarks</label> -->
                            <input type="text" value="{{ $graphic->remarks }}" name="remarks" placeholder="Remarks" class="form-control @error('remarks') is-invalid @enderror" />
                            @error('remarks')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                           <!--  <label class="form-label">Required By</label> -->
                            <input type="text" value="{{ $graphic->required_by }}" name="required_by" placeholder="Required By" class="form-control @error('required_by') is-invalid @enderror" />
                            @error('required_by')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                       <!--  <div class="form-group">
                           <label class="form-label">Approval</label>
                           <input type="text" value="{{ $graphic->approval }}" name="approval" placeholder="Approval" class="form-control @error('approval') is-invalid @enderror" />
                           @error('approval')
                                   <span class="invalid-feedback" role="alert">
                                       <strong>{{ $message }}</strong>
                                   </span>
                           @enderror
                       </div> -->
                       <!--  <div class="form-group">
                           <label class="form-label">Completed By</label>
                           <input type="text" value="{{ $graphic->completed_by }}" name="completed_by" placeholder="Completed By" class="form-control @error('completed_by') is-invalid @enderror" />
                           @error('completed_by')
                                   <span class="invalid-feedback" role="alert">
                                       <strong>{{ $message }}</strong>
                                   </span>
                           @enderror
                       </div> -->
                        <!-- <div class="form-group">
                           <label class="form-label">Completion Date</label>
                            <input type="text" onfocus="(this.type='date')" value="{{ \Carbon\Carbon::parse($graphic->completion_date)->format('Y-m-d') }}" name="completion_date" placeholder="Completion Date" class="form-control @error('completion_date') is-invalid @enderror" />
                            @error('completion_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div> -->
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection