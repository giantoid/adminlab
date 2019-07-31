<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_barang extends CI_Model
{

  public function list_aset()
  {
    $this->db->select('aset.*, aset_jenis.nama_jenis');
    $this->db->from('aset');
    $this->db->join('aset_jenis', 'aset.id_jenis = aset_jenis.id_jenis');
    $this->db->order_by('id_aset', 'DESC');
    $aset = $this->db->get();
    return $aset->result();
  }

  public function getJenis()
  {
    return $this->db->get('aset_jenis')->result();
  }

  public function getLab()
  {
    return $this->db->get('tb_lab')->result();
  }

  public function add_aset()
  {
    $post = $this->input->post();
    $this->id_aset = $post['id_aset'];
    $this->nama_aset = $post['nama_aset'];
    $this->merk = $post['merk'];
    $this->tipe = $post['tipe'];
    $this->id_jenis = $post['jenis_aset'];
    $this->tgl_beli = date('Y-m-d', strtotime($post['tgl_beli']));
    $this->harga_beli = angka($post['harga_beli']);
    $this->nilai_residu = angka($post['nilai_residu']);
    $this->id_lab = $post['lab'];
    $this->db->insert('aset', $this);
  }

  public function getAsetByID($id)
  {
    $this->db->select('aset.*, aset_jenis.nama_jenis, aset_kelompok.masa_manfaat, tb_lab.nama_lab');
    $this->db->from('aset');
    $this->db->join('aset_jenis', 'aset.id_jenis = aset_jenis.id_jenis');
    $this->db->join('aset_kelompok', 'aset_jenis.id_kelompok = aset_kelompok.id_kelompok');
    $this->db->join('tb_lab', 'aset.id_lab = tb_lab.id_lab');
    $this->db->where('aset.id_aset', dkrip($id));
    return $this->db->get()->result();
  }

  public function del_aset()
  {
    $id = $this->input->post('id');
    return $this->db->delete('aset', array('id_aset' => $id));
  }

  public function up_aset()
  {
    $post = $this->input->post();
    $id_aset = $post['id_aset'];
    $this->nama_aset = $post['nama_aset'];
    $this->merk = $post['merk'];
    $this->tipe = $post['tipe'];
    $this->id_jenis = $post['jenis_aset'];
    $this->tgl_beli = date('Y-m-d', strtotime($post['tgl_beli']));
    $this->harga_beli = angka($post['harga_beli']);
    $this->nilai_residu = angka($post['nilai_residu']);
    $this->id_lab = $post['lab'];
    $this->db->update('aset', $this, array('id_aset' => $id_aset));
  }
}
