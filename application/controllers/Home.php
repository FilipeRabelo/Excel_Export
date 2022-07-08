<?php

defined('BASEPATH') or exit('Ação não permitida');

class Home extends CI_Controller
{

  public function index(){   //METODO DE INICIO

    $data = array(

      'titulo' => 'Home'

    );

    //CHAMAR A VIEW
    $this->load->view('layout/header', $data);   // CHAMANDO A VARIAVEL DENTRO DO HEADER //
    $this->load->view('home/index');
    $this->load->view('layout/footer');
  }
}
