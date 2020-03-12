@extends('superadmin.layouts.dashboard')
@section('page_heading','Add Graphics')
@section('section')
        <div class="row">
            <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ url('/admin/graphics') }}" method="POST">
                        @csrf
                        <input type="hidden" name="Required_By" value="<?php echo auth('admin')->user()->id; ?>">
                         <input type="hidden" name="AssignDate" value="<?php echo date("Y-m-d"); ?>">
                           
                        <div class="form-group col-md-6">
                           <input type="text" name="Topic" value="{{ old('Topic') }}" placeholder="Topic" class="form-control @error('Topic') is-invalid @enderror" />
                           @error('Topic')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <input type="text" name="Primary_Keywords" value="{{ old('Primary_Keywords') }}" placeholder="Primary Keywords" class="form-control @error('Primary_Keywords') is-invalid @enderror" />
                           @error('Primary_Keywords')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <input type="text" name="Long_Tail_Keywords" value="{{ old('Long_Tail_Keywords') }}" placeholder="Long Tail Keywords" class="form-control @error('Long_Tail_Keywords') is-invalid @enderror" />
                           @error('Long_Tail_Keywords')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <input type="text" name="LSI_Keywords" value="{{ old('LSI_Keywords') }}" placeholder="LSI Keywords" class="form-control @error('LSI_Keywords') is-invalid @enderror" />
                           @error('LSI_Keywords')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror                            
                        </div>
                        <div class="form-group col-md-6">
                            <!-- <label class="form-label">Image Type</label> -->
                            <input type="text" value="{{ old('Content_Type') }}" name="Content_Type" placeholder="Content Type" class="form-control @error('Content_Type') is-invalid @enderror" />
                            @error('Content_Type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <!-- <label class="form-label">Topic</label> -->
                            <input type="text" value="{{ old('Keyword_Density') }}" name="Keyword_Density" placeholder="Keyword Density" class="form-control @error('Keyword_Density') is-invalid @enderror" />
                            @error('Keyword_Density')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <!-- <label class="form-label">Image Content</label> -->
                            <input type="text" value="{{ old('Word_Count') }}" name="Word_Count" placeholder="Word Count" class="form-control @error('Word_Count') is-invalid @enderror" />
                            @error('Word_Count')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <select name="Project" class="form-control @error('Project') is-invalid @enderror">
                                <option value="">Project</option>
                                @if(count($projects) > 0 )
                                    @foreach($projects as $a)
                                        <option value="{{ $a->id }}">{{ $a->projectname }} - Region : {{ $a->region }}</option>
                                    @endforeach
                                @endif    
                            </select>
                            @error('Project')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <select name="Assign_To" class="form-control @error('assign_to') is-invalid @enderror">
                                <option value="">Assign To</option>
                                @if(count($admin) > 0 )
                                    @foreach($admin as $a)
                                        <option value="{{ $a->id }}">{{ $a->name }}</option>
                                    @endforeach
                                @endif    
                            </select>
                            @error('assign_to')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                         <div class="form-group col-md-6">
                           <!--  <label class="form-label">Required By</label> -->
                            <input type="text" value="{{ old('Reference') }}" name="Reference" placeholder="Reference" class="form-control @error('Reference') is-invalid @enderror" />
                            @error('Reference')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                         <div class="form-group col-md-6">
                           <!--  <label class="form-label">Required By</label> -->
                            <input type="text" onfocus="(this.type='date')" value="{{ old('TargetDate') }}" name="TargetDate" placeholder="Target Date" class="form-control @error('TargetDate') is-invalid @enderror" />
                            @error('TargetDate')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                         <div class="form-group col-md-6">
                           <!--  <label class="form-label">Required By</label> -->
                            <input type="text" value="{{ old('Remark') }}" name="Remark" placeholder="Remark" class="form-control @error('Remark') is-invalid @enderror" />
                            @error('Remark')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

@endsection
