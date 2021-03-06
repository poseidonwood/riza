<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Home_model');
		$this->load->model('MData');
		if ($this->session->userdata('status_login') != 'sudah_login') {
			redirect('user/login');
		}
	}

	public function index()
	{
		$data['title'] = 'Halaman Member';
		$data['totalbuku'] = $this->db->get('tb_buku')->num_rows();
		$data['m_aktif'] = $this->db->get_where('tb_user', ['status_user' => 1])->num_rows();
		$data['datapinjaman'] = $this->Home_model->data_pinjaman();
		$this->load->view('user/tema/header', $data);
		$this->load->view('user/dashboard', $data);
		$this->load->view('user/tema/footer');
	}

	public function kembalikan()
	{
		$id_book = $this->uri->segment(4);
		if ($id_book == '') {
			redirect('user/dashboard');
		}
		// $ceksisa = $this->db->get_where('tb_buku', ['id_buku' => $id_book])->row_array();
		// $sisa = $ceksisa['jumlah_buku'] + 1;
		$cekdata = $this->MData->selectdatawhere('tb_pinjaman', ['id_user_pinjaman' => $this->session->userdata('id'), 'id_buku_pinjaman' => $id_book]);
		if($cekdata !== FALSE){
			$this->MData->edit(['id_pinjaman' => $cekdata->id_pinjaman],'tb_pinjaman',['status_pinjam' => 0]);
		}
		// $this->db->set('jumlah_buku', $sisa);
		// $this->db->where('id_buku', $id_book);
		// $this->db->update('tb_buku');
		// $this->db->delete('tb_pinjaman', ['id_user_pinjaman' => $this->session->userdata('id'), 'id_buku_pinjaman' => $id_book]);
		// $data = array(
		// 	'id_buku_pengembalian'		=>   $id_book,
		// 	'id_user_pengembalian'		=>   $this->session->userdata('id')
		// );
		// $data1 = array(
		// 	'id'				=>	rand(),
		// 	'tgl_pinjam_buku'			=>	$ceksisa['tgl_pinjam_buku'],
		// 	'tgl_kembali_pinjaman'		=>	date('Y-m-d H:i:s'),
		// 	'id_buku_pinjaman'			=>	$id_book,
		// 	'id_user_pinjaman'			=>	$this->session->userdata('id'),
		// 	'jml_pinjam'				=>	1,
		// 	'status_pinjam' 			=>  2
		// );

		// $this->db->insert('tb_transaksi', $data1);
		// $this->db->insert('tb_pengembalian', $data);
		$this->session->set_flashdata('flash', 'Buku dalam proses pengembalian');
		redirect('user/dashboard');
	}
}
