<?php

defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');
class MData extends CI_Model
{

  function InnerJoin($table1, $table2, $data)
  {
    // $this->db->query("SELECT * FROM $table LEFT JOIN karyawan ON users.nip = karyawan.nip");
    $this->db->select('*');
    $this->db->from($table1);
    $this->db->join($table2, "$table1" . '.' . "$data = $table2" . '.' . "$data");
    $query = $this->db->get();
    if ($query->num_rows() == 0) {
      return FALSE;
    } else {
      return $query->result();
    }
  }
  function InnerJoin2id($table1, $table2, $data, $data1)
  {
    // $this->db->query("SELECT * FROM $table LEFT JOIN karyawan ON users.nip = karyawan.nip");
    $this->db->select('*');
    $this->db->from($table1);
    $this->db->join($table2, "$table1" . '.' . "$data1 = $table2" . '.' . "$data");
    $query = $this->db->get();
    if ($query->num_rows() == 0) {
      return FALSE;
    } else {
      return $query->result();
    }
  }
  function distinctdata($table, $colomn)
  {
    $this->db->distinct();
    $this->db->select($colomn);
    $this->db->from($table);
    $query = $this->db->get();
    if ($query->num_rows() == 0) {
      return FALSE;
    } else {
      return $query->result();
    }
  }
  function InnerJoin2idWhere($table1, $table2, $data, $data1, $value)
  {
    // $this->db->query("SELECT * FROM $table LEFT JOIN karyawan ON users.nip = karyawan.nip");
    $this->db->select('*');
    $this->db->from($table1);
    $this->db->join($table2, "$table1" . '.' . "$data1 = $table2" . '.' . "$data");
    $this->db->where($value);
    $query = $this->db->get();
    if ($query->num_rows() == 0) {
      return FALSE;
    } else {
      return $query->result();
    }
  }

  function InnerJoinWhere($table1, $table2, $data, $value)
  {
    // $this->db->query("SELECT * FROM $table LEFT JOIN karyawan ON users.nip = karyawan.nip");
    $this->db->select('*');
    $this->db->from($table1);
    $this->db->join($table2, "$table1" . '.' . "$data = $table2" . '.' . "$data");
    $this->db->where($value);
    $query = $this->db->get();
    if ($query->num_rows() == 0) {
      return FALSE;
    } else {
      return $query->row();
    }
  }
  function InnerJoinLike($table1, $table2, $data, $value, $start_date, $end_date)
  {
    // $this->db->query("SELECT * FROM $table LEFT JOIN karyawan ON users.nip = karyawan.nip");
    $this->db->select('*');
    $this->db->from($table1);
    $this->db->join($table2, "$table1" . '.' . "$data = $table2" . '.' . "$data");
    $this->db->or_like($value);
    $this->db->or_where('tanggal_expired BETWEEN "' . date('Y-m-d', strtotime($start_date)) . '" and "' . date('Y-m-d', strtotime($end_date)) . '"');
    $query = $this->db->get();
    if ($query->num_rows() == 0) {
      return FALSE;
    } else {
      return $query->result();
    }
  }
  function InnerJoinLike1($table1, $table2, $data, $value, $start_date, $end_date)
  {
    // $this->db->query("SELECT * FROM $table LEFT JOIN karyawan ON users.nip = karyawan.nip");
    $this->db->select('*');
    $this->db->from($table1);
    $this->db->join($table2, "$table1" . '.' . "$data = $table2" . '.' . "$data");
    // $this->db->or_like($value);
    $this->db->like($value);
    // $this->db->or_where('tanggal_expired BETWEEN "' . date('Y-m-d', strtotime($start_date)) . '" and "' . date('Y-m-d', strtotime($end_date)) . '"');
    if ($start_date !== '' && $end_date !== '') {
      $this->db->or_where('tanggal_expired BETWEEN "' . date('Y-m-d', strtotime($start_date)) . '" and "' . date('Y-m-d', strtotime($end_date)) . '"');
    }
    $query = $this->db->get();
    if ($query->num_rows() == 0) {
      return FALSE;
    } else {
      return $query->result();
    }
  }

