<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ptn_controller extends CI_Controller {

  public function __construct()
  {
      parent::__construct();
      $this->load->model('Ptn_model');
      $this->load->model('Prodi_model');
      $this->load->model('Prediksi_kelulusan_model');
      if($this->session->userdata('status_login') != true){
        redirect('siswa');
      }
  }

  function index()
  {
    $this->load->view('data_ptn');
  }

  function prodi($kode_ptn)
  {
    $data['kode_ptn'] = $kode_ptn;
    $this->load->view('data_prodi', $data);
  }
  function fakultas($kode_ptn)
  {
    $data['kode_ptn'] = $kode_ptn;
    $this->load->view('data_fakultas', $data);
  }
  function prodi_fakultas($kode_ptn, $kode_fakultas)
  {
    $data['kode_ptn'] = $kode_ptn;
    $data['kode_fakultas'] = $kode_fakultas;
    $this->load->view('data_fakultas_prodi', $data);
  }
  function detail_prediksi($kode_ptn, $kode_prodi)
  {
    $data['hasil_prediksi'] = $this->Prediksi_kelulusan_model->getHasilPrediksi($kode_ptn, $kode_prodi);
    $data['ukuran_prediksi'] = $this->Prediksi_kelulusan_model->getUkuranPrediksi($kode_ptn, $kode_prodi);
    $data['statistik_prediksi'] = $this->Prediksi_kelulusan_model->getStatistikPrediksi($kode_ptn, $kode_prodi);
    $this->load->view('detail_prediksi', $data);
  }

  function tambah_data()
  {
    $data['ptn'] = $this->Ptn_model->getAllPtn();
    $data['prodi'] = $this->Prodi_model->getAllProdi();
    $this->load->view('tambah_data', $data);
  }
  
  function insert()
  {
    if($this->input->post()){
      $kode_ptn = $this->input->post('kode_ptn');
      $nama_ptn = $this->input->post('nama_ptn');
      $wilayah = $this->input->post('wilayah');
      $kode_prodi = $this->input->post('kode_prodi');
      $nama_prodi = $this->input->post('nama_prodi');
      $jenis_prodi = $this->input->post('jenis_prodi');
      $tahun = array(
        $this->input->post('tahun1'),
        $this->input->post('tahun2'),
        $this->input->post('tahun3'),
        $this->input->post('tahun4'),
        $this->input->post('tahun5'),
      );

      $daya_tampung = array(
        $this->input->post('daya_tampung1'),
        $this->input->post('daya_tampung2'),
        $this->input->post('daya_tampung3'),
        $this->input->post('daya_tampung4'),
        $this->input->post('daya_tampung5'),
      );

      $jumlah_peminat = array(
        $this->input->post('jumlah_peminat1'),
        $this->input->post('jumlah_peminat2'),
        $this->input->post('jumlah_peminat3'),
        $this->input->post('jumlah_peminat4'),
        $this->input->post('jumlah_peminat5'),
      );
      $pg = array(
        $this->input->post('pg1'),
        $this->input->post('pg2'),
        $this->input->post('pg3'),
        $this->input->post('pg4'),
        $this->input->post('pg5'),
      );

      $ptn = array(
        'kode_ptn' => $kode_ptn,
        'nama_ptn' => $nama_ptn,
        'wilayah' => $wilayah
      );
      $this->db->insert('perguruan_tinggi', $ptn);

      $prodi = array(
        'kode_prodi' => $kode_prodi,
        'kode_ptn' => $kode_ptn,
        'jenis_prodi' => $jenis_prodi,
        'nama_prodi' => $nama_prodi,
      );
      $this->db->insert('prodi', $prodi);

      for ($i=0; $i < 5; $i++) {
        $data_set = array(
          'kode_prodi' => $kode_prodi,
          'kode_ptn' => $kode_ptn,
          'tahun' => $tahun[$i],
          'daya_tampung' => $daya_tampung[$i],
          'jumlah_peminat' => $jumlah_peminat[$i],
          'pg' => $pg[$i],
        );
        $this->db->insert('data_set', $data_set);
      }
    }
    redirect('ptn_controller');
  }

}
