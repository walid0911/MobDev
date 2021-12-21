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
            $_SESSION["error"] = "Call for a View that does not exist!!";
            include "../app/views/" . "404.php";
        }
    }

    // load the required model
    public function load_model($model)
    {

        if(file_exists("../app/models/" . strtolower($model) . ".class.php"))
        {
            include_once "../app/models/" . strtolower($model) . ".class.php";
            return $a = new $model();
        }

        return false;
    }


}