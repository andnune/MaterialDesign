<?php

class Controller
{
    private $results;
    public function index()
    {
        $blog=new Model();
        $results=$blog->get_blogs();
        //var_dump($results);
        require("views/index.php");
        //require_once './index.php';
       // $results = seleccTodoBlog();
    }


}