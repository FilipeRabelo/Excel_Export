<?php

    defined('BASEPATH') or exit('Ação não permitida');

    class Usuarios extends CI_Controller {

        public function index() {  //chama o modulo usuario

            //ARQUIVOS SENDO ENVIADOS PARA A VIEW 

            $data = array(

                'titulo'      => 'Usuarios cadastrados',
                'sub_titulo'  => 'Listando Usuários cadastrados no Banco de Dados!',
                'users'       => $this->ion_auth->users()->result(), // BUSCAR USUARIOS E ENVIAR PARA A VIEW //

                'styles'      => array(
                    '../plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css',
                ),

                'scripts'      => array(
                    'plugins/datatables.net/js/jquery.dataTables.min.js',
                    'plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js',
                    'plugins/datatables.net-responsive/js/dataTables.responsive.min.js',
                    'plugins/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js',
                    'plugins/datatables.net/js/export_excel.js',
                    '',
                ),

            );

            $this->load->view('layout/header', $data);
            $this->load->view('usuarios/index');
            $this->load->view('layout/footer');
        }




        //CADASTRAR E EDITAR USUARIOS/USUARIO

        public function core($usuario_id = NULL) // esta sendo chamado no href no index/usuarios
        {  //chama o modolo usuario

            if (!$usuario_id) {   // cadastro de novo usuario        

                //pode cadastrar novo usuario

                                                                                        //valida cada campo...
                $this->form_validation->set_rules('first_name',  'Nome',       'trim|required|min_length[2]|max_length[50]');
                $this->form_validation->set_rules('last_name',   'Sobre-Nome', 'trim|required|min_length[2]|max_length[50]');
                $this->form_validation->set_rules('username',    'Usuario',    'trim|required|min_length[2]|max_length[50]|is_unique[users.username]');  //verifica cada campo no banco para ver se ja existe
                $this->form_validation->set_rules('email',       'E-Mail',     'trim|valid_email|required|min_length[6]|max_length[50]|is_unique[users.email]');
                $this->form_validation->set_rules('password',    'Password',   'trim|required|min_length[6]');
                $this->form_validation->set_rules('confirmacao', 'Confirma',   'trim|required|min_length[6]|matches[password]');

                //SE VALIDOU COMECA A TRABALHAR COM A MONTAGEM DO ARRAY DE DADOS E INSERÇÃO NO BANCO DE DADOS

                if($this->form_validation->run()) {// se o form_validation rodou...1

                    $username        = html_escape($this->input->post('username'));
                    $password        = html_escape($this->input->post('password'));
                    $email           = html_escape($this->input->post('email'));
                    $additional_data = array(
                    'first_name'     => $this->input->post("first_name"),
                    'last_name'      => $this->input->post('last_name'),
                    'active'         => $this->input->post('active'),
                    );
                    $group           = array($this->input->post('perfil')); 

                    //prcisa sanitizar o array

                    $additional_data = html_escape($additional_data);  // Para limpar o array 

                    // echo"<pre>";
                    // print_r($this->input->post());
                    // exit();


                    if($this->ion_auth->register($username, $password, $email, $additional_data, $group)){
                        $this->session->set_flashdata('sucesso', 'Dados salvos com seucesso');
                    }else{
                        $this->session->set_flashdata('error', 'Erro ao salvar os dados.!!');
                    }

                    redirect($this->router->fetch_class());

                }else{               

                    // ERRO DE VALIDAÇÂO

                    $data = array(
                        'titulo'         => 'Cadastrar Usuário',
                        'sub_titulo'     => 'Chegou a hora de Cadastrar um novo Usuário!',                    
                    );

                    // echo "<pre>";
                    // print_r($data["perfil_usuario"]);
                    // exit();

                    $this->load->view('layout/header', $data);
                    $this->load->view('usuarios/core');
                    $this->load->view('layout/footer');

                }

            } else {



                // EDITAR O USUARIO // 


                if (!$this->ion_auth->user($usuario_id)->row()) {   

                    exit('Usuario nao existe');
                } else {

                    //EDITAR USUARIO

                    $perfil_atual = $this->ion_auth->get_users_groups($usuario_id)->row();



                    //validação

                    $this->form_validation->set_rules('first_name',  'Nome',       'trim|required|min_length[4]|max_length[50]');
                    $this->form_validation->set_rules('last_name',   'Sobre-Nome', 'trim|required|min_length[4]|max_length[50]');
                    $this->form_validation->set_rules('username',    'Usuario',    'trim|required|min_length[4]|max_length[50]|callback_username_check');
                    $this->form_validation->set_rules('email',       'E-Mail',     'trim|valid_email|required|min_length[6]|max_length[50]|callback_email_check');
                    $this->form_validation->set_rules('password',    'Password',   'trim|min_length[6]|max_length[50]');
                    $this->form_validation->set_rules('confirmacao', 'Confirma',   'trim|min_length[6]|max_length[50]|matches[password]');

                    if ($this->form_validation->run()) {

                        $data = elements(
                            array(

                                "first_name",
                                "last_name",
                                "username",
                                "email",
                                "password",
                                "active"

                            ),
                            $this->input->post()
                        );

                        $password = $this->input->post('password');

                        if (!$password) { //se nao passar o password nao atualiza a senha // usuario nao quer atualiazar a senha

                            unset($data['password']);  // estou removendo do array a referencia da coluna password
                        }

                        $data = html_escape($data);  //sanitizar array (limpar)//

                        // echo "<pre>";
                        // print_r($perfil_atual);
                        // exit();





                        //UPDATE   (ATUALIZAR USUAIRO)

                    
                        if ($this->ion_auth->update($usuario_id, $data)) {   //Atualizar os dados
                            
                            $perfil_post = $this->input->post('perfil'); //recuperando o name

                            if($perfil_atual->id != $perfil_post){  // SE FOR DIFERENTE ATUALIZA O grupo

                                $this->ion_auth->remove_from_group($perfil_atual->id, $usuario_id);
                                $this->ion_auth->add_to_group($perfil_post, $usuario_id);

                            }

                            $this->session->set_flashdata("sucesso", "Dados atualizado com sucesso");  //Se atualizou
                        } else {

                            $this->session->set_flashdata("error", "Não foi possivel Atualizar os Dados!!!");
                        }

                        redirect($this->router->fetch_class());  //Mandando msg para o index(view)

                    } else {

                        // ERRO DE VALIDAÇÂO

                        $data = array(  

                            'titulo'         => 'Editar Usuários',
                            'sub_titulo'     => 'Chegou a hora de editar o Usuário!',
                            'user'           => $this->ion_auth->user($usuario_id)->row(), //BUSCAR USUARIO E ARMAZANAR DENTRO DA VARIAVEL             
                            'perfil_usuario' => $this->ion_auth->get_users_groups($usuario_id)->row(),   //PERFIL_USUARIO RECEBE O description COLUNA DA TABELA

                        );

                        // echo"<>pre";
                        // print_r($data["perfil_usuario"]);
                        // exit();

                        $this->load->view('layout/header', $data);
                        $this->load->view('usuarios/core');
                        $this->load->view('layout/footer');
                    }
                }
            };
        }




        public function username_check($username) {

            $usuario_id = $this->input->post('usuario_id');

            if ($this->core_model->get_by_id('users', array('username' => $username, 'id !=' => $usuario_id))) {
                $this->form_validation->set_message('username_check', "Esse usuário ja existe");
                return FALSE;
            } else {
                return TRUE;
            }
        }




        public function email_check($email) {

            $usuario_id = $this->input->post('usuario_id');

            if ($this->core_model->get_by_id('users', array('email' => $email, 'id !=' => $usuario_id))) {
                $this->form_validation->set_message('email_check', "E-mail ja cadastrado");
                return FALSE;
            } else {
                return TRUE;
            }
        }




        public function del($usuario_id = NULL){

            if(!$usuario_id || !$this->core_model->get_by_id("users", array("id" => $usuario_id)){

                $this->session->set_flashdata("error", "Usuário nâo encontrado");
                
                redirect($this->router->fetch_class());

            }else{

                //DELETAR se nao for administrador

                if($this->ion_auth->is_admin($usuario_id)){

                    $this->session->set_flashdata("error", "Administrador não pode ser Excluido");

                    redirect($this->router->fetch_class());

                }


                //sucesso ao deletar usuarios//

                if($this->ion_auth->delete_user($usuario_id)){

                    $this->session->set_flashdata("sucesso", "registro excluido com sucesso!!!");

                }else{

                    $this->session->set_flashdata("error", "Não foi possivel excluir o registro);

                }

                redirect($this->router->fetch_class());


            }      

        }

    }

?>