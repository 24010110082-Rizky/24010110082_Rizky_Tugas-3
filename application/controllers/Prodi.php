<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prodi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('logged_in')) {
            redirect('auth');
        }

        $this->load->model('ProdiModel');
        $this->load->model('FakultasModel');
    }

    public function index()
    {
        $data['title'] = 'Program Studi';
        $data['prodi'] = $this->ProdiModel->getAll();
        $this->load->view('templates/header', $data);
        $this->load->view('prodi/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['title']    = 'Tambah Program Studi';
        $data['action']   = base_url('prodi/tambah');
        $data['button']   = 'Simpan';
        $data['prodi']    = null;
        $data['fakultas'] = $this->FakultasModel->getAll();

        $this->form_validation->set_rules('prodi_id',     'ID Program Studi', 'required|numeric');
        $this->form_validation->set_rules('fakultas_id',  'Fakultas',         'required|numeric');
        $this->form_validation->set_rules('prodi_name',   'Nama Program Studi', 'required|min_length[3]|max_length[100]');
        $this->form_validation->set_rules('prodi_strata', 'Strata',           'required|in_list[D3,S1,S2]');

        if ($this->form_validation->run() === TRUE) {
            $insert = [
                'prodi_id'      => $this->input->post('prodi_id'),
                'fakultas_id'   => $this->input->post('fakultas_id'),
                'prodi_name'    => $this->input->post('prodi_name'),
                'prodi_strata'  => $this->input->post('prodi_strata'),
            ];

            $this->ProdiModel->insert($insert);

            $this->session->set_flashdata('swal', [
                'icon'  => 'success',
                'title' => 'Berhasil!',
                'text'  => 'Data program studi berhasil ditambahkan.',
            ]);

            redirect('prodi');
        }

        $this->load->view('templates/header', $data);
        $this->load->view('prodi/form', $data);
        $this->load->view('templates/footer');
    }

    public function ubah($id)
    {
        $prodi = $this->ProdiModel->getById($id);

        if (!$prodi) {
            $this->session->set_flashdata('swal', [
                'icon'  => 'warning',
                'title' => 'Tidak Ditemukan!',
                'text'  => 'Data program studi tidak ditemukan.',
            ]);
            redirect('prodi');
        }

        $data['title']    = 'Ubah Program Studi';
        $data['action']   = base_url('prodi/ubah/' . $id);
        $data['button']   = 'Update';
        $data['prodi']    = $prodi;
        $data['fakultas'] = $this->FakultasModel->getAll();

        $this->form_validation->set_rules('fakultas_id',  'Fakultas',           'required|numeric');
        $this->form_validation->set_rules('prodi_name',   'Nama Program Studi', 'required|min_length[3]|max_length[100]');
        $this->form_validation->set_rules('prodi_strata', 'Strata',             'required|in_list[D3,S1,S2]');

        if ($this->form_validation->run() === TRUE) {
            $update = [
                'fakultas_id'  => $this->input->post('fakultas_id'),
                'prodi_name'   => $this->input->post('prodi_name'),
                'prodi_strata' => $this->input->post('prodi_strata'),
            ];

            $this->ProdiModel->update($id, $update);

            $this->session->set_flashdata('swal', [
                'icon'  => 'success',
                'title' => 'Berhasil!',
                'text'  => 'Data program studi berhasil diperbarui.',
            ]);

            redirect('prodi');
        }

        $this->load->view('templates/header', $data);
        $this->load->view('prodi/form', $data);
        $this->load->view('templates/footer');
    }

    public function hapus($id)
    {
        $prodi = $this->ProdiModel->getById($id);

        if (!$prodi) {
            $this->session->set_flashdata('swal', [
                'icon'  => 'warning',
                'title' => 'Tidak Ditemukan!',
                'text'  => 'Data program studi tidak ditemukan.',
            ]);
            redirect('prodi');
        }

        $this->ProdiModel->delete($id);

        $this->session->set_flashdata('swal', [
            'icon'  => 'warning',
            'title' => 'Dihapus!',
            'text'  => 'Data program studi berhasil dihapus.',
        ]);

        redirect('prodi');
    }
}