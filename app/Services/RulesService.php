<?php
namespace  App\Services;
use App\Handlers\Tree;
use App\Repositories\RulesRepository;
class RulesService{
    protected $tree;

    protected $rulesRepository;

    /**
     * RulesService constructor.
     * @param RulesRepository $rulesRepository
     * @param Tree $tree
     */
    public function __construct(RulesRepository $rulesRepository,Tree $tree)
    {
        $this->tree = $tree;

        $this->rulesRepository = $rulesRepository;
    }
    /**
     * 创建权限数据
     * @param array $params
     * @return mixed
     */
    public function create(array $params)
    {
        return $this->rulesRepository->create($params);
    }
    public function getRulesTree()
    {
        $rules=$this->rulesRepository->getRules()->toArray();
        return Tree::tree($rules,'name','id','parent_id');
    }
}