<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Donatur_model');
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Dasboard';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['donatur'] = $this->Donatur_model->get_sum();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }


    public function edit()
    {
        $data['title'] = 'Edit Profile';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('name', 'nama', 'required|trim');


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/edit', $data);
            $this->load->view('templates/footer');
        } else {

            $name = $this->input->post('name');
            $email = $this->input->post('email');


            // kodingan untuk cek jika ada gambar yg akan di upload
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['upload_path'] = './assets/img/profile/';          // kode untuk, dimana tempat penyimpanan gambar 
                $config['allowed_types'] = 'gif|jpg|png';                   // kode untuk tipe gambar yg digunakan
                $config['max_size']     = '2048';                             // kode untuk berapa kapasitas gambar

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {                       // kode, apabila gambar berhasil di upload 

                    $old_image = $data['user']['image'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/profile/' . $old_image);
                    }

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->db->set('name', $name);
            $this->db->where('email',  $email);
            $this->db->update('user');

            // kodingan untuk menampilakan pesan nama di profil berhasil di ubah
            $this->session->set_flashdata('message', '<div class="alert 
            alert-success" role="alert">Profil anda berhasil diupdate</div>');
            redirect('admin');
        }
    }

    public function changepasswprd()
    {
        $data['title'] = 'Change Password';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('current_password', 'current assword', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'new password', 'required|trim|min_length[3]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'confirm password', 'required|trim|min_length[3]|matches[new_password1]');


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/changepasswprd', $data);
            $this->load->view('templates/footer');
        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');
            if (!password_verify($current_password, $data['user']['password'])) {

                // kodingan untuk menampilkan pesan kalau password lama dimasukan dengan benar
                $this->session->set_flashdata('message', '<div class="alert 
                alert-danger" role="alert">Masukan password sebelumnya dengan benar !</div>');
                redirect('user/changepasswprd');

                // kodingan untuk menampilkan pesan jika password lama tidak boleh sama dengan password baru
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('message', '<div class="alert 
                    alert-danger" role="alert">Password baru tidak boleh sama dengan password saat ini!</div>');
                    redirect('user/changepasswprd');
                } else {

                    // kodingan jika password sudah ok dan akan menampilkan pesan sukses
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);


                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');

                    $this->session->set_flashdata('message', '<div class="alert 
                    alert-success" role="alert">Password berhasil diubah!</div>');
                    redirect('user/changepasswprd');
                }
            }
        }
    }
}
