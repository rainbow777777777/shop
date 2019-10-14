<?php
/**
 * Created by PhpStorm.
 * User: GALAXY
 * Date: 2019/10/14
 * Time: 23:19
 */
namespace app\admin\controller;



use think\Controller;

class Node extends Controller{
    public function show(){
        return view();
    }
    public function add(){
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