<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Libs_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }
    
    public function get_domain_list()
    {
        $query = $this->db->get('domains');
        if ($query)
        {
            return $query->result_array();
        }
    }
}