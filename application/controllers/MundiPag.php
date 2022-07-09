<?php
  defined('BASEPATH') or exit('No direct script acesse allowed');

  require FCPATH . 'vendor/autoload.php';

  class MundiPag extends CI_Controller{

    public function index(){

      $data = array(
        'titulo'     => 'MundiPag',
        'sub_titulo' => 'Importe seu Arquivo Excel para o Banco de Dados Bit Hive!',
      );

      $this->load->view('layout/header');
      $this->load->view('mundipag/index', $data);
      $this->load->view('layout/footer');

    }

  }


?>