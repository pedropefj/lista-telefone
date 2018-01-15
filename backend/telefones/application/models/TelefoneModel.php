<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class RestauranteModel extends CI_Model
{
   function __construct()
   {
        parent::__construct();
   }
   function get_telefones(){	
		//Inicio da montagem do select 
		$this->db->select('tel.id as id, 
		tel.nome as nome, 
		tel.email as email
		tel.telefone as telefone');
		
		//Seta from
        $this->db->from('telefone as tel');
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
}