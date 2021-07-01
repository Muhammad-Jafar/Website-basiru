<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Program1 extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $data['title'] = 'Program';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['bank'] = ['BRI : 0093-01-049032-50-6 '];

        $this->form_validation->set_rules('nama', 'nama', 'required');
        $this->form_validation->set_rules('program', 'program', 'required');
        $this->form_validation->set_rules('no_telp', 'no telepon', 'required');
        $this->form_validation->set_rules('nominal', 'nominal', 'required');
        $this->form_validation->set_rules('image', 'image', 'required');

        if ($this->form_validation->run()  == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('program1/index', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nama' => $this->input->post('nama'),
                'program' => $this->input->post('program'),
                'no_telp' => $this->input->post('no_telp'),
                'nominal' => $this->input->post('nominal'),
                'bank' => $this->input->post('bank'),
                'image' => $this->input->post('image')

            ];

            $this->db->insert('user_donatur', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil ditambah</div>');
            redirect('user');
        }
    }
}
