<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        if ($this->session->userdata('email')) {
            redirect('admin');
        }

        $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'password', 'trim|required');


        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login Page';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        } else {
            // vallidasinya sukses
            $this->_login();
        }
    }


    private function _login()
    {

         //captha
         $data = array('email' => $this->input->post('email'),
         'password' => $this->input->post('password'),
        );
 
         $recaptchaResponse = trim($this->input->post('g-recaptcha-response'));
         $userIp=$this->input->localhost();
         $secret='6LePZRcbAAAAAJ8HmSrOzjaSHbVrUePS9U8BqmUk';
 
         $credential = array(
         'secret' => $secret,
         'response' => $this->input->post('g-recaptcha-response')
         );
 
         $verify = curl_init();
         curl_setopt($verify, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
         curl_setopt($verify, CURLOPT_POST, true);
         curl_setopt($verify, CURLOPT_POSTFIELDS, http_build_query($credential));
         curl_setopt($verify, CURLOPT_SSL_VERIFYPEER, false);
         curl_setopt($verify, CURLOPT_RETURNTRANSFER, true);
         $response = curl_exec($verify);
 
         $status= json_decode($response, true);
 
         if($status['success']){ 
         $this->db->insert('users',$data); 
         $this->session->set_flashdata('message', 'Google Recaptcha Successful');
         }else{
         $this->session->set_flashdata('message', 'Sorry Google Recaptcha Unsuccessful!!');
         }
         redirect(base_url('google'));
         //batas rechapctha

        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        // jika usernya ada
        if ($user) {

            //jika usernya aktif 
            if ($user['is_active'] == 1) {

                // cek password
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'email' => $user['email'],
                        'role_id' => $user['role_id']
                    ];
                    $this->session->set_userdata($data);
                    if ($user['role_id'] == 1) {
                        redirect('admin');
                    } else {
                        redirect('user');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Salah!</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">This email has not been activated!</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email tidak terdaftar, silahkan buat akun baru</div>');
            redirect('auth');
        }
    }

    public function registration()
    {

        if ($this->session->userdata('email')) {
            redirect('admin');
        }

        $this->form_validation->set_rules('name', 'nama', 'required|trim');
        $this->form_validation->set_rules('email', 'email', 'required|trim|valid_email|is_unique[user.email]', ['is_unique' => 'This email has already registered!']);
        $this->form_validation->set_rules('password1', 'password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Password tidak sama!',
            'min_length' => 'Password terlalu pendek!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'User Registration';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/registration');
            $this->load->view('templates/auth_footer');
        } else {
            $data = [
                'name' => htmlspecialchars($this->input->post('name', 'true')),
                'email' => htmlspecialchars($this->input->post('email', 'true')),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => 2,
                'is_active' => 1,
                'date_created' => time()
            ];

            $this->db->insert('user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! akun anda telah dibuat, silakan login</div>');
            redirect('auth');
        }
    }


    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda berhasil log out!</div>');
        redirect('auth');
    }


    public function blocked()
    {
        $this->load->view('auth/blocked');
    }
}
