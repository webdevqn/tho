<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Category_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    function _list()
    {
        $query = $this->db->get('categories');
        return $query->result_array();
    }

    function _insert($data)
    {
        $result = $this->db->insert('categories', $data);
        if (!$result)
            return NULL;
        return $this->db->insert_id();
    }

    function _update($id, $data)
    {
        return $this->db->where('id', $id)->update('categories', $data);
    }

    function _delete($id)
    {
        $data = array(
            'status' => 'deleted'
        );
        return $this->db->where('id', $id)->update('categories', $data);
    }

    function _id($id)
    {
        $result = $this->db->where('id', $id)->get('categories');
        if (!$result)
            return NULL;
        return $result->result_array();
    }

    function get_account_role_by_account_id($id)
    {
        $query = "SELECT account.id AS account_id, role.id AS role_id, account.email AS email, account.password AS password, role.name AS role_name, account.status AS status FROM account, role WHERE account.id = $id AND account.role_id = role.id";
        $result = $this->db->query($query);
        if (!$result)
            return NULL;
        return $result->result_array();
    }

    function get_all_account_role()
    {
        //$query = "SELECT account.id AS account_id, role.id AS role_id, account.email AS email, account.password AS password, role.name AS role_name, account.status AS status FROM account, role WHERE account.role_id = role.id";
        //$result = $this->db->query($query);
        $this->db->select('account.id AS account_id,'
                . ' role.id AS role_id,'
                . ' account.email AS email,'
                . ' account.password AS password,'
                . ' role.name AS role_name,'
                . ' account.status AS status');
        $this->db->from('account account');
        $this->db->join('role role', 'account.role_id = role.id');
        $this->db->where('role.status', 'active');
        $result = $this->db->get();
        if (!$result)
            return NULL;
        return $result->result_array();
    }

    function get_all_account_profile()
    {
        $this->db->select('a.*, p.name as profile_name');
        $this->db->from('account a');
        $this->db->join('profile p', 'p.account_id = a.id');
        $this->db->where('p.status', 'active');
        $result = $this->db->get();
        if (!$result)
            return NULL;
        return $result->result_array();
    }

}
