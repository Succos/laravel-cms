<?php

namespace App\Models\Admin\Traits;

use App\Handlers\Tree;
use Cache;
trait RbacCheck
{
    // 缓存相关配置
    protected $cache_key = '_cache_rules';

    protected $menu_cache = '_menu_cache'; //菜单缓存key


    /**
     * 删除权限缓存和菜单缓存
     * @return bool
     */
    public function clearRuleAndMenu()
    {
        return Cache::tags('rbac')->flush();
    }
}