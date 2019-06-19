<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    //
    protected $table='admin_menu';

    public function getMenu($parent_id){

       return self::where('parent_id',$parent_id)->get()->toArray();

    }
}
