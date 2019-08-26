<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
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
		$this->load->view('admin/dashboard', $data);
	}
}
