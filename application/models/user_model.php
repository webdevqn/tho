<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function role_list() {
        $query = $this->db->get('roles');
        return $query->result_array();
    }

    public function role_detail() {
        
    }

    public function role_add($title) {
        $input = array(
            'title' => $title
        );
        $query = $this->db->insert('roles', $input);
        if ($query) {
            return 200;
        } else {
            return 401;
        }
    }
    
    public function role_delete() {
        
    }

}
