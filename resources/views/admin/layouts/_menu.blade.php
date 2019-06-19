
<?php
$menu_list=Auth::user()->getMenus();
$route=Route::getCurrentRoute();
$route=$route->action;
$uri =$route['as'];
$current_menu=getCurrentMenu($menu_list, $uri);


function getCurrentMenu($menu_list, $uri)
{

            foreach ($menu_list  as  $item ){
                if($item['route']==$uri){
                    return $item;
                }
                if (isset($item['children']) && is_array($item['children'])){
                    foreach ($item['children'] as $sub_item) {
                    if ($sub_item['route']==$uri){
                        return $item;
                    }
                }

                }

            }

    return 'kong';

}
function activeMenu($rule, $uri){
             if ($rule['route'] ==$uri){
                 return 'active';
             }
             return '';
}
?>
<div class="sidebar sidebar-sub">
    <div class="sidebar-1" style="overflow: hidden; outline: currentcolor none medium;" tabindex="1">
        <div class="logo">
            <a class="home-link" href="/web/index.php?r=mch%2Fdefault%2Findex">凝听的小程序</a>
        </div>
        <div>
            @foreach($menu_list as $key => $rule)
            <a class="nav-item {{activeMenu($rule,$uri)}}" href="{{route($rule['route'])}}">
                <span class="nav-icon iconfont icon-settings"></span>
                <span>{{$rule['name']}}</span>
            </a>
            @endforeach
        </div>
    </div>
    <div class="sidebar-2">
        <div class="current-menu-name"></div>
        <div class="sidebar-content" style="width: 136px;">

            @foreach($current_menu['children'] as $key => $v)
                    <a class="nav-item {{activeMenu($v,$uri)}}" href="{{route($v['route'])}}">
                        <span>{{$v['name']}}</span>
                    </a>
            @endforeach
        </div>
    </div>
</div>