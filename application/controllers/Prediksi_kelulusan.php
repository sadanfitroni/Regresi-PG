<?php
/**
 *
 */
class Prediksi_kelulusan extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    if($this->session->userdata('status_login') != true){
      redirect('siswa');
    }

    $this->load->model('Ptn_model');
    $this->load->model('Prodi_model');
    $this->load->model('Siswa_model');
    $this->load->model('Prediksi_kelulusan_model');
  }
  function index()
  {
    $data['ptn'] = $this->Ptn_model->getAllPtn();
    $data['prodi'] = $this->Prodi_model->getProdi();
    $this->load->view('prediksi_kelulusan', $data);
  }
  function insert_prediksi()
  {
    if($this->input->post()){
      $ptn1   = $this->input->post('ptn1');
      $prodi1 = $this->input->post('prodi1');
      $ptn2   = $this->input->post('ptn2');
      $prodi2 = $this->input->post('prodi2');
      $ptn3   = $this->input->post('ptn3');
      $prodi3 = $this->input->post('prodi3');
      $to1    = $this->input->post('to1');
      $to2    = $this->input->post('to2');
      // echo $this->session->userdata('id_user');
      $siswa = $this->Siswa_model->getById($this->session->userdata('id_user'));
      // var_dump($siswa);
      $data = array(
        'id_to' => '',
        'nis_siswa' => $siswa->nis_siswa,
        'nilai_to' => ($to1 + $to2) / 2,
        'tanggal_tryout' => date('Y-m-d')
      );
      $id_to = $this->Prediksi_kelulusan_model->insert_TO($data);

      $data = array(
        0 => array(
          'id_pilihan' => '',
          'id_to' => $id_to,
          'kode_ptn' => $ptn1,
          'kode_prodi' => $prodi1,
          'nis_siswa' => $siswa->nis_siswa,
          'pilihan_ke' => 1,
        ),
        1 => array(
          'id_pilihan' => '',
          'id_to' => $id_to,
          'kode_ptn' => $ptn2,
          'kode_prodi' => $prodi2,
          'nis_siswa' => $siswa->nis_siswa,
          'pilihan_ke' => 2,
        ),
        2 => array(
          'id_pilihan' => '',
          'id_to' => $id_to,
          'kode_ptn' => $ptn3,
          'kode_prodi' => $prodi3,
          'nis_siswa' => $siswa->nis_siswa,
          'pilihan_ke' => 3,
        ),
      );
      $this->Prediksi_kelulusan_model->insert_pilihan($data);
    }
    redirect('prediksi_kelulusan/prediksi/'.$id_to);
  }
  function prediksi($id_to = '')
  {
    if($id_to != ''){
      $data['siswa'] = $this->Siswa_model->getById($this->session->userdata('id_user'));
      $data['pilihan'] = $this->Prediksi_kelulusan_model->getPilihan($id_to);

      $this->load->view('prediksi', $data);
    }
    else redirect('prediksi_kelulusan');
  }
}
?>
