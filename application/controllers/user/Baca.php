<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Baca extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('Home_model');
		$this->load->model('MData');
		if($this->session->userdata('status_login') != 'sudah_login') {
			redirect('user/login');
		}
	}

	public function detail($url_buku) {
		$data['title'] = 'Baca Buku';
		$data['bacabuku'] = $this->Home_model->baca_buku($url_buku);
		$getdataviewer = $this->MData->selectdatawhere("tb_buku",array('url_buku' => $url_buku));
		$getcounviewer = $getdataviewer->jumlah_baca + 1;
		$this->MData->edit(array('url_buku'=>$url_buku),'tb_buku',array('jumlah_baca' =>$getcounviewer));
		$this->load->view('user/tema/header', $data);
		$this->load->view('user/baca', $data);
		$this->load->view('user/tema/footer');
	}

}