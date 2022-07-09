<?php 

  defined('BASEPATH') or exit('No direct script access allowed');

    //$data sao os dados para serem inseridos ou atualizados
    //$condition é um array de condições

  class Core_model extends CI_Model{


    public function get_all($table = NULL, $condition = NULL){  // GET_ALL RECEBE A TABELA com parametros E O ARRAY com condições

      if($table && table_exists($table)){  // SE FOI PASSADO A TABELA (STRING) E SE ELA EXISTE
        
        if(is_array($condition)){  // E SE FOI PASSADO MEU ARRAY DE CONDIÇÕES E SE ELE FOR UM ARRAY VOU PASSAR UM WHERE NO BD (ARRAY) 

          $this->db->where($condition);

        }
        //SE NAO FOI PASSADO O CONDITION
        return $this->db->get($table)->result();

      }else{
        return FAlSE;
      }
    }

    public function get_by_id($table = NULL, $condition = NULL){

      if ($table && table_exists($table) && is_array($condition)) {  // SE FOI PASSADO A TABELA (STRING), SE ELA EXISTE E SE CONDITION FOR UM ARRAY...

        $this->db->where($condition);
        $this->db->limit(1);          //retorna uma linha

        //SE NAO FOI PASSADO O CONDITION
        return $this->db->get($table)->row();

      }else{
        return FAlSE;
      }
    }

    public function insert($table = NULL, $data = NULL){

      if($table && table_exists($table) && is_array($data)){ //SE FOI PASSADO A $TABLE E SE ELA EXISTE E SE $DATA FOI PASSADA E É UM ARRAY

        $this->db->insert($table, $data);

        if($this->db->affected_rows() > 0){ //SE AFFECTED_ROWS FOR MAIOR Q ZERO SIGNIFICA Q HOUVE INSERÇÃO NO BANCO

          $this->session->set_flashdata("sucesso", "Dados Salvos com Sucesso");

        }else{
          $this->session->set_flashdata("error", "Não foi possivel salvar os Dados");
        }
        
      }else{ //SE NAO ATENDEU A CONDIÇÃO
        return FALSE;
      }
    }

    //$data sao os dados para serem inseridos ou atualizados
    //$condition é um array de condições

    // PARA ATUALIZAR A TABELA 

    public function update($table = NULL, $data = NULL, $condition = NULL){ // 

      //SE FOIPASSADO A TABLE, SE ELA EXISTE, SER É UM ARRAY E CONDITION FOR UM ARRAY
      if($table && table_exists($table) && is_array($table) && is_array($condition)){ // tudo precisar ser verdadiro para atualizar a tabela

        //ANTES DE CHAMAR O METODO É PRECISO VERIFICAR
        if($this->db->update($table, $data, $condition)){

          //se tudo for verdadeiro vamso printar 
          $this->session->set_flashdata("sucesso", "Dados salvos com Sucesso");

        }else{
          $this->session->set_flashdata("error", "Não foi Salvar os dados");
        }

        $this->db->update($table, $data);

      }else{
        return FALSE;
      }

    }

    public function delete($table = NULL, $condition = NULL){

      if($table && table_exists($table) && is_array($condition)){

        if($this->db->delete($table, $condition)){

        $this->session->set_flashdata("sucesso", "Registro Excluido com Sucesso");

        }else{
          $this->session->set_flashdata("error", "Não possivel excluir o registro");
        }

      }else{
        return FALSE;
      }

    }


  }

?>