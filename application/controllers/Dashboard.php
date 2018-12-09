<?php
/**
 *
 */
class Dashboard extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    if($this->session->userdata('status_login') != true){
      redirect('siswa');
    }
  }
  function index()
  {
    $this->load->view('dashboard');
  }
}

?>
