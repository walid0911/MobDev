<?php

class Home extends Controller
{
    public function index()
    {
        $data['page_title'] = 'HOME';

        $userModel = $this->load_model("user");
        $user = $userModel->checkLogin();

        if($user != null) {
            $data['user'] = $user;
        }

        $this->view("home", $data);
    }
}