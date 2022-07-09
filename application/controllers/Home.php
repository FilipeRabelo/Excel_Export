<?php

defined('BASEPATH') or exit('Ação não permitida');

class Home extends CI_Controller{

  // public function __construct()
  // {
  //   parent::__construct();

  //   if (!$this->ion_auth->logged_in()) {

  //     redirect('auth/login');
  //   }
  // }

  public function index(){   //METODO DE INICIO

    $data = array(

      'titulo'     => 'Home',
      'sub_titulo' => 'Pagina inicial '

    );

    //CHAMAR A VIEW
    $this->load->view('layout/header');   // CHAMANDO A VARIAVEL DENTRO DO HEADER //
    $this->load->view('home/index', $data);
    $this->load->view('layout/footer');
  }
}
