<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Product_model');
        $this->load->helper('my_input');
    }

    public function index()
    {
        echo 23423;
    }

    //CATEGORIES
    public function category_list()
    {
        $response = $this->Product_model->category_list();
        if ($response != 400)
        {
            $output = array(
                'code' => 200,
                'status' => 'SUCCESS',
                'message' => 'List of categories',
                'data' => $this->Product_model->category_list()
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

        $input = array(
            'name' => $this->security->xss_clean(trim($this->input->post('name'))),
            'slug' => create_slug($this->security->xss_clean(trim($this->input->post('name')))),
            'status' => 1,
            'token' => create_token(),
            'created_by' => 1,
            'updated_by' => 1,
            'created_at' => time(),
            'updated_at' => time()
        );
        if (check_input_element_valid($input))
        {
            $request = $this->Product_model->category_add($input);
            if ($request == 200)
            {
                $output = array(
                    'code' => $request,
                    'status' => 'SUCCESS',
                    'message' => 'Add category successfully',
                    'data' => array($input)
                );
            }
            else
            {
                $output = array(
                    'code' => $request,
                    'status' => 'FAILED',
                    'message' => 'Server Error',
                    'data' => array()
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
        $id = $this->security->xss_clean(trim($this->input->post('id')));
        if (isset($id) && !is_null($id) && is_numeric($id) && intval($id) > 0)
        {
            $request = $this->Product_model->category_check($id);
            if ($request == 200)
            {
                $request1 = $this->Product_model->category_detail($id);
                if ($request1 != 400)
                {
                    $output = array(
                        'code' => $request,
                        'status' => 'SUCCESS',
                        'message' => 'Category detail',
                        'data' => $this->Product_model->category_detail($id)
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
            $request = $this->Product_model->category_check($id);
            if ($request == 200)
            {
                $request1 = $this->Product_model->category_delete($id);
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
        $id = $this->security->xss_clean(trim($this->input->post('id')));
        $input = array(
            'name' => $this->security->xss_clean(trim($this->input->post('name'))),
            'slug' => create_slug($this->security->xss_clean(trim($this->input->post('name')))),
            'status' => 1,
            'updated_at' => time()
        );
        if (isset($id) && check_input_element_valid($input) && is_numeric($id) && intval($id) > 0)
        {
            $request = $this->Product_model->category_check($id);
            if ($request == 200)
            {
                $request1 = $this->Product_model->category_edit($id, $input);
                if ($request1 == 200)
                {
                    $output = array(
                        'code' => $request,
                        'status' => 'SUCCESS',
                        'message' => 'Update category successfully',
                        'data' => array(
                            'id' => $id
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
        $response = $this->Product_model->product_list();
        if ($response != 400)
        {
            $output = array(
                'code' => 200,
                'status' => 'SUCCESS',
                'message' => 'List of products',
                'data' => $this->Product_model->product_list()
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
            $request = $this->Product_model->product_add($title);
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
            $request = $this->Product_model->product_check($id);
            if ($request == 200)
            {
                $request1 = $this->Product_model->product_detail($id);
                if ($request1 != 400)
                {
                    $output = array(
                        'code' => $request,
                        'status' => 'SUCCESS',
                        'message' => 'Product detail',
                        'data' => $this->Product_model->product_detail($id)
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
            $request = $this->Product_model->product_check($id);
            if ($request == 200)
            {
                $request1 = $this->Product_model->product_delete($id);
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
            $request = $this->Product_model->product_check($id);
            if ($request == 200)
            {
                $request1 = $this->Product_model->product_edit($id, $title);
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
