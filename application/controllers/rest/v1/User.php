<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
    }
    
    public function index() {
        $data['roles'] = $this->User_model->role_table_structure();
        $data['users'] = $this->User_model->user_table_structure();
        $this->load->view('rest/v1/user/index', $data);
    }

}