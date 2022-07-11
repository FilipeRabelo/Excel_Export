<?php
defined('BASEPATH') or exit('Ação não permitida');

class Usuarios extends CI_Controller
{

    // public function __construct()
    // {

    // }


    public function index()
    {  //chama o modulo usuario

        //ARQUIVOS SENDO ENVIADOS PARA A VIEW 

        $data = array(

            'titulo'        => 'Usuarios cadastrados',
            'sub_titulo'    => 'Listando Usuários cadastrados no Banco de Dados!',
            'users' => $this->ion_auth->users()->result(), // BUSCAR USUARIOS E ENVIAR PARA A VIEW //

            'styles'        => array(
                '../plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css',
            ),

            'scripts'        => array(
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

    public function core($usuario_id = NULL)
    {  //chama o modolo usuario

        if (!$usuario_id) {   // cadastro de novo usuario        

            exit('Pode cadastrar novo usuario');
        } else {

            if (!$this->ion_auth->user($usuario_id)->row()) {   // EDITAR O USUARIO // 

                exit('Usuario nao existe');
            } else {

                $perfil_atual =
                    $user_groups = $this->ion_auth->get_users_groups($usuario_id)->row();

                //validação

                $this->form_validation->set_rules('first_name',  'Nome',       'trim|required|mim_length[6]|max_length[50]');
                $this->form_validation->set_rules('last_name',   'Sobre-Nome', 'trim|required|mim_length[6]|max_length[50]');
                $this->form_validation->set_rules('username',    'Usuario',    'trim|required|mim_length[6]|max_length[50]|callback_username_check');
                $this->form_validation->set_rules('email',       'E-Mail',     'trim|valid_email|required|mim_length[6]|max_length[50]|callback_email_check');
                $this->form_validation->set_rules('password',    'Password',   'trim|mim_length[8]|max_length[50]');
                $this->form_validation->set_rules('confirmacao', 'Confirma',   'trim|mim_length[8]|max_length[50]|matches[password]');

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

                    echo "<pre>";
                    print_r($perfil_atual);
                    exit();

                    //update 
                    if ($this->ion_auth->update($usuario_id, $data)) {   //Atualizar os dados

                        $this->session->set_flashdata("sucesso", "Dados atualizado com sucesso");  //Se atualizou
                    } else {

                        $this->session->set_flashdata("error", "Não foi possivel Atualizar os Dados!!!");
                    }

                    redirect($this->router->fetch_class());  //Mandando msg para o index(view)


                } else {

                    $data = array(   // ERRO DE VALIDAÇÂO

                        'titulo'         => 'Editar Usuários',
                        'sub_titulo'     => 'Chegou a hora de editar o Usuário!',
                        'user'           => $this->ion_auth->user($usuario_id)->row(), //BUSCAR USUARIO E ARMAZANAR DENTRO DA VARIAVEL             
                        'perfil_usuario' => $this->ion_auth->get_users_groups($usuario_id)->row(),   //PERFIL_USUARIO RECEBE O description COLUNA DA TABELA

                    );

                    $this->load->view('layout/header', $data);
                    $this->load->view('usuarios/core');
                    $this->load->view('layout/footer');
                }
            }
        };
    }

    public function username_check($username)
    {

        $usuario_id = $this->input->post('usuario_id');

        if ($this->core_model->get_by_id('users', array('username' => $username, 'id !=' => $usuario_id))) {
            $this->form_validation->set_message('username_check', "Esse usuário ja existe");
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function email_check($email)
    {

        $usuario_id = $this->input->post('usuario_id');

        if ($this->core_model->get_by_id('users', array('email' => $email, 'id !=' => $usuario_id))) {
            $this->form_validation->set_message('email_check', "E-mail ja cadastrado");
            return FALSE;
        } else {
            return TRUE;
        }
    }
}
