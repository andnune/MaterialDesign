<?php

class Controller
{
    private $results;
    public function index()
    {
        $blog=new Model();
        $results=$blog->get_blogs();
        require("views/index.php");
    }


}