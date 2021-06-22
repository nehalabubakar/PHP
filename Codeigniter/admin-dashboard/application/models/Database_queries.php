<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Database_queries extends CI_Model
{
    public function create_user($new_user_details)
    {
        if ($this->check_if_user_is_new($new_user_details['email'])) {
            $user_role_id = $this->get_user_role_id($new_user_details['user_role_id']);
            $new_user_details['user_role_id'] = $user_role_id;
            $this->db->insert('users', $new_user_details);
            return true;
        } else {
            $error = 'Account Already Exists Please Login To Continue';
            return $error;
        }
    }

    public function check_if_user_is_new($user_email)
    {
        $this->db->where('email', $user_email);
        $user_exists = $this->db->get('users');

        if ($user_exists->num_rows() > 0) {
            return false;
        } else {
            return true;
        }
    }

    public function get_user_role_id($user_role)
    {
        $this->db->select('id');
        $this->db->where('user_role', $user_role);
        return $this->db->get('user_role')->row()->id;
    }

    public function login($login_details)
    {
        $this->db->select('password');
        $this->db->where('email', $login_details['email']);
        if ($this->db->get('users')->num_rows() > 0) {
            $decrypted_password = $this->encryption->decrypt($this->db->get('users')->row()->password);
            if ($login_details['password'] == $decrypted_password) {
                return true;
            } else {
                return 'Password Incorrect';
            }
        } else {
            return "Email Doesnot Exists";
        }
    }
}
