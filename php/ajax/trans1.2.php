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
			$cirurgia = new Trans1_2();
			$msg = $cirurgia->setDados();
		}
        else if($metodo == 'getTrans3')
		{
			$cirurgia = new Trans1_2();
			$msg = $cirurgia->getDadosForInput();
            //lembrete as sessions estão no arquivo de segurança
		}
        else if($metodo == 'update')
		{
			$cirurgia = new Trans1_2();
			$msg = $cirurgia->upDados();
            //lembrete as sessions estão no arquivo de segurança
		}
        else if($metodo == 'DadosDel')
		{
			$cirurgia = new Trans1_2();
			$msg = $cirurgia->delDados();
		}
        else if($metodo == 'DadosUpdate')
		{
            if(!isset($_SESSION))
            {
                session_start();
            }
			$_SESSION['idTRANS1_2'] = $_POST['idTRANS1_2'];
            $_SESSION['idCIRURGIA'] = $_POST['idCIRURGIA'];
            $_SESSION['precedimentoRealizado'] = $_POST['precedimentoRealizado'];
            $_SESSION['CCAIC'] = $_POST['CCAIC'];
            $_SESSION['PACIARP'] = $_POST['PACIARP'];
            $_SESSION['HAPER'] = $_POST['HAPER'];
            $_SESSION['RIRPAPOC'] = $_POST['RIRPAPOC'];
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