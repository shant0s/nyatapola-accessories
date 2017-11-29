<?php

class User_login extends MY_Controller{
    
    public function __construct() {
        parent::__construct();
        
        //load the helpers
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->helper('html');
        
        //load the library
        $this->load->library('form_validation');
        $this->load->library('session');
        
        //load the model
        $this->load->model('users_model', 'um');
        
    }
    
    public function index(){
        if($this->session->userdata('user_id')){
            return redirect('admin');
        }
        //load the login view
        $this->load->view('public/user_login');
    }
    
    public function login_user(){
        
        //set rules
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        
        if($this->form_validation->run()){
            
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            
            $login_id = $this->um->user_login($username, $password);
            
            if($login_id){
                $this->session->set_userdata('user_id', $login_id);
                $this->session->set_userdata('username', $username);
                return redirect('admin/index');
            }else{
                $this->session->set_flashdata('message', 'Credential Mismatched!!');
                
                return redirect('user_login/login_user');
                
            }
        }else{
            $this->load->view('public/user_login');
        }
        
    }
    
    public function logout(){
        $this->session->sess_destroy();
        return redirect('users');
    }
}