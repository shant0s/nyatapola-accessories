<?php

class Admin extends MY_Controller {

    public function __construct() {
        parent::__construct();

        //load the helper
        $this->load->helper('url');
        $this->load->helper('html');
        $this->load->helper('form');

        //load the library
        $this->load->library('form_validation');
        $this->load->library('pagination');
        $this->load->library('session');
        
        //load the model
        $this->load->model('admin_model', 'am');

        if (!$this->session->userdata('user_id')) {
            return redirect('user_login');
        }
    }

    public function index() {

        return redirect('admin/dashboard');
    }

    public function dashboard() {

        $config = [
            'base_url' => base_url('admin/dashboard'),
            'per_page' => 10,
            'total_rows' => $this->am->num_rows(),
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

        $data['products'] = $this->am->view_products($config['per_page'], $this->uri->segment(3));

        $this->load->view('admin/dashboard', $data);
    }

    public function add_products() {
        $this->load->view('admin/add_products');
    }

    public function store_products() {

        $config = [
            'upload_path' => './uploads/',
            'allowed_types' => 'jpg|jpeg|png'
        ];

        $this->load->library('upload', $config);

        //set error delimiters
        $this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

        if ($this->form_validation->run('add_product_rules') && $this->upload->do_upload('image')) {
            $filename = $this->upload->data();

            $imagepath = base_url() . 'uploads/' . $filename['file_name'];

            $post = $this->input->post();
            unset($post['submit']);
            $post['image_path'] = $imagepath;

            $this->__flashAndRedirect(
                    $this->am->store_products($post), 'Products added successfully!!', 'Products could not be added!!');
        } else {

            $data['error_upload'] = $this->upload->display_errors();
            $this->load->view('admin/add_products', $data);
        }
    }

    public function edit_products($id) {

        $data['product'] = $this->am->view_edit_products($id);
       
        $this->load->view('admin/edit_products', $data);
    }

    public function update_products() {

        $config = [
            'upload_path' => './uploads/',
            'allowed_types' => 'jpg|jpeg|png',
            'overwrite' => TRUE
        ];

        $this->load->library('upload', $config);

        //form validation
        $this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');

        if ($this->form_validation->run('add_product_rules') && $this->upload->do_upload('image')) {

            $filename = $this->upload->data();

            $image_path = base_url() . 'uploads/' . $filename['file_name'];

            $post = $this->input->post();
            unset($post['submit'], $post['hidden_id']);
            
            $post['image_path'] = $image_path;

            $p_ID = $this->input->post('hidden_id');

            $this->__flashAndRedirect(
                    $this->am->update_product($p_ID, $post), 'Product Updated Successfully!!', 'Product Could not be Updated!!');
        } else {

            $data['error_upload'] = $this->upload->display_errors();

            $p_id = $this->input->post('hidden_id');
            $data['product'] = $this->am->view_edit_products($p_id);
            $this->load->view('admin/edit_products', $data);
        }
    }

    public function delete_products($id) {

        $this->__flashAndRedirect(
                $this->am->delete_products($id), 'Product Deleted Successfully!!', 'Product Could not be Deleted!!');
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
