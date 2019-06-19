<?php
namespace App\Repositories;


use App\Models\Admin\Rule;

class RulesRepository
{
    public function getRules()
    {
        return Rule::orderBy('sort','asc')->get();
    }
    /**
     * 添加权限
     * @param array $params
     * @return mixed
     */
    public function create(array $params)
    {
        return Rule::create($params);
    }
}