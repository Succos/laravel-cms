
<!--继承父模板-->
@extends('admin.layouts.layouts')
<!--标题-->
@section('content')

    <div class="main-body">
        <div class="panel mb-3">
            <div class="panel-header">添加权限</div>
            <div class="panel-body">
                <form class="auto-form" method="post" action="{{route('permissions-store')}}">
                    <div class="form-group row">
                        <div class="form-group-label col-sm-2 text-right">
                            <label class="col-form-label required">权限名称</label>
                        </div>
                        <div class="col-sm-6">
                            <input class="form-control cat-name" name="name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="form-group-label col-sm-2 text-right">
                            <label class="col-form-label required">展示名称</label>
                        </div>
                        <div class="col-sm-6">
                            <input class="form-control cat-name" name="display_name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="form-group-label col-sm-2 text-right">
                            <label class="col-form-label required">权限描述</label>
                        </div>
                        <div class="col-sm-6">
                            <input class="form-control cat-name" name="description">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="form-group-label col-sm-2 text-right">
                        </div>
                        <div class="col-sm-6">
                            <a class="btn btn-primary auto-form-btn" href="javascript:">保存</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection