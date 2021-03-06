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
			$cirurgia = new Pos2();
			$msg = $cirurgia->setDados();
		}
        else if($metodo == 'getPos2')
		{
			$cirurgia = new Pos2();
			$msg = $cirurgia->getDadosForInput();
		}
        else if($metodo == 'update')
		{
			$cirurgia = new Pos2();
			$msg = $cirurgia->upDados();
		}
        else if($metodo == 'DadosDel')
		{
			$cirurgia = new Pos2();
			$msg = $cirurgia->delDados();
		}
	}

if(empty($msg) && $metodo != 'getPos2')
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