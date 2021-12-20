<?php

class Home extends Controller
{
    public function index()
    {
        $data['page_title'] = 'HOME';

        // Check login and get user information if he is logged in
        $userModel = $this->load_model("user");
        $user = $userModel->checkLogin();
        if($user != null) {
            $data['user'] = $user;
        }


        $this->view("home", $data);

    }
}