<?php

    defined('BASEPATH') or exit('Ação não permitida');

    class Login extends CI_Controller{

        public function index(){

            $data = array(
            'titulo' => 'Login',
            );      

            $this->load->view('layout/header');
            $this->load->view('login/index', $data);
            $this->load->view('layout/footer');

        }

        public function auth(){

            $identity = html_escape($this->input->post('email'));
            $password = html_escape($this->input->post('password'));
            $remember = FALSE; // remember the user
            
            $retornoLogin = $this->ion_auth->login($identity, $password, $remember);

            //   echo"<pre>";
            //   print_r($retornoLogin);
            //   exit();

            if(!empty($retornoLogin)){

            $this->session->set_flashdata('sucesso', 'Seja bem-vindo(a)!!');
            redirect('/home/');
            }else{

            $this->session->set_flashdata('error', 'Verifique seus dados!!!');
            redirect($this->router->fetch_class());
            }

        }

        public function logout(){

            $this->ion_auth->logout();

            redirect($this->router->fetch_class());

        }

    }

?>
