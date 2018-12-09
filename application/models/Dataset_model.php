<?php
/**
 *
 */
class Dataset_model extends CI_Model
{

  function getDataset($ptn, $prodi)
  {
    return $this->db->get_where('data_set', array('kode_ptn' => $ptn, 'kode_prodi' => $prodi))->result();
  }
  function cekPrediksi($tahun, $ptn, $prodi)
  {
    return $this->db->get_where('hasil_prediksi', array('thn' => $tahun, 'kode_ptn' => $ptn, 'kode_prodi' => $prodi))->row();
  }
  function cekUkuranPrediksi($ptn, $prodi)
  {
    return $this->db->get_where('ukuran_prediksi', array('kode_ptn' => $ptn, 'kode_prodi' => $prodi))->row();
  }
  function cekStatistikPrediksi($ptn, $prodi)
  {
    return $this->db->get_where('statistik_regresi', array('kode_ptn' => $ptn, 'kode_prodi' => $prodi))->row();
  }
}

?>