  function InnerJoinWhereResult($table1, $table2, $data, $value)
  {
    // $this->db->query("SELECT * FROM $table LEFT JOIN karyawan ON users.nip = karyawan.nip");
    $this->db->select('*');
    $this->db->from($table1);
    $this->db->join($table2, "$table1" . '.' . "$data = $table2" . '.' . "$data");
    $this->db->where($value);
    $query = $this->db->get();
    if ($query->num_rows() == 0) {
      return FALSE;
    } else {
      return $query->result();
    }
  }
  function InnerJoinWhereResultLike($table1, $table2, $data, $value, $column, $like)
  {
    // $this->db->query("SELECT * FROM $table LEFT JOIN karyawan ON users.nip = karyawan.nip");
    $this->db->select('*');
    $this->db->from($table1);
    $this->db->join($table2, "$table1" . '.' . "$data = $table2" . '.' . "$data");
    $this->db->like($column, $like, 'both');
    $this->db->where($value);
    $query = $this->db->get();
    if ($query->num_rows() == 0) {
      return FALSE;
    } else {
      return $query->result();
    }
  }

  function selectdata($table, $value)
  {
    $this->db->select('*');
    $this->db->from($table);
    $this->db->where($value);
    $query = $this->db->get();
    if ($query->num_rows() == 0) {
      return FALSE;
    } else {
      return $query->result();
    }
  }
  function selectdatanonnumrows($table, $value)
  {
    $this->db->select('*');
    $this->db->from($table);
    $this->db->where($value);
    $query = $this->db->get();
    return $query;
  }
  function selectdatapagination($table, $value, $limit, $offset = 0)
  {
    $this->db->select('*');
    $this->db->from($table);
    $this->db->where($value);
    $this->db->limit($limit, $offset);
    $query = $this->db->get();
    return $query;
    // if ($query->num_rows() == 0) {
    //   return FALSE;
    // } else {
    //   return $query->result();
    // }
  }

  function selectdataglobal3($table)
  {
    $this->db->select('*');
    $this->db->from($table);
    $this->db->order_by('id', 'desc');
    $query = $this->db->get();
    if ($query->num_rows() == 0) {
      return FALSE;
    } else {
      return $query->result();
    }
  }

