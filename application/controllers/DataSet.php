<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataSet extends CI_Controller {

  function __construct()
  {
    parent::__construct();
    if($this->session->userdata('status_login') != true){
      redirect('siswa');
    }
  }

  function index()
  {

  }

  public function upload_file(){

    $csvMimes = array('application/vnd.ms-excel','text/plain','text/csv','text/tsv');
      if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'],$csvMimes)){
          if(is_uploaded_file($_FILES['file']['tmp_name'])){
              $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
              fgetcsv($csvFile);
              while(($line = fgetcsv($csvFile)) !== FALSE){
                  //check whether prodi
                  $result = $this->db->get_where("data_set", array("kode_prodi"=>$line[0]))->result();
                  $this->db->insert("data_set", array("tahun"=>$line[0], "kode_prodi"=>$line[1], "kode_fakultas" => $line[2], "kode_ptn"=>$line[3], "daya_tampung"=>$line[4], "jumlah_peminat"=>$line[5], "pg"=>$line[6]));
                  // if(count($result) > 4){
                      //update prodi
                      //$this->db->update("nilai_pg", array("tahun"=>$line[0], "kode_ptn"=>$line[2], "daya_tampung"=>$line[3],"jumlah_peminat"=>$line[4],"pg"=>$line[5]), array("kode_prodi"=>$line[1]));
                  //}else{
                      //insert prodi data into database
                      // $this->db->insert("nilai_pg", array("tahun"=>$line[0], "kode_prodi"=>$line[1], "kode_ptn"=>$line[2], "daya_tampung"=>$line[3], "jumlah_peminat"=>$line[4], "pg"=>$line[5]));
                  //}
              }
              fclose($csvFile);

              $qstring["status"] = 'Success';
          }else{
              $qstring["status"] = 'Error';
          }
      }else{
          $qstring["status"] = 'Invalid file';
      }
      $this->load->view('includes/header');
      $this->load->view('csvToMySQL',$qstring);
      $this->load->view('includes/footer');
  }
}
