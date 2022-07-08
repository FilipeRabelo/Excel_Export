<?php
  defined('BASEPATH') or exit('No direct script acesse allowed');

  require FCPATH . 'vendor/autoload.php';

  class MundiPag extends CI_Controller{

    public function index(){

      $this->load->view('layout/header');
      $this->load->view('mundipag/index');
      $this->load->view('layout/footer');

    }

  }


?>