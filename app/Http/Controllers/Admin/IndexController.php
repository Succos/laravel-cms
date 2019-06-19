<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\User;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    //
    public function index()
    {


        return view('admin.indexs.index');
    }
}
