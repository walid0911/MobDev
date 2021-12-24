<?php

class Profile extends Controller
{

    // index methode displays the view of the current logged in profile
    public function index()
    {
        $data = array();

        // Check login and get user information if he is logged in
        $userModel = $this->load_model("user");
        $user = $userModel->checkLogin();
        if($user != null) {
            $data['user'] = $user;
            $data['page_title'] = $user->username;

            $this->view("profile", $data);
        }
        else // if user not logged in, redirect to home
        {
            header("Location: ". ROOT);
        }
    }
}