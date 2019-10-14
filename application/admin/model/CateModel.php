<?php
/**
 * Created by PhpStorm.
 * User: GALAXY
 * Date: 2019/10/14
 * Time: 15:23
 */
namespace app\admin\model;


use think\Db;
use think\Model;

class CateModel extends Model{
    public  function  cate_add($data){
        $cate=Db::table("online_cate")->insert($data);
        if($cate){
            return  true;
        }else{
            return  false;
        }
    }
}