  function selectdatalimit($table, $value, $limit)
  {
    $this->db->select('*');
    $this->db->from($table);
    $this->db->where($value);
    $this->db->limit($limit);
    $query = $this->db->get();
    if ($query->num_rows() == 0) {
      return FALSE;
    } else {
      return $query->result();
    }
  }
  function selectcolumn($column, $table, $value)
  {
    $this->db->select('*');
    $this->db->from($table);
    $this->db->where($value);
    $query = $this->db->get();
    if ($query->num_rows() == 0) {
      return FALSE;
    } else {
      return $query->result();
    }
  }
  function selectlog($table)
  {
    $this->db->select('*');
    $this->db->from($table);
    $this->db->order_by('start_login', 'desc');
    $query = $this->db->get();
    if ($query->num_rows() == 0) {
      return FALSE;
    } else {
      return $query->result();
    }
  }
  function selectmaintenance($table, $value)
  {
    $this->db->select('*');
    $this->db->from($table);
    // $this->db->like('whitelist_ip', $this->input->ip_address(), 'both');
    $this->db->where($value);
    $query = $this->db->get();
    if ($query->num_rows() == 0) {
      return FALSE;
    } else {
      return $query->row();
    }
  }
  function selectdatalikelimit1($table, $column, $data)
  {
    $this->db->select('*');
    $this->db->from($table);
    $this->db->like($column, $data, 'both');
    // $this->db->where($value);
    $this->db->limit('1');
    $query = $this->db->get();
    if ($query->num_rows() == 0) {
      return FALSE;
    } else {
      return $query->row();
    }
  }
  function selectdataarray($table, $value)
  {
    $this->db->select('*');
    $this->db->from($table);
    $this->db->where($value);
    $this->db->order_by('queue', 'desc');
    $this->db->limit(5);
    $query = $this->db->get();
    if ($query->num_rows() == 0) {
      return FALSE;
    } else {
      return $query->result_array();
    }
  }
  function selectdatawhereorderby($table, $value)
  {
    $this->db->select('*');
    $this->db->from($table);
    $this->db->where($value);
    $this->db->order_by('start_login', 'desc');
    $query = $this->db->get();
    if ($query->num_rows() == 0) {
      return FALSE;
    } else {
      return $query->row();
    }
  }
  function selectdatawhereresult1($table, $value)
  {
    $datenow = date('Y-m-d H:i:s');
    $this->db->select('*');
    $this->db->from($table);
    // $this->db->where($value);
    $this->db->where("schedule_time >= ", $datenow);
    $this->db->like('schedule_to', $this->session->userdata('employee_id'));
    $this->db->order_by('created_at', 'desc');
    $query = $this->db->get();
    if ($query->num_rows() == 0) {
      return FALSE;
    } else {
      return $query->result();
    }
  }
  function selectdatawhereresult($table, $value)
  {
    $this->db->select('*');
    $this->db->from($table);
    $this->db->where($value);
    $this->db->order_by('created_at', 'desc');
    $query = $this->db->get();
    if ($query->num_rows() == 0) {
      return FALSE;
    } else {
      return $query->result();
    }
  }
  function selectdatawhereresultoffset($table, $value, $limit, $offset)
  {
    $this->db->select('*');
    $this->db->from($table);
    $this->db->where($value);
    $this->db->order_by('created_at', 'desc');
    $this->db->limit($limit, $offset);
    $query = $this->db->get();
    if ($query->num_rows() == 0) {
      return FALSE;
    } else {
      return $query->result();
    }
  }
  function selectdatawheregroup($table, $group, $value = NULL)
  {
    $this->db->select('*');
    $this->db->from($table);
    if ($value !== NULL) {
      $this->db->where($value);
    }
    $this->db->group_by($group);
    $query = $this->db->get();
    if ($query->num_rows() == 0) {
      return FALSE;
    } else {
      return $query->result();
    }
  }
  function selectdatawhere($table, $value)
  {
    $this->db->select('*');
    $this->db->from($table);
    $this->db->where($value);
    $query = $this->db->get();
    if ($query->num_rows() == 0) {
      return FALSE;
    } else {
      return $query->row();
    }
  }

  function selectdataglobalwhere($table, $value)
  {
    $this->db->select('*');
    $this->db->from($table);
    $this->db->where($value);
    $this->db->order_by('created_at', 'desc');
    $query = $this->db->get();
    if ($query->num_rows() == 0) {
      return FALSE;
    } else {
      return $query->result();
    }
  }
  function selectdataglobalnoncreatedwhere($table, $value)
  {
    $this->db->select('*');
    $this->db->from($table);
    $this->db->where($value);
    $this->db->order_by('ymd', 'desc');
    $query = $this->db->get();
    if ($query->num_rows() == 0) {
      return FALSE;
    } else {
      return $query->result();
    }
  }
  function selectdataglobal2($table)
  {
    $this->db->select('*');
    $this->db->from($table);
    // $this->db->where($value);
    $this->db->order_by('created_at', 'desc');
    $query = $this->db->get();
    if ($query->num_rows() == 0) {
      return FALSE;
    } else {
      return $query->result();
    }
  }
  function selectdataglobal3matrixskill($table, $value)
  {
    $this->db->select('*');
    $this->db->from($table);
    $this->db->where($value);
    $this->db->order_by('nama_pillar', 'desc');
    $query = $this->db->get();
    if ($query->num_rows() == 0) {
      return FALSE;
    } else {
      return $query->result();
    }
  }
  function selectdataglobal2log($table)
  {
    $this->db->select('*');
    $this->db->from($table);
    // $this->db->where($value);
    $this->db->order_by('created_at', 'desc');
    $this->db->limit(100);
    $query = $this->db->get();
    if ($query->num_rows() == 0) {
      return FALSE;
    } else {
      return $query->result();
    }
  }


