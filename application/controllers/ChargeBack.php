<?php
defined('BASEPATH') or exit('No direct script access allowed');

require FCPATH . 'vendor/autoload.php';

    class ChargeBack extends CI_Controller {

        public function __construct() {
            parent::__construct();
            $this->load->model('ChargeBack_model');

            if (!$this->ion_auth->logged_in()) {

                redirect('/');
            }
        }

        public function index() {

            $data = array(
            'titulo'     => 'ChargeBack',
            'sub_titulo' => 'Importe seu Arquivo Excel para o Banco de Dados Bit Hive!',
            );

            $this->load->view('layout/header');
            $this->load->view('chargeback/index', $data);
            $this->load->view('layout/footer');
        }
            
        public function spreadsheet_import() {
            
            //variavel fazendo o upload do arquivo
            $upload_file = $_FILES['upload_file']['name'];

            //Extensao
            $extension = pathinfo($upload_file, PATHINFO_EXTENSION);

            if ($extension == 'csv') {
            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
            } else if ($extension == 'xls') {
            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
            } else {
            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            }

            // spreadsheet recebendo a extensao do arquivo e a linha do excel
            $reader->setReadDataOnly(true);
            $spreadsheet = $reader->load($_FILES['upload_file']['tmp_name']);

            // sheetdata recebendo o arquivo com a extensao
            $dados_planilha = $spreadsheet->getActiveSheet('Chargeback')->toArray();  // trazendo a aba Chargeback do aquivo excel //

            $incrementar_array = 0;

            foreach ($dados_planilha as $key => $value) {
                
                $data_salva[$incrementar_array] = array(

                    'stoneCode'           => $value[0],   //1
                    'nomeFantasia'        => $value[1],   //2          
                    'stoneId'             => $value[2],   //3
                    'bandeira'            => $value[3],   //4
                    'tipoTransacao'       => $value[4],   //5
                    'd_c'                 => $value[5],   //6            
                    'dataTransacao'       => convertDataJulianExcel($value[6]),,   //7 
                    'authorizationCode'   => $value[7],   //8
                    'valorTotalTransacao' => $value[8],   //9  
                    'numeroDeParcelas'    => $value[9],   //10
                    'valorParcela'        => $value[10],  //11
                    'parcela'             => $value[11],  //12
                    'panMascarado'        => $value[12],  //13
                    'dataCBK'             => convertDataJulianExcel($value[13]), 
                    'tipoChargeback'      => $value[14],  //15
                    'arn'                 => $value[15],  //16
                    'mensagemEmissor'     => $value[16],  //17
                    'reasonCode'          => $value[17],  //18
                    'posEntryMode'        => $value[18],  //19
                    'emissor'             => $value[19],  //20
                    'comercio'            => $value[20],  //21
                    'status'              => $value[21],  //22
                    'grupo'               => $value[22],  //23
                    'descrição'           => $value[23],  //24
                    'itk'                 => $value[24],  //25 
                    'valordoChargeback'   => $value[25],  //26
                    'pagoOuNao'           => $value[26],  //27
                    'mes'                 => isset($value[27]) ? $value[27] : ''  //28  

                );

                $incrementar_array++;            
            }

            $inserdata = $this->ChargeBack_model->inserir_lote($data_salva); //ESTA RECEBENDO o array E INSERINDO LOTES NO DB / insert_batch  -> INSERINDO LOTES

            if ($inserdata > 0) {
            $this->session->set_flashdata('message', '<div class="alert alert-success">Adicionado com sucesso . <?= $qntRegistros => </div>', );
            redirect('ChargeBack');
            } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Dados Não carregados. Por favor, tente novamente.</div>');
            redirect('ChargeBack');
            }

        }

    }

?>
