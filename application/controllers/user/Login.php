<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('Home_model');
	}
	
	public function index() {
		$data['title'] = 'Login Member';
		$data['databuku'] = $this->Home_model->databuku();
		$data['datapinjaman'] = $this->Home_model->data_pinjaman();
		$data['t_pinjaman'] = $this->db->get_where('tb_pinjaman',['id_user_pinjaman' =>	$this->session->userdata('id')])->num_rows();
		$this->form_validation->set_rules('email', 'email', 'required', [
					'required'	=>	'Kolom email tidak boleh kosong']);
		$this->form_validation->set_rules('password', 'password', 'required', [
					'required'	=>	'Kolom password tidak boleh kosong']);
		if($this->form_validation->run() == FALSE) {
			$this->load->view('home/header', $data);
			$this->load->view('user/login', $data);
			$this->load->view('home/footer');
		}else {
			$this->_periksa();
		}
	}

	private function _periksa() {
		$email = $this->input->post('email');
		$pass = $this->input->post('password');
		// $pass = password_hash($this->input->post('password'), PASSWORD_DEFAULT);

		$cek = $this->db->get_where('tb_user',['email_user' =>	$email])->row_array();
		if($cek) {
			if($cek['status_user'] == 1) {
				if(password_verify($pass, $cek['password_user'])) {
					$data_sess = array (
						'id'			=>	$cek['id_user'],
						'nama'			=>	$cek['nama_user'],
						'email'			=>	$cek['email_user'],
						'sandi'			=>	$cek['password_user'],
						'since'			=>	$cek['akun_dibuat'],
						'foto'			=>	$cek['foto_profil'],
						'status_login'	=>	'sudah_login'
					);
					$this->session->set_userdata($data_sess);
					$mssg = 'Selamat datang '. $this->session->userdata('nama');
					$this->session->set_flashdata('flash', $mssg);
					redirect('user/dashboard');
				}else {
					$this->session->set_flashdata('error', 'Password anda salah !');
					redirect('user/login');
				}
			}else {
				$this->session->set_flashdata('error', 'Email belum terverifikasi !');
				redirect('user/login');
			}
		}else {
			$this->session->set_flashdata('error', 'Email tidak terdaftar !');
			redirect('user/login');
		}
	}

	public function verify() {
		$email = $this->input->get('email');
		$token = $this->input->get('token');

		$cek_member = $this->db->get_where('tb_user', ['email_user' =>	$email])->row_array();
		if($cek_member) {
			$member_token = $this->db->get_where('tb_token', ['token_user' => $token])->row_array();
			if($member_token) {
				if(time() - $member_token['token_dibuat'] < (60*60*60)) {
					$this->db->set('status_user', 1);
					$this->db->where('email_user', $email);
					$this->db->update('tb_user');
					$this->db->delete('tb_token', ['email_user_token' => $email]);
					$this->session->set_flashdata('flash', 'Verifikasi email berhasil, silahkan login !');
					redirect('user/login');
				}else {
					$this->db->delete('tb_user', ['email_user' => $email]);
					$this->db->delete('tb_token', ['email_user_token' => $email]);
					$this->session->set_flashdata('error', 'Verifikasi email gagal, token kadaluarsa !');
					redirect('user/login');
				}
			}else {
				$this->session->set_flashdata('error', 'Verifikasi email gagal, token tidak valid !');
				redirect('user/login');
			}
		}else {
			$this->session->set_flashdata('error', 'Verifikasi email gagal, email tidak valid !');
			redirect('user/login');
		}
	}

	public function logout() {
		$this->session->sess_destroy();
		redirect('user/login');
	}
}