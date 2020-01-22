<?php
    final class Usuario
    {
        public $nome;
        public $email;
        public $senha;
        public $telefone;
        
        public function setUsuario()
        {
            try
            {
                if(empty($this->getUsuario()))
                {
                    $sql = "INSERT INTO `usuario`
                                    (
                                    NOME,
                                    `EMAIL`,
                                    `SENHA`,
                                    `TELEFONE`
                                    )
                                    VALUES
                                    (
                                    '".$this->nome."',
                                    '".$this->email."',
                                    '".$this->hash($this->senha)."',
                                    '".$this->telefone."'
                                    );";
    
                    $factory = new Factory();
                    $factory->ExecuteNonQuery($sql);
                    return $this->login();
                }
                else{
                    return 'Usuario já cadastrado com esse E-mail.';
                }
            }
            catch(Exception $e)
            {
                return $e->getMessage();
            }
        }
        
        public function getUsuario()
        {
            $sql = "SELECT 
                        *
                    FROM
                        colaboradores
                    WHERE colaboradores.USUARIO = '".$this->nome."'
                    or  colaboradores.EMAIL = '".$this->nome."';";
            
            $factory = new Factory();
            
            return $factory->ExecuteScalar($sql);
            
            
        }
        
        public function LogAcesso($idcliente)
        {
            $sql = "INSERT INTO `LogAcesso`
                    (`idUSUARIO`,
                    `DATA`)
                    VALUES
                    (
                    '".$idcliente."',
                    '".date("Y-m-d H:i:s")."');";
            
            $factory = new Factory();
            $factory->ExecuteNonQuery($sql);
            
            
        }
        
        public function online($idcliente, $status)
        {
            $sql = "UPDATE `colaboradores`
                    SET
                        `colaboradores`.`ONLINE` = '".$status."'
                    WHERE `colaboradores`.`idCOLOBORADORES` = '".$idcliente."';";
            
            $factory = new Factory();
            $factory->ExecuteNonQuery($sql);
        }
        
        public function login()
        {
            try
            {
                if(!isset($_SESSION))
                {
                    session_start();
                }
                
                $this->nome = $_POST['userEmail'];
                $this->senha = $_POST['senha'];
                
                $usuario=$this->getUsuario();
                
                if(!empty($usuario))
                {
                    if ($_SERVER['REQUEST_METHOD']=='POST'  || $_SERVER['REQUEST_METHOD']=='GET' )
                    {
                        /*if (crypt($this->senha, $usuario['SENHA']) === $usuario['SENHA']) {
                            $_SESSION["usuario"] = $usuario;
                            if (!empty($_POST['lembrar'])) {
                                $this->lembrar($usuario['SENHA']);
                            }
                        }*/
                        if ($this->senha === $usuario['SENHA']) {
                            $_SESSION["usuario"] = $usuario;
                            if (!empty($_POST['lembrar'])) {
                                $this->lembrar($usuario['SENHA']);
                            }
                        }
                        else
                        {
                            return "Combinação incorreta de e-mail/senha";
                        }
                        
                    }
                    elseif ((!empty($_COOKIE['blog_ghj'])) and (!empty($_COOKIE['blog_ghk'])))
                    {
                    
                        $cookie['usuario'] = base64_decode(substr($_COOKIE['blog_ghj'],22,strlen($_COOKIE['blog_ghj'])));
                        $cookie['senha'] = base64_decode(substr($_COOKIE['blog_ghk'],22,strlen($_COOKIE['blog_ghk'])));
                        $this->email  = $cookie['usuario'];
                        $usuario=$this->getUsuario();
                        if ($cookie['senha']==$usuario['SENHA']) {
                            $_SESSION["usuario"] = $usuario;
                        }
                        
                    }
                    
                    $this->online($usuario['idCOLOBORADORES'],1);
                    
                    if (!empty($_SESSION["usuario"])) {
                        $html = "index.php";
                        return $html;
                        /*if (empty($_SESSION["url"])) {
                            return "<script>window.location='startComis/index.php';</script>";
                        } else {
                            return "<script>window.location='".$_SESSION["url"]."';</script>";
                        }*/
                    }
                    
                    
                }
                else
                {
                    return "Essa conta não existe";
                }
            }
            catch(Exception $e)
            {
                return $e->getMessage();
            }
        }
        
        
        protected function lembrar($senha)
        {
            $cookie=array(
                'usuario'=>$this->salt().base64_encode($_POST['email']),
                'senha'=>$this->salt().base64_encode($senha)
            );
            setcookie('blog_ghj', $cookie['usuario'], (time() + (15 * 24 * 3600)),$_SERVER['SERVER_NAME']);
            setcookie('blog_ghk', $cookie['senha'], (time() + (15 * 24 * 3600)),$_SERVER['SERVER_NAME']);
        }
        
        public function logout()
        {
            try
            {
                if(!isset($_SESSION))
                {
                    session_start();
                }
                
                $this->online($_SESSION["usuario"]['idCOLOBORADORES'],0);
                
                session_unset();
                session_destroy();
                setcookie('blog_ghj');
                setcookie('blog_ghk');
                
                //header('Location: login.php');
            }
            catch(Exception $e)
            {
                return $e->getMessage();
            }
        }
        
        public function sessionDestroy()
        {
            if(!isset($_SESSION))
            {
                session_start();
            }
            $arrayUsuario = $_SESSION["usuario"];
            session_unset();
            session_destroy();
            setcookie('blog_ghj');
            setcookie('blog_ghk');
            
            session_start();
            $_SESSION["usuario"] = $arrayUsuario;
        }
        
        public function protege()
        {
            if(!isset($_SESSION))
            {
                session_start();
            }
            if (empty($_SESSION["usuario"]))
            {
                $_SESSION["url"]= $_SERVER['REQUEST_URI'];
                header('Location: login.php');
            }
            
        }
        
        protected function salt()
        {
            $string = 'abcdefghijkmnopqrstuvwxyzABCDEFGHIJKLMNPQRSTUVWXYZ0123456789';
            $retorno = '';
            for ($i = 1; $i <= 22; $i++) {
                $rand = mt_rand(1, strlen($string));
                $retorno .= $string[$rand-1];
            }
            return $retorno;
        }
        protected function hash($senha)
        {
            return crypt($senha, '$2a$10$' . $this->salt() . '$');
        }
    }
?>