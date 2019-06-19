<!--继承父模板-->
@extends('admin.layouts.layouts')
<!--标题-->
@section('content')

   <div class="main-body">

      <div class="panel mb-3">
         <div class="panel-header">
            <span>权限列表</span>
            <ul class="nav nav-right">
               <li class="nav-item">
                  <a class="nav-link" href="{{route('permissions-create')}}">添加权限</a>
               </li>
            </ul>
         </div>
         <div class="panel-body">
            <table class="table table-bordered bg-white">
               <thead>
               <tr>
                  <th>#</th>
                  <th>权限名称</th>
                  <th>权限描述</th>
                  <th>操作</th>
               </tr>
               </thead>
               <tbody>
               @foreach($permissions as $permission)
                  <tr>
                     <td>{{$permission->id}}</td>
                     <td>{{$permission->name}}</td>
                     <td>{{$permission->description}}</td>
                     <td>
                        <a class="btn btn-sm btn-primary" href="/web/index.php?r=mch%2Fpermission%2Frole%2Fedit&amp;id=1">编辑</a>

                        <a class="btn btn-sm btn-danger destroy" href="/web/index.php?r=mch%2Fpermission%2Frole%2Fdestroy&amp;id=1">删除</a>
                     </td>
                  </tr>
               @endforeach
               </tbody>
            </table>
            <div class="text-center">zhongjian wenzi </div>

         </div>
         {{$permissions->links()}}
      </div>
   </div>
@endsection