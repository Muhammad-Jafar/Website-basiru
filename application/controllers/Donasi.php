<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Donasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Donasi_model');
        $this->load->library('form_validation');
    }


    public function index()
    {
        $data['title'] = 'Data Donasi';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['donasi'] = $this->db->get('user_donasi')->result_array();

        if ($this->input->post('keyword')) {
            $data['donasi'] = $this->Donasi_model->cariDataDonasi();
        }

        $this->form_validation->set_rules('program_id', 'program', 'required');
        $this->form_validation->set_rules('nama', 'nama', 'required');
        $this->form_validation->set_rules('jumlah', 'jumlah', 'required');
        $this->form_validation->set_rules('bank', 'bank', 'required');
        $this->form_validation->set_rules('tgl', 'tanggal', 'required');

        if ($this->form_validation->run()  == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('donasi/index', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'program_id' => $this->input->post('program_id'),
                'nama' => $this->input->post('nama'),
                'jumlah' => $this->input->post('jumlah'),
                'bank' => $this->input->post('bank'),
                'tgl' => $this->input->post('tgl')

            ];

            $this->db->insert('user_donasi', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil ditambah</div>');
            redirect('donasi');
        }
    }



    // skript untuk hapus data program
    public function hapus($id)
    {
        $this->db->delete('user_donasi', array('id' => $id));
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Data berhasil dihapus</div>');
        redirect('donasi');
    }



    // skript untuk edit data program
    public function edit($id)
    {
        $data['title'] = 'Form Edit Data Donasi';
        $data['donasi'] = $this->Donasi_model->getDonasiById($id);
        if ($this->input->post('keyword')) {
            $data['donasi'] = $this->Donasi_model->cariDataDonasi();
        }

        $this->form_validation->set_rules('program_id', 'program', 'required');
        $this->form_validation->set_rules('nama', 'nama', 'required');
        $this->form_validation->set_rules('jumlah', 'jumlah', 'required');
        $this->form_validation->set_rules('bank', 'bank', 'required');
        $this->form_validation->set_rules('tgl', 'tgl', 'required');


        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('donasi/edit', $data);
        } else {
            $this->Donasi_model->editDataDonasi();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil diupdate</div>');
            redirect('donasi');
        }
    }

    public function print()
    {
        $data['donasi'] = $this->Donasi_model->getAllDonasi('user_donasi');
        $this->load->view('donasi/print_donasi', $data);
    }
}
