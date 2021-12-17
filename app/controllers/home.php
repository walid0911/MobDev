<?php

class Home extends Controller
{
    public function index()
    {
        $data['page_title'] = 'HOME';
        $this->view("home", $data);
    }
}