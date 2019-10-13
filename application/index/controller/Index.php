<?php
namespace app\index\controller;

class Index
{
    public function index()
    {
        echo "index";
        return view();
    }

    public function hello($name = 'ThinkPHP5')
    {
        return 'hello,' . $name;
    }
}
