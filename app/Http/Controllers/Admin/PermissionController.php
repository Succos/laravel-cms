<?php

namespace App\Http\Controllers\Admin;



use App\Models\Admin\Permission;

class PermissionController extends Controller
{
    //权限列表
    public function index()
    {
        $permissions=Permission::paginate(15);
        return view('admin.permission.index',compact('permissions'));
    }
    //权限创建也
    public function create()
    {
        return view('admin.permission.add');
    }
    //保存权限的实际行为
    public function store()
    {
        $this->validate(request(),[
            'name'=>'required|min:3',
            'description'=>'required',
            'display_name'=>'required',
        ]);
        Permission::create(\request(['name','description','display_name']));
        return redirect( 'admin/permission/index');
    }


}
