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
        $list = $this->model_laporan->get_datatablest();
        $data = array();
        foreach ($list as $cek) {
            $row = array();
            $row[] = $cek->id_aset;
            $row[] = $cek->mk;
            $row[] = date('d-m-Y H:m:s', strtotime($cek->tgl_periksa));
            $row[] = $cek->status;
            $row[] = $cek->kondisi;
            $row[] = $cek->username;
            $row[] = $cek->nama_lab;
            $row[] = $cek->ket;

            //add html for action
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->model_laporan->count_allt(),
            "recordsFiltered" => $this->model_laporan->count_filteredt(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }
}
