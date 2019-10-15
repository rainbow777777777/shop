<?php
/**
 * Created by PhpStorm.
 * User: GALAXY
 * Date: 2019/10/12
 * Time: 14:35
 */
namespace app\admin\controller;


use app\admin\model\Admin;
use think\Db;
use think\Controller;
use think\facade\Session;

class LoginController extends Controller
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
            $admin_sort=Session::get("admin_sort");
            $admin_pwd =md5(md5(request()->post("admin_pwd","")).$admin_sort);
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
                $admin_last_time=Admin::get(1);
                $admin_last_time->admin_last_time=time();
                $admin_last_time->save();
                $this->success("登录成功","index/index");

            }else{
                $this->error("登录失败");exit;
            }
        }
    }
}