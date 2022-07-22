<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_model');
		$this->load->model('MData');
		if ($this->session->userdata('login_status') != 'login') {
			redirect('login');
		}
	}

	public function index()
	{
		$data['title'] = 'Halaman Admin';
		$data['totalbuku'] = $this->db->get('tb_buku')->num_rows();
		$data['totaluser'] = $this->db->get('tb_user')->num_rows();
		$data['totalpeminjam'] = $this->Admin_model->total_peminjam();
		$data['datapeminjam'] = $this->Admin_model->data_peminjam();
		$data['datauser'] = $this->Admin_model->data_user();
		$this->load->view('tema/header', $data);
		$this->load->view('admin/index', $data);
		$this->load->view('tema/footer');
	}

	// book start here

	public function buku()
	{
		$data['title'] = 'Data Buku Perpustakaan';
		$data['databuku'] = $this->Admin_model->data_buku();
		$this->load->view('tema/header', $data);
		$this->load->view('admin/buku', $data);
		$this->load->view('tema/footer');
	}

	public function add_buku()
	{
		$data['title'] = 'Tambah Data Buku';
		$this->form_validation->set_rules('judul', 'judul', 'required|min_length[3]', [
			'required'	=>	'Kolom judul buku tidak boleh kosong',
			'min_length' =>	'Nama buku minimal 3 karakter'
		]);
		$this->form_validation->set_rules('author', 'author', 'required|min_length[3]', [
			'required'	=>	'Kolom penulis tidak boleh kosong',
			'min_length' =>	'Nama penulis minimal 3 karakter'
		]);
		$this->form_validation->set_rules('jml_hal', 'jml_hal', 'required|numeric|min_length[2]|max_length[4]', [
			'required'	=>	'Kolom jumlah halaman tidak boleh kosong',
			'min_length' =>	'jumlah halaman minimal 2 angka',
			'numeric'	=>	'Jumlah halaman harus berupa angka',
			'max_length' =>	'jumlah halaman maksimal 4 angka'
		]);
		$this->form_validation->set_rules('kat_buku', 'kat_buku', 'required', [
			'required'	=>	'Kolom kategori buku tidak boleh kosong'
		]);
		$this->form_validation->set_rules('type_buku', 'type_buku', 'required', [
			'required'	=>	'Type Buku tidak boleh kosong'
		]);
		$this->form_validation->set_rules('deskripsi', 'deskripsi', 'required|min_length[5]', [
			'required'	=>	'Kolom deskripsi buku tidak boleh kosong',
			'min_length' =>	'Deskripsi buku minimal 5 karakter'
		]);
		$kategorybuku  = $this->MData->selectdatawhereresult('tb_buku_kategory', array('status' => 1));
		$data['kategorybuku'] = $kategorybuku;
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('tema/header', $data);
			$this->load->view('admin/add_buku', $data);
			$this->load->view('tema/footer');
		} else {
			$this->Admin_model->simpan_buku();
			$this->session->set_flashdata('flash', 'Data buku berhasil ditambahkan');
			redirect('admin/buku');
		}
	}

	public function edit_buku($id)
	{
		$data['title'] = 'Edit Data Buku';
		$data['bukuid'] = $this->Admin_model->bukubyid($id);
		$this->form_validation->set_rules('judul', 'judul', 'required|min_length[3]', [
			'required'	=>	'Kolom judul buku tidak boleh kosong',
			'min_length' =>	'Nama buku minimal 3 karakter'
		]);
		$this->form_validation->set_rules('author', 'author', 'required|min_length[3]', [
			'required'	=>	'Kolom penulis tidak boleh kosong',
			'min_length' =>	'Nama penulis minimal 3 karakter'
		]);
		$this->form_validation->set_rules('jml_hal', 'jml_hal', 'required|numeric|min_length[2]|max_length[4]', [
			'required'	=>	'Kolom jumlah halaman tidak boleh kosong',
			'min_length' =>	'jumlah halaman minimal 2 angka',
			'numeric'	=>	'Jumlah halaman harus berupa angka',
			'max_length' =>	'jumlah halaman maksimal 4 angka'
		]);
		$this->form_validation->set_rules('kat_buku', 'kat_buku', 'required', [
			'required'	=>	'Kolom kategori buku tidak boleh kosong'
		]);
		$this->form_validation->set_rules('deskripsi', 'deskripsi', 'required|min_length[5]', [
			'required'	=>	'Kolom deskripsi buku tidak boleh kosong',
			'min_length' =>	'Deskripsi buku minimal 5 karakter'
		]);
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('tema/header', $data);
			$this->load->view('admin/edit_buku', $data);
			$this->load->view('tema/footer');
		} else {
			$this->Admin_model->ubah_buku();
			$this->session->set_flashdata('flash', 'Data buku berhasil diedit');
			redirect('admin/buku');
		}
	}

	public function hapus_buku($id)
	{
		$this->Admin_model->del_buku($id);
		$this->session->set_flashdata('flash', 'Data buku berhasil dihapus');
		redirect('admin/buku');
	}

	// data user start here

	public function data_member()
	{
		$data['title'] = 'Data Member';
		$data['kelas'] = $this->MData->customresult("SELECT * from tb_kelas where status = '1' ORDER BY kelas ASC");

		if ($this->input->post()) {
			$data['datamember'] = $this->Admin_model->data_user_all_class(array('kelas' => $this->input->post('sortirclass')));
			$data['sortirclass'] = $this->input->post('sortirclass');
		} else {
			$data['datamember'] = $this->Admin_model->data_user_all();
			$data['sortirclass'] = "X";
		}
		$this->load->view('tema/header', $data);
		$this->load->view('admin/data_member', $data);
		$this->load->view('tema/footer');
	}
	public function data_kelas()
	{
		$data['title'] = 'Data Kelas';
		$data['kelas'] = $this->MData->customresult("SELECT * from tb_kelas ORDER BY kelas ASC");

		// if ($this->input->post()) {
		// 	$data['datamember'] = $this->Admin_model->data_user_all_class(array('kelas' => $this->input->post('sortirclass')));
		// 	$data['sortirclass'] = $this->input->post('sortirclass');
		// } else {
		// 	$data['datamember'] = $this->Admin_model->data_user_all();
		// 	$data['sortirclass'] = "X";
		// }
		$this->load->view('tema/header', $data);
		$this->load->view('admin/data_kelas', $data);
		$this->load->view('tema/footer');
	}
	public function data_kategory()
	{
		$data['title'] = 'Data Kategori';
		$data['kategory'] = $this->MData->customresult("SELECT * from tb_buku_kategory ORDER BY id DESC");

		// if ($this->input->post()) {
		// 	$data['datamember'] = $this->Admin_model->data_user_all_class(array('kelas' => $this->input->post('sortirclass')));
		// 	$data['sortirclass'] = $this->input->post('sortirclass');
		// } else {
		// 	$data['datamember'] = $this->Admin_model->data_user_all();
		// 	$data['sortirclass'] = "X";
		// }
		$this->load->view('tema/header', $data);
		$this->load->view('admin/data_kategory', $data);
		$this->load->view('tema/footer');
	}
	// public function data_kategory()
	// {
	// 	$data['title'] = 'Data Member';
	// 	$data['kelas'] = $this->MData->customresult("SELECT * from tb_kelas where status = '1' ORDER BY kelas ASC");

	// 	if ($this->input->post()) {
	// 		$data['datamember'] = $this->Admin_model->data_user_all_class(array('kelas' => $this->input->post('sortirclass')));
	// 		$data['sortirclass'] = $this->input->post('sortirclass');
	// 	} else {
	// 		$data['datamember'] = $this->Admin_model->data_user_all();
	// 		$data['sortirclass'] = "X";
	// 	}
	// 	$this->load->view('tema/header', $data);
	// 	$this->load->view('admin/data_member', $data);
	// 	$this->load->view('tema/footer');
	// }
	public function add_member()
	{

		$data['title'] = 'Tambah Data Member';
		$data['kelas'] = $this->MData->customresult("SELECT * from tb_kelas where status = '1' ORDER BY kelas ASC");

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('tema/header', $data);
			$this->load->view('admin/add_member', $data);
			$this->load->view('tema/footer');
		}
		if ($this->input->post()) {
			$_POST['input']['akun_dibuat'] = strtotime(date('Y-m-d H:i:s'));
			$this->MData->tambah('tb_user', $_POST['input']);
			$this->session->set_flashdata('flash', 'Data member berhasil diubah');
			redirect('admin/data_member');
		}
	}
	public function add_kelas()
	{

		$data['title'] = 'Tambah Data Kelas';
		$data['kelas'] = $this->MData->customresult("SELECT * from tb_kelas where status = '1' ORDER BY kelas ASC");

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('tema/header', $data);
			$this->load->view('admin/add_kelas', $data);
			$this->load->view('tema/footer');
		}
		if ($this->input->post()) {
			$_POST['input']['nm_kelas'] = $_POST['input']['kelas'];
			$this->MData->tambah('tb_kelas', $_POST['input']);
			$this->session->set_flashdata('flash', 'Data kelas berhasil tambah');
			redirect('admin/data_kelas');
		}
	}
	public function delete_member($id)
	{
		$this->Admin_model->del_user($id);
		$this->session->set_flashdata('flash', 'Data user berhasil dihapus');
		redirect('admin/data_member');
	}
	public function delete_kelas($id)
	{
		$this->MData->delete('tb_kelas',['id'=>$id]);
		$this->session->set_flashdata('flash', 'Data kelas berhasil dihapus');
		redirect('admin/data_kelas');
	}
	public function delete_kategory($id)
	{
		$this->MData->delete('tb_buku_kategory',['id'=>$id]);
		$this->session->set_flashdata('flash', 'Data kategory berhasil dihapus');
		redirect('admin/data_kategory');
	}
	public function edit_member($id)
	{
		$data['title'] = 'Edit Data Member';
		$data['userid'] = $this->Admin_model->userbyid($id);
		$data['kelas'] = $this->MData->customresult("SELECT * from tb_kelas where status = '1' ORDER BY kelas ASC");
		$this->form_validation->set_rules('input[nama_user]', 'nama', 'required|min_length[3]', [
			'required'	=>	'Kolom nama tidak boleh kosong',
			'min_length' =>	''
		]);
		$this->form_validation->set_rules('input[email_user]', 'email', 'required|min_length[3]', [
			'required'	=>	'Kolom email tidak boleh kosong',
			'min_length' =>	''
		]);

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('tema/header', $data);
			$this->load->view('admin/edit_member', $data);
			$this->load->view('tema/footer');
		} else {
			$this->Admin_model->ubah_user();
			$this->session->set_flashdata('flash', 'Data member berhasil diubah');
			redirect('admin/data_member');
		}
	}
	public function edit_kelas($id)
	{
		$data['title'] = 'Edit Data Kelas';
		$data['kelas'] = $this->MData->customrow("SELECT * from tb_kelas where id = '{$id}'");

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('tema/header', $data);
			$this->load->view('admin/edit_kelas', $data);
			$this->load->view('tema/footer');
		} 
		if($this->input->post()){
			$_POST['input']['nm_kelas'] = $_POST['input']['kelas'];
			$this->MData->edit(['id'=>$id],'tb_kelas',$_POST['input']);
			$this->session->set_flashdata('flash', 'Data Kelas berhasil diubah');
			redirect('admin/data_kelas');
		}
	}
	public function edit_kategory($id)
	{
		$data['title'] = 'Edit Data Buku Kategory';
		$data['kategory'] = $this->MData->customrow("SELECT * from tb_buku_kategory where id = '{$id}'");

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('tema/header', $data);
			$this->load->view('admin/edit_kategory', $data);
			$this->load->view('tema/footer');
		} 
		if($this->input->post()){
			$_POST['input']['kategory'] = strtolower(str_replace(" ","_",$_POST['input']['nm_kategory']));
			$this->MData->edit(['id'=>$id],'tb_buku_kategory',$_POST['input']);
			$this->session->set_flashdata('flash', 'Data Kategory berhasil diubah');
			redirect('admin/data_kategory');
		}
	}

	// data peminjam

	public function data_peminjam()
	{
		$data['title'] = 'Data Peminjaman Buku';
		$data['datapinjam'] = $this->Admin_model->data_pinjam_all();
		$this->load->view('tema/header', $data);
		$this->load->view('admin/data_peminjaman', $data);
		$this->load->view('tema/footer');
	}

	public function kembalikan()
	{
		$id_book = $this->uri->segment(3);
		if ($id_book == '') {
			redirect('admin/data_peminjam');
		}
		$ceksisa = $this->db->get_where('tb_buku', ['id_buku' => $id_book])->row_array();
		$sisa = $ceksisa['jumlah_buku'] + 1;

		$this->db->set('jumlah_buku', $sisa);
		$this->db->where('id_buku', $id_book);
		$this->db->update('tb_buku');
		$this->db->delete('tb_pinjaman', ['id_user_pinjaman' => $this->uri->segment(5), 'id_buku_pinjaman' => $id_book]);
		$data = array(
			'id_buku_pengembalian'		=>   $id_book,
			'id_user_pengembalian'		=>   $this->uri->segment(5)
		);
		$data1 = array(
			'id'				=>	rand(),
			'tgl_pinjam_buku'			=>	$ceksisa['tgl_pinjam_buku'],
			'tgl_kembali_pinjaman'		=>	date('Y-m-d H:i:s'),
			'id_buku_pinjaman'			=>	$id_book,
			'id_user_pinjaman'			=>	$this->session->userdata('id'),
			'jml_pinjam'				=>	1,
			'status_pinjam' 			=>  2
		);

		$this->db->insert('tb_transaksi', $data1);
		$this->db->insert('tb_pengembalian', $data);
		$this->session->set_flashdata('flash', 'Buku berhasil dikembalikan');
		redirect('admin/data_peminjam');
	}

	public function data_pengembalian()
	{
		$data['title'] = 'Data Pengembalian Buku';
		$data['datakembali'] = $this->Admin_model->data_pengembalian_buku();
		$this->load->view('tema/header', $data);
		$this->load->view('admin/data_pengembalian', $data);
		$this->load->view('tema/footer');
	}
	public function data_transaksi()
	{
		$data['title'] = 'Data Transaksi Buku';
		// $data['datakembali'] = $this->MData->customresult("SELECT * FROM tb_transaksi");
		$data['datakembali'] = $this->Admin_model->data_transaksi();
		// echo json_encode($data['datakembali']); exit;
		// [{"id":"1705225659","tgl_pinjam_buku":"2022-07-22 09:44:17","tgl_kembali_pinjaman":"2022-07-25","id_buku_pinjaman":"1574508313","id_user_pinjaman":"9","jml_pinjam":"1","status_pinjam":"1","id_buku":"1574508313","url_buku":"tes-buku-1574508313","judul_buku":"Fikih Kelas XI","penulis_buku":"Kementrian Agama RI","jumlah_buku":"2","jumlah_baca":"0","kategori_buku":"Buku","type_buku":"fisik","jml_halaman":"160","deskripsi_buku":"deskripsi buku","foto_buku":"6985ed66d3609467a0dd8504729e7a94.jpeg","link_buku":"https:\/\/drive.google.com\/file\/d\/1u2gQP4WcXwHodf-pm5wexKuOgPoF44ed\/preview","tgl_input_buku":"2019-11-23 18:25:14","jml_bintang":"2","id_user":"9","nis":"0","kelas":"X-1","nama_user":"Andra","email_user":"test@test.com","password_user":"$2y$10$6qOL\/yQ4SkvuDIY0Gc0WZ.A9qr00KXCQCmxOhdfzMtkcQ99AARhhy","akun_dibuat":"1656421199","status_user":"1","foto_profil":"avatar5.png"}]
		$this->load->view('tema/header', $data);
		$this->load->view('admin/data_transaksi', $data);
		$this->load->view('tema/footer');
	}
}
