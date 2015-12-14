<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Role extends MY_Controller
{

    public function index()
    {
        $content = $this->Role_model->get_all_role();

        $data['header'] = "Quản lí chức vụ | Danh sách";
        $data['title'] = "Thodaico | ".$data['header'];
        $data['content'] = $content;
        $this->setPage('admin/role/index', $data);
    }

    public function detail()
    {
        $id = $this->security->xss_clean(trim($this->uri->segment(5)));
        if (!is_null($id) && is_numeric($id) && $id > 0)
        {
            $content = $this->Role_model->get_role_by_id($this->uri->segment(5));

            if ($content)
            {
                $data['header'] = "Quản lí chức vụ | Thông tin chi tiết";
                $data['content'] = $content;
                $data['title'] = "Thodaico | ".$data['header'];
                $this->setPage('admin/role/detail', $data);
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
                'field' => 'title',
                'label' => 'tên chức vụ',
                'rules' => 'required'
            ]
        ];

        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run() === FALSE)
        {
            $page = 'admin/role/add';
        }
        else
        {
            $time = time();
            $inputs = [
                'title' => $this->input->post('title'),
                'status' => 'active',
                'created_at' => $time,
                'updated_at' => $time,
                'created_by' => 1,
                'updated_by' => 1
            ];
            $createdId = $this->Role_model->insert_role($inputs);
            if (!$createdId)
            {
                $page = 'admin/role/add';
                $this->session->set_flashdata('error', "Can't add new role!");
            }
            else
            {
                redirect('admin/manage/role/detail/' . $createdId);
            }
        }
        $data['header'] = "Quản lí chức vụ | Thêm";
        $data['title'] = "Thodaico | ".$data['header'];
        $this->setPage($page, $data);
    }

    public function edit()
    {
        $id = $this->security->xss_clean(trim($this->uri->segment(5)));
        if (!is_null($id) && is_numeric($id) && $id > 0)
        {
            $content = $this->Role_model->get_role_by_id($this->uri->segment(5));

            if ($content)
            {
                $rules = [
                    [
                        'field' => 'title',
                        'label' => 'Title',
                        'rules' => 'required'
                    ],
                    [
                        'field' => 'status',
                        'label' => 'Status',
                        'rules' => 'required'
                    ]
                ];

                $this->form_validation->set_rules($rules);
                if ($this->form_validation->run() === FALSE)
                {
                    $page = 'admin/role/add';
                }
                else
                {
                    $inputs = [
                        'title' => $this->input->post('title'),
                        'status' => $this->input->post('status'),
                        'updated_at' => time(),
                        'updated_by' => 1
                    ];
                    $updateStatus = $this->Role_model->update_role($id, $inputs);
                    if (!$updateStatus)
                    {
                        $page = 'admin/role/edit';
                        $this->session->set_flashdata('error', "Can't edit role!");
                    }
                    else
                    {
                        redirect('admin/manage/role/detail/' . $id);
                    }
                }

                $data['header'] = "Quản lí chức vụ | Chỉnh sửa";
                $data['content'] = $content;
                $data['title'] = "Thodaico | ".$data['header'];
                $this->setPage('admin/role/edit', $data);
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
        $id = $this->security->xss_clean(trim($this->uri->segment(5)));
        if (!is_null($id) && is_numeric($id) && $id > 0)
        {
            $content = $this->Role_model->delete_role($this->uri->segment(5));

            if ($content)
            {
                redirect('admin/manage/role');
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
