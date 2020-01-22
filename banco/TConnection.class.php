<?php
/*
 *classe Conexao
 *gerencia conexoes com bancos de dados atraves de arquivos de configuraçao
 */

 final class TConnection
 {
    private function __construct(){}
    
    
    /*
     *metodo open()
     *recebe o nome do banco de dados e instancia o objeto PDO corrrespondente
    */
    
    public static function open($name)
    {
        try
        {
           //verifica se existe arquivo de configuracao para este bando de dados local
           if(file_exists("banco/app.config/{$name}.ini"))
           {
               //le o INI e retorna um array
               $db = parse_ini_file("banco/app.config/{$name}.ini");
               
           }
          else if(file_exists("../banco/app.config/{$name}.ini"))
           {
               //le o INI e retorna um array
               $db = parse_ini_file("../banco/app.config/{$name}.ini");
               
           }
           else if(file_exists("../../banco/app.config/{$name}.ini"))
           {
               //le o INI e retorna um array
               $db = parse_ini_file("../../banco/app.config/{$name}.ini");
               
           }
           else if(file_exists("../../../banco/app.config/{$name}.ini"))
           {
               //le o INI e retorna um array
               $db = parse_ini_file("../../../banco/app.config/{$name}.ini");
           }
           else
           {
                //verifica se existe arquivo de configuracao para este bando de dados web
                $name = $name."WEB";
                if(file_exists("banco/app.config/{$name}.ini"))
                {
                        $db = parse_ini_file("banco/app.config/{$name}.ini");
                }
                else if(file_exists("../banco/app.config/{$name}.ini"))
                {
                        $db = parse_ini_file("../banco/app.config/{$name}.ini");
                }
                else if(file_exists("../../banco/app.config/{$name}.ini"))
                {
                        $db = parse_ini_file("../../banco/app.config/{$name}.ini");
                }
                else if(file_exists("../../../banco/app.config/{$name}.ini"))
                {
                    //le o INI e retorna um array
                    $db = parse_ini_file("../../../banco/app.config/{$name}.ini");
                    
                }
           
                else
                {
                    //se nao existir, lanca um erro
                    
                    throw new Exception("Arquivo '$name' nao encontrado");
                    
                }
            }
           
           //le as informacoes contidas no arquivo
           
           $user = isset($db['user']) ? $db['user'] : NULL;
           $pass = isset($db['pass']) ? $db['pass'] : NULL;
           $name = isset($db['name']) ? $db['name'] : NULL;
           $host = isset($db['host']) ? $db['host'] : NULL;
           $type = isset($db['type']) ? $db['type'] : NULL;
           $port = isset($db['port']) ? $db['port'] : NULL;
           
           $opcoes = array(
               PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8'
           );
           
           //descobre qual o tipo (driver) de banco de dados a ser utilizado
           
           switch($type)
           {
               case 'pgsql':
                   $port = $port ? $port : '5432';
                   $conn = new PDO("pgsql:dbname={$name}; user={$user}; password={$pass}; host=$host; port={$port}");
                   break;
               
               case 'mysql':
                   $port = $port ? $port : '3306';
                   $conn = new PDO("mysql:host={$host}; port={$port}; dbname={$name}", $user, $pass,$opcoes);
                   break;
               
               case 'sqlite':
                   $conn = new PDO("sqlite:{$name}");
                   break;
               
               case 'ibase':
                   $conn = new PDO("firebird:dbname={$name}", $user, $pass);
                   break;
               
               case 'oci8':
                   $conn = new PDO("oci:dbname={$name}", $user, $pass);
                   break;
               
               case 'mssql':
                   $conn = new PDO("mssql:host={$host}, 1433, dbname={$name}", $user, $pass);
                   break;
           }
           
           //define para o PDO lance exececoes na ocorrencia de erros
           
           $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
           
           //retorna o objeto instancia
           
           return $conn;
        }
         catch(Exception $e)
        {
            //exibe a messagem de erro
            echo $e->getMessage();
            echo "<br><br>
                 <span style='color: red'>OBS: Verifique no arquivo TConnection.class.php na pasta NMHAIR/banco
                 qual o arquivo de configuração esta sendo selecionado</span>
                 <br><br>";
        }
    }
 }
 
?>