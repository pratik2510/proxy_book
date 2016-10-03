<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

function get_user_data() {
    $ci = & get_instance();
    $ci->load->model('Users_model');
    $ci->load->model('Resume_model');
    $ci->load->model('Company_model');
    $ci->load->model('Position_model');
    if ($ci->session->userdata('user_id') != '' && $ci->session->userdata('is_admin') == 0) {
        $user_id = $ci->session->userdata('user_id');
        profile_complete();
        $data['user_data'] = $ci->Users_model->get_user_data($user_id);
        $data['total_resume'] = $ci->Resume_model->get_total_resume($user_id);
    } else {
        $data['total_resume'] = 0;
        $data['user_data'] = array();
    }
    return $data;
}

function get_admin_data() {
    $ci = & get_instance();
    $ci->load->model('Admin_model');
    /*$ci->load->model('Users_model');
    $ci->load->model('Resume_model');
    $ci->load->model('Company_model');
    $ci->load->model('Position_model');*/
    if ($ci->session->userdata('user_id') != '' && $ci->session->userdata('is_admin') == 1) {
        $user_id = $ci->session->userdata('user_id');
        $data['user_data'] = $ci->Admin_model->get_user_data($user_id);
        return $data;
    } else {
        redirect('admin/login');
    }
}

?>