<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Modelo extends CI_Model
{
    function __construct()
    {
        parent::__construct();
   }
	//-------------------------------------- IONIC ----------------------


     function get_telefones(){			
		
		//Seta from
        $this->db->from('telefones as tel');
		//Executa a query
        $query = $this->db->get();
		//Verifica se retornou alguma informacao
        if ($query->num_rows() > 0)
        {
            $data = $query->result();
			//Retorna o resultado da query
            return $data;
        }
        else
            return array();				
	}
	function get_telefone($id){
		$this->db->where('id', $id);
		$query = $this->db->get('telefones');
        if ($query->num_rows() > 0) 
        {
            $data = $query->result();
            return $data;
        }
        else
            return array();
	}
	
	function deletar_telefone($id){
		$this->db->where('id', $id);
		$query = $this->db->delete('telefones');
		echo $query;
        if ($query) 
        {
            return "sucesso";
        }
        else
            return "error";
	}
    
}

?>
