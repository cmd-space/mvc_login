<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Model {
 public function login($email)
    {
    	return $this->db->query("SELECT * FROM users 
    						 	 WHERE email = ?", array($email))->row_array();

    }

    public function add_user($user)
    {
    	$query = "INSERT INTO users (first_name, last_name, email, password, created_at, updated_at) VALUES (?,?,?,?,NOW(),NOW())";
    	$values = array($user['first_name'], $user['last_name'], $user['email'], $user['password']);
    	return $this->db->query($query, $values);
    }
    
    public function find($id)
    {
    	return $this->db->query("SELECT * FROM users WHERE id = ?", $id)->row_array();
    }
}
