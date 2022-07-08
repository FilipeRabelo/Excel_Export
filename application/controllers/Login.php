<?php
defined('BASEPATH') or exit('Ação não permitida');

  class Login extends CI_Controller{
    
    public function index(){

      $data = array(
        'titulo' => 'Login',
      );      

      $this->load->view('layout/header', $data);
      $this->load->view('login/index');
      $this->load->view('layout/footer');

    }

  }

?>