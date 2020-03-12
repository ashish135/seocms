@extends('superadmin.layouts.dashboard')
@section('section')
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header websiteurl_das">
                    	<div class="col-md-6"><h2 class="heading">Website URL</h2></div>
                    	<div class="col-md-6 text-right">
                    		<a class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"">Add</a>
                    	</div>
                    </div>
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
                                    <th>Old URL</th>
									<th>New URL</th>
                                    <th>Meta Ttitle</th>
                                    <th>Meta Description</th>
                                    <th>Meta Keywords</th>
                                    <th>OG Title</th>
                                    <th>OG Description</th>
                                    <th>FB Url</th>
                                    <th>OG Image</th>
                                    <th>Canonical URL</th>
                                    <th>Twitter Site</th>
                                    <th>Twitter Title</th>
                                    <th>Twitter Decription</th>
                                    <th>Schema</th>
                                    <th>Hreflang</th>
                                  </tr>
                                </thead>
                                 <tbody>
                                @foreach($graphics as $page)
                                  <tr>
                                    <td>{{ $page->oldurl }}</td>
									<td>{{ $page->newurl }}</td>
                                    <td>{{ $page->metatitle }}</td>
                                    <td>{{ $page->metadiscription }}</td>
                                    <td>{{ $page->metakeyword }}</td>
                                    <td>{{ $page->ogtitle }}</td>
                                    <td>{{ $page->ogdiscription }}</td>
                                    <td>{{ $page->fburl }}</td>
                                    <td>{{ $page->ogimage }}</td>
                                    <td>{{ $page->canonicalurl }}</td>
                                    <td>{{ $page->twittersite }}</td>
                                    <td>{{ $page->twittertitle }}</td>
                                    <td>{{ $page->twiterdiscription }}</td>
                                    <td>{{ $page->Schema }}</td>
                                    <td>{{ $page->hreflang }}</td>
                                  </tr>
                              @endforeach
                            </tbody>
                              </table>
                       
                    </div>
                </div>
            </div>
        </div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Website URL</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ url('/admin/website') }}" method="POST">
                        @csrf
                           
                        <div class="form-group col-md-6">
                           <input type="text" name="oldurl" value="{{ old('oldurl') }}" placeholder="Old URL" class="form-control @error('oldurl') is-invalid @enderror" />
                           @error('oldurl')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <input type="text" name="newurl" value="{{ old('newurl') }}" placeholder="New URL" class="form-control @error('newurl') is-invalid @enderror" />
                           @error('newurl')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <input type="text" name="metatitle" value="{{ old('metatitle') }}" placeholder="Meta Title" class="form-control @error('metatitle') is-invalid @enderror" />
                           @error('metatitle')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <input type="text" name="metadiscription" value="{{ old('metadiscription') }}" placeholder="Meta Discription" class="form-control @error('metadiscription') is-invalid @enderror" />
                           @error('metadiscription')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror                            
                        </div>
                        <div class="form-group col-md-6">
                            <!-- <label class="form-label">Image Type</label> -->
                            <input type="text" value="{{ old('metakeyword') }}" name="metakeyword" placeholder="Meta Keyword" class="form-control @error('metakeyword') is-invalid @enderror" />
                            @error('metakeyword')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <!-- <label class="form-label">Topic</label> -->
                            <input type="text" value="{{ old('ogtitle') }}" name="ogtitle" placeholder="OG Title" class="form-control @error('ogtitle') is-invalid @enderror" />
                            @error('ogtitle')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <!-- <label class="form-label">Image Content</label> -->
                            <input type="text" value="{{ old('ogdiscription') }}" name="ogdiscription" placeholder="OG Discription" class="form-control @error('ogdiscription') is-invalid @enderror" />
                            @error('ogdiscription')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        
                        
                         <div class="form-group col-md-6">
                           <!--  <label class="form-label">Required By</label> -->
                            <input type="text" value="{{ old('fburl') }}" name="fburl" placeholder="FB URL" class="form-control @error('fburl') is-invalid @enderror" />
                            @error('fburl')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                         <div class="form-group col-md-6">
                           <!--  <label class="form-label">Required By</label> -->
                            <input type="text"  value="{{ old('ogimage') }}" name="ogimage" placeholder="OG Image" class="form-control @error('ogimage') is-invalid @enderror" />
                            @error('ogimage')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                         <div class="form-group col-md-6">
                           <!--  <label class="form-label">Required By</label> -->
                            <input type="text" value="{{ old('canonicalurl') }}" name="canonicalurl" placeholder="Canonical URL" class="form-control @error('canonicalurl') is-invalid @enderror" />
                            @error('canonicalurl')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                           <!--  <label class="form-label">Required By</label> -->
                            <input type="text" value="{{ old('twittersite') }}" name="twittersite" placeholder="Twitter Site" class="form-control @error('twittersite') is-invalid @enderror" />
                            @error('twittersite')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                           <!--  <label class="form-label">Required By</label> -->
                            <input type="text" value="{{ old('twittertitle') }}" name="twittertitle" placeholder="Twitter Title" class="form-control @error('twittertitle') is-invalid @enderror" />
                            @error('twittertitle')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                           <!--  <label class="form-label">Required By</label> -->
                            <input type="text" value="{{ old('twiterdiscription') }}" name="twiterdiscription" placeholder="Twiter Discription" class="form-control @error('twiterdiscription') is-invalid @enderror" />
                            @error('twiterdiscription')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                           <!--  <label class="form-label">Required By</label> -->
                            <input type="text" value="{{ old('Schema') }}" name="Schema" placeholder="Schema" class="form-control @error('Schema') is-invalid @enderror" />
                            @error('Schema')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                           <!--  <label class="form-label">Required By</label> -->
                            <input type="text" value="{{ old('hreflang') }}" name="hreflang" placeholder="HRE Flang" class="form-control @error('hreflang') is-invalid @enderror" />
                            @error('hreflang')
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
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
@endsection
