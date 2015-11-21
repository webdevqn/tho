<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class TestJson extends CI_Controller {

    public function index() {
        
    }

    public function test() {
        $output = array(
            'code' => 200,
            'status' => "SUCCESS",
            'message' => 'API works well',
            'data' => array(
                array(
                    'id' => 113,
                    'user_name' => 'Vu',
                    'email' => 'vu@thodaico.vn',
                    'status' => 'active',
                    'role' => 'admin',
                    'created_date' => 1231341241,
                    'updated_date' => 1231341241,
                    'last_activity' => 352342342,
                    'created_by' => 113
                ),
                array(
                    'id' => 114,
                    'user_name' => 'Bao',
                    'email' => 'bao@thodaico.vn',
                    'status' => 'active',
                    'role' => 'admin',
                    'created_date' => 1231341241,
                    'updated_date' => 1231341241,
                    'last_activity' => 352342342,
                    'created_by' => 113
                ),
                array(
                    'id' => 115,
                    'user_name' => 'Da',
                    'email' => 'da@thodaico.vn',
                    'status' => 'active',
                    'role' => 'admin',
                    'created_date' => 1231341241,
                    'updated_date' => 1231341241,
                    'last_activity' => 352342342,
                    'created_by' => 113
                )
            )
        );
        $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($output));
    }
    
    public function user_check() {
        
    }

}
