<?php

//Altera o cabeçalho para não gerar cache do resultado
header('Cache-Control: no-cache, must-revalidate'); 
//Altera o cabeçalho para que o retorno seja do tipo JSON
header('Content-Type: application/json; charset=utf-8');

function __autoload($class)
    {
        if(file_exists("../{$class}.class.php"))
        {
            include_once "../{$class}.class.php";
        }
		else if(file_exists("../../banco/{$class}.class.php"))
        {
            include_once "../../banco/{$class}.class.php";
        }
        else
        {
            //se nao existir, lanca um erro
            throw new Exception("Arquivo '{$class}.class.php' nao encontrado");
            
        }
    }
	
	if ($_SERVER['REQUEST_METHOD']=='POST')
	{
		$metodo = $_POST['metodo'];
		
		if($metodo == 'add')
		{
			$cirurgia = new Colaboradores();
			$msg = $cirurgia->setDados();
		}
        else if($metodo == 'getDados')
		{
			$cirurgia = new Colaboradores();
			$msg = $cirurgia->getDados();
            
		}
        else if($metodo == 'getDadosUp')
		{
			$cirurgia = new Colaboradores();
			$msg = $cirurgia->getDadosUp();
            
		}
        else if($metodo == 'update')
		{
			$cirurgia = new Colaboradores();
			$msg = $cirurgia->upDados();
            
		}
        else if($metodo == 'DadosDel')
		{
			$cirurgia = new Colaboradores();
			$msg = $cirurgia->delDados();
		}
        else if($metodo == 'DadosUpdate')
		{
            session_start();
			$_SESSION['idColaboradores'] = $_POST['idColaboradores'];
		}
        
	}

if(empty($msg))
{
	//Converte o array em um objecto json
	echo json_encode(array('msg' => 'Executado com sucesso', 'tipo' => 'success', 'titulo' => 'Sucesso:'));
}
else
{
	//Converte o array em um objecto json
	echo json_encode(array('msg' => $msg, 'tipo' => 'warning', 'titulo' => 'Error:'));
}
        
    
?>