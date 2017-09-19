<?php

Class Home extends CI_Model
{
    function verify_user($username, $password)
    {
        $this->db->select('id');
        $this->db->where('username', $username);
        $this->db->where('password', md5($password));
        $result = $this->db->get('users')->row_array();
        return $result;
    }

    public function insert_product($data)
    {
        $this->db->insert('products', $data);
    }

    public function getProducts()
    {
        return $this->db->get('products')->result_array();
    }

    public function validateProduct($serial)
    {
        $this->db->where('serial', $serial);
        return $this->db->get('products')->row_array();
    }

    public function getProductRecord($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('products')->row_array();
    }

    public function updateProdutRecord($data, $record_id)
    {
        $this->db->where('id', $record_id);
        $this->db->update('products', $data);
    }

    public function deleteProducts($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('products');
    }

    public function getPosition()
    {
        return $this->db->get('position')->result_array();
    }

    public function saveContact($data)
    {
        $this->db->insert('contacts', $data);
        return $this->db->insert_id();
    }

    public function insertUserAccess($data)
    {
        $this->db->insert('users', $data);
    }

    public function validateUser($username)
    {
        $this->db->where('username', $username);
        return $this->db->get('users')->row_array();
    }

    public function getAllUsers()
    {
        return $this->db->get('contacts')->result_array();
    }

    public function getContactRecord($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('contacts')->row_array();
    }
    public function deleteContactRecord($id){
        $this->db->where('id', $id);
        $this->db->delete('contacts');
    }
}