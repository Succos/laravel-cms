<?php
namespace app\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Rule;
class Role extends Model
{
    protected  $fillable=['name','description','display_name'];
    //当前角色的所有权限
    public function permissions()
    {
        return $this->belongsToMany(
            'App\Models\Admin\Permission',
            'permission_role','role_id',
            'permission_id')
            ->withPivot(['permission_id','role_id']);
    }
    //给角色fuyi某个权限
    public function grantPermission($permission)
    {
        return $this->permissions()->save($permission);

    }
    //取消角色赋予的权限
    public function deletePermission($permission)
    {
        return $this->permissions()->detach($permission);

    }
    //判断角色是否有权限
    public function hasPermisson($permission)
    {
        //一个集合中是否有某个对象
        return  $this->permissions->contains($permission);
    }
    public function rules()
    {
        return $this->belongsToMany(Rule::class,'role_auth')->withTimestamps();
    }
    public function rulesPublic(){
        return $this->rules()->public()->orderBy('sort','asc')->get();
    }
}