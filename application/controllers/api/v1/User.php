<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
    }

    public function index()
    {
        $response = $this->User_model->user_table_full_structure();
        print_r($response);die;
    }

    public function role_list()
    {
        $response = $this->User_model->role_list();
        if ($response != 400)
        {
            $output = array(
                    'code' => 200,
                    'status' => 'SUCCESS',
                    'message' => 'List of roles',
                    'data' => $this->User_model->role_list()
            );
        }
        else
        {
            $output = array(
                    'code' => 400,
                    'status' => 'FAILED',
                    'message' => 'Failed to get role list'
            );
        }
        $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($output, JSON_NUMERIC_CHECK));
    }

    public function role_add()
    {
        $title = $this->input->post('title');
        if (isset($title) && !is_null($title))
        {
            $request = $this->User_model->role_add($title);
            if ($request == 200)
            {
                $output = array(
                        'code' => $request,
                        'status' => 'SUCCESS',
                        'message' => 'Add role successfully',
                        'data' => array('title' => $title)
                );
            }
            else
            {
                $output = array(
                        'code' => $request,
                        'status' => 'FAILED',
                        'message' => 'Server Error',
                        'data' => array('title' => $title)
                );
            }
        }
        else
        {
            $request = 400;
            $output = array(
                    'code' => $request,
                    'status' => 'FAILED',
                    'message' => 'Missing parameters'
            );
        }
        $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($output, JSON_NUMERIC_CHECK));
    }

    public function role_detail()
    {
        $id = $this->input->post('id');
        if (isset($id) && !is_null($id) && is_numeric($id) && intval($id) > 0)
        {
            $request = $this->User_model->role_check($id);
            if ($request == 200)
            {
                $request1 = $this->User_model->role_detail($id);
                if ($request1 != 400)
                {
                    $output = array(
                            'code' => $request,
                            'status' => 'SUCCESS',
                            'message' => 'Role detail',
                            'data' => $this->User_model->role_detail($id)
                    );
                }
                else
                {
                    $output = array(
                            'code' => $request,
                            'status' => 'FAILED',
                            'message' => 'Failed to get role detail',
                            'data' => array('id' => $id)
                    );
                }
            }
            else
            {
                $output = array(
                        'code' => $request,
                        'status' => 'FAILED',
                        'message' => 'Role ID did not exist'
                );
            }
        }
        else
        {
            $output = array(
                    'code' => 400,
                    'status' => 'FAILED',
                    'message' => 'Role ID is not in right format'
            );
        }
        $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($output, JSON_NUMERIC_CHECK));
    }

    public function role_delete()
    {
        $id = $this->input->post('id');
        if (isset($id) && !is_null($id) && is_numeric($id) && intval($id) > 0)
        {
            $request = $this->User_model->role_check($id);
            if ($request == 200)
            {
                $request1 = $this->User_model->role_delete($id);
                if ($request1 == 200)
                {
                    $output = array(
                            'code' => $request1,
                            'status' => 'SUCCESS',
                            'message' => 'Delete role successfully',
                            'data' => array('id' => $id)
                    );
                }
                else
                {
                    $output = array(
                            'code' => $request1,
                            'status' => 'FAILED',
                            'message' => 'Failed to delete role',
                            'data' => array('id' => $id)
                    );
                }
            }
            else
            {
                $output = array(
                        'code' => $request,
                        'status' => 'FAILED',
                        'message' => 'Role ID did not exist'
                );
            }
        }
        else
        {
            $output = array(
                    'code' => 400,
                    'status' => 'FAILED',
                    'message' => 'Role ID is not in right format'
            );
        }
        $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($output, JSON_NUMERIC_CHECK));
    }

    public function role_edit()
    {
        $id = $this->input->post('id');
        $title = $this->input->post('title');
        if (isset($id) && isset($title) && is_numeric($id) && intval($id) > 0)
        {
            $request = $this->User_model->role_check($id);
            if ($request == 200)
            {
                $request1 = $this->User_model->role_edit($id, $title);
                if ($request1 == 200)
                {
                    $output = array(
                            'code' => $request,
                            'status' => 'SUCCESS',
                            'message' => 'Update role successfully',
                            'data' => array(
                                    'id' => $id,
                                    'title' => $title
                            )
                    );
                }
                else
                {
                    $output = array(
                            'code' => $request,
                            'status' => 'FAILED',
                            'message' => 'Failed to update role',
                            'data' => array('title' => $title)
                    );
                }
            }
            else
            {
                $output = array(
                        'code' => $request,
                        'status' => 'FAILED',
                        'message' => 'Role ID did not exist'
                );
            }
        }
        else
        {
            $request = 400;
            $output = array(
                    'code' => $request,
                    'status' => 'FAILED',
                    'message' => 'Missing parameters'
            );
        }
        $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($output, JSON_NUMERIC_CHECK));
    }
    
    //USER
    
    public function user_list()
    {
        $response = $this->User_model->user_list();
        if ($response != 400)
        {
            $output = array(
                    'code' => 200,
                    'status' => 'SUCCESS',
                    'message' => 'List of users',
                    'data' => $this->User_model->user_list()
            );
        }
        else
        {
            $output = array(
                    'code' => 400,
                    'status' => 'FAILED',
                    'message' => 'Failed to get user list'
            );
        }
        $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($output, JSON_NUMERIC_CHECK));
    }    
    
    public function user_add()
    {
        $input = array();
        if (isset($title) && !is_null($title))
        {
            $request = $this->User_model->user_add($title);
            if ($request == 200)
            {
                $output = array(
                        'code' => $request,
                        'status' => 'SUCCESS',
                        'message' => 'Add user successfully',
                        'data' => array('title' => $title)
                );
            }
            else
            {
                $output = array(
                        'code' => $request,
                        'status' => 'FAILED',
                        'message' => 'Server Error',
                        'data' => array('title' => $title)
                );
            }
        }
        else
        {
            $request = 400;
            $output = array(
                    'code' => $request,
                    'status' => 'FAILED',
                    'message' => 'Missing parameters'
            );
        }
        $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($output, JSON_NUMERIC_CHECK));
    }

    public function user_detail()
    {
        $id = $this->input->post('id');
        if (isset($id) && !is_null($id) && is_numeric($id) && intval($id) > 0)
        {
            $request = $this->User_model->user_check($id);
            if ($request == 200)
            {
                $request1 = $this->User_model->user_detail($id);
                if ($request1 != 400)
                {
                    $output = array(
                            'code' => $request,
                            'status' => 'SUCCESS',
                            'message' => 'User detail',
                            'data' => $this->User_model->user_detail($id)
                    );
                }
                else
                {
                    $output = array(
                            'code' => $request,
                            'status' => 'FAILED',
                            'message' => 'Failed to get user detail',
                            'data' => array('id' => $id)
                    );
                }
            }
            else
            {
                $output = array(
                        'code' => $request,
                        'status' => 'FAILED',
                        'message' => 'User ID did not exist'
                );
            }
        }
        else
        {
            $output = array(
                    'code' => 400,
                    'status' => 'FAILED',
                    'message' => 'User ID is not in right format'
            );
        }
        $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($output, JSON_NUMERIC_CHECK));
    }

    public function user_delete()
    {
        $id = $this->input->post('id');
        if (isset($id) && !is_null($id) && is_numeric($id) && intval($id) > 0)
        {
            $request = $this->User_model->user_check($id);
            if ($request == 200)
            {
                $request1 = $this->User_model->user_delete($id);
                if ($request1 == 200)
                {
                    $output = array(
                            'code' => $request1,
                            'status' => 'SUCCESS',
                            'message' => 'Delete user successfully',
                            'data' => array('id' => $id)
                    );
                }
                else
                {
                    $output = array(
                            'code' => $request1,
                            'status' => 'FAILED',
                            'message' => 'Failed to delete user',
                            'data' => array('id' => $id)
                    );
                }
            }
            else
            {
                $output = array(
                        'code' => $request,
                        'status' => 'FAILED',
                        'message' => 'User ID did not exist'
                );
            }
        }
        else
        {
            $output = array(
                    'code' => 400,
                    'status' => 'FAILED',
                    'message' => 'User ID is not in right format'
            );
        }
        $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($output, JSON_NUMERIC_CHECK));
    }

    public function user_edit()
    {
        $id = $this->input->post('id');
        $title = $this->input->post('title');
        if (isset($id) && isset($title) && is_numeric($id) && intval($id) > 0)
        {
            $request = $this->User_model->user_check($id);
            if ($request == 200)
            {
                $request1 = $this->User_model->user_edit($id, $title);
                if ($request1 == 200)
                {
                    $output = array(
                            'code' => $request,
                            'status' => 'SUCCESS',
                            'message' => 'Update user successfully',
                            'data' => array(
                                    'id' => $id,
                                    'title' => $title
                            )
                    );
                }
                else
                {
                    $output = array(
                            'code' => $request,
                            'status' => 'FAILED',
                            'message' => 'Failed to update user',
                            'data' => array('title' => $title)
                    );
                }
            }
            else
            {
                $output = array(
                        'code' => $request,
                        'status' => 'FAILED',
                        'message' => 'User ID did not exist'
                );
            }
        }
        else
        {
            $request = 400;
            $output = array(
                    'code' => $request,
                    'status' => 'FAILED',
                    'message' => 'Missing parameters'
            );
        }
        $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($output, JSON_NUMERIC_CHECK));
    }

    //CATEGORIES
    public function category_list()
    {
        $response = $this->User_model->category_list();
        if ($response != 400)
        {
            $output = array(
                    'code' => 200,
                    'status' => 'SUCCESS',
                    'message' => 'List of categories',
                    'data' => $this->User_model->category_list()
            );
        }
        else
        {
            $output = array(
                    'code' => 400,
                    'status' => 'FAILED',
                    'message' => 'Failed to get category list'
            );
        }
        $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($output, JSON_NUMERIC_CHECK));
    }

    public function category_add()
    {
        $input = array();
        if (isset($title) && !is_null($title))
        {
            $request = $this->User_model->category_add($title);
            if ($request == 200)
            {
                $output = array(
                        'code' => $request,
                        'status' => 'SUCCESS',
                        'message' => 'Add category successfully',
                        'data' => array('title' => $title)
                );
            }
            else
            {
                $output = array(
                        'code' => $request,
                        'status' => 'FAILED',
                        'message' => 'Server Error',
                        'data' => array('title' => $title)
                );
            }
        }
        else
        {
            $request = 400;
            $output = array(
                    'code' => $request,
                    'status' => 'FAILED',
                    'message' => 'Missing parameters'
            );
        }
        $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($output, JSON_NUMERIC_CHECK));
    }

    public function category_detail()
    {
        $id = $this->input->post('id');
        if (isset($id) && !is_null($id) && is_numeric($id) && intval($id) > 0)
        {
            $request = $this->User_model->category_check($id);
            if ($request == 200)
            {
                $request1 = $this->User_model->category_detail($id);
                if ($request1 != 400)
                {
                    $output = array(
                            'code' => $request,
                            'status' => 'SUCCESS',
                            'message' => 'Category detail',
                            'data' => $this->User_model->category_detail($id)
                    );
                }
                else
                {
                    $output = array(
                            'code' => $request,
                            'status' => 'FAILED',
                            'message' => 'Failed to get category detail',
                            'data' => array('id' => $id)
                    );
                }
            }
            else
            {
                $output = array(
                        'code' => $request,
                        'status' => 'FAILED',
                        'message' => 'Category ID did not exist'
                );
            }
        }
        else
        {
            $output = array(
                    'code' => 400,
                    'status' => 'FAILED',
                    'message' => 'Role ID is not in right format'
            );
        }
        $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($output, JSON_NUMERIC_CHECK));
    }

    public function category_delete()
    {
        $id = $this->input->post('id');
        if (isset($id) && !is_null($id) && is_numeric($id) && intval($id) > 0)
        {
            $request = $this->User_model->category_check($id);
            if ($request == 200)
            {
                $request1 = $this->User_model->category_delete($id);
                if ($request1 == 200)
                {
                    $output = array(
                            'code' => $request1,
                            'status' => 'SUCCESS',
                            'message' => 'Delete category successfully',
                            'data' => array('id' => $id)
                    );
                }
                else
                {
                    $output = array(
                            'code' => $request1,
                            'status' => 'FAILED',
                            'message' => 'Failed to delete category',
                            'data' => array('id' => $id)
                    );
                }
            }
            else
            {
                $output = array(
                        'code' => $request,
                        'status' => 'FAILED',
                        'message' => 'Category ID did not exist'
                );
            }
        }
        else
        {
            $output = array(
                    'code' => 400,
                    'status' => 'FAILED',
                    'message' => 'Category ID is not in right format'
            );
        }
        $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($output, JSON_NUMERIC_CHECK));
    }

    public function category_edit()
    {
        $id = $this->input->post('id');
        $title = $this->input->post('title');
        if (isset($id) && isset($title) && is_numeric($id) && intval($id) > 0)
        {
            $request = $this->User_model->category_check($id);
            if ($request == 200)
            {
                $request1 = $this->User_model->category_edit($id, $title);
                if ($request1 == 200)
                {
                    $output = array(
                            'code' => $request,
                            'status' => 'SUCCESS',
                            'message' => 'Update category successfully',
                            'data' => array(
                                    'id' => $id,
                                    'title' => $title
                            )
                    );
                }
                else
                {
                    $output = array(
                            'code' => $request,
                            'status' => 'FAILED',
                            'message' => 'Failed to update category',
                            'data' => array('title' => $title)
                    );
                }
            }
            else
            {
                $output = array(
                        'code' => $request,
                        'status' => 'FAILED',
                        'message' => 'Category ID did not exist'
                );
            }
        }
        else
        {
            $request = 400;
            $output = array(
                    'code' => $request,
                    'status' => 'FAILED',
                    'message' => 'Missing parameters'
            );
        }
        $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($output, JSON_NUMERIC_CHECK));
    }
    
    //PRODUCTS
    public function product_list()
    {
        $response = $this->User_model->product_list();
        if ($response != 400)
        {
            $output = array(
                    'code' => 200,
                    'status' => 'SUCCESS',
                    'message' => 'List of products',
                    'data' => $this->User_model->product_list()
            );
        }
        else
        {
            $output = array(
                    'code' => 400,
                    'status' => 'FAILED',
                    'message' => 'Failed to get product list'
            );
        }
        $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($output, JSON_NUMERIC_CHECK));
    }

    public function product_add()
    {
        $input = array();
        if (isset($title) && !is_null($title))
        {
            $request = $this->User_model->product_add($title);
            if ($request == 200)
            {
                $output = array(
                        'code' => $request,
                        'status' => 'SUCCESS',
                        'message' => 'Add product successfully',
                        'data' => array('title' => $title)
                );
            }
            else
            {
                $output = array(
                        'code' => $request,
                        'status' => 'FAILED',
                        'message' => 'Server Error',
                        'data' => array('title' => $title)
                );
            }
        }
        else
        {
            $request = 400;
            $output = array(
                    'code' => $request,
                    'status' => 'FAILED',
                    'message' => 'Missing parameters'
            );
        }
        $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($output, JSON_NUMERIC_CHECK));
    }

    public function product_detail()
    {
        $id = $this->input->post('id');
        if (isset($id) && !is_null($id) && is_numeric($id) && intval($id) > 0)
        {
            $request = $this->User_model->product_check($id);
            if ($request == 200)
            {
                $request1 = $this->User_model->product_detail($id);
                if ($request1 != 400)
                {
                    $output = array(
                            'code' => $request,
                            'status' => 'SUCCESS',
                            'message' => 'Product detail',
                            'data' => $this->User_model->product_detail($id)
                    );
                }
                else
                {
                    $output = array(
                            'code' => $request,
                            'status' => 'FAILED',
                            'message' => 'Failed to get product detail',
                            'data' => array('id' => $id)
                    );
                }
            }
            else
            {
                $output = array(
                        'code' => $request,
                        'status' => 'FAILED',
                        'message' => 'Product ID did not exist'
                );
            }
        }
        else
        {
            $output = array(
                    'code' => 400,
                    'status' => 'FAILED',
                    'message' => 'Product ID is not in right format'
            );
        }
        $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($output, JSON_NUMERIC_CHECK));
    }

    public function product_delete()
    {
        $id = $this->input->post('id');
        if (isset($id) && !is_null($id) && is_numeric($id) && intval($id) > 0)
        {
            $request = $this->User_model->product_check($id);
            if ($request == 200)
            {
                $request1 = $this->User_model->product_delete($id);
                if ($request1 == 200)
                {
                    $output = array(
                            'code' => $request1,
                            'status' => 'SUCCESS',
                            'message' => 'Delete product successfully',
                            'data' => array('id' => $id)
                    );
                }
                else
                {
                    $output = array(
                            'code' => $request1,
                            'status' => 'FAILED',
                            'message' => 'Failed to delete product',
                            'data' => array('id' => $id)
                    );
                }
            }
            else
            {
                $output = array(
                        'code' => $request,
                        'status' => 'FAILED',
                        'message' => 'Product ID did not exist'
                );
            }
        }
        else
        {
            $output = array(
                    'code' => 400,
                    'status' => 'FAILED',
                    'message' => 'Product ID is not in right format'
            );
        }
        $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($output, JSON_NUMERIC_CHECK));
    }

    public function product_edit()
    {
        $id = $this->input->post('id');
        $title = $this->input->post('title');
        if (isset($id) && isset($title) && is_numeric($id) && intval($id) > 0)
        {
            $request = $this->User_model->product_check($id);
            if ($request == 200)
            {
                $request1 = $this->User_model->product_edit($id, $title);
                if ($request1 == 200)
                {
                    $output = array(
                            'code' => $request,
                            'status' => 'SUCCESS',
                            'message' => 'Update product successfully',
                            'data' => array(
                                    'id' => $id,
                                    'title' => $title
                            )
                    );
                }
                else
                {
                    $output = array(
                            'code' => $request,
                            'status' => 'FAILED',
                            'message' => 'Failed to update product',
                            'data' => array('title' => $title)
                    );
                }
            }
            else
            {
                $output = array(
                        'code' => $request,
                        'status' => 'FAILED',
                        'message' => 'Product ID did not exist'
                );
            }
        }
        else
        {
            $request = 400;
            $output = array(
                    'code' => $request,
                    'status' => 'FAILED',
                    'message' => 'Missing parameters'
            );
        }
        $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($output, JSON_NUMERIC_CHECK));
    }
}
