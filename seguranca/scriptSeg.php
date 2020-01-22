<?php
	session_start();
    ini_set('display_errors',1);
    ini_set('display_startup_erros',1);
    error_reporting(E_ALL);
    
    function __autoload($class)
    {
		if(file_exists("php/{$class}.class.php"))
        {
            include_once "php/{$class}.class.php";
        }
        else if(file_exists("../{$class}.class.php"))
        {
            include_once "../{$class}.class.php";
        }
        elseif(file_exists("../php/{$class}.class.php"))
        {
            include_once "../php/{$class}.class.php";
        }
		elseif(file_exists("../../php/{$class}.class.php"))
        {
            include_once "../../php/{$class}.class.php";
        }
		else if(file_exists("../../banco/{$class}.class.php"))
        {
            include_once "../../banco/{$class}.class.php";
        }
		else if(file_exists("banco/{$class}.class.php"))
        {
            include_once "banco/{$class}.class.php";
        }
		else if(file_exists("../banco/{$class}.class.php"))
        {
            include_once "../banco/{$class}.class.php";
        }
		else if(file_exists("../../../banco/{$class}.class.php"))
        {
            include_once "../../../banco/{$class}.class.php";
        }
        else
        {
            //se nao existir, lanca um erro
            throw new Exception("Arquivo '{$class}.class.php' nao encontrado");
            
        }
    }
		$usuario = new Usuario();
	
		$url = substr($_SERVER["REQUEST_URI"], strpos($_SERVER["REQUEST_URI"], '/'));
		$result = str_replace("/", " ", $url);
		$arrayUrl = explode(" ",$result);
		
		if(in_array("colaboradores.php", $arrayUrl) || in_array("servico_cirurgico.php", $arrayUrl) || in_array("paciente.php", $arrayUrl))
		{
			$usuario->sessionDestroy();
		}
		
		
		
		$usuario->protege();//deve ficar em ultimo
    
    
	

?>