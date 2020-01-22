<?php
    final class CheckList
    {
        
        public function getDados()
        {
            try
            {
                $sql = 'SELECT `checklist`.`idCHECKLIST`,
                                CASE `checklist`.`IDENTIFICACAOCLIENTE`
                                WHEN 1 THEN "Sim"
                                WHEN 2 THEN "Não"
                                END as "Identificação do Cliente",
                                CASE`checklist`.`PRONTUARIOCOMPLETO`
                                WHEN 1 THEN "Sim"
                                WHEN 2 THEN "Não"
                                END as "Prontúario Completo",
                                CASE `checklist`.`SCD`
                                WHEN 1 THEN "Sim"
                                WHEN 2 THEN "Não"
                                WHEN 3 THEN "Não Aplica"
                                END as "Sitio Cirúrgico Demarcado",
                                CASE `checklist`.`CAA`
                                WHEN 1 THEN "Sim"
                                WHEN 2 THEN "Não"
                                END as "Consentimento e Avaliação Anestésico",
                                CASE `checklist`.`CONSENTIMENTOCIRURGICO`
                                WHEN 1 THEN "Sim"
                                WHEN 2 THEN "Não"
                                END as "Consentimento Cirúrgico",
                                CASE `checklist`.`CONSENTIMENTOTRANSFUSIONAL`
                                WHEN 1 THEN "Sim"
                                WHEN 2 THEN "Não"
                                WHEN 3 THEN "Não Aplica"
                                END as "Consentimento Transfusional",
                                CASE `checklist`.`BANHO` 
                                WHEN 1 THEN "Sim"
                                WHEN 2 THEN "Não"
                                END as "Banho",
                                `checklist`.`HORABANHO` as "Horário Banho",
                                CASE `checklist`.`TRICOTOMIA`
                                WHEN 1 THEN "Sim"
                                WHEN 2 THEN "Não"
                                END as "Tricotomia",
                                `checklist`.`TRICOTOMIAHORA` as "Horário Tricotomia",
                                `checklist`.`TRICOTOMIALOCAL` as "Local Tricotomia",
                                CASE `checklist`.`JEJUM`
                                WHEN 1 THEN "Sim"
                                WHEN 2 THEN "Não"
                                END as "Jejum",
                                `checklist`.`JEJUMINICIO` as "Inicio Jejum",
                                CASE `checklist`.`EXAMES`
                                WHEN 1 THEN "Laboratoriais"
                                WHEN 2 THEN "Imagem"
                                WHEN 3 THEN "Biópsia"
                                END as "Exames",
                                CASE `checklist`.`RPA` 
                                WHEN 1 THEN "Sim"
                                WHEN 2 THEN "Não"
                                END as "Retirada Prótese e Adornos",
                                CASE `checklist`.`TIPOPRECAUCAO`
                                WHEN 1 THEN "Padrão"
                                WHEN 2 THEN "Contato"
                                WHEN 3 THEN "Reverso"
                                WHEN 4 THEN "Goticulas"
                                WHEN 5 THEN "Aerossóis"
                                END as "Tipo de Precaução",
                                CASE `checklist`.`STATUS`
                                WHEN 0 THEN "Inativo"
                                WHEN 1 THEN "Ativo"
                                END as "Status"
                            FROM `checklist`;
                            ';
                        
                $factory = new Factory();
                $arrayResult = $factory->ExecuteDataSet($sql);
                
                if($arrayResult == null)
                {
                    return 0;
                }
                
                $html = "<thead>";
                $cont = 0;
                foreach($arrayResult as $field)
                {
                    if($cont == 0)
                    {
                        $html .= "<tr>";
                            foreach($field as $col => $value)
                            {
                                if($col === "idCHECKLIST")
                                {
                                    $html .= "<th style='display:none;'>".$col."</th>";
                                }
                                else
                                {
                                    $html .= "<th>".$col."</th>";
                                }
                            }
                        $html .= "<th class='text-right'>Opções</th>";
                        $html .= "</tr>";
                        $html .= "</thead>";
                        
                        $cont++;
                        
                        $html .= "<tbody>";
                    }
                        $html .= "<tr>";
                        foreach($field as $col => $value)
                        {
                            if($col === "idCHECKLIST")
                            {
                                $html .= "<td style='display:none;'>".$value."</td>";
                            }
                            else
                            {
                                if($col === "Status")
                                {
                                    if($value === "Ativo")
                                    {
                                        $html .= "<td><span class='custom-badge status-green'>".$value."</span></td>";
                                    }
                                    else
                                    {
                                        $html .= "<td><span class='custom-badge status-red'>".$value."</span></td>";
                                    }
                                }
                                else
                                {
                                    $html .= "<td>".$value."</td>";
                                }
                            }
                        }
                    $html .= '<td class="text-right">
                                    <div class="dropdown dropdown-action">
                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item edit" href="#"><i class="fa fa-pencil m-r-5"></i> Editar</a>
                                            <a class="dropdown-item delete" href="#" data-toggle="modal" data-target="#delete_appointment"><i class="fa fa-trash-o m-r-5"></i> Excluir</a>
                                        </div>
                                    </div>
                                </td>';
                    $html .= "</tr>";
                        
                }
                    $html .= "</tbody>";

                return $html;
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
                $idCirurgia = $_POST['idCirurgia'];
                $idenCliente = $_POST['idenCliente'];
                $pronCompleto = $_POST['pronCompleto'];
                $SCD = $_POST['SCD'];
                $CAA = $_POST['CAA'];
                $conCirurgico = $_POST['conCirurgico'];
                $conTransfunsional = $_POST['conTransfunsional'];
                $banho = $_POST['banho'];
                $horaBanho = $_POST['horaBanho'];
                $tricotomia = $_POST['tricotomia'];
                $triHora = $_POST['triHora'];
                $triLocal = $_POST['triLocal'];
                $jejum = $_POST['jejum'];
                $jejumInicio = $_POST['JejumInicio'];
                $exames = $_POST['exames'];
                $rpa = $_POST['rpa'];
                $tipoPrecaucao = $_POST['tipoPrecaucao'];
                
                
                $sql = "INSERT INTO `checklist`
                                (
                                `idCIRURGIA`,
                                `IDENTIFICACAOCLIENTE`,
                                `PRONTUARIOCOMPLETO`,
                                `SCD`,
                                `CAA`,
                                `CONSENTIMENTOCIRURGICO`,
                                `CONSENTIMENTOTRANSFUSIONAL`,
                                `BANHO`,
                                `HORABANHO`,
                                `TRICOTOMIA`,
                                `TRICOTOMIAHORA`,
                                `TRICOTOMIALOCAL`,
                                `JEJUM`,
                                `JEJUMINICIO`,
                                `EXAMES`,
                                `RPA`,
                                `TIPOPRECAUCAO`
                                )
                                VALUES
                                (
                                    '".$idCirurgia."',
                                    '".$idenCliente."',
                                    '".$pronCompleto."',
                                    '".$SCD."',
                                    '".$CAA."',
                                    '".$conCirurgico."',
                                    '".$conTransfunsional."',
                                    '".$banho."',
                                    '".$horaBanho."',
                                    '".$tricotomia."',
                                    '".$triHora."',
                                    '".$triLocal."',
                                    '".$jejum."',
                                    '".$jejumInicio."',
                                    '".$exames."',
                                    '".$rpa."',
                                    '".$tipoPrecaucao."'
                                    
                                    
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
                $idenCliente = $_POST['idenCliente'];
                $pronCompleto = $_POST['pronCompleto'];
                $SCD = $_POST['SCD'];
                $CAA = $_POST['CAA'];
                $conCirurgico = $_POST['conCirurgico'];
                $conTransfunsional = $_POST['conTransfunsional'];
                $banho = $_POST['banho'];
                $horaBanho = $_POST['horaBanho'];
                $tricotomia = $_POST['tricotomia'];
                $triHora = $_POST['triHora'];
                $triLocal = $_POST['triLocal'];
                $jejum = $_POST['jejum'];
                $jejumInicio = $_POST['JejumInicio'];
                $exames = $_POST['exames'];
                $rpa = $_POST['rpa'];
                $tipoPrecaucao = $_POST['tipoPrecaucao'];
                
                $sql = "UPDATE `checklist`
                        SET
                                `IDENTIFICACAOCLIENTE` = '".$idenCliente."',
                                `PRONTUARIOCOMPLETO` = '".$pronCompleto."',
                                `SCD` = '".$SCD."',
                                `CAA` = '".$CAA."',
                                `CONSENTIMENTOCIRURGICO` = '".$conCirurgico."',
                                `CONSENTIMENTOTRANSFUSIONAL` = '".$conTransfunsional."',
                                `BANHO` = '".$banho."',
                                `HORABANHO` = '".$horaBanho."',
                                `TRICOTOMIA` = '".$tricotomia."',
                                `TRICOTOMIAHORA` = '".$triHora."',
                                `TRICOTOMIALOCAL` = '".$triLocal."',
                                `JEJUM` = '".$jejum."',
                                `JEJUMINICIO` = '".$jejumInicio."',
                                `EXAMES` = '".$exames."',
                                `RPA` = ".$rpa.",
                                `TIPOPRECAUCAO` = ".$tipoPrecaucao."
                        WHERE `idCHECKLIST` = '".$_POST['idCHECKLIST']."';
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
                $idCHECKLIST = $_POST['idCHECKLIST'];
                
                $sql = "DELETE FROM `checklist`
                        WHERE `idCHECKLIST` = '".$idCHECKLIST."';
                        ";
                    
                $factory = new Factory();
                $factory->ExecuteNonQuery($sql);
                
            }
            catch(Exception $e)
            {
                return $e->getMessage();
            }
        }
        
        public function getDadosForInput()
        {
            try
            {
                $sql = "
                        SELECT `checklist`.`idCHECKLIST`,
                            `checklist`.`idCIRURGIA`,
                            `checklist`.`IDENTIFICACAOCLIENTE`,
                            `checklist`.`PRONTUARIOCOMPLETO`,
                            `checklist`.`SCD`,
                            `checklist`.`CAA`,
                            `checklist`.`CONSENTIMENTOCIRURGICO`,
                            `checklist`.`CONSENTIMENTOTRANSFUSIONAL`,
                            `checklist`.`BANHO`,
                            `checklist`.`HORABANHO`,
                            `checklist`.`TRICOTOMIA`,
                            `checklist`.`TRICOTOMIAHORA`,
                            `checklist`.`TRICOTOMIALOCAL`,
                            `checklist`.`JEJUM`,
                            `checklist`.`JEJUMINICIO`,
                            `checklist`.`EXAMES`,
                            `checklist`.`RPA`,
                            `checklist`.`TIPOPRECAUCAO`
                        FROM `checklist`
                        WHERE checklist.idCIRURGIA='".$_POST['$idCirurgia']."';
                ";
                
                $factory = new Factory();
                return $factory->ExecuteDataSet($sql);
            }
            catch(Exception $e)
            {
                return $e->getMessage();
            }
        }
        
        
    }
?>