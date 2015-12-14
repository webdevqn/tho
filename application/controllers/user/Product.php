<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends MY_Controller
{

    public function index()
    {
        $data['title'] = "Product";
        $data['header'] = "Product";
        $data['content'] = 122344;
        $this->setPage('product/index', $data);
    }

}
