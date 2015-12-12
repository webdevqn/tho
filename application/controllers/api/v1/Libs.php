<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Libs extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Libs_model');
    }
    
    public function index()
    {
        $this->load->view('api/domains');
    }
    
    public function domain_list()
    {
        $domain_list = $this->Libs_model->get_domain_list();
        $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($domain_list, JSON_NUMERIC_CHECK));
    }

}
