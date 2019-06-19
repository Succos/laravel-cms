<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Permission;
use App\Models\Admin\Role;
use App\Models\Admin\User;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    //角色列表
    public function index()
    {
        $roles=Role::paginate(15);

        return view('admin.role.index',compact('roles'));
    }
    //创建角色的显示
    public function create()
    {
        return view('admin.role.add');
    }
    //创建
    public function store()
    {
        $this->validate(request(),[
            'name'=>'required|min:3',
            'description'=>'required',
            'display_name'=>'required',
        ]);
        Role::create(\request(['name','description','display_name']));

        return redirect( 'admin/roles');

    }
    //角色权限关系
    public function permission( Role $role)
    {
        //获取所有权限
        $permissions=Permission::all();
        //获取当前角色的权限
        $myPermissions=$role->permissions;
        return view('admin/role/permission',compact('permissions','myPermissions','role'));
    }
    //储存角色和权限
    public function storePermission(Role $role )
    {
        $this->validate(\request(),[
            'permissions'=>'required|array'
        ]);
        //所有的权限
        $permissions=Permission::findMany(\request('permissions'));
    //挡圈角色的所有权限
        $myPermission=$role->permissions;

        //挡圈角色要增加的权限
        $addPermissions=$permissions->diff($myPermission);
        foreach ($addPermissions as $permission){
            $role->grantPermission($permission);
        };
        //当前角色要删除的权限
        $deletePermission=$myPermission->diff($permissions);
        foreach ($deletePermission as $permission){
            $role->deletePermission($permission);
        }
        return back();
    }

}
