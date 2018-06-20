<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_mahasiswa extends CI_Model {

    public function GetMahasiswa($table) {
        // kode ini berfungsi untuk memilih tabel yang akan ditampilkan
        $data = $this->db->get($table);
        // kode ini digunakan untuk mengembalikan hasil operasi $res menjadi sebuah array
        return $data->result_array();
    }

    public function getAll($config) {
        $hasilquery = $this->db->get('mahasiswa', $config['per_page'], $this->uri->segment(3));
        if ($hasilquery->num_rows() > 0) {
            foreach ($hasilquery->result() as $value) {
                $data[] = $value;
            }
            return $data;
        }
    }

    public function Insert($table, $data) {
        $res = $this->db->insert($table, $data);

        return $res;
    }

    public function GetWhere($table, $data) {
        $res = $this->db->get_where($table, $data);
        return $res->result_array();
    }

    public function Update($table, $data, $where) {
        $res = $this->db->update($table, $data, $where);

        return $res;
    }

    public function Delete($table, $where) {
        // untuk menghapus record yang sudah ada
        $result = $this->db->delete($table, $where);

        return $result;
    }

}
?>