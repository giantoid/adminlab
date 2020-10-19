<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_user extends CI_Model
{

    public function list_user()
    {
        return $this->db->get('users')->result();
    }

    public function add_user()
    {
        $post = $this->input->post();
        $this->fullname = $post['fullname'];
        $this->username = $post['username'];
        $this->password = md5($post['password']);
        $this->level = $post['level'];
        $this->db->insert('users', $this);
    }

    public function getUserByID($id)
    {
        return $this->db->get_where('users', 'id_user = ' . dkrip($id))->result();
    }

    public function del_user()
    {
        $id = $this->input->post('id');
        return $this->db->delete('users', array('id_user' => $id));
    }

    public function up_user()
    {
        $post = $this->input->post();
        $id_user = $post['id_user'];
        $this->fullname = $post['fullname'];
        $this->username = $post['username'];
        $this->password = md5($post['password']);
        $this->level = $post['level'];
        $this->db->update('users', $this, array('id_user' => $id_user));
    }

    public function upPass()
    {
        $pass = md5($this->input->post('passbaru'));
        $data = array(
            'password' => $pass
        );
        $this->db->where('id_user', $this->session->userdata('id_user'));
        $this->db->update('users', $data);
    }

    public function cekPass()
    {
        $old = md5($this->input->post('passlama'));
        $this->db->where('password', $old);
        $query = $this->db->get('users');
        return $query->result();;
    }
}
