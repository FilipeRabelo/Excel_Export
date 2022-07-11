<?php
defined('BASEPATH') or exit('No direct script access allowed');

require FCPATH . 'vendor/autoload.php';

// use PhpOffice\PhpSpreadsheet\Spreadsheet;
// use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class MundiPag extends CI_Controller{

  public function __construct() {
    parent::__construct();
    $this->load->model('mundipag_model');
  }

  public function index() {

    $data = array(
      'titulo'     => 'MundiPag',
      'sub_titulo' => 'Importe seu Arquivo Excel para o Banco de Dados Bit Hive!',
    );

    $this->load->view('layout/header');
    $this->load->view('mundipag/index', $data);
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

        'order_id'                      => $value[0],   //1
        'code'                          => $value[1],   //2          
        'status'                        => $value[2],   //3
        'amount__in_cents'              => $value[3],   //4
        'created_date'                  => $value[4],   //5
        'updated_at'                    => $value[5],   //6
        'closed'                        => $value[6],   //7
        'closed_date'                   => $value[7],   //8
        'customer_id'                   => $value[8],   //9  
        'customer_name'                 => $value[9],   //10
        'customer_email'                => $value[10],  //11
        'customer_type'                 => $value[11],  //12
        'customer_document'             => $value[12],  //13
        'customer_address_street'       => $value[13],  //14
        'customer_address_neighborhood' => $value[14],  //15
        'customer_address_number'       => $value[15],  //16
        'customer_address_city'         => $value[16],  //17
        'customer_address_state'        => $value[17],  //18
        'customer_address_country'      => $value[18],  //19
        'customer_zipe_code'            => $value[19],  //20
        'customer_address_id'           => $value[20],  //21
        'customer_home_phone'           => $value[21],  //22
        'customer_cell_phone'           => $value[22],  //37
        'shipping_amount'               => $value[23],  //23
        'shipping_description'          => $value[24],  //24
        'shipping_recipient_name'       => $value[25],  //25 
        'shipping_recipient_phone'      => $value[26],  //26
        'shipping_address_street'       => $value[27],  //27
        'shipping_address_neighborhood' => $value[28],  //28
        'shipping_address_number'       => $value[29],  //29
        'shipping_address_city'         => $value[30],  //30
        'shipping_address_state'        => $value[31],  //31
        'shipping_address_country'      => $value[32],  //32
        'shipping_address_zip_code'     => $value[33],  //36
        'plataform_name'                => $value[34],  //33
        'metadata'                      => $value[35],  //34
        'isChecKout'                    => $value[36],  //35
        'charge_id'                     => isset($value[37]) ? $value[37] : '' //38   

      );

      $incrementar_array++;
    }

    // echo"<pre>";
    // var_dump($dados_planilha);
    // exit();    

    $inserdata = $this->mundipag_model->inserir_lote($data_salva); //ESTA RECEBENDO o array E INSERINDO LOTES NO DB / insert_batch  -> INSERINDO LOTES

    if ($inserdata > 0) {
      $this->session->set_flashdata('message', '<div class="alert alert-success">Adicionado com sucesso . <?= $qntRegistros => </div>',);
      redirect('mundipag/index');
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">Dados Não carregados. Por favor, tente novamente.</div>');
      redirect('mundipag/index');
    }
  }
}
