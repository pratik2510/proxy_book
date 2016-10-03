<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

function pr($arr, $exit = 0) {
    echo "<pre>";
    print_r($arr);
    echo "</pre>";
    if ($exit == 1) {
        exit;
    }
}

function upload_image($image_name, $image_path) {
    $CI = & get_instance();
//    $extension = substr(strrchr($_FILES[$image_name]['name'], '.'), 1);
    $extension = explode('/', $_FILES[$image_name]['type']);
    $randname = uniqid() . '.' . $extension[1];
    $config = array('upload_path' => $image_path,
        'allowed_types' => "png|jpg|jpeg|gif",
        // 'max_size' => "5120KB",
        // 'max_height'      => "768",
        // 'max_width'       => "1024" ,
        'file_name' => $randname
    );
    #Load the upload library
    $CI->load->library('upload');
    $CI->upload->initialize($config);
    if ($CI->upload->do_upload($image_name)) {
        $img_data = $CI->upload->data();
        $imgname = $img_data['file_name'];
    }
    else {
        $imgname = '';
    }
    return $imgname;
}

function send_email_helper($to = '', $template = '', $data = []) {

    if (empty($to) || empty($template) || empty($data)) {
        return false;
    }

    $ci = &get_instance();

    $ci->load->library('email');

    $config['protocol'] = 'smtp';
    $config['smtp_host'] = 'ssl://smtp.gmail.com';
    $config['smtp_port'] = '465';
    $config['smtp_user'] = 'demo.narola@gmail.com';
    $config['smtp_pass'] = 'Ke6g7sE70Orq3Rqaqa';
    $config['charset'] = 'utf-8';
    $config['newline'] = "\r\n";
    $config['mailtype'] = 'html';
    $config['validation'] = TRUE;

    $ci->email->initialize($config);

    $ci->email->to($to);
    $ci->email->from('support@iape.com');
    $ci->email->subject($data['subject']);
    $ci->email->message($ci->load->view('Email_template/' . $template, $data, TRUE));
    if($ci->email->send()){
        return true;
    } else {
        return false;
    }
}
