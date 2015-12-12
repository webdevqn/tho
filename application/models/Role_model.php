<?php

class Role_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    function get_all_role()
    {
        $query = $this->db->get('roles');
        return $query->result_array();
    }

    function insert_role($data)
    {
        $result = $this->db->insert('roles', $data);
        if (!$result)
            return NULL;
        return $this->db->insert_id();
    }

    function update_role($id, $data)
    {
        return $this->db->where('id', $id)->update('roles', $data);
    }

    function delete_role($id)
    {
        $data = array(
            'status' => 'deleted'
        );

        return $this->db->where('id', $id)->update('roles', $data);
    }

    function get_role_by_id($id)
    {
        $result = $this->db->where('id', $id)->get('roles');
        if (!$result)
            return NULL;
        return $result->result_array();
    }

}
