<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function role_list() {
        $query = $this->db->get('roles');
        if ($query) {
            return $query->result_array();
        } else {
            return 400;
        }
    }

    public function role_check($id) {
        $query = $this->db->where('id', $id)->get('roles');
        if (count($query->result_array()) > 0) {
            return 200;
        } else {
            return 400;
        }
    }

    public function role_detail($id) {
        $query = $this->db->where('id', $id)->get('roles');
        if (count($query->result_array()) > 0) {
            return $query->result_array();
        } else {
            return 400;
        }
    }

    public function role_add($title) {
        $input = array(
            'title' => $title
        );
        $query = $this->db->insert('roles', $input);
        if ($query) {
            return 200;
        } else {
            return 400;
        }
    }

    public function role_edit($id, $title) {
        $input = array(
            'title' => $title
        );
        $query = $this->db->update('roles', $input, array('id' => $id));
        if ($query) {
            return 200;
        } else {
            return 400;
        }
    }

    public function role_delete($id) {
        $query = $this->db->delete('roles', array('id' => $id));
        if ($query) {
            return 200;
        } else {
            return 400;
        }
    }

    public function role_table_structure() {
        $fields = $this->db->field_data('roles');
        return $fields;
    }
    
    public function user_table_structure() {
        $fields = $this->db->field_data('users');
        return $fields;
    }

}
