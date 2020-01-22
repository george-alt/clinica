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
			$cirurgia = new Trans1_1();
			$msg = $cirurgia->setDados();
		}
        else if($metodo == 'getTrans1')
		{
			$cirurgia = new Trans1_1();
			$msg = $cirurgia->getDadosForInput();
            //lembrete as sessions estão no arquivo de segurança
		}
        else if($metodo == 'update')
		{
			$cirurgia = new Trans1_1();
			$msg = $cirurgia->upDados();
            //lembrete as sessions estão no arquivo de segurança
		}
        else if($metodo == 'DadosDel')
		{
			$cirurgia = new Trans1_1();
			$msg = $cirurgia->delDados();
		}
        else if($metodo == 'DadosUpdate')
		{
            if(!isset($_SESSION))
            {
                session_start();
            }
			$_SESSION['idTRANS1_1'] = $_POST['idTRANS1_1'];
            $_SESSION['idCIRURGIA'] = $_POST['idCIRURGIA'];
            $_SESSION['staff'] = $_POST['staff'];
            $_SESSION['cirurgiao1'] = $_POST['cirurgiao1'];
            $_SESSION['cirurgiao2'] = $_POST['cirurgiao2'];
            $_SESSION['anestesista'] = $_POST['anestesista'];
            $_SESSION['circulante'] = $_POST['circulante'];
            $_SESSION['placaEletrocauterio'] = $_POST['placaEletrocauterio'];
            $_SESSION['UAP'] = $_POST['UAP'];
            $_SESSION['EID'] = $_POST['EID'];
            $_SESSION['CAEEC'] = $_POST['CAEEC'];
            $_SESSION['sanguineas'] = $_POST['sanguineas'];
            $_SESSION['revisaoAnestesista'] = $_POST['revisaoAnestesista'];
            $_SESSION['FEEP'] = $_POST['FEEP'];
            $_SESSION['obser'] = $_POST['obser'];
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