<?php
    final class Trans1_2
    {
        
        public function getDados()
        {
            try
            {
                $sql = 'SELECT `trans1_2`.`idTRANS1_2`,
                            `trans1_2`.`idCIRURGIA`,
                            cirurgia.DESCRICAO as "Cirurgia",
                            `trans1_2`.`PROCEDIMENTOREALIZADO` as "Procedimento Realizado",
                            `trans1_2`.`CCAIC` as "A contagem de compresas, agulhas e instrumentos está corretos?",
                            `trans1_2`.`PACIARP` as "Peças anatômicas/culturas e identificadas adeguadamente e requisição preenchida?",
                            `trans1_2`.`HAPER` as "Houve algum problema com equipamentos que deve ser resolvido?",
                            `trans1_2`.`RIRPAPOC`  as "Recomendações importantes na recuperação pós-anestésica e pós-operatório desse cliente",
                            CASE `trans1_2`.`STATUS`
                            WHEN 0 THEN "Inativo"
                            WHEN 1 THEN "Ativo"
                            END as "Status"
                        FROM `trans1_2`,
                            cirurgia
                        WHERE cirurgia.idCIRURGIA = trans1_2.idCIRURGIA;



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
                                if($col === "idTRANS1_2" || $col === "idCIRURGIA")
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
                            if($col === "idTRANS1_2" || $col === "idCIRURGIA")
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
                $precedimentoRealizado = $_POST['precedimentoRealizado'];
                $CCAIC = $_POST['CCAIC'];
                $PACIARP = $_POST['PACIARP'];
                $HAPER = $_POST['HAPER'];
                $RIRPAPOC = $_POST['RIRPAPOC'];
                
                $sql = "INSERT INTO `trans1_2`
                        (
                        `idCIRURGIA`,
                        `PROCEDIMENTOREALIZADO`,
                        `CCAIC`,
                        `PACIARP`,
                        `HAPER`,
                        `RIRPAPOC`)
                        VALUES
                        (
                            '".$idCirurgia."',
                            '".$precedimentoRealizado."',
                            '".$CCAIC."',
                            '".$PACIARP."',
                            '".$HAPER."',
                            '".$RIRPAPOC."'
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
                $precedimentoRealizado = $_POST['precedimentoRealizado'];
                $CCAIC = $_POST['CCAIC'];
                $PACIARP = $_POST['PACIARP'];
                $HAPER = $_POST['HAPER'];
                $RIRPAPOC = $_POST['RIRPAPOC'];
                
                $sql = "UPDATE `trans1_2`
                        SET
                            `idCIRURGIA` = '".$idCirurgia."',
                            `PROCEDIMENTOREALIZADO` = '".$precedimentoRealizado."',
                            `CCAIC` = '".$CCAIC."',
                            `PACIARP` = '".$PACIARP."',
                            `HAPER` = '".$HAPER."',
                            `RIRPAPOC` = '".$RIRPAPOC."'
                        WHERE `idTRANS1_2` = '".$_POST['idTrans1_3']."';


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
                
                $sql = "DELETE FROM `trans1_2`
                        WHERE `idTRANS1_2` = '".$idTRANS1."';
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
                        SELECT `trans1_2`.`idTRANS1_2`,
                            `trans1_2`.`idCIRURGIA`,
                            `trans1_2`.`PROCEDIMENTOREALIZADO`,
                            `trans1_2`.`CCAIC`,
                            `trans1_2`.`PACIARP`,
                            `trans1_2`.`HAPER`,
                            `trans1_2`.`RIRPAPOC`,
                            `trans1_2`.`STATUS`
                        FROM `trans1_2`
                        WHERE trans1_2.idCIRURGIA='".$_POST['$idCirurgia']."';
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