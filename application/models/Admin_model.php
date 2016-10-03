<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Admin_Model
 *
 * @author sPratik
 */
class Admin_model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    
    public function get_user($email, $password){
        $this->db->where('email', $email);
        $users = $this->db->get('admin');
        $user_detail = $users->result_array();
        if(count($user_detail) == 1 ){
            $db_password = $this->encrypt->decode($user_detail[0]['password']);
            if($db_password == $password){
                return $user_detail;
            } else {
                return array();
            }
        }
        return array();
    }
    
    public function check_user_exist($email){
        $this->db->where('email', $email);
        $users = $this->db->get('users');
        return $users->result_array();
    }
    
    public function get_user_data($user_id){
        $this->db->where('admin.id', $user_id);
        $users = $this->db->get('admin');
        return $users->row_array();
    }
    
    public function get_total_users($user_type = 0){
        $this->db->where('account_type', $user_type);
        $users = $this->db->get('users');
        return count($users->result_array());
    }
    
    public function get_records( $table_name, $id = '' ) {
        if($id != ''){
            $this->db->where('id', $id);
        }
        $this->db->where('is_active', 1);
        $records = $this->db->get($table_name);
        return $records->result_array();
    }

    public function total_records( $table_name ) {
        $this->db->where('is_active', 1);
        $records = $this->db->get($table_name);
        return count($records->result_array());
    }

    public function delete_record( $table_name, $id ) {
        $this->db->where('id', $id);
        if( $this->db->delete($table_name) ){
            return 1;
        } else {
            return 0;
        }
    }
    
    public function record_exist( $table_name, $conditions ){
        if(is_array($conditions) && count($conditions) > 0){
            foreach ($conditions as $column_name => $value) {
                $this->db->where($column_name, $value);
            }
        }
        $records = $this->db->get($table_name);
        return count($records->result_array());
    }
    
    public function manage_record( $table_name, $record_array, $primary_id = '' ){
        if($primary_id != ''){
            $this->db->where('id', $primary_id);
            if ($this->db->update($table_name, $record_array)) {
                return 1;
            } else {
                return 0;
            }
        } else {
            if ($this->db->insert($table_name, $record_array)) {
                return 1;
            } else {
                return 0;
            }
        }
    }
    
    public function batch_update($table_name, $update_array, $primary_column) {
        if ($this->db->update_batch($table_name, $update_array, $primary_column)) {
            return 1;
        } else {
            return 0;
        }
    }
}