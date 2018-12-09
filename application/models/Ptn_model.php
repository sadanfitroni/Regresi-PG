<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Ptn_model extends CI_Model
{
  function getAllPtn()
  {
    return $this->db->get('perguruan_tinggi')->result();
  }

}
