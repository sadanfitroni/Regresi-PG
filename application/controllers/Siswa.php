<?php
/**
 *
 */
class Siswa extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('Siswa_model');
  }
  function index()
  {
    if($this->session->userdata('status_login') != true){
      $this->load->view('login');
    }
    else{
      redirect('dashboard');
    }
  }
  function loginMe()
  {
    if($this->input->post()){
      $email = $this->input->post('email');
      $password = md5($this->input->post('password'));

      $user = $this->Siswa_model->login($email, $password);

      if(!empty($user)){
        $session = array(
          'email' => $user->email,
          'nama' => $user->nama,
          'id_privilage' => $user->id_privilage,
          'id_user' => $user->id_user,
          'status_login' => true,
        );
        $this->session->set_userdata($session);
      }
      else{
        $this->session->set_flashdata('error', 'Email atau password salah!');
      }
    }
    redirect('siswa');
  }
  function register()
  {
    if($this->input->post()){
      $email = $this->input->post('email');
      $password = md5($this->input->post('password'));
      $nis = $this->input->post('nis');
      $nama = $this->input->post('nama');

      $data = array(
        'id_privilage' => 2,
        'email' => $email,
        'password' => $password,
        'nama' => $nama
      );

      $id_user = $this->Siswa_model->insert_tbl_user($data);

      $data = array(
        'id_user' => $id_user,
        'nis_siswa' => $nis,
        'nama_siswa' => $nama
      );
      $this->Siswa_model->insert_siswa($data);

      $this->session->set_flashdata('success', 'Registrasi berhasil!');
    }
    redirect('siswa');
  }
  function logout()
  {
    $this->session->sess_destroy();
    redirect('siswa');
  }
}

?>
