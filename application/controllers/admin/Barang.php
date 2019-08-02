<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('admin/model_barang');
    // $this->load->library('form_validation');
  }

  public function index()
  {
    $data['dataAset'] = $this->model_barang->list_aset();
    $this->load->view('admin/barang', $data);
  }

  public function input()
  {
    $this->model_barang->add_aset();
    $this->session->set_flashdata('success', 'Berhasil menambah data aset');
    header('Location: ' . base_url('barang'));
    exit;
  }

  public function getByID()
  {
    echo json_encode($this->model_barang->getAsetByID($_POST['id']));
  }

  public function hapus()
  {
    $this->model_barang->del_aset();
    $this->session->set_flashdata('success', 'Berhasil memghapus data aset');
    header('Location: ' . base_url('barang'));
    exit;
  }

  public function jenisAset()
  {
    echo json_encode($this->model_barang->getJenis());
  }

  public function lab()
  {
    echo json_encode($this->model_barang->getLab());
  }

  public function edit()
  {
    $this->model_barang->up_aset();
    $this->session->set_flashdata('success', 'Berhasil mengubah data aset');
    header('Location: ' . base_url('barang'));
    exit;
  }

  public function detail($id)
  {
    $data['dataAset'] = $this->model_barang->getAsetByID($id);
    $this->load->view('admin/detail_barang', $data);
  }

  public function tahun()
  {
    echo json_encode($this->model_barang->getTahun());
  }
}
