<?php

use Illuminate\Database\Seeder;
use App\Permission;
use App\Role;
use App\User;
class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Permission::truncate();
        Role::truncate();
        User::truncate();
        DB::table('role_user')->delete();
        DB::table('permission_role')->delete();
        $succos = User::create([
                'name'=>'succos',
                'email'=>'3322480003@qq.com',
                'password'=>bcrypt('admin888'),
            //出事校
        ]);
        $admin = Role::create([
            'name'=>'admin',
            'display_name'=>'管理员角色',
            'description'=>'角色描述 admin_user',
            //出事校
        ]);
        //chuxiang quanxian
        $permissions=[
            [
                'name'=>'manage_user',
                'display_name'=>'用户管理权限',
                'description'=>'管理用户的权限',
            ],
            [
            'name'=>'create_user',
            'display_name'=>'创建用户',
            'description'=>'创建用户的权限',
            ],
            [
                'name'=>'edit_user',
                'display_name'=>'edit权限',
                'description'=>'edit的权限',
            ]
        ];
        foreach ($permissions as $permission){
            $manage_user = Permission::create(
                $permission
            );
        }
        //给角色富裕权限
        $admin->attachPermission($manage_user);
        //给用户富裕角色
        $succos->attachRole($admin);
    }

}
