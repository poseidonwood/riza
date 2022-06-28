<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('Home_model');
	}

	public function index() {
		$data['title'] = 'Beranda';
		$data['databuku'] = $this->Home_model->databuku();
		$data['datapinjaman'] = $this->Home_model->data_pinjaman();
		$data['t_pinjaman'] = $this->db->get_where('tb_pinjaman',['id_user_pinjaman' =>	$this->session->userdata('id')])->num_rows();
		$this->load->view('home/header', $data);
		// $this->load->view('home/main', $data);
		$this->load->view('home/index', $data);
		$this->load->view('home/footer');
	}

	public function detail($id) {
		$data['title'] = 'Detail';
		$data['datapinjaman'] = $this->Home_model->data_pinjaman();
		$data['t_pinjaman'] = $this->db->get_where('tb_pinjaman',['id_user_pinjaman' =>	$this->session->userdata('id')])->num_rows();
		$data['bukuid'] = $this->Home_model->bukubyid($id);
		$this->load->view('home/header', $data);
		$this->load->view('home/detail', $data);
		$this->load->view('home/footer');
	}

	public function pinjam() {
		if($this->session->userdata('id') == 0) {
			$this->session->set_flashdata('error', 'Silahkan login dulu untuk meminjam buku');
			redirect('user/login');
		}
		$id_book = $this->uri->segment(3);
		if($id_book == '') {
			redirect('home');
		}
		$this->db->like('id_buku_pinjaman', $id_book);
		$this->db->where('id_user_pinjaman', $this->session->userdata('id'));
		$cek_pinjaman = $this->db->get('tb_pinjaman')->num_rows();
		if($cek_pinjaman > 0) {
			$this->session->set_flashdata('error', 'Buku ini masih ada dalam daftar pinjaman anda dan belum dikembalikan');
			redirect('home');
		}else {
			$this->db->where('id_user_pinjaman', $this->session->userdata('id'));
			$cek_pinjaman = $this->db->get('tb_pinjaman')->num_rows();
			if($cek_pinjaman > 1) {
				$this->session->set_flashdata('error', 'Anda telah melebihi batas peminjaman yaitu 2 item');
				redirect('home');
			}
		}
		$back = date("Y-m-d", mktime(0,0,0, date("m"), date("d") + 3, date("Y")));
		$data = array (
			'id_pinjaman'				=>	rand(),
			'tgl_kembali_pinjaman'		=>	$back,
			'id_buku_pinjaman'			=>	$id_book,
			'id_user_pinjaman'			=>	$this->session->userdata('id'),
			'jml_pinjam'				=>	1
		);

		$this->db->insert('tb_pinjaman', $data);
		$this->session->set_flashdata('flash', 'Pinjam buku berhasil');
		redirect('user/dashboard');
	}

	public function kembalikan() {
		$id_book = $this->uri->segment(3);
		if($id_book == '') {
			redirect('home');
		}
		$ceksisa = $this->db->get_where('tb_buku',['id_buku' => $id_book])->row_array();
		$sisa = $ceksisa['jumlah_buku']+1;

		$this->db->set('jumlah_buku', $sisa);
		$this->db->where('id_buku', $id_book);
		$this->db->update('tb_buku');
		$this->db->delete('tb_pinjaman', ['id_user_pinjaman' => $this->session->userdata('id'), 'id_buku_pinjaman' => $id_book]);
		$data = array (
			'id_buku_pengembalian'		=>   $id_book,
			'id_user_pengembalian'		=>   $this->session->userdata('id')
		);
	
		$this->db->insert('tb_pengembalian', $data);
		$this->session->set_flashdata('flash', 'Buku berhasil dikembalikan');
		redirect('home');
	}

	public function tambah_rating(){
		if ($this->input->post('rating')!=''){
			$data = array('jml_bintang'=>$this->input->post('rating'));
	        $where = array('id_buku' => $this->input->post('id'));
			$this->Home_model->update('tb_buku', $data, $where);
			$cek_dulu = $this->db->get_where('tb_ratings',['id_user_rating' => $this->session->userdata('id'),'id_buku_rating' => $this->input->post('id')])->row_array();
			if($cek_dulu) {
				$this->Home_model->update_rating();
			}else {
				$this->Home_model->simpan_rating();
			}
		}
	}

	


}