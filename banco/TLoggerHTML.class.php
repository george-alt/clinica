<?php
    /*
     *classe TLoggerXML
     *implementa o algorimo de LOG em XML
    */
    class TLoggerHTML extends TLogger
    {
        /*
         *metodo write()
         *escreve uma mensagem no arquivo de LOG
         *@param $message = messagem a ser escrita
        */
        
        public function write($message)
        {
            date_default_timezone_set('America/Fortaleza');
            $time = date('Y-m-d H:i:s');
            //monta a string
            $text = "<p>\n";
            $text.= "   [<b>$time</b>\n]>";
            $text.= "   <i>$message</i>\n";
            $text.= "   </p>\n";
            //adiciona ao final do arquivo
            $handler = fopen($this->filename,'a');
            fwrite($handler, $text);
            fclose($handler);
        }
    }

?>