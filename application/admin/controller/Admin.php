<?php
/**
 * Created by PhpStorm.
 * User: GALAXY
 * Date: 2019/10/12
 * Time: 16:16
 */
namespace app\admin\controller;

use think\Controller;
use think\Db;

class admin extends Controller{
    public function index()
    {
        return view();
    }
    //商品分类
    public function product_category()
    {
        $cate=Db::table("online_cate")
        ->select();
        return view("",["cates"=>$cate]);
    }
    //添加分类
    public function add_product_category()
    {
        if(request()->isGet())
        {
            return view();
        }
        if(request()->isPost())
        {
            //接值
            $cate_name=request()->post("cate_name","");
            //别名
            $unique_id=request()->post("unique_id","");
            //上级分类
            $cate_pid=request()->post("cate_pid","");
            //关键字
            $keywords=request()->post("keywords","");
            //简单描述
            $description=request()->post("description","");
            $sort=request()->post("sort","");
            //插入数据
            $data = [
                'name'=>$cate_name,
                'alias'=>$unique_id,
                'cate_pid'=>$cate_pid,
                'keywords'=>$keywords,
                'desc'=>$description,
                'sort'=>$sort
            ];
            dump($data);
            $cate=Db::table("online_cate")->insert($data);
            if($cate){
                $this->success("添加成功","product_category");
            }else{
                $this->error("添加失败");
            }
        }
    }
}