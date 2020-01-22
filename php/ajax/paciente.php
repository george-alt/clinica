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
			$cirurgia = new Paciente();
			$msg = $cirurgia->setDados();
		}
        else if($metodo == 'update')
		{
			$cirurgia = new Paciente();
			$msg = $cirurgia->upDados();
            
		}
        else if($metodo == 'DadosDel')
		{
			$cirurgia = new Paciente();
			$msg = $cirurgia->delDados();
		}
        else if($metodo == 'DadosUpdate')
		{
            session_start();
			$_SESSION['idPACIENTE']     = $_POST['idPACIENTE'];
            $_SESSION['nome']           = $_POST['nome'];
            $_SESSION['dataNasc']       = $_POST['dataNasc'];
            $_SESSION['sexo']           = $_POST['sexo'];
            $_SESSION['cep']            = $_POST['cep'];
            $_SESSION['endereco']       = $_POST['endereco'];
            $_SESSION['bairro']         = $_POST['bairro'];
            $_SESSION['cidade']         = $_POST['cidade'];
            $_SESSION['uf']             = $_POST['uf'];
            $_SESSION['numero']         = $_POST['numero'];
            $_SESSION['complemento']    = $_POST['complemento'];
            $_SESSION['telefone']       = $_POST['telefone'];
            $_SESSION['status']         = $_POST['status'];
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