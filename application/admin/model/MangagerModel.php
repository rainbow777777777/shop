<?php
/**
 * Created by PhpStorm.
 * User: GALAXY
 * Date: 2019/10/14
 * Time: 20:18
 */

namespace   app\admin\model;

use think\Db;
use think\Model;

class MangagerModel extends Model{
    public  function mangager_add($data){
        $mangager=Db::table("online_admin")->insert($data);
        if($mangager){
            return true;
        }else{
            return false;
        }
    }
}