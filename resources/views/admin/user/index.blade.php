<!--继承父模板-->
@extends('admin.layouts.layouts')
<!--标题-->



@section('content')

<div class="main-body">
    <div class="panel mb-3">
        <div class="panel-header">
            <span style="color: red;">管理人员登录入口：</span>
            <a href="http://111.230.222.213:8081/web/role.php?store_id=1" target="_blank">http://111.230.222.213:8081/web/role.php?store_id=1</a>
            <ul class="nav nav-right">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('user-create')}}">添加用户</a>
                </li>
            </ul>
        </div>
        <div class="panel-body">
            <table class="table table-bordered bg-white">
                <thead>
                <tr>
                    <th>id</th>
                    <th>昵称</th>
                    <th>创建日期</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->created_at}}}</td>
                    <td>
                        <a class="btn btn-sm btn-primary" href="{{route('login')}}">编辑</a>
                        <a class="btn btn-sm btn-danger article-delete" href="">删除</a>
                        <a class="btn btn-sm btn-success edit-password" data-id="1" data-toggle="modal" data-target="#editPasspord" href="javascript:">修改密码</a>
                        <a class="btn btn-sm btn-primary" href="/admin/users/{{$item->id}}/role">角色管理</a>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
            {{$users->links()}}

            <div class="modal fade" id="editPasspord">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">修改密码</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body text-center">
                            <div class="form-group row">
                                <div class="form-group-label col-sm-2 text-right">
                                    <label class="col-form-label required">新密码</label>
                                </div>
                                <div class="col-sm-6">
                                    <input class="form-control password" value="">
                                </div>
                            </div>

                            <input style="display: none;" class="user-id" name="id" value="">
                            <div class="form-group row">
                                <div class="form-group-label col-sm-2 text-right">
                                </div>
                                <div class="col-sm-6">
                                    <a class="btn btn-primary update-password" href="javascript:">保存</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).on("click", ".article-delete", function () {
            var href = $(this).attr("href");
            $.confirm({
                content: "确认删除？",
                confirm: function () {
                    $.loading();
                    $.ajax({
                        url: href,
                        dataType: "json",
                        success: function (res) {
                            $.myAlert({
                                content: res.msg,
                                confirm: function () {
                                    if (res.code == 0) {
                                        location.reload();
                                    }
                                }
                            })

                        }
                    });
                }
            });
            return false;
        });

        $(document).on("click", ".edit-password", function () {
            var userId = $(this).data('id');
            $('.user-id').val(userId)
        });

        $(document).on("click", ".update-password", function () {
            var href = '/web/index.php?r=mch%2Fpermission%2Fuser%2Fupdate-password';
            $.ajax({
                url: href,
                type: "post",
                data: {
                    id: $('.user-id').val(),
                    password: $('.password').val(),
                    _csrf:_csrf
                },
                dataType: "json",
                success: function (res) {
                    $.myAlert({
                        content: res.msg,
                        confirm: function () {
                            if (res.code == 0) {
                                location.reload();
                            }
                        }
                    })
                }
            });
            return false;
        });
    </script>
</div>
@endsection