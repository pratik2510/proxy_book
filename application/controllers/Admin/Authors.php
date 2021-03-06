<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Authors extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->data = get_admin_data();
        $this->popular_limit = 5;
    }

    public function manage(){
        $table_name = 'authors';
        $title = 'Author';
        $this->data['title'] = $this->data['page_header'] = $this->data['record_type'] = $title;
        $this->data['records'] = $this->Admin_model->get_records($table_name);
        $this->form_validation->set_rules('name_field', 'Author Name', 'trim|required', array('required' => 'Please enter author name.'));
        
        if ($this->form_validation->run() == TRUE) {
            
            $author_name = $this->input->post('name_field');
            $record_id = $this->input->post('record_id');
            $record_array = array(
                'author_name' => $author_name,
                'created_by' => $this->session->userdata('user_id')
            );
            if ($record_id != '') {
                $record_exist_condition = array(
                    'id' => $record_id
                );
                if ($this->Admin_model->record_exist($table_name, $record_exist_condition)) {
                    if ($this->Admin_model->manage_record($table_name, $record_array, $record_id)) {
                        $this->session->set_flashdata('success_msg', 'Detail saved successfully.');
                    } else {
                        $this->session->set_flashdata('error_msg', 'Issue to save detail. Please try again..!!');
                        // redirect('admin/manage/' . $type);
                    }
                } else {
                    $this->session->set_flashdata('error_msg', 'No such record found. Please try again..!!');
                    // redirect('admin/manage/' . $type);
                }
            } else {
                if ($this->Admin_model->manage_record($table_name, $record_array)) {
                    $this->session->set_flashdata('success_msg', 'Detail saved successfully.');
                    // redirect('admin/manage/' . $type);
                } else {
                    $this->session->set_flashdata('error_msg', 'Issue to save detail. Please try again..!!');
                    // redirect('admin/manage/' . $type);
                }
            }
            redirect('admin/authors');
        }
        $this->template->load('admin', 'Admin/Authors/manage_authors', $this->data);
    }
}