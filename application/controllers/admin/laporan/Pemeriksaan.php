<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pemeriksaan extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('admin/model_laporan');
        // $this->load->library('form_validation');
    }

    public function index()
    {
        $this->load->view('admin/laporan/pemeriksaan');
    }

    public function filterTable()
    {
        $list = $this->model_laporan->get_datatables();
        $data = array();
        foreach ($list as $cek) {
            $row = array();
            $row[] = $cek->id_aset;
            $row[] = $cek->mk;
            $row[] = date('d-m-Y', strtotime($cek->tgl_periksa));
            $row[] = $cek->status;
            $row[] = $cek->kondisi;
            $row[] = $cek->username;
            $row[] = $cek->ket;
            $row[] = $cek->nama_lab;

            //add html for action
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->model_laporan->count_all(),
            "recordsFiltered" => $this->model_laporan->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }
}
