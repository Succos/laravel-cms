<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\RuleRequest;
use App\Services\RulesService;
use Illuminate\Http\Request;

class RulesController extends Controller
{
    protected $rulesService;
    public function __construct(RulesService $rulesService)
    {
        $this->rulesService=$rulesService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //获取上级菜单
        $rules=$this->rulesService->getRulesTree();

       return view('admin.rules.create',compact('rules'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RuleRequest $request)
    {
       $result= $this->rulesService->create($request->all());

        if ($result){
            return [
                'code'=>0,
                'msg'=>'添加成功'
            ];
        }else{
            return [
                'code'=>1,
                'msg'=>‘添加失败’
            ];
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
