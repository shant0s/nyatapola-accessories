<?php

class Admin_model extends CI_Model{
    
    
    //////////////////////////for admin store products/////////////////////////
    public function store_products($products){
        
//        $this->load->database();
        return $this->db->insert('products', $products);   
    }
    ///////////////////////////////////////////////////////////////////////////
    
    ///////////////////////for admin view products///////////////////////////
    public function view_products($limit, $offset){
        $user_id = $this->session->userdata('user_id');
        $q = $this->db->order_by('created_at', 'DESC')
                        ->limit( $limit, $offset)
                        ->where('user_id', $user_id)
                        ->get('products');
        
        return $q->result_array();
    }
    
    public function num_rows(){
        $user_id = $this->session->userdata('user_id');
        $q = $this->db->get_where('products', ['user_id'=>$user_id]);
        
        return $q->num_rows();
    }
   
    ////////////////////////////////////////////////////////////////////////////////////
    
    //////////////////////////////for users view product details//////////////////////////
    public function view_product_details($id){
        $q = $this->db->get_where('products', ['id'=>$id]);
        
        return $q->row();
    }
    //////////////////////////////////////////////////////////////////////////////////////
    
    ///////////////////////for admin edit/update products///////////////////////////////////////
    public function view_edit_products($p_id){
        $q = $this->db->get_where('products', ['id'=>$p_id]);
        
        return $q->row();
    }
    
    public function update_product($id, $post){
        return $this->db->where('id', $id)
                        ->update('products', $post);
    }
    
    ///////////////////////////////for admin delete products/////////////////////////////
    public function delete_products($id){
        return $this->db->where('id', $id)
                        ->delete('products');
    }
    
    
    //////////////////////////for users index pagination////////////////////////////////
    public function view_all_products($limit, $offset){
        $q = $this->db->order_by('created_at', 'DESC')
                        ->limit( $limit, $offset)
                        ->get('products');
        
        return $q->result_array();
    }
    
    public function all_num_rows(){
        $q = $this->db->get('products');
        
        return $q->num_rows();
    }
    
     //////////////for users search/////////////////////////////////////////////
    public function users_search($search){
        $q = $this->db->order_by('created_at', 'DESC')
                        ->like('pname', $search)
                        ->get('products');
        
        return $result = $q->result_array();
    }
    
    ///////////////////////for user page search////////////////////////
    public function users_page_search($search){
        $q = $this->db->order_by('created_at', 'DESC')
                        ->like('pname', $search)
                        ->get('products');
        
        return $result = $q->result_array();
    }
    
    
    
}