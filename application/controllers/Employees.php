<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employees extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Employees_model');
    }

    public function index() {
        $data['employees'] = $this->Employees_model->get_all_employees();
        	$this->load->view('Template',$data);
		$this->load->view('employees_list', $data);
	
    }

    // Fungsi untuk menyimpan data JSON ke database
    public function save_from_json() {
        $json_url = $this->input->post('url'); // Ganti dengan URL data JSON yang sesuai
        $json_data = file_get_contents($json_url);
        $json_array = json_decode($json_data);
        $this->Employees_model->save_employees_from_json($json_array);
		$this->session->set_flashdata('sukses',"Data Berhasil Disimpan");
        redirect('employees');
    }

    

    // Fungsi untuk menyimpan data baru dari modal tambah data
    public function save_employee() {
        $data = array(
            'nama' => $this->input->post('nama'),
            'jabatan' => $this->input->post('jabatan'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'alamat' => $this->input->post('alamat')
        );
        $this->db->insert('employees', $data);
		$this->session->set_flashdata('sukses',"Data Berhasil Disimpan");
        redirect('employees');
    }

  

    // Fungsi untuk mengupdate data dari modal edit data
    public function update_employee($id) {
        $data = array(
            'nama' => $this->input->post('nama'),
            'jabatan' => $this->input->post('jabatan'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'alamat' => $this->input->post('alamat')
        );
        $this->Employees_model->update_employee($id, $data);
			$this->session->set_flashdata('sukses',"Data Berhasil Diedit");
        redirect('employees');
    }

    // Fungsi untuk menghapus data
    public function delete_employee($id) {
        $this->Employees_model->delete_employee($id);
		$this->session->set_flashdata('sukses',"Data Berhasil Dihapus");
        redirect('employees');
    }

    // Fungsi untuk melakukan pencarian data
    public function search() {
        $keyword = $this->input->post('keyword');
        if (!empty($keyword)) {
            $data['employees'] = $this->Employees_model->search_employee($keyword);
        } else {
            $data['employees'] = $this->Employees_model->get_all_employees();
        }
        $this->load->view('employees_list', $data);
    }
}
?>