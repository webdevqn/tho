<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends MY_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Category_model');
        $data['header'] = "Category";
    }

    public function index()
    {
        $item = $this->Category_model->_list();        
        $data['content'] = $item;
        $this->setPage('admin/category/index', $data);
    }

    public function detail()
    {
        $id = $this->security->xss_clean(trim($this->uri->segment(3)));
        if (!is_null($id) && is_numeric($id) && $id > 0)
        {
            $content = $this->Category_model->_id($id);
            if ($content)
            {
                $data['content'] = $content;
                $this->setPage('admin/category/detail', $data);
            }
            else
            {
                show_404();
            }
        }
        else
        {
            show_404();
        }
    }

    public function add()
    {
        $rules = [
            [
                'field' => 'name',
                'label' => 'Name',
                'rules' => 'required'
            ]
        ];
        $this->form_validation->set_rules($rules);
        if ($this->form_validation->run() === FALSE)
        {
            $page = 'admin/category/add';
        }
        else
        {
            $time = date('Y-m-d H:i:s');
            $inputs = [
                'name' => $this->input->post('name'),
                'status' => 'active',
                'created_at' => $time,
                'updated_at' => $time,
                'created_by' => 1,
                'updated_by' => 1
            ];
            $createdId = $this->Category_model->_insert($inputs);
            if (!$createdId)
            {
                $page = 'admin/category/add';
                $this->session->set_flashdata('error', "Can't add category!");
            }
            else
            {
                redirect('admin/category/detail/' . $createdId);
            }
        }
        $this->setPage($page, $data);
    }

    public function edit()
    {
        $id = $this->security->xss_clean(trim($this->uri->segment(3)));
        if (!is_null($id) && is_numeric($id) && $id > 0)
        {
            $content = $this->Category_model->_id($id);
            if ($content)
            {
                $rules = [
                    [
                        'field' => 'name',
                        'label' => 'Name',
                        'rules' => 'required'
                    ]
                ];
                $this->form_validation->set_rules($rules);
                if ($this->form_validation->run() === FALSE)
                {
                    $page = 'admin/category/edit';
                }
                else
                {
                    $inputs = [
                        'name' => $this->input->post('name'),
                        'status' => $this->input->post('status'),
                        'updated_at' => date('Y-m-d H:i:s'),
                        'updated_by' => 1
                    ];
                    $updateStatus = $this->Group_model->update_group($id, $inputs);
                    if (!$updateStatus)
                    {
                        $page = 'admin/category/edit';
                        $this->session->set_flashdata('error', "Can't update category!");
                    }
                    else
                    {
                        redirect('admin/category/detail' . $id);
                    }
                }
                $data['content'] = $content;
                $this->setPage('admin/category/edit', $data);
            }
            else
            {
                show_404();
            }
        }
        else
        {
            show_404();
        }
    }

    public function delete()
    {
        $id = $this->security->xss_clean(trim($this->uri->segment(3)));
        if (!is_null($id) && is_numeric($id) && $id > 0)
        {
            $content = $this->Category_model->delete_group($id);
            if ($content)
            {
                redirect('admin/category/index');
            }
            else
            {
                show_404();
            }
        }
        else
        {
            show_404();
        }
    }

}
