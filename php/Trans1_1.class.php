<?php
    final class Trans1_1
    {
        
        public function getDados()
        {
            try
            {
                $sql = 'SELECT `trans1_1`.`idTRANS1_1`,
                            `trans1_1`.`idCIRURGIA`,
                            cirurgia.DESCRICAO as "Cirurgia",
                            `trans1_1`.`STAFF` as "Staff",
                            `trans1_1`.`1CIRURGIAO` as "1º Cirurgião",
                            `trans1_1`.`2CIRURGIAO` as "2º Cirurgião",
                            `trans1_1`.`ANESTESISTA` as "Anestesista",
                            `trans1_1`.`CIRCULANTE` as "Circulante",
                            `trans1_1`.`CAEEC` as "Cirurgiões, anestesistas e equipe de enfermagem confirmam",
                            `trans1_1`.`PLACAELETROCAUTERIO` as "Placa de Eletrocautério",
                            `trans1_1`.`UAP` as "Uso de anibióticos profilático",
                            `trans1_1`.`EID`as "Exames de imagem estão disponiveis",
                            `trans1_1`.`SANGUINEAS`as "Sanguineas",
                            `trans1_1`.`REVISAOANESTESISTA` as "Revisão do Anestesista",
                            `trans1_1`.`FEEP` as "Fixação das etiquetas de esterilização no prontuário",
                            `trans1_1`.`OBSERVACAO` as "Observação",
                            CASE `trans1_1`.`STATUS`
                            WHEN 0 THEN "Inativo"
                            WHEN 1 THEN "Ativo"
                            END as "Status"
                        FROM `trans1_1`,
                                    cirurgia
                        WHERE cirurgia.idCIRURGIA = trans1_1.idCIRURGIA


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
                                if($col === "idTRANS1_1" || $col === "idCIRURGIA")
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
                            if($col === "idTRANS1_1" || $col === "idCIRURGIA")
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
                $staff = $_POST['staff'];
                $cirurgiao1 = $_POST['cirurgiao1'];
                $cirurgiao2 = $_POST['cirurgiao2'];
                $anestesista = $_POST['anestesista'];
                $circulante = $_POST['circulante'];
                $placaEletrocauterio = $_POST['placaEletrocauterio'];
                $UAP = $_POST['UAP'];
                $EID = $_POST['EID'];
                $CAEEC = $_POST['CAEEC'];
                $sanguineas = $_POST['sanguineas'];
                $revisaoAnestesista = $_POST['revisaoAnestesista'];
                $FEEP = $_POST['FEEP'];
                $obser = $_POST['obser'];
                
                $sql = "INSERT INTO `trans1_1`
                            (
                            `idCIRURGIA`,
                            `STAFF`,
                            `1CIRURGIAO`,
                            `2CIRURGIAO`,
                            `ANESTESISTA`,
                            `CIRCULANTE`,
                            `CAEEC`,
                            `PLACAELETROCAUTERIO`,
                            `UAP`,
                            `EID`,
                            `SANGUINEAS`,
                            `REVISAOANESTESISTA`,
                            `FEEP`,
                            `OBSERVACAO`)
                            VALUES
                            (
                                '".$idCirurgia."',
                                '".$staff."',
                                '".$cirurgiao1."',
                                '".$cirurgiao2."',
                                '".$anestesista."',
                                '".$circulante."',
                                '".$CAEEC."',
                                '".$placaEletrocauterio."',
                                '".$UAP."',
                                '".$EID."',
                                '".$sanguineas."',
                                '".$revisaoAnestesista."',
                                '".$FEEP."',
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
                $staff = $_POST['staff'];
                $cirurgiao1 = $_POST['cirurgiao1'];
                $cirurgiao2 = $_POST['cirurgiao2'];
                $anestesista = $_POST['anestesista'];
                $circulante = $_POST['circulante'];
                $placaEletrocauterio = $_POST['placaEletrocauterio'];
                $UAP = $_POST['UAP'];
                $EID = $_POST['EID'];
                $CAEEC = $_POST['CAEEC'];
                $sanguineas = $_POST['sanguineas'];
                $revisaoAnestesista = $_POST['revisaoAnestesista'];
                $FEEP = $_POST['FEEP'];
                $obser = $_POST['obser'];
                
                $sql = "UPDATE `trans1_1`
                        SET
                            `idCIRURGIA` = '".$idCirurgia."',
                            `STAFF` = '".$staff."',
                            `1CIRURGIAO` = '".$cirurgiao1."',
                            `2CIRURGIAO` = '".$cirurgiao2."',
                            `ANESTESISTA` = '".$anestesista."',
                            `CIRCULANTE` = '".$circulante."',
                            `CAEEC` = '".$CAEEC."',
                            `PLACAELETROCAUTERIO` = '".$placaEletrocauterio."',
                            `UAP` = '".$UAP ."',
                            `EID` = '".$EID."',
                            `SANGUINEAS` = '".$sanguineas."',
                            `REVISAOANESTESISTA` = '".$revisaoAnestesista."',
                            `FEEP` = '".$FEEP."',
                            `OBSERVACAO` = '".$obser."'
                        WHERE `idTRANS1_1` = '".$_POST['idTrans1_2']."';

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
                
                $sql = "DELETE FROM `trans1_1`
                        WHERE `idTRANS1_1` = '".$idTRANS1."';
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
                        SELECT `trans1_1`.`idTRANS1_1`,
                            `trans1_1`.`idCIRURGIA`,
                            `trans1_1`.`STAFF`,
                            `trans1_1`.`1CIRURGIAO` as 'CIRURGIAO1',
                            `trans1_1`.`2CIRURGIAO` as 'CIRURGIAO2',
                            `trans1_1`.`ANESTESISTA`,
                            `trans1_1`.`CIRCULANTE`,
                            `trans1_1`.`CAEEC`,
                            `trans1_1`.`PLACAELETROCAUTERIO`,
                            `trans1_1`.`UAP`,
                            `trans1_1`.`EID`,
                            `trans1_1`.`SANGUINEAS`,
                            `trans1_1`.`REVISAOANESTESISTA`,
                            `trans1_1`.`FEEP`,
                            `trans1_1`.`OBSERVACAO`,
                            `trans1_1`.`STATUS`
                        FROM `trans1_1`
                        WHERE trans1_1.idCIRURGIA='".$_POST['$idCirurgia']."';
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