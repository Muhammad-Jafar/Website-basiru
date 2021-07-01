<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Program extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Program_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'Data Program';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['program'] = $this->db->get('user_program')->result_array();
        $data['status'] = ['Selesai', 'Sedang Berjalan', 'Belum Berjalan'];

        if ($this->input->post('keyword')) {
            $data['program'] = $this->Program_model->cariDataProgram();
        }

        $this->form_validation->set_rules('judul', 'judul', 'required');
        $this->form_validation->set_rules('mulai', 'mulai', 'required');
        $this->form_validation->set_rules('deadline', 'tanggal', 'required');

        if ($this->form_validation->run()  == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('program/index', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'judul' => $this->input->post('judul'),
                'mulai' => $this->input->post('mulai'),
                'deadline' => $this->input->post('deadline'),
                'status' => $this->input->post('status')

            ];

            $this->db->insert('user_program', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Program berhasil ditambah</div>');
            redirect('program');
        }
    }


    // skript untuk hapus data program
    public function hapus($id)
    {
        $this->db->delete('user_program', array('id' => $id));
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Data berhasil dihapus</div>');
        redirect('program');
    }


    // skript untuk edit data program
    public function edit($id)
    {
        $data['title'] = 'Form Edit Data Program';
        $data['program'] = $this->Program_model->getProgramById($id);
        $data['status'] = ['Selesai', 'Sedang Berjalan', 'Belum Berjalan'];

        $this->form_validation->set_rules('judul', 'judul', 'required');
        $this->form_validation->set_rules('mulai', 'mulai', 'required');
        $this->form_validation->set_rules('deadline', 'deadline', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('program/edit', $data);
        } else {
            $this->Program_model->editDataProgram();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil diupdate</div>');
            redirect('program');
        }
    }
}
