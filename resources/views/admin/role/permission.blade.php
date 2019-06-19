<!--继承父模板-->
@extends('admin.layouts.layouts')
<!--标题-->
@section('content')

    <div class="main-body">
        <div class="panel mb-3">
            <div class="panel-header">
                <span>角色与权限关联：</span>
                <ul class="nav nav-right">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('user-create')}}">天剑添加全选</a>
                    </li>
                </ul>
            </div>
            <div class="panel-body">
                <form action="/admin/roles/{{$role->id}}/permission" method="post">
                    @foreach($permissions as $permission)
                        <div class="form-group">
                            <input type="checkbox" name="permissions[]"  value="{{$permission->id}}"
                                   @if ($myPermissions->contains($permission))
                                   checked
                                    @endif>
                            <label for="">{{$permission->name}}</label>
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