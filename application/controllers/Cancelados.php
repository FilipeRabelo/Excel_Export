<?php
defined('BASEPATH') or exit('No direct script access allowed');

require FCPATH . 'vendor/autoload.php';

    class Cancelados extends CI_Controller {

        public function __construct() {
            parent::__construct();
            $this->load->model('Cancelados_model');

            if (!$this->ion_auth->logged_in()) {

                redirect('/');
            }
        }

        public function index() {

            $data = array(
            'titulo'     => 'Cancelados',
            'sub_titulo' => 'Importe seu Arquivo Excel para o Banco de Dados Bit Hive!',
            );

            $this->load->view('layout/header');
            $this->load->view('cancelados/index', $data);
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
            $dados_planilha = $spreadsheet->getActiveSheet('Cancelados')->toArray();  // trazendo a aba Chargeback do aquivo excel //

            $incrementar_array = 0;

            foreach ($dados_planilha as $key => $value) {
                
                $data_salva[$incrementar_array] = array(

                'stone_id'                      => $value[0],
                'hora_da_venda'                 => convertDataJulianExcel($value[1]),
                'valor_bruto'                   => $value[2],
                'data_cancelamento'             => convertDataJulianExcel($value[3]),
                'desconto_em_agenda'            => $value[4],
                'mes'                           => $value[5],
                'ano'                           => $value[6],
                'transacao_paga_cappta'         => $value[7],
                'transacao_descontada_CBK'      => $value[8],
                'pagamento_retido'              => $value[9],
                'data'                          => convertDataJulianExcel($value[10]),
                'valor'                         => $value[11]
                 
                // 'mes'                 => isset($value[27]) ? $value[27] : ''  //28  

                );             

                // echo "<pre>";
                // print_r($dados_planilha);
                // exit();
              
                $incrementar_array++;            
            }

            $inserdata = $this->Cancelados_model->inserir_lote($data_salva); //ESTA RECEBENDO o array E INSERINDO LOTES NO DB / insert_batch  -> INSERINDO LOTES

            if ($inserdata > 0) {
            $this->session->set_flashdata('message', '<div class="alert alert-success">Adicionado com sucesso . <?= $qntRegistros => </div>', );
            redirect('Cancelados');
            } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Dados Não carregados. Por favor, tente novamente.</div>');
            redirect('Cancelados');
            }

        }

    }

?>
