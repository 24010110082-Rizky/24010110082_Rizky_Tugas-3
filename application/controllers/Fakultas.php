<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fakultas extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('logged_in')) {
            redirect('auth');
        }

        $this->load->model('FakultasModel');
    }

    public function index()
    {
        $data['title']    = 'Fakultas';
        $data['fakultas'] = $this->FakultasModel->getAll();
        $this->load->view('templates/header', $data);
        $this->load->view('fakultas/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['title']  = 'Tambah Fakultas';
        $data['action'] = base_url('fakultas/tambah');
        $data['button'] = 'Simpan';
        $data['fakultas'] = null;

        $this->form_validation->set_rules('fakultas_name', 'Nama Fakultas', 'required|min_length[3]|max_length[100]');

        if ($this->form_validation->run() === TRUE) {
            $insert = [
                'fakultas_name' => $this->input->post('fakultas_name'),
            ];

            $this->FakultasModel->insert($insert);

            $this->session->set_flashdata('swal', [
                'icon'  => 'success',
                'title' => 'Berhasil!',
                'text'  => 'Data fakultas berhasil ditambahkan.',
            ]);

            redirect('fakultas');
        }

        $this->load->view('templates/header', $data);
        $this->load->view('fakultas/form', $data);
        $this->load->view('templates/footer');
    }

    public function ubah($id)
    {
        $fakultas = $this->FakultasModel->getById($id);

        if (!$fakultas) {
            $this->session->set_flashdata('swal', [
                'icon'  => 'warning',
                'title' => 'Tidak Ditemukan!',
                'text'  => 'Data fakultas tidak ditemukan.',
            ]);
            redirect('fakultas');
        }

        $data['title']    = 'Ubah Fakultas';
        $data['action']   = base_url('fakultas/ubah/' . $id);
        $data['button']   = 'Update';
        $data['fakultas'] = $fakultas;

        $this->form_validation->set_rules('fakultas_name', 'Nama Fakultas', 'required|min_length[3]|max_length[100]');

        if ($this->form_validation->run() === TRUE) {
            $update = [
                'fakultas_name' => $this->input->post('fakultas_name'),
            ];

            $this->FakultasModel->update($id, $update);

            $this->session->set_flashdata('swal', [
                'icon'  => 'success',
                'title' => 'Berhasil!',
                'text'  => 'Data fakultas berhasil diperbarui.',
            ]);

            redirect('fakultas');
        }

        $this->load->view('templates/header', $data);
        $this->load->view('fakultas/form', $data);
        $this->load->view('templates/footer');
    }

    public function hapus($id)
    {
        $fakultas = $this->FakultasModel->getById($id);

        if (!$fakultas) {
            $this->session->set_flashdata('swal', [
                'icon'  => 'warning',
                'title' => 'Tidak Ditemukan!',
                'text'  => 'Data fakultas tidak ditemukan.',
            ]);
            redirect('fakultas');
        }

        $this->FakultasModel->delete($id);

        $this->session->set_flashdata('swal', [
            'icon'  => 'warning',
            'title' => 'Dihapus!',
            'text'  => 'Data fakultas berhasil dihapus.',
        ]);

        redirect('fakultas');
    }
}