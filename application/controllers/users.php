<?php

class Users extends MY_Controller {

    public function __construct() {
        parent::__construct();

        //load the helper
        $this->load->helper('url');
        $this->load->helper('html');
        $this->load->helper('form');
        $this->load->helper('text');

        //load the library
        $this->load->library('form_validation');
        $this->load->library('pagination');       
        $this->load->library('cart');       

        //load the model
        $this->load->model('admin_model', 'am');
        $this->load->model('users_model', 'um');
    }

    public function index() {

        $config = [
            'base_url' => base_url('users/index'),
            'per_page' => 12,
            'total_rows' => $this->am->all_num_rows(),
            'full_tag_open' => "<ul class='pagination'>",
            'full_tag_close' => '</ul>',
            'first_tag_open' => '<li>',
            'first_link' => 'First',
            'first_tag_close' => '</li>',
            'last_tag_open' => '<li>',
            'last_link' => 'Last',
            'last_tag_close' => '</li>',
            'next_tag_open' => '<li>',
            'next_tag_close' => '</li>',
            'prev_tag_open' => '<li>',
            'prev_tag_close' => '</li>',
            'num_tag_open' => '<li>',
            'num_tag_close' => '</li>',
            'cur_tag_open' => "<li class='active'><a>",
            'cur_tag_close' => '</a></li>'
        ];

        $this->pagination->initialize($config);

        $data['products'] = $this->am->view_all_products($config['per_page'], $this->uri->segment(3));

        $this->load->view('public/product_list', $data);
    }
    
    public function users_search(){
      
        $this->form_validation->set_rules('search', 'Search', 'required');
        
        if($this->form_validation->run()){
            
            $search = $this->input->post('search');
            
            return redirect("users/user_page_search/$search");
            
//            $data['products'] = $this->am->users_search($search);
//            
//            $this->load->view('public/users_search', $data);
            
        }else{
            return $this->index();
        }
        
    }
    
    public function user_page_search($search){
        
        $config = [
            'base_url' => base_url("users/user_page_search/$search"),
            'per_page' => 12,
            'total_rows' => $this->am->total_num_rows($search),
            'full_tag_open' => "<ul class='pagination'>",
            'full_tag_close' => '</ul>',
            'first_tag_open' => '<li>',
            'first_link' => 'First',
            'first_tag_close' => '</li>',
            'last_tag_open' => '<li>',
            'last_link' => 'Last',
            'last_tag_close' => '</li>',
            'next_tag_open' => '<li>',
            'next_tag_close' => '</li>',
            'prev_tag_open' => '<li>',
            'prev_tag_close' => '</li>',
            'num_tag_open' => '<li>',
            'num_tag_close' => '</li>',
            'cur_tag_open' => "<li class='active'><a>",
            'cur_tag_close' => '</a></li>'
        ];

        $this->pagination->initialize($config);
        
        $data['products'] = $this->am->user_page_search($config[]);
        
    }

    public function view_product_details($id) {
        
        $data['result'] = $this->am->view_product_details($id);      
        
        $this->load->view('public/view_product_details', $data);
    }
    
    
    

}
