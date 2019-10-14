<?php
namespace app\admin\controller;


use app\admin\model\MangagerModel;
use think\Controller;
use think\Db;

class mangager extends Controller{
    //管理员列表
    public function show(){
        $mangager=Db::table("online_admin")
            ->select();
        return view("",["mangager"=>$mangager]);
    }
    //添加管理员
    public  function add(){
        if(request()->isGet()){
            return view();
        }
        if(request()->isPost()){
            //接值
            $user_name=request()->post("user_name","");
            //邮箱
            $email=request()->post("email","");
            //密码
            $password=request()->post("password","");
            $time=time();
            $data=[
                'admin_name' => $user_name,
                'admin_email'=> $email,
                'admin_pwd'  => $password,
                'admin_reg_time'=>$time
            ];
            $mangager=new MangagerModel();
            $mangager=$mangager->mangager_add($data);
            if($mangager){
                $this->success("添加成功","add");
            }else{
                $this->error("添加失败");
            }
            //验证
            //连接数据库
        }
    }
}