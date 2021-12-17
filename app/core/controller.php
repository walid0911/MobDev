<?php

abstract class Controller
{
    abstract public function index();


    // Load the required view
    public function view($path,$data = [])
    {
        if(is_array($data)){
            extract($data);
        }

        if(file_exists("../app/views/" . $path . ".php"))
        {
            include "../app/views/" . $path . ".php";
        }else{
            include "../app/views/" . "404.php";
        }
    }


}