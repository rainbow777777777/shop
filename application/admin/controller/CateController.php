<?php
/**
 * Created by PhpStorm.
 * User: GALAXY
 * Date: 2019/10/12
 * Time: 16:16
 */
namespace app\admin\controller;

use app\admin\model\Cate;
use think\Controller;
use think\Db;

class CateController extends Controller{

    //商品分类
    public function show()
    {
        $cate=Db::table("online_cate")
            ->select();
        return view("",["cates"=>$cate]);
    }

    //添加分类
    public function add()
    {
        if(request()->isGet())
        {
            return view();
        }
        if(request()->isPost())
        {
            $cate=new Cate();
            $cate=$cate->allowField(true)->save(request()->post());
            if($cate){
                $this->success("添加成功","add");
            }else{
                $this->error("添加失败");
            }
        }
    }

}