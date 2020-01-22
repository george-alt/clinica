<?php

    final class Factory
    {
        public function ExecuteDataSet($sql)
        {
            try
            {
                //abre uma transacao
                $conn = TTransaction::open('BD');
                //define a estrategia de log
                if(file_exists('banco/log/arquivo.html'))
                {
                    $logLink = 'banco/log/arquivo.html';
                }
                elseif(file_exists('../banco/log/arquivo.html'))
                {
                    $logLink = '../banco/log/arquivo.html';
                }
                elseif(file_exists('../../banco/log/arquivo.html'))
                {
                    $logLink = '../../banco/log/arquivo.html';
                }
                elseif(file_exists('../../../banco/log/arquivo.html'))
                {
                    $logLink = '../../../banco/log/arquivo.html';
                }
                else
                {
                    throw new Exception("arquivo log não foi encontrado");
                }
                TTransaction::setLogger(new TLoggerHTML($logLink));
                //escreve menssagem log
                TTransaction::log("get table");
                
                //obtem a conexao ativa
                $conn = TTransaction::get();
                
                //executa o sql
                $result = $conn->query($sql);
                
                //escreve menssagem LOG
                TTransaction::log($sql);
                
                $arrayResult = [];
                
                while ($row = $result->fetch(PDO::FETCH_ASSOC))
                {
                    array_push($arrayResult,$row);
                }
                
                return $arrayResult;
                
                TTransaction::commit();
                
            }
            catch(Exception $e)
            {
                //exibe a messagem de erro
                TTransaction::rollback();
                
                throw new Exception('Error: '.$e->getMessage());
        
            }
        }
        
        public function ExecuteScalar($sql)
        {
            try
            {
                //abre uma transacao
                $conn = TTransaction::open('BD');
                //define a estrategia de log
                if(file_exists('banco/log/arquivo.html'))
                {
                    $logLink = 'banco/log/arquivo.html';
                }
                elseif(file_exists('../banco/log/arquivo.html'))
                {
                    $logLink = '../banco/log/arquivo.html';
                }
                elseif(file_exists('../../banco/log/arquivo.html'))
                {
                    $logLink = '../../banco/log/arquivo.html';
                }
                elseif(file_exists('../../../banco/log/arquivo.html'))
                {
                    $logLink = '../../../banco/log/arquivo.html';
                }
                else
                {
                    throw new Exception("arquivo log não foi encontrado");
                }
                TTransaction::setLogger(new TLoggerHTML($logLink));
                //escreve menssagem log
                TTransaction::log("get table");
                
                //obtem a conexao ativa
                $conn = TTransaction::get();
                
                //executa o sql
                $result = $conn->query($sql);
                
                //escreve menssagem LOG
                TTransaction::log($sql);
                
                return $result->fetch(PDO::FETCH_ASSOC);
            
                TTransaction::commit();
                
            }
            catch(Exception $e)
            {
                //exibe a messagem de erro
                TTransaction::rollback();
                
                throw new Exception('Error: '.$e->getMessage());
        
            }
        }
        
        public function ExecuteNonQuery($sql)
        {
            try
            {
                //abre uma transacao
                $conn = TTransaction::open('BD');
                //define a estrategia de log
                if(file_exists('banco/log/arquivo.html'))
                {
                    $logLink = 'banco/log/arquivo.html';
                }
                elseif(file_exists('../banco/log/arquivo.html'))
                {
                    $logLink = '../banco/log/arquivo.html';
                }
                elseif(file_exists('../../banco/log/arquivo.html'))
                {
                    $logLink = '../../banco/log/arquivo.html';
                }
                elseif(file_exists('../../../banco/log/arquivo.html'))
                {
                    $logLink = '../../../banco/log/arquivo.html';
                }
                else
                {
                    throw new Exception("arquivo log não foi encontrado");
                }
                TTransaction::setLogger(new TLoggerHTML($logLink));
                //escreve menssagem log
                TTransaction::log("set table");
                
                //obtem a conexao ativa
                $conn = TTransaction::get();
                
                //executa o sql
                $conn->query($sql);
                
                //escreve menssagem LOG
                TTransaction::log($sql);
                
                TTransaction::commit();
                
            }
            catch(Exception $e)
            {
                //exibe a messagem de erro
                TTransaction::rollback();
                
                throw new Exception('Error: '.$e->getMessage());
        
            }
        }
        
    }

?>