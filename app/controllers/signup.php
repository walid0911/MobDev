<?php

class Signup extends Controller
{
    private $error = "";

    public function index()
    {
        $data['page_title'] = "Sign-Up";

        if($_SERVER['REQUEST_METHOD'] == "POST")
        {

            $user = $this->load_model("user");
            $user->signup($_POST);
        }
        $this->view("signup", $data);


    }

}