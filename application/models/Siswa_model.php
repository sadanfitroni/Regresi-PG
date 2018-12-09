<?php
/**
 *
 */
class Siswa_model extends CI_Model
{
  function login($email, $password)
  {
    return $this->db->get_where('tbl_user', array('email' => $email, 'password' => $password))->row();
  }
  function getById($id_user)
  {
    return $this->db->get_where('siswa', array('id_user' => $id_user))->row();
  }
  function insert_tbl_user($data)
  {
    $this->db->insert('tbl_user', $data);
    return $this->db->insert_id();
  }
  function insert_siswa($data)
  {
    $this->db->insert('siswa', $data);
  }
}

?>
