<?php
defined('BASEPATH') or exit('No direct script access allowed');

require FCPATH . 'vendor/autoload.php';

// use PhpOffice\PhpSpreadsheet\Spreadsheet;
// use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class EthocaAlerts extends CI_Controller{

  public function __construct() {

    parent::__construct();
    $this->load->model('EthocaAlerts_model');

        if (!$this->ion_auth->logged_in()) {

            redirect('/');
        }
  }

  public function index() {

    $data = array(
      'titulo'     => 'EthocaAlerts Excel',
      'sub_titulo' => 'Importe seu Arquivo Excel para o Banco de Dados Bit Hive!',
    );

    $this->load->view('layout/header');
    $this->load->view('ethocaAlerts/index', $data);
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
    $dados_planilha = $spreadsheet->getActiveSheet()->toArray();  // trazendo o aquivo excel //

    // $salvando_linhas = count($dados_planilha); 

    $incrementar_array = 0;

    foreach ($dados_planilha as $key => $value) {

      $data_salva[$incrementar_array] = array(

        // id = 0
        // 'order_id'                      => $value[0],   //1
        "alert_type"                        => $value[0],  //1
        "ethoca_id"                         => $value[1],
        "alert_date_time"                   => $value[2],
        "alert_age_hours"                   => $value[3],
        "auth_date_time"                    => $value[4],
        "auth_code"                         => $value[5],
        "amount"                            => $value[6],
        "currency"                          => $value[7],
        "card_number"                       => $value[8],
        "shaUm_hashed_card_number"          => $value[9],
        "merchant"                          => $value[10],
        "merchant_descriptor_mid"           => $value[11],
        "issuer_name"                       => $value[12],
        "source"                            => $value[13],
        "transaction_type"                  => $value[14],
        "outcome"                           => $value[15],
        "refunded_not_settled"              => $value[16],
        "partially_stopped_amount"          => $value[17],
        "comments"                          => $value[18],
        "existing_outcome"                  => $value[19],
        "existing_comments"                 => $value[20],
        "outcome_updated_date_time"         => $value[21],
        "outcome_updated_by"                => $value[22],
        "arn"                               => $value[23],
        "transaction_id"                    => $value[24],
        "chargeback_reason_code"            => $value[25],
        "chargeback_amount"                 => $value[26],
        "chargeback_currency"               => $value[27]
     
        // 'charge_id'                     => isset($value[37]) ? $value[37] : '' // 38   // 39 como id
      );

      $incrementar_array++;
    }

    // echo"<pre>";
    // var_dump($dados_planilha);
    // exit();    

    $inserdata = $this->EthocaAlerts_model->inserir_lote($data_salva); //ESTA RECEBENDO o array E INSERINDO LOTES NO DB / insert_batch  -> INSERINDO LOTES

    if ($inserdata > 0) {
      $this->session->set_flashdata('message', '<div class="alert alert-success">Adicionado' . '<?= $inserdata ?>' . ' Registros com sucesso </div>',);
      redirect('MundiPag');
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">Dados Não carregados. Por favor, tente novamente.</div>');
      redirect('MundiPag');
    }
  }
}
