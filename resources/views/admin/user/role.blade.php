<!--继承父模板-->
@extends('admin.layouts.layouts')
<!--标题-->
@section('content')

    <div class="main-body">
        <div class="panel mb-3">
            <div class="panel-header">
                <span>用户角色列表：</span>
                <ul class="nav nav-right">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('user-create')}}">添加角色</a>
                    </li>
                </ul>
            </div>
            <div class="panel-body">
                <form action="/admin/users/{{$user->id}}/role" method="post">
                    @foreach($roles as $role)
                    <div class="form-group">
                        <input type="checkbox" name="roles[]" checked value="{{$role->id}}"
                        @if ($myRoles->contains($role))
                        checked
                        @endif>
                        <label for="">{{$role->name}}</label>
                    </div>
                    @endforeach
                <div class="panel-footer">
                    <button type="submit" class="btn btn-primary">提交</button>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection