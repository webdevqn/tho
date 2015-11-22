<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
    }

    public function index() {
        echo 23423;
    }

    public function user_list() {
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
        if ($this->input->is_ajax_request()) {
            $request = $this->input->post(NULL, TRUE);
            $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode($request));
        }
    }

    public function role_list() {
        $output = array(
            'code' => 200,
            'status' => 'SUCCESS',
            'message' => 'List of roles',
            'data' => $this->User_model->role_list()
        );
        $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($output));
    }

    public function role_add() {
        $title = $this->input->post('title');
        if (isset($title) && !is_null($title)) {
            $request = $this->User_model->role_add($title);
            if ($request == 200) {
                $output = array(
                    'code' => $request,
                    'status' => 'SUCCESS',
                    'message' => 'Add role successfully',
                    'data' => array('title' => $title)
                );
            } else {
                $output = array(
                    'code' => $request,
                    'status' => 'FAILED',
                    'message' => 'Server Error',
                    'data' => array('title' => $title)
                );
            }
        } else {
            $request = 400;
            $output = array(
                'code' => $request,
                'status' => 'FAILED',
                'message' => 'Missing parameters'
            );
        }
        $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($output));
    }

}
