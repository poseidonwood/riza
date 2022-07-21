<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{
	public function data_buku()
	{
		$this->db->order_by('tgl_input_buku', 'DESC');
		return $this->db->get('tb_buku')->result_array();
	}

	public function bukubyid($id)
	{
		return $this->db->get_where('tb_buku', ['id_buku' => $id])->row_array();
	}
	public function userbyid($id)
	{
		return $this->db->get_where('tb_user', ['id_user' => $id])->row_array();
	}

	public function simpan_buku()
	{
		$time = time();
		$id = $time;
		$judul = ucwords($this->input->post('judul'));
		$url = url_title($judul, 'dash', true);
		$url_buku = $url . '-' . $time;
		$penulis = ucwords($this->input->post('author'));
		$jml_b = $this->input->post('jml_buku');
		$jml_h = $this->input->post('jml_hal');
		$type_buku = $this->input->post('type_buku');
		$kategori = $this->input->post('kat_buku');
		$desk = $this->input->post('deskripsi');
		$link = $this->input->post('link');

		// get foto
		$config['upload_path'] = './assets/buku';
		$config['allowed_types'] = 'jpg|png|jpeg|gif';
		$config['encrypt_name'] = TRUE;

		$this->upload->initialize($config);
		if (!empty($_FILES['gambar']['name'])) {
			if ($this->upload->do_upload('gambar')) {
				$gambar = $this->upload->data();
				$config['image_library'] = 'gd2';
				$config['source_image'] = './assets/buku/' . $gambar['file_name'];
				$config['create_thumb'] = FALSE;
				$config['maintain_ratio'] = FALSE;
				$config['quality'] = '60%';
				$config['width'] = 300;
				$config['height'] = 461;
				$config['new_image'] = './assets/buku/' . $gambar['file_name'];
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();

				$data = array(
					'id_buku'			=>	$id,
					'url_buku'			=>	$url_buku,
					'judul_buku'		=>	$judul,
					'penulis_buku'		=>	$penulis,
					'jumlah_buku'		=>	$jml_b,
					'kategori_buku'		=>	$kategori,
					'jml_halaman'		=>	$jml_h,
					'deskripsi_buku'	=>	$desk,
					'link_buku'			=>	$link,
					'jml_bintang'		=>	0,
					'foto_buku'			=>	$gambar['file_name'],
					'type_buku' 		=> $type_buku
				);
			}else{
				$this->session->set_flashdata('error', $this->upload->display_errors());
				redirect('admin/add_buku');
			}
		} else {
			$this->session->set_flashdata('error', 'Anda belum memilih gambar');
			redirect('admin/add_buku');
		}
		$this->db->insert('tb_buku', $data);

	}
	public function ubah_user()
	{
		$this->db->where('id_user', $this->input->post('id'));
		$this->db->update('tb_user', $this->input->post('input'));
	}
	public function ubah_buku()
	{
		$time = time();
		$id = $time;
		$judul = ucwords($this->input->post('judul'));
		$url = url_title($judul, 'dash', true);
		$url_buku = $url . '-' . $time;
		$penulis = ucwords($this->input->post('author'));
		$jml_b = $this->input->post('jml_buku');
		$jml_h = $this->input->post('jml_hal');
		$kategori = $this->input->post('kat_buku');
		$desk = $this->input->post('deskripsi');
		$link = $this->input->post('link');

		// get foto
		$config['upload_path'] = './assets/buku';
		$config['allowed_types'] = 'jpg|png|jpeg|gif';
		$config['encrypt_name'] = TRUE;

		$this->upload->initialize($config);
		if (!empty($_FILES['gambar']['name'])) {
			if ($this->upload->do_upload('gambar')) {
				$gambar = $this->upload->data();
				$config['image_library'] = 'gd2';
				$config['source_image'] = './assets/buku' . $gambar['file_name'];
				$config['create_thumb'] = FALSE;
				$config['maintain_ratio'] = FALSE;
				$config['quality'] = '60%';
				$config['width'] = 300;
				$config['height'] = 461;
				$config['new_image'] = './assets/buku' . $gambar['file_name'];
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();

				$data = array(
					'judul_buku'		=>	$judul,
					'penulis_buku'		=>	$penulis,
					'jumlah_buku'		=>	$jml_b,
					'kategori_buku'		=>	$kategori,
					'jml_halaman'		=>	$jml_h,
					'deskripsi_buku'	=>	$desk,
					'link_buku'			=>	$link,
					'foto_buku'			=>	$gambar['file_name']
				);
			}
		} else {
			$data = array(
				'judul_buku'		=>	$judul,
				'penulis_buku'		=>	$penulis,
				'jumlah_buku'		=>	$jml_b,
				'kategori_buku'		=>	$kategori,
				'jml_halaman'		=>	$jml_h,
				'deskripsi_buku'	=>	$desk,
				'link_buku'			=>	$link,
				'foto_buku'			=>	$this->input->post('gambar_old')
			);
		}

		$this->db->where('id_buku', $this->input->post('id'));
		$this->db->update('tb_buku', $data);
	}

	public function del_buku($id)
	{
		$this->db->where('id_buku', $id);
		$this->db->delete('tb_buku');
	}
	public function del_user($id)
	{
		$this->db->where('id_user', $id);
		$this->db->delete('tb_user');
	}

	public function total_peminjam()
	{
		$this->db->group_by('id_user_pinjaman');
		return $this->db->get('tb_pinjaman')->num_rows();
	}

	public function data_peminjam()
	{
		$this->db->select('*');
		$this->db->from('tb_pinjaman');
		$this->db->join('tb_buku', 'tb_buku.id_buku = tb_pinjaman.id_buku_pinjaman');
		$this->db->join('tb_user', 'tb_user.id_user = tb_pinjaman.id_user_pinjaman');
		$this->db->order_by('tgl_pinjam_buku', 'DESC');
		$this->db->limit('7');
		return $this->db->get()->result_array();
	}

	public function data_user()
	{
		$this->db->order_by('akun_dibuat', 'DESC');
		$this->db->limit('7');
		return $this->db->get('tb_user')->result_array();
	}

	public function data_user_all()
	{
		$this->db->order_by('akun_dibuat', 'DESC');
		return $this->db->get('tb_user')->result_array();
	}
	public function data_user_all_class($value)
	{
		$this->db->where($value);
		$this->db->order_by('akun_dibuat', 'DESC');
		return $this->db->get('tb_user')->result_array();
	}

	public function data_pinjam_all()
	{
		$this->db->select('*');
		$this->db->from('tb_pinjaman');
		$this->db->join('tb_buku', 'tb_buku.id_buku = tb_pinjaman.id_buku_pinjaman');
		$this->db->join('tb_user', 'tb_user.id_user = tb_pinjaman.id_user_pinjaman');
		$this->db->order_by('tgl_pinjam_buku', 'DESC');
		return $this->db->get()->result_array();
	}

	public function data_pengembalian_buku()
	{
		$this->db->select('*');
		$this->db->from('tb_pengembalian');
		$this->db->join('tb_buku', 'tb_buku.id_buku = tb_pengembalian.id_buku_pengembalian');
		$this->db->join('tb_user', 'tb_user.id_user = tb_pengembalian.id_user_pengembalian');
		$this->db->order_by('tgl_pengembalian', 'DESC');
		return $this->db->get()->result_array();
	}
}
