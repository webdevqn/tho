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
        if ($this->input->is_ajax_request()) {
            $request = $this->input->post(NULL, TRUE);
            $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode($request));
        }
    }

    public function role_list() {
        $response = $this->User_model->role_list();
        if ($response != 400) {
            $output = array(
                'code' => 200,
                'status' => 'SUCCESS',
                'message' => 'List of roles',
                'data' => $this->User_model->role_list()
            );
        } else {
            $output = array(
                'code' => 400,
                'status' => 'FAILED',
                'message' => 'Failed to get role list'
            );
        }
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

    public function role_detail() {
        $id = $this->input->post('id');
        if (isset($id) && !is_null($id) && is_numeric($id) && intval($id) > 0) {
            $request = $this->User_model->role_check($id);
            if ($request == 200) {
                $request1 = $this->User_model->role_detail($id);
                if ($request1 != 400) {
                    $output = array(
                        'code' => $request,
                        'status' => 'SUCCESS',
                        'message' => 'Role detail',
                        'data' => $this->User_model->role_detail($id)
                    );
                } else {
                    $output = array(
                        'code' => $request,
                        'status' => 'FAILED',
                        'message' => 'Failed to get role detail',
                        'data' => array('id' => $id)
                    );
                }
            } else {
                $output = array(
                    'code' => $request,
                    'status' => 'FAILED',
                    'message' => 'Role ID did not exist'
                );
            }
        } else {
            $output = array(
                'code' => 400,
                'status' => 'FAILED',
                'message' => 'Role ID is not in right format'
            );
        }
        $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($output));
    }

    public function role_delete() {
        $id = $this->input->post('id');
        if (isset($id) && !is_null($id) && is_numeric($id) && intval($id) > 0) {
            $request = $this->User_model->role_check($id);
            if ($request == 200) {
                $request1 = $this->User_model->role_delete($id);
                if ($request1 == 200) {
                    $output = array(
                        'code' => $request1,
                        'status' => 'SUCCESS',
                        'message' => 'Delete role successfully',
                        'data' => array('id' => $id)
                    );
                } else {
                    $output = array(
                        'code' => $request1,
                        'status' => 'FAILED',
                        'message' => 'Failed to delete role',
                        'data' => array('id' => $id)
                    );
                }
            } else {
                $output = array(
                    'code' => $request,
                    'status' => 'FAILED',
                    'message' => 'Role ID did not exist'
                );
            }
        } else {
            $output = array(
                'code' => 400,
                'status' => 'FAILED',
                'message' => 'Role ID is not in right format'
            );
        }
        $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($output));
    }

    public function role_edit() {
        $id = $this->input->post('id');
        $title = $this->input->post('title');
        if (isset($id) && isset($title) && is_numeric($id) && intval($id) > 0) {
            $request = $this->User_model->role_check($id);
            if ($request == 200) {
                $request1 = $this->User_model->role_edit($id, $title);
                if ($request1 == 200) {
                    $output = array(
                        'code' => $request,
                        'status' => 'SUCCESS',
                        'message' => 'Update role successfully',
                        'data' => array(
                            'id' => $id,
                            'title' => $title
                        )
                    );
                } else {
                    $output = array(
                        'code' => $request,
                        'status' => 'FAILED',
                        'message' => 'Failed to update role',
                        'data' => array('title' => $title)
                    );
                }
            } else {
                $output = array(
                    'code' => $request,
                    'status' => 'FAILED',
                    'message' => 'Role ID did not exist'
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

    public function user_list() {
        $response = $this->User_model->user_list();
        if ($response != 400) {
            $output = array(
                'code' => 200,
                'status' => 'SUCCESS',
                'message' => 'List of users',
                'data' => $this->User_model->user_list()
            );
        } else {
            $output = array(
                'code' => 400,
                'status' => 'FAILED',
                'message' => 'Failed to get user list'
            );
        }
        $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($output));
    }

    public function user_add() {
        $input = array();
        if (isset($title) && !is_null($title)) {
            $request = $this->User_model->user_add($title);
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

    public function role_detail() {
        $id = $this->input->post('id');
        if (isset($id) && !is_null($id) && is_numeric($id) && intval($id) > 0) {
            $request = $this->User_model->role_check($id);
            if ($request == 200) {
                $request1 = $this->User_model->role_detail($id);
                if ($request1 != 400) {
                    $output = array(
                        'code' => $request,
                        'status' => 'SUCCESS',
                        'message' => 'Role detail',
                        'data' => $this->User_model->role_detail($id)
                    );
                } else {
                    $output = array(
                        'code' => $request,
                        'status' => 'FAILED',
                        'message' => 'Failed to get role detail',
                        'data' => array('id' => $id)
                    );
                }
            } else {
                $output = array(
                    'code' => $request,
                    'status' => 'FAILED',
                    'message' => 'Role ID did not exist'
                );
            }
        } else {
            $output = array(
                'code' => 400,
                'status' => 'FAILED',
                'message' => 'Role ID is not in right format'
            );
        }
        $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($output));
    }

    public function role_delete() {
        $id = $this->input->post('id');
        if (isset($id) && !is_null($id) && is_numeric($id) && intval($id) > 0) {
            $request = $this->User_model->role_check($id);
            if ($request == 200) {
                $request1 = $this->User_model->role_delete($id);
                if ($request1 == 200) {
                    $output = array(
                        'code' => $request1,
                        'status' => 'SUCCESS',
                        'message' => 'Delete role successfully',
                        'data' => array('id' => $id)
                    );
                } else {
                    $output = array(
                        'code' => $request1,
                        'status' => 'FAILED',
                        'message' => 'Failed to delete role',
                        'data' => array('id' => $id)
                    );
                }
            } else {
                $output = array(
                    'code' => $request,
                    'status' => 'FAILED',
                    'message' => 'Role ID did not exist'
                );
            }
        } else {
            $output = array(
                'code' => 400,
                'status' => 'FAILED',
                'message' => 'Role ID is not in right format'
            );
        }
        $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($output));
    }

    public function role_edit() {
        $id = $this->input->post('id');
        $title = $this->input->post('title');
        if (isset($id) && isset($title) && is_numeric($id) && intval($id) > 0) {
            $request = $this->User_model->role_check($id);
            if ($request == 200) {
                $request1 = $this->User_model->role_edit($id, $title);
                if ($request1 == 200) {
                    $output = array(
                        'code' => $request,
                        'status' => 'SUCCESS',
                        'message' => 'Update role successfully',
                        'data' => array(
                            'id' => $id,
                            'title' => $title
                        )
                    );
                } else {
                    $output = array(
                        'code' => $request,
                        'status' => 'FAILED',
                        'message' => 'Failed to update role',
                        'data' => array('title' => $title)
                    );
                }
            } else {
                $output = array(
                    'code' => $request,
                    'status' => 'FAILED',
                    'message' => 'Role ID did not exist'
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
