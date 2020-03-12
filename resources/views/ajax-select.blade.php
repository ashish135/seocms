<option>--- Select State ---</option>
@if(!empty($states))
  @foreach($states as $key => $value)
    <option>{{ $value }}</option>
  @endforeach
@endif