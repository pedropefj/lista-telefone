<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pedido extends CI_Controller {

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
        $this->load->model('PedidoModel', 'banco', TRUE);
				$this->load->helper('url');
     }
	
	public function cadastrar_pedido_ionic(){
	
		$msg = "";
		$request = array();
		$json = file_get_contents('php://input');
		$request = json_decode($json, true);
		$cardapio_id = "";
		$usuario_id = "";
		$valor = "";
		$taxa_entrega = "";
		$nome = "";
		$email = "";
		$observacao = "";
    if(!empty($request))
    {
    	foreach ($request as $key => $val) 
    	{
				if($key == "cardapioId"){
		    	$cardapio_id = $val;
		    }else
		  	if($key == "usuarioId"){
		    	$usuario_id = $val;
		    }else
				if($key == "valor"){
		    	$valor = $val;
		    }else
				if($key == "taxaEntrega"){
		    	$taxa_entrega = $val;
		    }else
				if($key == "email"){
		    	$email = $val;
		    }else
		    if($key == "nome"){
		    	$nome = $val;
		    }else
		    if($key == "observacao"){
		    	$observacao = $val;
		    }else
				{
					$msg = "valor enviado invalido";
				}		        
		 	}
			$dados = array(
            'cardapio_id' => $cardapio_id,
            'usurarios_id' => $usuario_id,
			'valor' => $valor,
			'taxa_entrega' => $taxa_entrega,
			'nome' => $nome,
            'email' => $email
      );
				if($this->db->insert('pedidos', $dados)){
					$msg = "Registro gravado com sucesso";
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
}



