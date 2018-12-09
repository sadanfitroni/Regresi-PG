<?php
/**
 *
 */
class Prediksi_kelulusan_model extends CI_Model
{
  function getUkuranPrediksi($ptn, $prodi)
  {
    return $this->db->get_where('ukuran_prediksi', array('kode_ptn' => $ptn, 'kode_prodi' => $prodi))->row();
  }
  function getHasilPrediksi($ptn, $prodi)
  {
    return $this->db->get_where('hasil_prediksi', array('kode_ptn' => $ptn, 'kode_prodi' => $prodi))->row();
  }
  function getStatistikPrediksi($ptn, $prodi)
  {
    return $this->db->get_where('statistik_regresi', array('kode_ptn' => $ptn, 'kode_prodi' => $prodi))->row();
  }
  function getPilihan($id_to)
  {
    return $this->db->join('perguruan_tinggi', 'perguruan_tinggi.kode_ptn = pilihan.kode_ptn')
                    ->join('prodi_fakultas', 'prodi_fakultas.kode_prodi = pilihan.kode_prodi')
                    ->join('tryout', 'tryout.id_to = pilihan.id_to')
                    ->get_where('pilihan', array('pilihan.id_to' => $id_to))->result();
  }
  function insert_TO($data)
  {
    $this->db->insert('tryout', $data);
    return $this->db->insert_id();
  }
  function insert_pilihan($data)
  {
    $this->db->insert('pilihan', $data[0]);
    $this->db->insert('pilihan', $data[1]);
    $this->db->insert('pilihan', $data[2]);
  }
}

?>
