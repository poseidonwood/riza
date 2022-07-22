<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Registrasi extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Home_model');
		$this->load->model('MData');
	}

	public function index()
	{
		$data['title'] = 'Halaman Registrasi';
		$data['databuku'] = $this->Home_model->databuku();
		$data['kelas'] = $this->MData->customresult("SELECT * from tb_kelas where status = '1' ORDER BY kelas ASC");
		$data['datapinjaman'] = $this->Home_model->data_pinjaman();
		$data['t_pinjaman'] = $this->db->get_where('tb_pinjaman', ['id_user_pinjaman' =>	$this->session->userdata('id')])->num_rows();
		$this->form_validation->set_rules('nama', 'nama', 'required|regex_match[/^([a-z ])+$/i]', [
			'required'	=>	'Kolom nama tidak boleh kosong',
			'regex_match' =>	'Harus berupa huruf'
		]);
		$this->form_validation->set_rules('email', 'email', 'required|valid_email|is_unique[tb_user.email_user]', [
			'required'	=>	'Kolom email tidak boleh kosong',
			'valid_email' =>	'Email tidak valid',
			'is_unique' =>	'Email sudah terdaftar'
		]);
		$this->form_validation->set_rules('pass1', 'pass1', 'required|min_length[5]', [
			'required'	=>	'Kolom password tidak boleh kosong',
			'min_length' =>	'Password Minimal 5 karakter'
		]);
		$this->form_validation->set_rules('password', 'password', 'required|matches[pass1]', [
			'required'	=>	'Kolom password tidak boleh kosong',
			'matches'	=>	'Konfirmasi password salah'
		]);
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('home/header', $data);
			$this->load->view('user/registrasi', $data);
			$this->load->view('home/footer');
		} else {
			$this->_simpan();
			$this->session->set_flashdata('flash', 'Registrasi berhasil, silahkan cek email verifikasi anda !');
			redirect('user/login');
		}
	}

	private function _simpan()
	{
		$data = array(
			'nama_user'			=>   ucwords($this->input->post('nama')),
			'nis'				=>   $this->input->post('nis'),
			'kelas'				=>   $this->input->post('kelas'),
			'email_user'		=>   strtolower($this->input->post('email')),
			'password_user'		=>   password_hash($this->input->post('password'), PASSWORD_DEFAULT),
			'status_user'		=>   0,
			'foto_profil'		=>   'avatar5.png',
			'akun_dibuat'		=>   time()
		);

		$token = base64_encode(openssl_random_pseudo_bytes(32));

		$member_token = array(
			'email_user_token'			=>	$this->input->post('email'),
			'token_user'				=>	$token,
			'token_dibuat'				=>	time()
		);
		$this->db->insert('tb_user', $data);
		$this->db->insert('tb_token', $member_token);
		$this->_sendemail($token);
	}

	private function _sendemail($token)
	{

		$this->load->library('email');
		$config['charset'] = 'utf-8';
		$config['useragent'] = 'Perpustakaan MA AL HASAN';
		$config['protocol'] = 'smtp';
		$config['mailtype'] = 'html';
		$config['smtp_host'] = 'ssl://smtp.gmail.com';
		$config['smtp_port'] = '465';
		$config['smtp_timeout'] = '5';
		$config['smtp_user'] = 'rizaap.96@gmail.com'; // email anda di sini
		$config['smtp_pass'] = 'muioqxvvurqnaasc'; // password email anda disini
		$config['crlf'] = "\r\n";
		$config['newline'] = "\r\n";
		$config['wordwrap'] = TRUE;

		$this->email->initialize($config);

		$this->email->from('rizaap.96@gmail.com', 'Perpustakaan MA AL HASAN'); // email anda di sini
		$this->email->to($this->input->post('email'));
		$this->email->subject('Email Verifikasi');
		$this->email->message('<h4>Hi, ' . ucwords($this->input->post('nama')) . '</h4>Klik tombol di bawah ini untuk memverifikasi email anda. <p><a href="' . base_url() . 'user/login/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '" style="background-color:#44c767;border-radius:28px;border:1px solid #18ab29;display:inline-block;cursor:pointer;color:#ffffff;font-family:Times New Roman;font-size:17px;font-weight:bold;padding:9px 17px;text-decoration:none;text-shadow:0px 1px 0px #2f6627;" target="_blank">Verifikasi</a></p>');

		$this->email->send();
	}
}
