<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Menu_model');
    }

    public function index()
    {
        $data['title'] = 'Menu Management';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('menu', 'Menu', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/index', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil ditambah</div>');
            redirect('menu');
        }
    }

    // skript untuk hapus data menu management
    public function delete($id)
    {
        $this->db->delete('user_menu', array('id' => $id));
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data berhasil dihapus</div>');
        redirect('menu');
    }



    // skript untuk edit data menu
    public function edit($id)
    {
        $data['title'] = 'Form Edit Data Menu';
        $data['menu'] = $this->Menu_model->getMenuById($id);

        $this->form_validation->set_rules('menu', 'menu', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('menu/edit', $data);
        } else {
            $this->Menu_model->editDataMenu();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil diupdate</div>');
            redirect('menu');
        }
    }
}
