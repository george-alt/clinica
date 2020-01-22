<?php
    
    final class TTransaction
    {
        private static $conn; //conexao ativa
        private static $logger; //objeto log
        
        private function __construct(){}
        
        /*
         *metodo open()
         *abre uma transacao e uma conexao ao BD
        */
        
        public static function open($database)
        {
            //abre uma conexao e armazena na propriedade estatica $conn
            
            if(empty(self::$conn))
            {
                self::$conn = TConnection::open($database);
                //inicia atansaçao
                self::$conn->beginTransaction();
                //desliga o log de SQL
                self::$logger = NULL;
            }
        }
        
        /*
         *metodo get()
         *retorna a conexao ativa da transacao
        */
        
        public static function get()
        {
            //retorna a conexao ativa
            return self::$conn;
        }
        
        /*
         *metodo rollback()
         *desfaz todas operacoes realizadas na transacao
        */
        public static function rollback()
        {
            if(self::$conn)
            {
                //desfaz todas operacoes realizadas na transacao
                self::$conn->rollBack();
                self::$conn = NULL;
            }
        }
        
        /*
         *metodo commit()
         *aplica todas operacoes realizadas e fecha a transancao
        */
        public static function commit()
        {
            if(self::$conn)
            {
                /*
                 *aplica as operacoes realizadas
                 *durante a transacao
                 */
                self::$conn->commit();
                self::$conn = NULL;
            }
        }
        
        /*
         *metodo setLogger
         *define qual estrategia(algoritmo de log sera usado)
        */
        
        public static function setLogger(TLogger $logger)
        {
            self::$logger = $logger;
        }
        
        /*
         *metodo log()
         *armazena uma mensagem no arquivo log
         *baseada na estrategia($logger) atual
        */
        
        public static function log($message)
        {
            //verifica existe um logger
            if(self::$logger)
            {
                self::$logger->write($message);
            }
        }
    }
    
?>