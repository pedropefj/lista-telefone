<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */

	function __construct()
    {
        parent::__construct();
        $this->load->model('Modelo', 'banco', TRUE);
				$this->load->helper('url');
     }
	
	public function index()
	{
		$data["artigos"] = $this->banco->get_artigos();
		$this->load->view('index',$data);
	}
	
		public function cadastrar_telefone(){
	
		$msg = "";
		$request = array();
		$json = file_get_contents('php://input');
    	$request = json_decode($json, true);
    	$nome = "";
    	$telefone = "";
    	if(!empty($request))
    	{
    		foreach ($request as $key => $val) 
    		{
		        if($key == "nome"){
		        	$nome = $val;
		        }else
					  if($key == "telefone"){
		        	$telefone = $val;
		        }else{
					$msg = "valor enviado invalido";
				}		        
		    }
				$dados = array(
            'nome' => $nome,
            'telefone' => $telefone,
        );
				
				if($this->db->insert('telefones', $dados)){
					$insert_id = $this->db->insert_id();
					$msg = $insert_id;
				}else{
					$msg = "Ocorreu algum erro";
				}				
		}
		else
		{
		    $msg = "Erro ao enviar os dados";
		}
		echo $msg;
		//echo json_encode($response);
	}
	
	public function update_telefone(){
	
		$msg = "";
		$request = array();
		$json = file_get_contents('php://input');
    	$request = json_decode($json, true);
    	$nome = "";
    	$telefone = "";
		$id = "";
    	if(!empty($request))
    	{
    		foreach ($request as $key => $val) 
    		{
		        if($key == "id"){
		        	$id = $val;
		        }else if($key == "nome"){
		        	$nome = $val;
		        }else if($key == "telefone"){
		        	$telefone = $val;
		        }else{
					$msg = "valor enviado invalido";
				}		        
		    }
			$dados = array(
            'nome' => $nome,
            'telefone' => $telefone);
			
				$this->db->where('id', $id);
				if($this->db->update('telefones', $dados)){
					$msg = $id;
				}else{
					$msg = "Ocorreu algum erro";
				}				
		}
		else
		{
		    $msg = "Erro ao enviar os dados";
		}
		echo $msg;
		//echo json_encode($response);
	}
	
	
		public function deletar_telefone($id){
			$resposta = $this->banco->deletar_telefone($id);
			
			echo $resposta;
		}	
	
	
	public function get_telefones(){
		// executa a funcao get_restaurante no nosso model
		$telefones = $this->banco->get_telefones();	
		// declara uma varialvel como array para retorno do json	
		$response = array();
		// foreach para percorrer o array que foi retornado do banco de dados
		foreach($telefones as $tel){
			// declara um novo array para colocar restaurante por restaruante
			$telefone = array();
			$telefone["id"] = $tel->id;
			$telefone["nome"] = $tel->nome;
			$telefone["telefone"] = $tel->telefone;			
			array_push($response, $telefone);
		}
		// faz parce do array para json 
		// OBS: O formato do Json deve corresponder com objeto no seu aplicativo
		// por exemplo deve se conter um objeto Restaurante que contem as variaveis
		//	id,nome,telefone,imgurl
		echo json_encode($response);
	}
	public function get_telefone($id){
		$telefone = $this->banco->get_telefone($id);
	     
		// foreach para percorrer o array que foi retornado do banco de dados
		foreach($telefone as $tel){
			// declara um novo array para colocar restaurante por restaruante
			$telefone = array();
			$telefone["id"] = $tel->id;
			$telefone["nome"] = $tel->nome;
			$telefone["telefone"] = $tel->telefone;			
			
		}
		// faz parce do array para json 
		// OBS: O formato do Json deve corresponder com objeto no seu aplicativo
		// por exemplo deve se conter um objeto Restaurante que contem as variaveis
		//	id,nome,telefone,imgurl
		echo json_encode($telefone);
	}	
}



