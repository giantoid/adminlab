<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('admin/model_user');
        // $this->load->library('form_validation');
    }

    public function index()
    {
        $data['dataUser'] = $this->model_user->list_user();
        $this->load->view('admin/user', $data);
    }

    public function input()
    {
        $this->model_user->add_user();
        $this->session->set_flashdata('success', 'Berhasil menambah data user');
        header('Location: ' . base_url('user'));
        exit;
    }

    public function getByID()
    {
        echo json_encode($this->model_user->getUserByID($_POST['id']));
    }

    public function hapus()
    {
        $this->model_user->del_user();
        $this->session->set_flashdata('success', 'Berhasil memghapus data user');
        header('Location: ' . base_url('user'));
        exit;
    }

    public function edit()
    {
        $this->model_user->up_user();
        $this->session->set_flashdata('success', 'Berhasil mengubah data user');
        header('Location: ' . base_url('user'));
        exit;
    }

    public function detail($id)
    {
        $data['dataUser'] = $this->model_user->getUserByID($id);
        $this->load->view('admin/detail_user', $data);
    }

    function ubahpassword()
    {
        $this->load->view('admin/ubah_password');
    }

    function upPassword()
    {
        if ($_POST['passbaru'] == $_POST['konfpass']) {
            $cekpass = $this->model_user->cekPass();
            if ($cekpass == False) {
                $this->session->set_flashdata('error', 'Password lama salah!');
                header('Location: ' . base_url('admin/user/ubahpassword'));
                exit;
            } else {
                $this->model_user->upPass();
                $this->session->set_flashdata('success', 'Berhasil merubah password!');
                $this->load->view('admin/user/ubahpassword');
                exit;
            }
        } else {
            $this->session->set_flashdata('error', 'Password baru tidak sama!');
            $this->load->view('admin/user/ubahpassword');
            exit;
        }
    }
}
