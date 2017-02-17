<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clugares extends cGeneral {

  public function __construct()
  {
      parent::__construct ();
  }

  public function index()
  {
      $this->load->view ('template/header');
      $this->load->view ('template/menu');
      $this->load->view ('template/menu-modal');
      $this->load->view ('lugares/alta-lugar');
      $this->load->view ('template/footer');
  }
}
