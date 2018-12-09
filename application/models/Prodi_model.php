<?php
/**
 *
 */
class Prodi_model extends CI_Model
{

  function getProdiFakultas($ptn)
  {
    return $this->db->get_where('prodi_fakultas', array('kode_ptn' => $ptn))->result();
  }
  function getAllProdi(){
    return $this->db->get('prodi_fakultas')->result();
  }
  function getProdi(){
    return $this->db->query("SELECT * FROM prodi_fakultas WHERE kode_fakultas = ''")->result();
  }
}
?>
