<?php

/**
 * 
 */
class Sub extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Sub_model');
		$this->load->library('form_validation');
	}



	// skript untuk tambah data sub menu management
	public function submenu()
	{
		$data['title'] = 'Sub Menu Management';
		$data['user'] = $this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();
		$this->load->model('Sub_model', 'menu');

		$data['submenu'] = $this->menu->getSubMenu();
		$data['menu'] = $this->db->get('user_menu')->result_array();

		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('menu_id', 'Menu', 'required');
		$this->form_validation->set_rules('url', 'Url', 'required');
		$this->form_validation->set_rules('icon', 'Icon', 'required');

		if ($this->form_validation->run() == false) {

			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('sub/submenu', $data);
			$this->load->view('templates/footer');
		} else {
			$data = [
				'title' => $this->input->post('title'),
				'menu_id' => $this->input->post('menu_id'),
				'url' => $this->input->post('url'),
				'icon' => $this->input->post('icon'),
				'is_active' => $this->input->post('is_active')
			];

			$this->db->insert('user_sub_menu', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Menu berhasil ditambah</div>');
			redirect('sub/submenu');
		}
	}



	// skript untuk hapus data sub menu management
	public function delete_menu($id)
	{
		$this->db->delete('user_sub_menu', array('id' => $id));
		$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
	Data berhasil dihapus</div>');
		redirect('sub/submenu');
	}



	// skript untuk edit data sub menu management
	public function edit_menu($id)
	{
		$data['title'] = 'Form Edit Data Sub Menu';
		$data['sub'] = $this->Sub_model->getSubById($id);

		$this->form_validation->set_rules('title', 'title', 'required');
		$this->form_validation->set_rules('menu_id', 'menu_id', 'required');
		$this->form_validation->set_rules('url', 'url', 'required');
		$this->form_validation->set_rules('icon', 'icon', 'required');
		$this->form_validation->set_rules('is_active', 'is_active', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header', $data);
			$this->load->view('sub/edit_menu', $data);
		} else {
			$this->Sub_model->editDataMenu();
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil diupdate</div>');
			redirect('sub/submenu');
		}
	}
}
