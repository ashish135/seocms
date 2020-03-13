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
                            <div class="filters">
                              <form id="filter_form" action="{{ route('reporting') }}" method="GET">
                                <select name="project" onchange="return handleFilter(); ">
                                  <option value="">All Projects</option>
                                  @foreach($projects as $p)
                                    <option value="{{$p->projectname}}" {{ request()->get('project') == $p->projectname ? 'selected' : '' }}>{{$p->projectname}}</option>
                                  @endforeach
                                </select>
                                <select name="maincategory" onchange="return handleFilter(); ">
                                  <option value="">Main Categories</option>
                                  @foreach($maincategories as $mc)
                                    <option value="{{$mc->id}}" {{ $mc->id == request()->get('maincategory') ? 'selected' : '' }}>{{$mc->name}}</option>
                                  @endforeach
                                </select>
                                <select name="subcategory" onchange="return handleFilter(); ">
                                  <option value="">Sub Categories</option>
                                  @foreach($categories as $c)
                                    <option value="{{$c->name}}" {{ $c->name == request()->get('subcategory') ? 'selected' : '' }}>{{$c->name}}</option>
                                  @endforeach
                                </select>
                                <select name="keyword" onchange="return handleFilter(); ">
                                  <option value="">All Keywords</option>
                                  @foreach($keywords as $k)
                                    <option value="{{$k->name}}" {{ $k->name == request()->get('keyword') ? 'selected' : '' }}>{{$k->name}}</option>
                                  @endforeach
                                </select>
                                <select name="region" onchange="return handleFilter(); ">
                                  <option value="">All Region</option>
                                  @foreach($regions as $r)
                                    <option value="{{$r->name}}" {{ $r->name == request()->get('region') ? 'selected' : '' }}>{{$r->name}}</option>
                                  @endforeach
                                </select>
                                <select name="activity" onchange="return handleFilter(); ">
                                  <option value="">All Activity</option>
                                  @foreach($activitys as $a)
                                    <option value="{{$a->name}}" {{ $a->name == request()->get('activity') ? 'selected' : '' }}>{{$a->name}}</option>
                                  @endforeach
                                </select>
                                @if(request()->get('bycalendar') == "customdate")
                                <div class="customdateview">
                                    <input type="hidden" name="bycalendar" value="customdate">
                                      <input type="text" onfocus="(this.type='date')" onblur="(this.type='text')" placeholder="From Date" name="fromdate" required="" value="{{ request()->get('fromdate') }}" />
                                      <input type="text" onfocus="(this.type='date')" onblur="(this.type='text')" placeholder="To Date" name="todate" value="{{ request()->get('todate') }}" required="" />
                                      <button>Submit</button>
                                </div>
                              @endif
                              @if(request()->get('bycalendar') == "day")
                                <div class="view">
                                  <a id="prev" href="{{ $prevurl }}" class="prev btn"><</a><span class="format">{{ $view }}</span><a id="next" href="{{ $nexturl }}" class="btn next">></a>
                                </div>
                                @elseif(request()->get('bycalendar') == "weekly")
                                <div class="view">
                                  <a id="prev" href="{{ $prevurl }}" class="prev btn"><</a><span class="format">{{ $view }}</span><a id="next" href="{{ $nexturl }}" class="btn next">></a>
                                </div>
                                @elseif(request()->get('bycalendar') == "monthly")
                                <div class="view">
                                  <a id="prev" href="{{ $prevurl }}" class="prev btn"><</a><span class="format">{{ $view }}</span><a id="next" href="{{ $nexturl }}" class="btn next">></a>
                                </div>
                                @endif
                                <select name="bycalendar" onchange="return handleFilter(); ">
                                  <option value="">Select View</option>
                                  <option value="day" {{ request()->get('bycalendar') == "day" ? 'selected' : '' }}>Day</option><
                                  <option value="weekly" {{ request()->get('bycalendar') == "weekly" ? 'selected' : '' }}>Weekly</option>
                                  <option value="monthly" {{ request()->get('bycalendar') == "monthly" ? 'selected' : '' }}>Monthly</option>
                                   <option value="customdate" {{ request()->get('bycalendar') == "customdate" ? 'selected' : '' }}>Custom Date</option>
                                </select>
                                <a class="btn" href="{{ route('reporting') }}">Clear</a>
                              </form>
                            </div>
                            <table class="table table-hover">
                                <thead>
                                  <tr>
                                    <th>Project</th>
                                    <th>Main Category</th>
                                    <th>Sub Category</th>
                                    <th>Keywords</th>
                                    <th>Targated Region</th>
                                    <th>Activity</th>
                                    <th>Created At</th>
                                  </tr>
                                </thead>
                                 <tbody>
                                @foreach($leads as $page)
                                  <tr>
                                    <td>{{ $page->Project }}</td>
                                    <td>{{ App\Category::find($page->Main_Category)->name }}</td>
                                    <td>{{ $page->Sub_Category }}</td>
                                    <td>{{ $page->Keyword }}</td>
                                    <td>{{ $page->Region }}</td>
                                    <td>{{ $page->Activity_Type }}</td>
                                    <td>{{ Carbon\Carbon::parse($page->created_at)->format('F j, Y') }}</td>
                                    <td><a href="{{ asset('/admin/reporting/'.$page->id) }}">View</a></td>
                                  </tr>
                              @endforeach
                            </tbody>
                              </table>
                        {{ $leads->appends($_GET)->links() }}
                    </div>
                </div>
            </div>
        </div>
@endsection
@section('footerscript')
<script type="text/javascript">
function handleFilter(e){
  $('#filter_form').submit();
}
function handleCalendar(e){
  $('#calendar_form').submit();
}
$('#prev').click(function(){
  var queryString = location.search;
  var urlParams = new URLSearchParams(queryString);
  var search_params = new URLSearchParams(queryString); 

// new value of "id" is set to "101"
search_params.set('viewcount', '101');
  //window.location.search = urlParams.set('viewcount', 2);
  console.log(urlParams.get('viewcount'), urlParams.get('bycalendar'));
});
</script>
@endsection