<?php
namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;


class Permission extends Model
{


    //权限属于哪个角色
    public function roles()
    {
        return $this->belongsToMany(
            'App\Models\Admin\Role',
            'permission_role',
            'permission_id',
            'role_id')
            ->withPivot(['permission_id','role_id']);
    }
    protected  $fillable=[
        'name','description','display_name'
    ];

}