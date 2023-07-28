<?php
class Employees_model extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    // Simpan data JSON ke dalam tabel employees
    public function save_employees_from_json($json_data) {
        foreach ($json_data as $employee) {
            $data = array(
                'nama' => $employee->nama,
                'jabatan' => $employee->jabatan,
                'jenis_kelamin' => $employee->jenis_kelamin,
                'alamat' => $employee->alamat
            );
            $this->db->insert('employees', $data);
        }
    }

    // Ambil semua data employees dari database
    public function get_all_employees() {
        return $this->db->get('employees')->result();
    }

    // Dapatkan data employee berdasarkan ID
    public function get_employee_by_id($id) {
        return $this->db->get_where('employees', array('id' => $id))->row();
    }

    // Update data employee berdasarkan ID
    public function update_employee($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('employees', $data);
    }

    // Hapus data employee berdasarkan ID
    public function delete_employee($id) {
        $this->db->where('id', $id);
        return $this->db->delete('employees');
    }

    // Cari data employee berdasarkan nama atau jabatan
    public function search_employee($keyword) {
        $this->db->like('nama', $keyword);
        $this->db->or_like('jabatan', $keyword);
        return $this->db->get('employees')->result();
    }
}
?>