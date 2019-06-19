
<!--继承父模板-->
@extends('admin.layouts.layouts')
<!--标题-->
@section('content')

    <div class="main-body">
        <div class="panel mb-3">
            <div class="panel-header">添加菜单</div>
            <div class="panel-body">
                <form class="auto-form" method="post" action="{{route('rules.store')}}">
                    <div class="form-group row">
                        <div class="form-group-label col-sm-2 text-right">
                            <label class="col-form-label required">菜单名称</label>
                        </div>
                        <div class="col-sm-6">
                            <input class="form-control cat-name" name="name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="form-group-label col-sm-2 text-right">
                            <label class="col-form-label">上级菜单或者权限</label>
                        </div>
                        <div class="col-sm-6">
                            <select class="form-control parent" name="parent_id">
                                @foreach($rules as $k=>$item)
                                    <option value="{{$item['id']}}">{{$item['_name']}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="form-group-label col-sm-2 text-right">
                            <label class="col-form-label required">菜单图标</label>
                        </div>
                        <div class="col-sm-6">
                            <input class="form-control cat-name" name="fonts">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="form-group-label col-sm-2 text-right">
                            <label class="col-form-label required">权限路进？路由名称</label>
                        </div>
                        <div class="col-sm-6">
                            <input class="form-control cat-name" name="route">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="form-group-label col-sm-2 text-right">
                            <label class="col-form-label required">排序</label>
                        </div>
                        <div class="col-sm-6">
                            <input class="form-control cat-name" name="sort">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="form-group-label col-sm-2 text-right">
                            <label class="col-form-label">是否颖仓</label>
                        </div>
                        <div class="col-sm-6">
                            <label class="radio-label">
                                <input id="radio1" checked="" value="1" name="is_hidden" type="radio" class="custom-control-input">
                                <span class="label-icon"></span>
                                <span class="label-text">开启</span>
                            </label>
                            <label class="radio-label">
                                <input id="radio2" value="0" name="is_hidden" type="radio" class="custom-control-input">
                                <span class="label-icon"></span>
                                <span class="label-text">关闭</span>
                            </label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="form-group-label col-sm-2 text-right">
                            <label class="col-form-label">状态</label>
                        </div>
                        <div class="col-sm-6">
                            <label class="radio-label">
                                <input id="radio1" checked="" value="1" name="status" type="radio" class="custom-control-input">
                                <span class="label-icon"></span>
                                <span class="label-text">开启</span>
                            </label>
                            <label class="radio-label">
                                <input id="radio2" value="0" name="status" type="radio" class="custom-control-input">
                                <span class="label-icon"></span>
                                <span class="label-text">关闭</span>
                            </label>
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