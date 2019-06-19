<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
/**
 * 后台路由
 */
/**后台模块**/
Route::group(['namespace' => 'Admin','prefix' => 'admin'], function () {
    Route::get('login', 'EntryController@showLoginForm')->name('login');  //后台登陆页面
    Route::any('login-handle', 'EntryController@loginHandle')->name('login-handle'); //后台登陆逻辑
    Route::get('logout', 'EntryController@logout')->name('admin.logout'); //退出登录
    Route::get('index', 'IndexController@index')->name('admin.index'); //后台首页
    //管理人员
    Route::get('/users','UserController@index')->name('users-index');
    Route::get('/users/create','UserController@create')->name('user-create');
    Route::post('/users/store','UserController@store')->name('store');

    //角色和用户关联
    Route::get('/users/{user}/role','UserController@role')->name('user-role');
    Route::post('/users/{user}/role','UserController@storeRole')->name('user-storeRole');
//角色列表
    Route::get('/roles','RoleController@index')->name('roles-index');
    Route::get('/roles/create','RoleController@create')->name('roles-create');
    Route::post('/roles/store','RoleController@store')->name('roles-store');
    //角色和权限关联
    Route::get('/roles/{role}/permission','RoleController@permission')->name('roles-permission');
    Route::post('/roles/{role}/permission','RoleController@storePermission')->name('roles-storePermission');

    //权限
    Route::get('/permissions','PermissionController@index')->name('permissions-index');
    Route::get('/permissions/create','PermissionController@create')->name('permissions-create');
    Route::post('/permissions/store','PermissionController@store')->name('permissions-store');
    //菜单管理
    Route::resource('rules','RulesController',['only'=> ['index','create','store','update','edit','destroy'] ]);  //权限


});