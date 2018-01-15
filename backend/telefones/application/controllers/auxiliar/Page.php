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
	
	public function cadastrar_usuario_ionic(){	
		$msg = "";
		$request = array();
		$json = file_get_contents('php://input');
    	$request = json_decode($json, true);
    	$nome = "";
    	$email = "";
		$password = "";
    	if(!empty($request))
    	{
    		foreach ($request as $key => $val) 
    		{
		        if($key == "nome"){
		        	$nome = $val;
		        }else
				if($key == "email"){
		        	$email = $val;
		        }else
		        if($key == "password"){		        	
					$password = $val;//password_hash($val, PASSWORD_DEFAULT);
		        }else{
					$msg = "valor enviado invalido";
				}		        
		    }
			$dados = array(
				'nome' => $nome,
				'email' => $email,
				'password' => $password
			);
			if($this->db->insert('usuarios_app', $dados)){
				$insert_id = $this->db->insert_id();
				$msg = $insert_id."|sucesso";
			}else{
				$msg = "Ocorreu algum erro";
			}				
		}
		else{
		    $msg = "Erro ao enviar os dados";
		}
		echo $msg;		
	}
	//-------------------------------------------------------
	public function login_ionic(){
		$msg = "";
		$request = array();
		$json = file_get_contents('php://input');
    	$request = json_decode($json, true);
    	$email = "";
			$password = "";
    	if(!empty($request))
    	{
    		foreach ($request as $key => $val) 
    		{
					  if($key == "email"){
		        	$email = $val;
		        }else
		        if($key == "password"){
		        	$password = $val;//password_hash($val, PASSWORD_DEFAULT);
		        }else{
							$msg = "valor enviado invalido";
						}		        
		    }
				$retornoLogin = $this->banco->validate_login($email,$password);
				if($retornoLogin){
					foreach($retornoLogin as $ret)
					$user_id = $ret->id;
					$msg = $user_id."|sucesso";
				}else{
					$msg = "inválidos";
				}			
		}
		else
		{
		    $msg = "Erro ao enviar os dados";
		}
		echo $msg;
	}
	

}



