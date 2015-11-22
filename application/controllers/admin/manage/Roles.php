<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Roles extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }
    
    public function index() {
        //header('Content-type: application/json');
        $api_result = json_decode(file_get_contents('http://thodaico.vn/api/v1/role.list'),true);
        print_r($api_result);
        
    }

}
