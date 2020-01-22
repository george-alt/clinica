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
			$cirurgia = new Cirurgia();
			$msg = $cirurgia->setDados();
		}
        else if($metodo == 'update')
		{
			$cirurgia = new Cirurgia();
			$msg = $cirurgia->upDados();
            
		}
        else if($metodo == 'DadosDel')
		{
			$cirurgia = new Cirurgia();
			$msg = $cirurgia->delDados();
		}
        else if($metodo == 'DadosUpdate')
		{
            session_start();
			$_SESSION['idCirurgia'] = $_POST['idCirurgia'];
            $_SESSION['paciente'] = $_POST['paciente'];
            $_SESSION['medico'] = $_POST['medico'];
            $_SESSION['descricao'] = $_POST['descricao'];
            $_SESSION['status'] = $_POST['status'];
            $_SESSION['data'] = $_POST['data'];
            $_SESSION['hora'] = $_POST['hora'];
            $_SESSION['enfermeiro'] = $_POST['enfermeiro'];
		}
        else if($metodo == 'setServicos')
		{
            session_start();
			$_SESSION['idCirurgia'] = $_POST['idCirurgia'];
            $_SESSION['nomePaciente'] = $_POST['nomePaciente'];
            $_SESSION['paciente'] = $_POST['paciente'];
            $_SESSION['tipoEx'] = $_POST['tipoEx'];
		}
        else if($metodo == 'setServicosMenu')
		{
            session_start();
            $_SESSION['tipoEx'] = $_POST['tipoEx'];
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