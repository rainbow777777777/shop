<?php
/**
 * Created by PhpStorm.
 * User: GALAXY
 * Date: 2019/10/12
 * Time: 14:35
 */
namespace app\admin\controller;

use think\Db;
use think\Controller;

class login extends Controller
{
    public function login()
    {
        if(request()->isGet())
        {
            return view();
        }
        if(request()->isPost())
        {
            //接值
            $admin_name=request()->post("admin_name","");
            $admin_pwd =request()->post("admin_pwd","");
            //验证

            //连接数据库
            $admin=Db::table("online_admin")
            ->field(["admin_name","admin_pwd"])
            ->where("admin_name",$admin_name)
            ->where("admin_pwd",$admin_pwd)
            ->find();
            if($admin){
                //存储session
                Session('admin',$admin);
                $this->success("登录成功","Admin/index");
            }else{
                $this->error("登录失败");
            }
        }
    }
}