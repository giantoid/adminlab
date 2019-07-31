<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_login');
    }
    public function index()
    {
        if ($this->session->userdata('authenticated'))
            redirect('dashboard');
        $this->load->view('login');
    }
    public function login()
    {
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));
        $user = $this->Model_login->get($username);
        if (empty($user)) {
            $this->session->set_flashdata('message', 'Username tidak ditemukan');
            redirect('auth');
        } else {
            if ($password == $user->password) {
                $session = array(
                    'authenticated' => true,
                    'username' => $user->username,
                    'nama' => $user->fullname,
                    'id_user' => $user->id_user
                );
                $this->session->set_userdata($session);
                redirect('dashboard');
            } else {
                $this->session->set_flashdata('message', 'Password salah');
                redirect('auth');
            }
        }
    }
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth');
    }
}
