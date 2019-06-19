<!--继承父模板-->
@extends('admin.layouts.layouts')
<!--标题-->
@section('content')
<div class="main-body">
    <div class="panel mb-3">
        <div class="panel-header">添加用户</div>
        <div class="panel-body">
            <form class="auto-form" method="post" action="{{route('store')}}">
                <div class="form-group row">
                    <div class="form-group-label col-sm-2 text-right">
                        <label class="col-form-label required">用户名</label>
                    </div>
                    <div class="col-sm-6">
                        <input class="form-control cat-name" name="name">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="form-group-label col-sm-2 text-right">
                        <label class="col-form-label required">密码</label>
                    </div>
                    <div class="col-sm-6">
                        <input class="form-control cat-name" name="password">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="form-group-label col-sm-2 text-right">
                        <label class="col-form-label required">email</label>
                    </div>
                    <div class="col-sm-6">
                        <input class="form-control cat-name" name="email">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="form-group-label col-sm-2 text-right">
                    </div>
                    <div class="col-sm-6">
                        <a class="btn btn-primary auto-form-btn" href="javascript:">保存</a>
                    </div>
                </div>
                <input name="_csrf" value="c2tbcUP4qQIZR9Py5mbG8Ftde5Qe8cYUWmgZLyk-HZ_t2GFAMrtqTAtCxFl9qi1-vZXh6__5QHlo7UjybhN6zw==" type="text" style="display: none"></form>
        </div>
    </div>
</div>
@endsection