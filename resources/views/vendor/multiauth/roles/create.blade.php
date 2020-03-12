@extends('superadmin.layouts.dashboard')
@section('section')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    @include('multiauth::message')
                    <form action="{{ route('admin.role.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="role">Role Name</label>
                            <input type="text" placeholder="Give an awesome name for role" name="name"
                                class="form-control" id="role" required>
                        </div>
                        <div class="form-group">
                            <label for="role">Assign Permissions</label>
                                @foreach($permissions as $key => $value)
                                <label for="role">{{$key}}</label>
                                <div class="d-flex justify-content-between">
                                    @foreach($value as $permission)
                                    <div class="form-group">
                                        <label for="{{$permission->id}}">{{$permission->name}}</label>
                                        <input type="checkbox" name="permissions[]" class="form-control"
                                            value="{{$permission->id}}" id="{{$permission->id}}">
                                    </div>
                                    @endforeach
                                </div>
                                @endforeach
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm">Store</button>
                        <a href="{{ route('admin.roles') }}" class="btn btn-sm btn-danger float-right">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop