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
        else
        {
            $_SESSION['error'] = "Some error occurred! You're not logged in";
            $this->view("404", $data);
        }

        if(isset($data['user']) && (string)$data['user']->Attributes() == 'admin')
            $this->view("admin/index", $data);
        else
        {
            $_SESSION['error'] = "You don't have access to this page (admin section)";
            $this->view("404", $data);
        }
    }


    /**
     * Products methode shows all the products within the admin page
     * allows adding, removing or editing a product
     */
    public function products()
    {
        $data['page_title'] = 'Admin';

        // Check login and get user information if he is logged in
        $userModel = $this->load_model("user");
        $user = $userModel->checkLogin();
        if($user != null) {
            $data['user'] = $user;
        }
        else
        {
            $_SESSION['error'] = "Some error occurred! You're not logged in";
            $this->view("404", $data);
        }

        $productModel = $this->load_model("product");
        $products = $productModel->getAllProducts();

        $data['products'] = $products;

        if(isset($data['user']) && (string)$data['user']->Attributes() == 'admin')
        {
            $this->view("admin/products", $data);
        }
        else
        {
            $_SESSION['error'] = "You don't have access to this page (admin section)";
            $this->view("404", $data);
        }
    }


}