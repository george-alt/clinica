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
			$cirurgia = new CheckList();
			$msg = $cirurgia->setDados();
		}
        else if($metodo == 'getCheckList')
		{
			$cirurgia = new CheckList();
			$msg = $cirurgia->getDadosForInput();
		}
        else if($metodo == 'update')
		{
			$cirurgia = new CheckList();
			$msg = $cirurgia->upDados();
		}
        else if($metodo == 'DadosDel')
		{
			$cirurgia = new CheckList();
			$msg = $cirurgia->delDados();
		}
        else if($metodo == 'DadosUpdate')
		{
            session_start();
			$_SESSION['idCHECKLIST'] = $_POST['idCHECKLIST'];
            $_SESSION['idenCliente'] = $_POST['idenCliente'];
            $_SESSION['ponCompleto'] = $_POST['ponCompleto'];
            $_SESSION['SCD'] = $_POST['SCD'];
            $_SESSION['CAA'] = $_POST['CAA'];
            $_SESSION['conCirurgico'] = $_POST['conCirurgico'];
            $_SESSION['conTransfunsional'] = $_POST['conTransfunsional'];
            $_SESSION['banho'] = $_POST['banho'];
            $_SESSION['horaBanho'] = $_POST['horaBanho'];
            $_SESSION['tricotomia'] = $_POST['tricotomia'];
            $_SESSION['horaTricotomia'] = $_POST['horaTricotomia'];
            $_SESSION['localTricotomia'] = $_POST['localTricotomia'];
            $_SESSION['jejum'] = $_POST['jejum'];
            $_SESSION['inicioJejum'] = $_POST['inicioJejum'];
            $_SESSION['exames'] = $_POST['exames'];
            $_SESSION['RPA'] = $_POST['RPA'];
            $_SESSION['tipoPrecaucao'] = $_POST['tipoPrecaucao'];
            $_SESSION['status'] = $_POST['status'];
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