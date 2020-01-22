<?php
    final class Trans1
    {
        
        public function getDados()
        {
            try
            {
                $sql = 'SELECT `trans1`.`idTRANS1`,
                                `trans1`.`idCIRURGIA`,
                                cirurgia.DESCRICAO as "Cirurgia",
                                `trans1`.`CSC` as "Confirmação sobre o cliente",
                                `trans1`.`NVADF` as "Materiais de vias aéreas disponiveis e funcionantes",
                                `trans1`.`MSOAP` as "Montagem do SO de acordo com o procedimento programado",
                                `trans1`.`REA` as "Revisão dos equipamentos de anestesia",
                                `trans1`.`RPS` as "Há risco de perda sanguínea > 500mL (7mL/kg em crianças)?",
                                `trans1`.`AVAP` as "Acesso venoso adequado e pérvio?",
                                `trans1`.`CLIENTEALERGIA` as "O cliente tem alergia?",
                                `trans1`.`OBSERVACAO` as "Observação",
                                CASE `trans1`.`STATUS`
                                WHEN 0 THEN "Inativo"
                                WHEN 1 THEN "Ativo"
                                END as "Status"
                        FROM 	`trans1`,
                                `cirurgia`
                        WHERE    cirurgia.idCIRURGIA = trans1.idCIRURGIA;

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
                                if($col === "idTRANS1" || $col === "idCIRURGIA")
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
                            if($col === "idTRANS1" || $col === "idCIRURGIA")
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
                $CSC = $_POST['CSC'];
                $NVADF = $_POST['NVADF'];
                $MSOAPP = $_POST['MSOAP'];
                $REA = $_POST['REA'];
                $RPS = $_POST['RPS'];
                $AVAP = $_POST['AVAP'];
                $clienteAlergia = $_POST['clienteAlergia'];
                $obser = $_POST['obser'];
                
                $sql = "INSERT INTO `trans1`
                        (
                        `idCIRURGIA`,
                        `CSC`,
                        `NVADF`,
                        `MSOAP`,
                        `REA`,
                        `RPS`,
                        `AVAP`,
                        `CLIENTEALERGIA`,
                        `OBSERVACAO`)
                        VALUES
                        (
                            '".$idCirurgia."',
                            '".$CSC."',
                            '".$NVADF."',
                            '".$MSOAPP."',
                            '".$REA."',
                            '".$RPS."',
                            '".$AVAP."',
                            '".$clienteAlergia."',
                            '".$obser."'
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
                $idCirurgia = $_POST['idCirurgia'];
                $CSC = $_POST['CSC'];
                $NVADF = $_POST['NVADF'];
                $MSOAPP = $_POST['MSOAP'];
                $REA = $_POST['REA'];
                $RPS = $_POST['RPS'];
                $AVAP = $_POST['AVAP'];
                $clienteAlergia = $_POST['clienteAlergia'];
                $obser = $_POST['obser'];
                
                $sql = "UPDATE `trans1`
                        SET
                            `idCIRURGIA` = '".$idCirurgia."',
                            `CSC` = '".$CSC."',
                            `NVADF` = '".$NVADF."',
                            `MSOAP` = '".$MSOAPP."',
                            `REA` = '".$REA."',
                            `RPS` = '".$RPS."',
                            `AVAP` = '".$AVAP."',
                            `CLIENTEALERGIA` = '".$clienteAlergia."',
                            `OBSERVACAO` = '".$obser."'
                        WHERE `idTRANS1` = '".$_POST['idTrans1']."';

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
                $idTRANS1 = $_POST['idTRANS1'];
                
                $sql = "DELETE FROM `trans1`
                        WHERE `idTRANS1` = '".$idTRANS1."';
                        ";
                    
                $factory = new Factory();
                $factory->ExecuteNonQuery($sql);
                
            }
            catch(Exception $e)
            {
                return $e->getMessage();
            }
        }
        
        public function montCampoCirurgia()
        {
            try
            {
                
                $sql = "SELECT cirurgia.idCIRURGIA, cirurgia.DESCRICAO FROM cirurgia;";
                    
                $factory = new Factory();
                $arrayResult = $factory->ExecuteDataSet($sql);
                
                $html = "";
                
                for($i = 0; $i <= count($arrayResult[0]); $i++)
                {
                    
                    $html .= "<option value='".$arrayResult[$i]['idCIRURGIA']."'>".$arrayResult[$i]['DESCRICAO']."</option>";
                }
                
                return $html;
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
                        SELECT `trans1`.`idTRANS1`,
                            `trans1`.`idCIRURGIA`,
                            `trans1`.`CSC`,
                            `trans1`.`NVADF`,
                            `trans1`.`MSOAP`,
                            `trans1`.`REA`,
                            `trans1`.`RPS`,
                            `trans1`.`AVAP`,
                            `trans1`.`CLIENTEALERGIA`,
                            `trans1`.`OBSERVACAO`,
                            `trans1`.`STATUS`
                        FROM `trans1`
                        WHERE trans1.idCIRURGIA='".$_POST['$idCirurgia']."';
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