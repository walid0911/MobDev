<?php

class Signup extends Controller
{
    private $error = "";

    public function index()
    {
        $data['page_title'] = "Sign-Up";

        // Check login and get user information if he is logged in.
        $userModel = $this->load_model("user");
        $user = $userModel->checkLogin();

        // If he is logged in he is not supposed to see the signUp page
        if($user != null)
        {
            $data['user'] = $user;
            $_SESSION["error"] = "Logout first to consult this page!";
            $this->view("404", $data);
        }
        else
        {
            if ($_SERVER['REQUEST_METHOD'] == "POST") {

                $user = $this->load_model("user");
                $user->signup($_POST);
            }
            $this->view("signup", $data);
        }

    }

}