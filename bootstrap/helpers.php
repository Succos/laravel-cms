<?php
function getCurrentUrl(){
    return Route::getCurrentRoute()->uri();
}
//function activeMenu($item,$route){
//
//    if (isset($item['uri']) && ($item['uri'] == $route ))
//        return 'active';
//    if (isset($item['list']) && is_array($item['list'])) {
//        foreach ($item['list'] as $sub_item) {
//            $active = activeMenu($sub_item, $route);
//            if ($active != '')
//                return $active;
//        }
//    }
//    return '';
//
//}
function getMenuList(){
    $menu=new \App\Models\Admin\Menu ();
    $menuList=$menu->getMenu(0);
    foreach ($menuList as $k=>$item){
        $menuList[$k]['list']=$menu->getMenu($item['id']);
    }
    return $menuList;
}
function getCurrtMenu($menu_list,$route){
    //返回当前菜单下的所有子菜单

    foreach ($menu_list as $item){
        if (isset($item['list'])){
            foreach ($item['list'] as $sub_item){
                if ($sub_item['uri']==$route){
                    return $item;
                }
            }
        }
    }
}
function getCurrentMes($menu_list, $route)
{
    foreach ($menu_list as $item) {
        if (isset($item['route']) && ($item['route'] == $route || (is_array($item['sub']) && in_array($route, $item['sub'])))) {
            return $item;
        }
        if (isset($item['list']) && is_array($item['list'])) {
            foreach ($item['list'] as $sub_item) {
                if (isset($sub_item['route']) && ($sub_item['route'] == $route || (is_array($sub_item['sub']) && in_array($route, $sub_item['sub']))))
                    return $item;
                if (isset($sub_item['list']) && is_array($sub_item['list'])) {
                    foreach ($sub_item['list'] as $sub_sub_item) {
                        if (isset($sub_sub_item['route']) && ($sub_sub_item['route'] == $route || (is_array($sub_sub_item['sub']) && in_array($route, $sub_sub_item['sub']))))
                            return $item;
                    }
                }
            }
        }
    }
    return null;
}
/**
 * [unique_arr 去除二维数组重复值]
 * @return [type] [返回值是二维数组]
 */
function unique_arr($array2D,$stkeep=false,$ndformat=true){

    // 判断是否保留一级数组键 (一级数组键可以为非数字)
    if($stkeep) $stArr = array_keys($array2D);	//返回数据的下标

    // 判断是否保留二级数组键 (所有二级数组键必须相同)
    if($ndformat) $ndArr = array_keys(end($array2D));	//返回二维数组的最后一个下标

    //降维,也可以用implode,将一维数组转换为用逗号连接的字符串,结果是索引一维数组
    foreach ($array2D as &$v){
        if(isset($v['pivot']))
        {
            unset($v['pivot']);
        }
        $v = implode(",",$v);
        $temp[] = $v;
    }

    //去掉重复的字符串,也就是重复的一维数组
    $temp = array_unique($temp);

    //再将拆开的数组重新组装
    foreach ($temp as $k => $v)
    {
        if($stkeep) $k = $stArr[$k];
        if($ndformat)
        {
            $tempArr = explode(",",$v);
            foreach($tempArr as $ndkey => $ndval) $output[$k][$ndArr[$ndkey]] = $ndval;
        }
        else $output[$k] = explode(",",$v);
    }

    return $output;
}