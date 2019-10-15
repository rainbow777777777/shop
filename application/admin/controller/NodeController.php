<?php
/**
 * Created by PhpStorm.
 * User: GALAXY
 * Date: 2019/10/14
 * Time: 23:19
 */
namespace app\admin\controller;

use think\Controller;

class NodeController extends Controller{
    public function show(){
        return view();
    }
    public function add(){
        if(request()->isGet()){
            return view();
        }
        if(request()->isPost()){
            //接值

//            $mangager=new MangagerModel();
//            $mangager=$mangager->mangager_add($data);
//            if($mangager){
//                $this->success("添加成功","show");
//            }else{
//                $this->error("添加失败");
//            }
            //验证
            //连接数据库
        }
    }

}












//public function  notCates(){
//    $cate = Db::table("online_node")->select();
//    return $this->getorderCate($cate);
//}
//public  function  getorderCate($cate,$pid=0,$level=0){
//    static $new_cate=[];
//    foreach($cate as $key=>$value){
//        if($value['node_pid']==$pid){
//            $value['$level']=$level;
//            $new_cate[]=$value;
//            $this->getorderCate($cate,$value['node_id'],$level+1);
//        }
//    }
//    return $new_cate;
//}