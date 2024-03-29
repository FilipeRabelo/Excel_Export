<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cancelados_model extends CI_Model {

    public $qntRegistros = 0; // Para registrar o insertDate no flash_data na view de importação

    public function __construct() {
        parent::__construct();
    }

    public function inserir_lote($data_salva = 0) {

        $tamanhoArray      = count($data_salva);  // Aqui conta os elementos no array onde esta sendo inserido as linhas do excel 
        $tamanhoArray      = $tamanhoArray - 1;   // precisa ser -1 por causa da quantidade de linhas q comecam no 0 por causa do id!
        $quantidadeInicial = 10;                  // aqui seta com a quantidade de registros para salvar por vez
        $comparacomArray   = 0;                   // inicia com zero para comparar o incremento de cada
        $quantidade        = 10; //1              // aqui quantidade inicial para ser incrementada 

        if ($data_salva != '') {

            for ($i = 1; $i <= $quantidade; $i++) {   // $i=1

                $this->db->insert('cancelados', $data_salva[$i]);

                // Para registrar o insertDate no flash_data na view de importação
                if ($this->db->affected_rows() > 0) {
                    $this->qntRegistros = $this->qntRegistros + 1;
                }

                if ($i == $tamanhoArray) {

                    $i = $tamanhoArray + 2;
                    return $this->qntRegistros;
                } else {

                    if ($i == $quantidade) {
                        $comparacomArray = $quantidadeInicial + $quantidade;
                        $quantidade = $comparacomArray;
                        //  echo $i." registros";

                    } else {
                    }
                }
            };
        }
    }
}
