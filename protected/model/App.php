<?php
namespace app\model;
use app\lib\speed\mvc\Model;
/*
 * app模块，和应用相关
 * */

class App extends Model
{

    public function __construct()
    {
        parent::__construct('pay_appication');
    }

    //添加app
    public function add($app_name, $return_url, $notify_url, $connect_key)
    {
        $this->insertIgnore(array(
            "app_name" => $app_name, "return_url" => $return_url, "notify_url" => $notify_url, "connect_key" => $connect_key
        ));
    }

    //获得app列表的信息
    public function getList($page=null, $limit=null)
    {
        $arr= null;
        if($page!=null&&$limit!=null)
            $arr= array($page, $limit);
        return $this->selectAll(null, "id asc", "*", $arr);
    }
    //获得app信息
    public function getData($id, $param = "*")
    {
        return $this->select(array("id" => $id), null, $param);
    }

    //删除app
    public function del($id)
    {
        $this->delete(array("id" => $id));
    }

    public function getOne(?string $id)
    {
       return $this->select(array("id" => $id));
    }

    public function set(?string $arg, ?string $arg1, ?string $arg2, ?string $arg3, ?string $arg4)
    {
        $this->update(array('id'=>$arg),array(
            "app_name" => $arg1, "return_url" => $arg2, "notify_url" => $arg3, "connect_key" => $arg4
        ));
    }
}