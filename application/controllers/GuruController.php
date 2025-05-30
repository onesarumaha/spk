<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GuruController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Guru_model');
    }

    public function index() {
        $data['guru'] = $this->Guru_model->get_all();
        $this->load->view('guru/index', $data);
    }

    public function tambah() {
        $this->load->view('guru/tambah');
    }

    public function simpan() {
        $data = [
            'nama' => $this->input->post('nama'),
            'nip'  => $this->input->post('nip')
        ];
        $this->Guru_model->insert($data);
        redirect('data-guru');
    }

    public function edit($id) {
        $data['guru'] = $this->Guru_model->get_by_id($id);
        $this->load->view('guru/edit', $data);
    }

    public function update() {
        $id = $this->input->post('id');
        $data = [
            'nama' => $this->input->post('nama'),
            'nip'  => $this->input->post('nip')
        ];
        $this->Guru_model->update($id, $data);
        redirect('data-guru');
    }

    public function hapus($id) {
        $this->Guru_model->delete($id);
        redirect('data-guru');
    }
}
