<?php
namespace app\admin\controller;

use app\admin\model\Admin;
use think\Controller;
use think\Db;
use think\facade\Session;


class AdminController extends Controller{
    //管理员列表
    public function show(){
        $admin=Admin::all();
        //$admin=Db::table("online_admin")->select();
        return view("",["admin"=>$admin]);
    }
    //添加管理员
    public  function add(){
        if(request()->isGet()){
            return view();
        }
        if(request()->isPost()){
            //接值
            $data=input('post.','');
            $admin_sort=substr(uniqid(),-4);
            Session::set('admin_sort',$admin_sort);
            $data['admin_pwd']=md5(md5($data['admin_pwd']).$admin_sort);
            $data['admin_reg_time']=time();
            //实例化一个模型
            $admin=new Admin();
            $admin->save([
                    'admin_name' => $data['admin_name'],
                    'admin_email' => $data['admin_email'],
                    'admin_pwd' => $data['admin_pwd'],
                    'admin_sort' => $admin_sort,
                    'admin_reg_time' => $data['admin_reg_time']
                ]);
            if($admin){
                $this->success("添加成功","add");
            }else{
                $this->error("添加失败");
            }
            //验证
            //连接数据库
        }
    }
}