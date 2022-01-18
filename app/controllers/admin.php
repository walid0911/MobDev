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


    /**
     * Add product methode
     */
    public function addProduct()
    {
        $data['page_title'] = 'Admin - Add Product';

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


        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $user = $this->load_model("product");
            $user->addProduct($_POST); // contains redirection to Admin/products
        }

        $this->view("admin/addProduct", $data);
    }

    /**
     * Edit product Methode
     */
    public function editProduct($id)
    {
        $data["page_title"] = "Edit Product";
        $data["id"] = $id;

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
        $product = $productModel->getproductById(array_shift($id));
        if ($product == null) {
            $_SESSION['error'] = "SORRY! Product doesn't exist!";
            $this->view("admin/404", $data);
        }
        else {
            $data['product'] = $product;
            $this->view("admin/editProduct", $data);
        }

    }


}