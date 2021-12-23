<?php

class Products extends Controller
{

    // The index methode displays the view of all products
    public function index()
    {
        $data['page_title'] = "All Products";

        // Check login and get user information if he is logged in
        $userModel = $this->load_model("user");
        $user = $userModel->checkLogin();
        if($user != null) {
            $data['user'] = $user;
        }

        // Loading the products model, and get all the products
        $productModel = $this->load_model("product");
        $products = $productModel->getAllProducts();
        $data['products'] = $products;
        $this->view("allProducts", $data);
    }

    // The product methode displays the view of one product(product details) given the id of product as parameter
    public function product($id)
    {

        // Check login and get user information if he is logged in
        $userModel = $this->load_model("user");
        $user = $userModel->checkLogin();
        if ($user != null) {
            $data['user'] = $user;
        }

        // Load product model and get product by id
        $productModel = $this->load_model("product");
        $product = $productModel->getProductById(array_shift($id));

        if ($product == null) {
            $_SESSION['error'] = "SORRY! Product doesn't exist!";
            $this->view("404", $data);
        }
        else {
            $data['product'] = $product;
            $data['page_title'] = $product->mark . $product->model;

            $this->view("product", $data);
        }
    }


    // The search methode...
}