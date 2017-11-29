<?php

class Users_model extends CI_Model{
    
    public function user_login($username, $password){
        $q = $this->db->get_where('users', ['username'=>$username, 'password'=> sha1($password)]);
        
        if($q->num_rows()>0){
            return $q->row()->user_id;
        }else{
            return FALSE;
        }
    }
    
    
   /////////////////////////for add_users store users///////////////////////
    public function store_users($post){
        return $this->db->insert('users', $post);
    }
}