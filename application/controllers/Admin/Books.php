<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Books extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->data = get_admin_data();
        $this->popular_limit = 5;
    }

    public function manage(){
        $table_name = 'books';
        $title = 'Book';
        $this->data['title'] = $this->data['page_header'] = $this->data['record_type'] = $title;
        $this->data['authors'] = $this->Admin_model->get_records('authors');
        $this->data['publications'] = $this->Admin_model->get_records('publications');
        $this->data['subjects'] = $this->get_detailed_subjects();
//        $this->data['records'] = $this->Admin_model->get_all_books();
        $this->data['records'] = array();
//        pr($this->data,1);
        $this->form_validation->set_rules('book_name', '', 'trim|required', array('required' => 'Please enter book name.'));
        $this->form_validation->set_rules('author_id', '', 'trim|required', array('required' => 'Please select author.'));
        $this->form_validation->set_rules('publication_id', '', 'trim|required', array('required' => 'Please select publication.'));
        $this->form_validation->set_rules('mrp', '', 'trim|required', array('required' => 'Please enter M.R.P.'));
        $this->form_validation->set_rules('sell_price', '', 'trim|required', array('required' => 'Please enter sell price.'));
        
        if ($this->form_validation->run() == TRUE) {
            pr($_POST,1);
            $book_name = $this->input->post('book_name');
            $author_id = $this->input->post('author_id');
            $publication_id = $this->input->post('publication_id');
            $mrp = $this->input->post('mrp');
            $sell_price = $this->input->post('sell_price');
            $subjects = $this->input->post('subjects');
            $record_id = $this->input->post('record_id');
            $record_array = array(
                'book_name' => $book_name,
                'is_yearly' => $is_yearly,
                'duration' => $duration,
                'course_id' => $course_id,
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
            redirect('admin/books');
        }
        $this->template->load('admin', 'Admin/Books/manage_books', $this->data);
    }

    public function get_books_options(){
        $course_id = $this->input->post('course_id');
        $options['books'] = $this->Admin_model->get_all_books_by_course($course_id);
        if( count($options['books']) > 0 ){
            $html = $this->load->view('Admin/Books/get_book_options', $options, true);
            $return_array = array(
                'status' => 1,
                'books' => $html
            );

        } else {
            $return_array = array(
                'status' => 0
            );
        }
        echo json_encode($return_array);
    }
    
    public function get_detailed_subjects() {
        $locale = 'en_US';
        $nf = new NumberFormatter($locale, NumberFormatter::ORDINAL);
        $subjects = $this->Admin_model->get_assign_subjects();
        foreach ($subjects as $subject) {
            $is_yearly = ($subject['is_yearly']) ? 'Year' : 'Sem';
            $display_name = $subject['subject_name'] . ' ' . $subject['course_name'] . '( ' . $subject['stream_name'] . ' ) ' . $nf->format($subject['applicable']) . ' ' . $is_yearly;
            $disp[$subject['id']] = $display_name;
        }
        return $disp;
    }
}