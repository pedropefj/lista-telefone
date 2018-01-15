<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Restaurante extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->model('TelefoneModel', 'telefone', TRUE);
		$this->load->helper('url');
    } 
	 
	public function get_telefone(){
		// executa a funcao get_restaurante no nosso model
		$telefones = $this->telefone->get_telefones();	
		// declara uma varialvel como array para retorno do json	
		$response = array();
		// foreach para percorrer o array que foi retornado do banco de dados
		foreach($telefones as $tel){
			// declara um novo array para colocar restaurante por restaruante
			$telefone = array();
			$telefone["id"] = $tel->id;
			$telefone["nome"] = $tel->nome;
			$telefone["email"] = $tel->email;
			$telefone["telefone"] = $tel->telefone;			
			array_push($response, $telefone);
		}
		// faz parce do array para json 
		// OBS: O formato do Json deve corresponder com objeto no seu aplicativo
		// por exemplo deve se conter um objeto Restaurante que contem as variaveis
		//	id,nome,telefone,imgurl
		echo json_encode($response);
	}
	
	
}