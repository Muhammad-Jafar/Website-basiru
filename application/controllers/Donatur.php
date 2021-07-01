<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Donatur extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Donatur_model');
        $this->load->library('form_validation');
    }


    public function index()
    {
        $data['title'] = 'Data Donatur';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['sum'] = $this->Donatur_model->get_sum();

        $data['bank'] = ['BRI : 0093-01-049032-50-6 ', 'BNI : 0010-01-123456-00-8'];

        $data['donatur'] = $this->db->get('user_donatur')->result_array();

        if ($this->input->post('keyword')) {
            $data['donatur'] = $this->Donatur_model->cariDataDonatur();
        }

        $this->form_validation->set_rules('nama', 'nama', 'required|trim');
        $this->form_validation->set_rules('program', 'program', 'required|trim');
        $this->form_validation->set_rules('no_telp', 'no telepon', 'required|trim');
        $this->form_validation->set_rules('nominal', 'nominal', 'required|trim');
        $this->form_validation->set_rules('image', 'image', 'required|trim');

        if ($this->form_validation->run()  == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('donatur/index', $data);
            // $this->load->view('templates/footer');


        } else {
            $data = [
                'nama' => $this->input->post('nama'),
                'program' => $this->input->post('program'),
                'no_telp' => $this->input->post('no_telp'),
                'nominal' => $this->input->post('nominal'),
                'bank' => $this->input->post('bank'),
                'image' => $this->input->post('image'),

            ];
            $this->db->insert('user_donatur', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil ditambah</div>');
            redirect('donatur');
        }
    }



    // skript untuk hapus data program
    public function hapus($id)
    {
        $this->db->delete('user_donatur', array('id' => $id));
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Data berhasil dihapus</div>');
        redirect('donatur');
    }



    // skript untuk edit data program
    public function edit($id)
    {
        $data['title'] = 'Form Edit Data Donatur';
        $data['donatur'] = $this->Donatur_model->getDonaturById($id);
        $data['bank'] = ['BRI : 0093-01-049032-50-6 ', 'BNI : 0010-01-123456-00-8'];

        $this->form_validation->set_rules('nama', 'nama', 'required');
        $this->form_validation->set_rules('program', 'program', 'required');
        $this->form_validation->set_rules('no_telp', 'no telepon', 'required');
        $this->form_validation->set_rules('nominal', 'nominal', 'required');


        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('donatur/edit', $data);
        } else {
            $this->Donatur_model->editDataDonatur();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil diupdate</div>');
            redirect('donatur');
        }
    }

    public function print()
    {
        $data['donatur'] = $this->Donatur_model->getAllDonatur('user_donatur');
        $this->load->view('donatur/print_donatur', $data);
    }
}
