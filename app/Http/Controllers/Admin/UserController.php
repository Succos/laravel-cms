<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Role;
use App\Models\Admin\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *管理员列表
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $user=User::find(1);
//        $roles=$user->roles;
//        dd($roles);
     //   $users=User::with('roles')->get();
        $users = User::paginate(10);
        return view('admin.user.index',compact('users'));
       // return view('admin.user.index',compact($users));
    }

    /**
     * Show the form for creating a new resource.
     *管理员创建月面
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.user.add',compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate(request(),[
           'name'=>'required|min:3',
           'password'=>'required'
        ]);
        $user=new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=bcrypt($request->password);
        $res=$user->save();
        if (!$res){
            response()->json([
                'code'=>1,
                'msg'=>'保存失败'
            ],200);
        }else{
            response()->json([
                'code'=>0,
                'msg'=>'保存成功'
            ],200);
        }
    }
    //用户的角色页面
    public function role(User $user)
    {
        $roles=Role::all();
        $myRoles=$user->roles;
        return view('admin.user.role',compact('roles','myRoles','user'));
    }
    public function storeRole(User $user)
    {
       $this->validate(\request(),[
           'roles'=>'required|array'
       ]);
       $roles=Role::findMany(\request('roles'));
       $myRoles=$user->roles;
       //要增加的
        $addRoles=$roles->diff($myRoles);
        foreach ($addRoles as $role){
            $user->assignRole($role);
        }
        $deleteRoles=$myRoles->diff($roles);
         foreach ($deleteRoles  as $role){
          $user->deleteRole($role);
        }
        return back();
    }
}
