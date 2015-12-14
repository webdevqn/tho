<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function category_list()
    {
        $query = $this->db->get('categories');
        if ($query)
        {
            return $query->result_array();
        }
        else
        {
            return 400;
        }
    }

    public function category_check($id)
    {
        $query = $this->db->where('id', $id)->get('categories');
        if (count($query->result_array()) > 0)
        {
            return 200;
        }
        else
        {
            return 400;
        }
    }

    public function category_detail($id)
    {
        $query = $this->db->where('id', $id)->get('categories');
        if (count($query->result_array()) > 0)
        {
            return $query->result_array();
        }
        else
        {
            return '400';
        }
    }

    public function category_add($input)
    {
        $query = $this->db->insert('categories', $input);
        $insert_id = $this->db->insert_id();
        if ($insert_id !== null || $insert_id !== "")
        {
            return intval($insert_id);
        }
        else
        {
            return '400';
        }
    }

    public function category_edit($id, $input)
    {
        $query = $this->db->update('categories', $input, array('id' => $id));
        if ($query)
        {
            return 200;
        }
        else
        {
            return 400;
        }
    }

    public function category_delete($id)
    {
        $query = $this->db->delete('categories', array('id' => $id));
        if ($query)
        {
            return 200;
        }
        else
        {
            return 400;
        }
    }

    public function category_table_structure()
    {
        $fields = $this->db->field_data('categories');
        return $fields;
    }    

    public function product_list()
    {
        $query = $this->db->get('products');
        if ($query)
        {
            return $query->result_array();
        }
        else
        {
            return 400;
        }
    }

    public function product_check($id)
    {
        $query = $this->db->where('id', $id)->get('products');
        if (count($query->result_array()) > 0)
        {
            return 200;
        }
        else
        {
            return 400;
        }
    }

    public function product_detail($id)
    {
        $query = $this->db->where('id', $id)->get('products');
        if (count($query->result_array()) > 0)
        {
            return $query->result_array();
        }
        else
        {
            return '400';
        }
    }

    public function product_add($input)
    {

        $query = $this->db->insert('products', $input);
        $insert_id = $this->db->insert_id();
        if ($insert_id !== null || $insert_id !== "")
        {
            return intval($insert_id);
        }
        else
        {
            return '400';
        }
    }

    public function product_edit($input)
    {
        $query = $this->db->update('products', $input, $input['id']);
        if ($query)
        {
            return 200;
        }
        else
        {
            return 400;
        }
    }

    public function product_delete($id)
    {
        $query = $this->db->delete('products', $id);
        if ($query)
        {
            return 200;
        }
        else
        {
            return 400;
        }
    }
    
    public function product_table_structure()
    {
        $fields = $this->db->field_data('products');
        return $fields;
    }
    
    public function category_table_full_structure() {
        $fields = $this->db->query("desc categories");   
        return $fields->result();
    }
    public function product_table_full_structure() {
        $fields = $this->db->query("desc products");   
        return $fields->result();
    }

}
