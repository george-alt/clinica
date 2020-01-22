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
			$consulta = new Consulta();
			$msg = $consulta->setDados();
		}
        else if($metodo == 'getConsulta')
		{
			$consulta = new Consulta();
			$msg = $consulta->getDadosForInput();
		}
        else if($metodo == 'update')
		{
			$consulta = new Consulta();
			$msg = $consulta->upDados();
		}
        else if($metodo == 'DadosDel')
		{
			$consulta = new Consulta();
			$msg = $consulta->delDados();
		}
        else if($metodo == 'DadosUpdate')
		{
            session_start();
			$_SESSION['idCONSULTA'] = $_POST['idCONSULTA'];
            $_SESSION['nome'] = $_POST['nome'];
            $_SESSION['dataNasc'] = $_POST['dataNasc'];
            $_SESSION['leito'] = $_POST['leito'];
            $_SESSION['dataInternacao'] = $_POST['dataInternacao'];
            $_SESSION['pcp'] = $_POST['pcp'];
            $_SESSION['pca'] = $_POST['pca'];
            $_SESSION['pa'] = $_POST['pa'];
            $_SESSION['t'] = $_POST['t'];
            $_SESSION['f'] = $_POST['f'];
            $_SESSION['fr'] = $_POST['fr'];
            $_SESSION['cirurgiaAnterior'] = $_POST['cirurgiaAnterior'];
            $_SESSION['comorbidades'] = $_POST['comorbidades'];
            $_SESSION['observacaoComorbidades'] = $_POST['observacaoComorbidades'];
            $_SESSION['examesDiponiveis'] = $_POST['examesDiponiveis'];
            $_SESSION['medicacaoDomicilio'] = $_POST['medicacaoDomicilio'];
            $_SESSION['tabagista'] = $_POST['tabagista'];
            $_SESSION['etilista'] = $_POST['etilista'];
            $_SESSION['alergias'] = $_POST['alergias'];
            $_SESSION['observacaoAlergias'] = $_POST['observacaoAlergias'];
            $_SESSION['rpi'] = $_POST['rpi'];
            $_SESSION['rdc'] = $_POST['rdc'];
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