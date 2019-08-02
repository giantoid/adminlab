<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_laporan extends CI_Model
{

    public $_tablet = 'filtercek';
    var $column_ordert = array('id_aset', 'mk', 'tgl_periksa', 'status', 'kondisi', 'username', 'nama_lab', 'ket');
    var $column_searcht = array('id_aset', 'mk', 'tgl_periksa', 'status', 'kondisi', 'username', 'nama_lab', 'ket');
    var $ordert = array('id_cek' => 'asc');

    public $_table = 'lapaset';
    var $column_order = array('id_aset', 'nama_aset', 'nama_jenis', 'nama_kelompok', 'tgl_beli', 'nama_lab');
    var $column_search = array('id_aset', 'nama_aset', 'nama_jenis', 'nama_kelompok', 'tgl_beli', 'nama_lab');
    var $order = array('id_aset' => 'asc');

    private function _get_datatables_query()
    {

        $this->db->from($this->_table);

        $i = 0;

        foreach ($this->column_search as $item) {
            if ($_POST['search']['value']) {

                if ($i === 0) {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->column_search) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }

        if (isset($_POST['order'])) {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function count_filtered()
    {
        $this->_get_datatables_query();
        $this->_get_custom_field();
        $query = $this->db->get();
        return $query->num_rows();
    }

    function get_datatables()
    {
        $this->_get_datatables_query();
        $this->_get_custom_field();

        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
    function _get_custom_field()
    {
        if (isset($_POST['columns'][4]['search']['value']) and $_POST['columns'][4]['search']['value'] != '') {
            $this->db->where('filter', $_POST['columns'][4]['search']['value']);
        }
    }
    public function count_all()
    {
        return $this->db->count_all_results($this->_table);
    }

    private function _get_datatables_queryt()
    {

        $this->db->from($this->_tablet);

        $i = 0;

        foreach ($this->column_searcht as $item) {
            if ($_POST['search']['value']) {

                if ($i === 0) {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->column_searcht) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }

        if (isset($_POST['order'])) {
            $this->db->order_by($this->column_ordert[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->ordert)) {
            $ordert = $this->ordert;
            $this->db->order_by(key($ordert), $ordert[key($ordert)]);
        }
    }

    function count_filteredt()
    {
        $this->_get_datatables_queryt();
        $this->_get_custom_fieldt();
        $query = $this->db->get();
        return $query->num_rows();
    }

    function get_datatablest()
    {
        $this->_get_datatables_queryt();
        $this->_get_custom_fieldt();

        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
    function _get_custom_fieldt()
    {
        if (isset($_POST['columns'][6]['search']['value']) and $_POST['columns'][6]['search']['value'] != '') {
            $this->db->where('nama_lab', $_POST['columns'][6]['search']['value']);
        }

        if (isset($_POST['columns'][2]['search']['value']) and $_POST['columns'][2]['search']['value'] != '') {
            $this->db->where('filter BETWEEN "' . date('Y-m-d', strtotime($_POST['columns'][1]['search']['value'])) . '"AND"' . date('Y-m-d', strtotime($_POST['columns'][2]['search']['value'])) . '"');
        }
    }
    public function count_allt()
    {
        return $this->db->count_all_results($this->_tablet);
    }
}
