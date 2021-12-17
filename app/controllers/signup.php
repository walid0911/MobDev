<?php

class Signup extends Controller
{
    public function index()
    {
        $data['page_title'] = "Sign-Up";
        $this->view("signup", $data);
    }
}