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


        // Get some random products (phones & laptops) to show in home page
        $productModel = $this->load_model("product");
        $phones = $productModel->get_n_ProductsByCategory("phone", 7);
        $laptops = $productModel->get_n_ProductsByCategory("laptop", 7);


        if(count($phones) > 0)
            $data['phones'] = $phones;
        if(count($laptops) > 0)
            $data['laptops'] = $laptops;
        $this->view("home", $data);

    }

}