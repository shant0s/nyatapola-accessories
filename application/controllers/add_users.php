<?php

class Add_users extends MY_Controller {

    public function __construct() {
        parent::__construct();

        //load the helpers
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->helper('html');

        //load library
        $this->load->library('session');
        $this->load->library('form_validation');

        //load the model
        $this->load->model('users_model', 'um');
    }

    public function index() {
        return redirect('add_users/insert_users');
    }

    public function insert_users() {

        $this->load->view('admin/add_users');
    }

    public function store_users() {

        $this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

        if ($this->form_validation->run('add_users_rules')) {
            $post = $this->input->post();
            unset($post['submit'], $post['password'], $post['c_password']);

            $password = sha1($this->input->post('password'));
            $c_password = sha1($this->input->post('c_password'));
            
            $post['password'] = $password;
            
            if ($password == $c_password) {

                $this->__flashAndRedirect(
                        $this->um->store_users($post), 'Users has been added!!', 'Users Could not be added!!');
            } else {
                $this->session->set_flashdata('message', 'Password do not match!!');
                $this->session->set_flashdata('message_class', 'text-danger');
                
                return redirect('add_users/store_users');
            }
        } else {
            $this->load->view('admin/add_users');
        }
    }

    private function __flashAndRedirect($successfull, $successMessage, $failureMessage) {
        if ($successfull) {
            $this->session->set_flashdata('message', $successMessage);
            $this->session->set_flashdata('message_class', 'text-success');
        } else {
            $this->session->set_flashdata('message', $failureMessage);
            $this->session->set_flashdata('message_class', 'text-danger');
        }
        return redirect('admin/dashboard');
    }

}
