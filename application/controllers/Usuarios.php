<?php
defined('BASEPATH') or exit('Ação não permitida');

  class Usuarios extends CI_Controller{

    public function index(){  //chama o modulo usuario

      //ARQUIVOS SENDO ENVIADOS PARA A VIEW 

      $data = array(

        'titulo'        => 'Usuarios cadastrados',
        'sub_titulo'    => 'Listando Usuários cadastrados no Banco de Dados!',

        //ARQUIVO DE CSS//
        'styles'        => array(
        '../plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css',
        ),     
        
        'scripts'        => array(
        'plugins/datatables.net/js/jquery.dataTables.min.js',
        'plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js',
        'plugins/datatables.net/js/export_excel.js',
        '',
        ),

        'users' => $this->ion_auth->users()->result(), // BUSCAR USUARIOS E ENVIAR PARA A VIEW //
      );

      // echo "<pre>";
      // print_r($data['user']);
      // exit();     

      $this->load->view('layout/header', $data);
      $this->load->view('usuarios/index');
      $this->load->view('layout/footer');

    }



       //CADASTRAR E EDITAR USUARIOS/USUARIO

    public function core($usuario_id = NULL) {  //chama o modolo usuario

      if(!$usuario_id ){   // cadastro de novo usuario        

        exit('Pode cadastrar novo usuario');

      }else{

        // EDITAR O USUARIO // 

        if(!$this->ion_auth->user($usuario_id)->row()){

          exit('Usuario nao existe');

        }else{   
        
        // EDITAR USUARIO

          //validação

          $this->form_validation->set_rules('first_name',  'Nome',       'trim|required|mim_length[6]|max_length[50]');
          $this->form_validation->set_rules('last_name',   'Sobre-Nome', 'trim|required|mim_length[6]|max_length[50]');
          $this->form_validation->set_rules('username',    'Usuario',    'trim|required|mim_length[6]|max_length[50]');
          $this->form_validation->set_rules('email',       'E-Mail',     'trim|valid_email|required|mim_length[6]|max_length[50]');
          $this->form_validation->set_rules('password',    'Password',   'trim|mim_length[8]|max_length[50]');
          $this->form_validation->set_rules('confirmacao', 'Confirma',   'trim|mim_length[8]|max_length[50]|matches[password]');

          if($this->form_validation->run()){

            echo "<pre>";
            print_r($this->input->post());
            exit();

          }else{
          // ERRO DE VALIDAÇÂO

          $data = array(

            'titulo'         => 'Editar Usuários',
            'sub_titulo'     => 'Chegou a hora de editar o Usuário!',

            //BUSCAR USUARIO E ARMAZANAR DENTRO DA VARIAVEL
            'user'           => $this->ion_auth->user($usuario_id)->row(), 

            //PERFIL_USUARIO RECEBE O description COLUNA DA TABELA
            'perfil_usuario' => $this->ion_auth->get_users_groups($usuario_id)->row(),
          
          );

            // echo "<pre>";
            // print_r($data['perfil_usuario']);
            // exit();

            $this->load->view('layout/header', $data);
            $this->load->view('usuarios/core');
            $this->load->view('layout/footer');

          }       

        }

      };

    }

  }

?>