  function selectcolomnsingledata($colomn, $table, $value)
  {
    $this->db->select($colomn);
    $this->db->from($table);
    $this->db->where($value);
    $query = $this->db->get();
    if ($query->num_rows() == 0) {
      return FALSE;
    } else {
      return $query->row();
    }
  }
  function selectsingledata($table, $value)
  {
    $this->db->select('*');
    $this->db->from($table);
    $this->db->where($value);
    $query = $this->db->get();
    if ($query->num_rows() == 0) {
      return FALSE;
    } else {
      return $query->row();
    }
  }
  public function selectsingledatadoblewhere($table, $value, $value1)
  {
    $this->db->select('*');
    $this->db->from($table);
    $this->db->where($value);
    $this->db->where($value1);
    $query = $this->db->get();
    if ($query->num_rows() == 0) {
      return FALSE;
    } else {
      return $query->row();
    }
  }
  public function tambah($table, $data)
  {
    if ($this->db->insert($table, $data)) {
      $insert_id = $this->db->insert_id();

      return  $insert_id;
      // return tru?e;
    } else {
      return false;
    }
  }
  public function replace($table, $data)
  {
    if ($this->db->replace($table, $data)) {
      // $insert_id = $this->db->insert_id();

      // return  $insert_id;
      return true;
    } else {
      return false;
    }
  }
  public function tambahgetid($table, $data)
  {
    if ($this->db->insert($table, $data)) {
      $insertid = $this->db->insert_id();
      return $insertid;
    } else {
      return false;
    }
  }
  public function delete($table, $value)
  {
    if ($this->db->delete($table, $value)) {
      return true;
    } else {
      return false;
    }
  }
  function edit($value, $table, $data)
  {
    $this->db->where($value);
    $update = $this->db->update($table, $data);
    if ($update) {
      return true;
    } else {
      return false;
    }
  }
  public function selectsingledatawithsort($table, $value, $kolom, $sort)
  {
    $this->db->select('*');
    $this->db->from($table);
    $this->db->where($value);
    $this->db->order_by($kolom, $sort);
    $query = $this->db->get();
    if ($query->num_rows() == 0) {
      return FALSE;
    } else {
      return $query->row();
    }
  }
  public function getMaxIdTransaksi($table)
  {
    // $query = $this->db->query("SELECT MAX(CAST(SUBSTRING(kode, 4, length(kode)-3) AS UNSIGNED)) as max_kode FROM $table");
    $query = $this->db->query("SELECT MAX(kode) as max_kode FROM $table");

    if ($query->num_rows() > 0) {
      return $query->row();
    } else {
      return false;
    }
  }
  public function getValueResult($table, $soal, $nip, $materi_id)
  {
    $query = $this->db->query("SELECT count(*) as $soal from $table where jawaban = 'BENAR' and participant = '$nip' and materi_id = '$materi_id' and soal = '$soal' order by created_at DESC limit 5");
    if ($query->num_rows() > 0) {
      return $query->row();
    } else {
      return false;
    }
  }
  public function hitungdata($table, $value)
  {
    $this->db->where($value);
    $query =  $this->db->count_all_results($table);
    if ($query->num_rows() > 0) {
      return $query->row();
    } else {
      return false;
    }
  }

  public function customresult($value)
  {
    $query = $this->db->query($value);
    if ($query->num_rows() > 0) {
      return $query->result();
    } else {
      return false;
    }
  }
  public function customarray($value)
  {
    $query = $this->db->query($value);
    if ($query->num_rows() > 0) {
      return $query->result_array();
    } else {
      return false;
    }
  }
  public function custommultiqueryrow($q1, $q2, $q3)
  {
    $this->db->trans_start();
    $this->db->query($q1);
    $this->db->query($q2);
    $query = $this->db->query($q3);
    $this->db->trans_complete();
    // $query = $this->db->query($value);
    if ($query->num_rows() > 0) {
      return $query->row();
    } else {
      return false;
    }
  }
  public function customrow($value)
  {
    $query = $this->db->query($value);
    if ($query->num_rows() > 0) {
      return $query->row();
    } else {
      return false;
    }
  }
  public function customrowdelete($value)
  {
    $query = $this->db->query($value);
  }
}
