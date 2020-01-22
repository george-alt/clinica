<?php
    final class Colaboradores
    {
        
        public function getDados()
        {
            try
            {
                
                $sql = 'SELECT `colaboradores`.`idCOLOBORADORES`,
                            `colaboradores`.`NOME`,
                            `colaboradores`.`CIDADE`,
                            `colaboradores`.`UF`,
                            CASE `colaboradores`.`CARGO`
                            WHEN 1 THEN "Médico(a)"
                            WHEN 2 THEN "Enfermeiro(a)"
                            WHEN 3 THEN "Anestesiologista"
                            WHEN 4 THEN "Instrumentador(a)"
                            END as "CARGO"
                        FROM .`colaboradores`
                        ';
                
                    if(!empty($_POST['cargoFiltro']))
                    {
                        $sql.= "WHERE CARGO = '".$_POST['cargoFiltro']."'";
                    }
                
                
                $factory = new Factory();
                $arrayResult = $factory->ExecuteDataSet($sql);
                
                $html = '';
                $cont = 0;
                foreach($arrayResult as $field)
                {
                    foreach($field as $col => $value)
                    {
                        if($col === "idCOLOBORADORES")
                        {
                            $idCOLOBORADORES = $value;
                        }
                        if($col === "NOME")
                        {
                            $nome = $value;
                        }
                        else if($col === "CIDADE")
                        {
                            $cidade = $value;
                        }
                        else if($col === "UF")
                        {
                            $uf = $value;
                        }
                        else if($col === "CARGO")
                        {
                            $cargo = $value;
                        }
                    }
                     $html .= '<div class="col-md-4 col-sm-4  col-lg-3">
                                    <div class="profile-widget">
                                        <div class="doctor-img">
                                            <a class="avatar" href="#"><img alt="" src="assets/img/user.jpg"></a>
                                        </div>
                                        <div class="dropdown profile-action">
                                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item edit" href="#"><i class="fa fa-pencil m-r-5"></i> Editar</a>
                                                <a class="dropdown-item delete" href="#" data-toggle="modal" data-target="#delete_doctor"><i class="fa fa-trash-o m-r-5"></i> Excluir</a>
                                            </div>
                                        </div>
                                        <h4 class="doctor-name text-ellipsis"><a href="profile.html"><div style="display:none;"class="idColaborador">'.$idCOLOBORADORES.'</div>'.$nome.'</a></h4>
                                        <div class="doc-prof">'.$cargo.'</div>
                                        <div class="user-country">
                                            <i class="fa fa-map-marker"></i> '.$cidade.', '.$uf.'
                                        </div>
                                    </div>
                               </div>';   
                }

                return $html;
            }
            catch(Exception $e)
            {
                return $e->getMessage();
            }
        }
        
        public function getDadosUp()
        {
            try
            {
                session_start();
                $sql = "SELECT 
                                `colaboradores`.`NOME`,
                                `colaboradores`.`USUARIO`,
                                `colaboradores`.`EMAIL`,
                                `colaboradores`.`SENHA`,
                                `colaboradores`.`DATANASCIMENTO`,
                               `colaboradores`.`GENERO`,
                              `colaboradores`.`CEP`,
                              `colaboradores`.`ENDERECO`,
                              `colaboradores`.`NUMERO`,
                              `colaboradores`.`BAIRRO`,
                              `colaboradores`.`CIDADE`,
                              `colaboradores`.`UF`,
                              `colaboradores`.`CARGO`,
                              `colaboradores`.`COMPLEMENTO`,
                              `colaboradores`.`TELEFONE`,
                              `colaboradores`.`CURTABIOGRAFIA`,
                              `colaboradores`.`STATUS`
                         FROM `colaboradores`
                         WHERE idCOLOBORADORES = '".$_SESSION['idColaboradores']."';

                        ";
                $factory = new Factory();
                $arrayResult = $factory->ExecuteDataSet($sql);
                
                return $arrayResult;
            }
            catch(Exception $e)
            {
                return $e->getMessage();
            }
        }
        
        public function setDados()
        {
            try
            {
                $nome = $_POST['nome'];
                $user = $_POST['user'];
                $email = $_POST['email'];
                $senha = $_POST['senha'];
                $dataNasc = $_POST['dataNasc'];
                $sexo = $_POST['sexo'];
                $cep = $_POST['cep'];
                $endereco = $_POST['endereco'];
                $bairro = $_POST['bairro'];
                $cidade = $_POST['cidade'];
                $uf = $_POST['uf'];
                $numero = $_POST['numero'];
                $cargo = $_POST['cargo'];
                $complemento = $_POST['complemento'];
                $telefone = $_POST['telefone'];
                $biografia = $_POST['biografia'];
                $status = $_POST['status'];
                
                $dataNew = explode("/",$dataNasc);
                $dataNasc = $dataNew[2]."-".$dataNew[1]."-".$dataNew[0];
                
                $sql = "INSERT INTO `colaboradores`
                            (
                            `NOME`,
                            `USUARIO`,
                            `EMAIL`,
                            `SENHA`,
                            `DATANASCIMENTO`,
                            `GENERO`,
                            `CEP`,
                            `ENDERECO`,
                            `NUMERO`,
                            `BAIRRO`,
                            `CIDADE`,
                            `UF`,
                            `CARGO`,
                            `COMPLEMENTO`,
                            `TELEFONE`,
                            `CURTABIOGRAFIA`,
                            `STATUS`)
                            VALUES
                            (
                            '".$nome."',
                            '".$user."',
                            '".$email."',
                            '".$senha."',
                            '".$dataNasc."',
                            '".$sexo."',
                            '".$cep."',
                            '".$endereco."',
                            '".$numero."',
                            '".$bairro."',
                            '".$cidade."',
                            '".$uf."',
                            '".$cargo."',
                            '".$complemento."',
                            '".$telefone."',
                            '".$biografia."',
                            '".$status."'
                            );

                        ";
                    
                $factory = new Factory();
                $factory->ExecuteNonQuery($sql);
                
            }
            catch(Exception $e)
            {
                return $e->getMessage();
            }
        }
        
        public function upDados()
        {
            try
            {
                session_start();
                $nome = $_POST['nome'];
                $user = $_POST['user'];
                $email = $_POST['email'];
                $senha = $_POST['senha'];
                $dataNasc = $_POST['dataNasc'];
                $sexo = $_POST['sexo'];
                $cep = $_POST['cep'];
                $endereco = $_POST['endereco'];
                $bairro = $_POST['bairro'];
                $cidade = $_POST['cidade'];
                $uf = $_POST['uf'];
                $numero = $_POST['numero'];
                $cargo = $_POST['cargo'];
                $complemento = $_POST['complemento'];
                $telefone = $_POST['telefone'];
                $biografia = $_POST['biografia'];
                $status = $_POST['status'];
                
                $dataNew = explode("/",$dataNasc);
                $dataNasc = $dataNew[2]."-".$dataNew[1]."-".$dataNew[1];
                
                $sql = "UPDATE `colaboradores`
                        SET
                            `NOME` = '".$nome."',
                            `USUARIO` = '".$user."',
                            `EMAIL` = '".$email."',
                            `SENHA` = '".$senha."',
                            `DATANASCIMENTO` = '".$dataNasc."',
                            `GENERO` = '".$sexo."',
                            `CEP` = '".$cep."',
                            `ENDERECO` = '".$endereco."',
                            `NUMERO` = '".$numero."',
                            `BAIRRO` = '".$bairro."',
                            `CIDADE` = '".$cidade."',
                            `UF` = '".$uf."',
                            `CARGO` = '".$cidade."',
                            `COMPLEMENTO` = '".$complemento."',
                            `TELEFONE` = '".$telefone."',
                            `CURTABIOGRAFIA` = '".$biografia."',
                            `STATUS` = '".$status."'
                        WHERE `idCOLOBORADORES` = '".$_SESSION['idColaboradores']."';
                        ;
                        ";
                    
                $factory = new Factory();
                $factory->ExecuteNonQuery($sql);
                
            }
            catch(Exception $e)
            {
                return $e->getMessage();
            }
        }
        
        public function delDados()
        {
            try
            {
                $idColaboradores = $_POST['idColaboradores'];
                
                $sql = "DELETE FROM `colaboradores`
                        WHERE `idCOLOBORADORES` = '".$idColaboradores."';
                        ";
                    
                $factory = new Factory();
                $factory->ExecuteNonQuery($sql);
                
            }
            catch(Exception $e)
            {
                return $e->getMessage();
            }
        }
        
        public function contMedicos()
        {
            try
            {
                $sql = "SELECT count(colaboradores.idCOLOBORADORES) as 'MEDICO' FROM colaboradores where colaboradores.CARGO = 1;";
                $factory = new Factory();
                return $factory->ExecuteDataSet($sql);
            }
            catch(Exception $e)
            {
                return $e->getMessage();
            }
        }
        
        public function contEnfermeiros()
        {
            try
            {
                $sql = "SELECT count(colaboradores.idCOLOBORADORES) as 'ENFERMEIRO' FROM colaboradores where colaboradores.CARGO = 2;";
                $factory = new Factory();
                return $factory->ExecuteDataSet($sql);
            }
            catch(Exception $e)
            {
                return $e->getMessage();
            }
        }
        
        public function colaboradoresOnline()
        {
            try
            {
                if(!isset($_SESSION))
                {
                    session_start();
                }
                
                
                $sql = '
                    SELECT 
                        colaboradores.NOME,
                        CASE colaboradores.CARGO
                        WHEN 1 THEN "Médico(a)"
                        WHEN 2 THEN "Enfermeiro(a)"
                        WHEN 3 THEN "Anestesiologista"
                        WHEN 4 THEN "Instrumentador(a)"
                        END as "CARGO",
                        IFNULL(colaboradores.ONLINE, 0) AS "ONLINE"
                    FROM
                        colaboradores
                    WHERE colaboradores.idCOLOBORADORES != "'.$_SESSION["usuario"]['idCOLOBORADORES'].'"
                    ORDER BY ONLINE DESC
                    LIMIT 100;

                ';
                $factory = new Factory();
                $arrayResult = $factory->ExecuteDataSet($sql);
                
                $html = "";
                $cont = 0;
                foreach($arrayResult as $field)
                {
                        foreach($field as $col => $value)
                        {
                            if($col === "NOME")
                            {
                                $nome = $value;
                            }
                            else if($col === "CARGO")
                            {
                                $cargo = $value;
                            }
                            else if($col === "ONLINE")
                            {
                                if($value === "1")
                                {
                                    $online = "online";
                                }
                                else
                                {
                                    $online = "offline";
                                }
                            }
                        }
                    
                    $html .= '
                            
                            <li>
                                <div class="contact-cont">
                                    <div class="float-left user-img m-r-10">
                                        <a href="#" title="'.$nome.'"><img src="assets/img/user.jpg" alt="" class="w-40 rounded-circle"><span class="status '.$online.'"></span></a>
                                    </div>
                                    <div class="contact-info">
                                        <span class="contact-name text-ellipsis">'.$nome.'</span>
                                        <span class="contact-date">'.$cargo.'</span>
                                    </div>
                                </div>
                            </li>
                            
                    ';
                        
                }

                return $html;
            }
            catch(Exception $e)
            {
                return $e->getMessage();
            }
        }
        
        
        
        
    }
?>