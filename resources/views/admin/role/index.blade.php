<!--继承父模板-->
@extends('admin.layouts.layouts')
<!--标题-->
@section('content')
    <div class="main-body">

        <div class="panel mb-3">
            <div class="panel-header">
                <span></span>
                <ul class="nav nav-right">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('roles-create')}}">添加角色</a>
                    </li>
                </ul>
            </div>
            <div class="panel-body">
                <table class="table table-bordered bg-white">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>角色名称</th>
                        <th>角色描述</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($roles as $role)
                    <tr>
                        <td>{{$role->id}}</td>
                        <td>{{$role->name}}</td>
                        <td>{{$role->description}}</td>
                        <td>
                            <a class="btn btn-sm btn-primary" href="/admin/roles/{{$role->id}}/permission">权限管理</a>

                            <a class="btn btn-sm btn-danger destroy" href="/web/index.php?r=mch%2Fpermission%2Frole%2Fdestroy&amp;id=1">删除</a>
                        </td>
                    </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="text-center">zhongjian wenzi </div>

            </div>
            {{$roles->links()}}
        </div>
    </div>
@endsection