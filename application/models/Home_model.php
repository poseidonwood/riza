<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model {
	public function databuku() {
		$this->db->order_by('tgl_input_buku', 'DESC');
		return $this->db->get('tb_buku')->result_array();
	}

	public function update($table, $data, $where){
        return $this->db->update($table, $data, $where); 
    }

    public function simpan_rating() {
    	$data = array (
    		'id_buku_rating'		=>   $this->input->post('id'),
    		'id_user_rating'		=>   $this->session->userdata('id'),
    		'jml_rating'			=>   $this->input->post('rating')
    	);
    
    	$this->db->insert('tb_ratings', $data);
    }

	public function bukubyid($id) {
		return $this->db->get_where('tb_buku', ['url_buku' => $id])->row_array();
	}

	public function data_pinjaman() {
		$this->db->select('*');
		$this->db->from('tb_pinjaman');
		$this->db->join('tb_buku', 'tb_buku.id_buku = tb_pinjaman.id_buku_pinjaman');
		$this->db->where('id_user_pinjaman', $this->session->userdata('id'));
		return $this->db->get()->result_array();
	}

	public function baca_buku($url_buku) {
		$this->db->select('*');
		$this->db->from('tb_pinjaman');
		$this->db->join('tb_buku', 'tb_buku.id_buku = tb_pinjaman.id_buku_pinjaman');
		$this->db->where('url_buku', $url_buku);
		return $this->db->get()->row_array();
	}

}