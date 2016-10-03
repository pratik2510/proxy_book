<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Admin_model');
    }

    public function login() {
        if (isset($_COOKIE['admin_user_id']) && $_COOKIE['admin_user_id'] != '') {
            $encoded_user_id = $this->input->cookie('admin_user_id');
            $user_id = base64_decode($encoded_user_id);
            $session_array = array(
                'user_id' => $user_id,
                'is_admin' => 1
            );
            $this->session->set_userdata($session_array);
            redirect('admin');
        } else if ($this->session->userdata('user_id') != '' && $this->session->userdata('is_admin') == 1) {
            redirect('admin');
        } else {
            $data['title'] = 'Login';
            $data['error'] = '';
            $this->form_validation->set_rules('username', 'Email', 'trim|required');
            $this->form_validation->set_rules('password', 'Password', 'trim|required');
            if ($this->form_validation->run() == TRUE) {
                $email = $this->input->post('username');
                $password = $this->input->post('password');
                $user_detail = $this->Admin_model->get_user($email, $password);
                if (count($user_detail) == 1) {
                    $user = $user_detail[0];
                    $encoded_user_id = base64_encode($user['id']);
                    if ($this->input->post('remember_me') == 1) {
                        setcookie('admin_user_id', $encoded_user_id, time()+60*60*24*30);
                    }
                    $session_array = array(
                        'user_id' => $user['id'],
                        'is_admin' => 1
                    );
                    $this->session->set_userdata($session_array);
                    redirect('admin');
                } else {
                    $this->session->set_flashdata('error_msg', 'Invalid Login Crdentials. Please try again.');
                }
            }
            $this->template->load('admin_login', 'Admin/Users/login', $data);
        }
    }
    
    public function logout() {
        $this->session->sess_destroy();
        setcookie('admin_user_id', '', -1);
        redirect('admin');
    }
}