<?php

class Admin extends Controller
{
    public function index()
    {
        $data['page_title'] = 'Admin';

        // Check login and get user information if he is logged in
        $userModel = $this->load_model("user");
        $user = $userModel->checkLogin();
        if($user != null) {
            $data['user'] = $user;
        }

        if(isset($data['user']) && (string)$data['user']->Attributes() == 'admin')
            $this->view("admin/index", $data);
        else
        {
            $_SESSION['error'] = "You don't have access to this page (admin section)";
            $this->view("404", $data);
        }
    }
}