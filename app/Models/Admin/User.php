<?php

namespace App\Models\Admin;

use App\Handlers\Tree;
use App\Models\Admin\Traits\RbacCheck;
use Illuminate\Notifications\Notifiable;
use Cache;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Authenticatable
{
    use Notifiable;
    use RbacCheck;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
        //用户有哪些角色
    public function roles()
    {
        return $this->belongsToMany(
            'App\Models\Admin\Role',
            'role_user',
            'user_id',
            'role_id')->withPivot(['user_id','role_id']);
    }
    //判断是否有某个juese
    public function isInRoles($roles)
    {
        //是0返回false，其他true
        return !!$roles->intersect($this->roles)->count();
    }
    //给用户分配角色
    public function assignRole($role)
    {
        return $this->roles()->save($role);
    }
    //取消用户分配的角色
    public function deleteRole($role)
    {
        return $this->roles()->detach($role);
    }
    //判断用户是否有权限
    public function hasPermission($permission)
    {
        return $this->isInRoles($permission->roles);
    }
    public function getMenus()
    {

            $rules = [];
            //判断是否是超级管理员用户组
                foreach ($this->roles as $role)
                {
                    $rules = array_merge($rules, $role->rulesPublic()->toArray());

                }
                if($rules)
                {
                    $rules = unique_arr($rules);
                }
        return Tree::array_tree($rules);
    }
}