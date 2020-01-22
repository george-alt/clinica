<?php
    final class Evolucao
    {
        
        public function getDados()
        {
            try
            {
                $sql = 'SELECT 
                            `evolucao`.`idEVOLUCAO`, 
                            `evolucao`.`idCIRURGIA`,
                             cirurgia.DESCRICAO AS "Cirurgia",
                            `evolucao`.`OBSERVACAO` AS "Observação",
                            CASE `evolucao`.`STATUS`
                            WHEN 0 THEN "Inativo"
                            WHEN 1 THEN "Ativo" 
                            END as "Status"
                        FROM
                            `evolucao`,
                            cirurgia
                        WHERE cirurgia.idCIRURGIA = evolucao.idCIRURGIA;';
                        
                $factory = new Factory();
                $arrayResult = $factory->ExecuteDataSet($sql);
                $indexIdCIRURGIA = 0;
                $indexIdEVOLUCAO = 0;
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
                                if($col === "idEVOLUCAO" || $col === "idCIRURGIA")
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
                            if($col === "idEVOLUCAO" || $col === "idCIRURGIA")
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
                $leito = $_POST['leito'];
                $origem = $_POST['origem'];
                $aberturaOcular = $_POST['aberturaOcular'];
                $respostaVerbal = $_POST['respostaVerbal'];
                $respostaMotora = $_POST['respostaMotora'];
                $consciencia = $_POST['consciencia'];
                $orientacao = $_POST['orientacao'];
                $descPulso = $_POST['descPulso'];
                $pulso = $_POST['pulso'];
                $descFc = $_POST['descFc'];
                $FC = $_POST['FC'];
                $descPa = $_POST['descPa'];
                $PA = $_POST['PA'];
                $descPadraoRespiratorio = $_POST['descPadraoRespiratorio'];
                $padraoRespiratorio = $_POST['padraoRespiratorio'];
                $respiracao = $_POST['respiracao'];
                $abdomen = $_POST['abdomen'];
                $RHA = $_POST['RHA'];
                $alimentacao = $_POST['alimentacao'];
                $residuos = $_POST['residuos'];
                $eliminacao = $_POST['eliminacao'];
                $via = $_POST['via'];
                $descVia = $_POST['descVia'];
                $diurese = $_POST['diurese'];
                $debito = $_POST['debito'];
                $HD = $_POST['HD'];
                $sistemaEndocrino = $_POST['sistemaEndocrino'];
                $niveisGlicemicos = $_POST['niveisGlicemicos'];
                $cateteres = $_POST['cateteres'];
                $sondas = $_POST['sondas'];
                $drenos = $_POST['drenos'];
                $curativos = $_POST['curativos'];
                $sistomas = $_POST['sistomas'];
                $medicacao = $_POST['medicacao'];
                $observacao = $_POST['observacao'];
                
                $sql = "INSERT INTO `evolucao`
                        (
                        idCIRURGIA,
                        `LEITO`,
                        `ORIGEM`,
                        `ABERTURAOCULAR`,
                        `RESPOSTAVERBAL`,
                        `RESPOSTAMOTORA`,
                        `CONSCIENCIA`,
                        `ORIENTACAO`,
                        `PULSO`,
                        `DESCRICAOPULSO`,
                        `FC`,
                        `DESCRICAOFC`,
                        `PA`,
                        `DESCRICAOPA`,
                        PADRAORESPIRATORIO,
                        DESCPADRAORESPIRATORIO,
                        `RESPIRACAO`,
                        `ABDOMEM`,
                        `RHA`,
                        `ELIMINACAO`,
                        `VIA`,
                        DESCVIA,
                        `DIURESE`,
                        `DEBITO`,
                        `HD`,
                        `HIPOGLICEMIANTES`,
                        `NIVEISGLICEMICOS`,
                        `CATETERES`,
                        `SONDAS`,
                        `DRENOS`,
                        `CURATIVOS`,
                        `SINTOMAS`,
                        `MEDICACAO`,
                        `OBSERVACAO`,
                        ALIMENTACAO,
                        RESIDUOS,
                        `STATUS`)
                        VALUES
                        (
                        '".$idCirurgia."',
                        '".$leito."',
                        '".$origem."',
                        '".$aberturaOcular."',
                        '".$respostaVerbal."',
                        '".$respostaMotora."',
                        '".$consciencia."',
                        '".$orientacao."',
                        '".$pulso."',
                        '".$descPulso."',
                        '".$FC."',
                        '".$descFc."',
                        '".$PA."',
                        '".$descPa."',
                        '".$padraoRespiratorio."',
                        '".$descPadraoRespiratorio."',
                        '".$respiracao."',
                        '".$abdomen."',
                        '".$RHA."',
                        '".$eliminacao."',
                        '".$via."',
                        '".$descVia."',
                        '".$diurese."',
                        '".$debito."',
                        '".$HD."',
                        '".$sistemaEndocrino."',
                        '".$niveisGlicemicos."',
                        '".$cateteres."',
                        '".$sondas."',
                        '".$drenos."',
                        '".$curativos."',
                        '".$sistomas."',
                        '".$medicacao."',
                        '".$observacao."',
                        '".$alimentacao."',
                        '".$residuos."',
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
                 $idCirurgia = $_POST['idCirurgia'];
                $leito = $_POST['leito'];
                $origem = $_POST['origem'];
                $aberturaOcular = $_POST['aberturaOcular'];
                $respostaVerbal = $_POST['respostaVerbal'];
                $respostaMotora = $_POST['respostaMotora'];
                $consciencia = $_POST['consciencia'];
                $orientacao = $_POST['orientacao'];
                $descPulso = $_POST['descPulso'];
                $pulso = $_POST['pulso'];
                $descFc = $_POST['descFc'];
                $FC = $_POST['FC'];
                $descPa = $_POST['descPa'];
                $PA = $_POST['PA'];
                $descPadraoRespiratorio = $_POST['descPadraoRespiratorio'];
                $padraoRespiratorio = $_POST['padraoRespiratorio'];
                $respiracao = $_POST['respiracao'];
                $abdomen = $_POST['abdomen'];
                $RHA = $_POST['RHA'];
                $alimentacao = $_POST['alimentacao'];
                $residuos = $_POST['residuos'];
                $eliminacao = $_POST['eliminacao'];
                $via = $_POST['via'];
                $descVia = $_POST['descVia'];
                $diurese = $_POST['diurese'];
                $debito = $_POST['debito'];
                $HD = $_POST['HD'];
                $sistemaEndocrino = $_POST['sistemaEndocrino'];
                $niveisGlicemicos = $_POST['niveisGlicemicos'];
                $cateteres = $_POST['cateteres'];
                $sondas = $_POST['sondas'];
                $drenos = $_POST['drenos'];
                $curativos = $_POST['curativos'];
                $sistomas = $_POST['sistomas'];
                $medicacao = $_POST['medicacao'];
                $observacao = $_POST['observacao'];
                
                $sql = "UPDATE `evolucao`
                        SET
                            `LEITO` = '".$leito."',
                            `ORIGEM` = '".$origem."',
                            `ABERTURAOCULAR` = '".$aberturaOcular."',
                            `RESPOSTAVERBAL` = '".$respostaVerbal."',
                            `RESPOSTAMOTORA` = '".$respostaMotora."',
                            `CONSCIENCIA` = '".$consciencia."',
                            `ORIENTACAO` = '".$orientacao."',
                            `PULSO` = '".$pulso."',
                            `DESCRICAOPULSO` = '".$descPulso."',
                            `FC` = '".$FC."',
                            `DESCRICAOFC` = '".$descFc."',
                            `PA` = '".$PA."',
                            `DESCRICAOPA` = '".$descPa."',
                            `PADRAORESPIRATORIO` = '".$padraoRespiratorio."',
                            `DESCPADRAORESPIRATORIO` = '".$descPadraoRespiratorio."',
                            `RESPIRACAO` = '".$respiracao."',
                            `ABDOMEM` = '".$abdomen."',
                            `RHA` = '".$RHA."',
                            `ALIMENTACAO` = '".$alimentacao."',
                            `RESIDUOS` = '".$residuos."',
                            `ELIMINACAO` = '".$eliminacao."',
                            `VIA` = '".$via."',
                            `DESCVIA` = '".$descVia."',
                            `DIURESE` = '".$diurese."',
                            `DEBITO` = '".$debito."',
                            `HD` = '".$HD."',
                            `HIPOGLICEMIANTES` = '".$sistemaEndocrino."',
                            `NIVEISGLICEMICOS` = '".$niveisGlicemicos."',
                            `CATETERES` = '".$cateteres."',
                            `SONDAS` = '".$sondas."',
                            `DRENOS` = '".$drenos."',
                            `CURATIVOS` = '".$curativos."',
                            `SINTOMAS` = '".$sistomas."',
                            `MEDICACAO` = '".$medicacao."',
                            `OBSERVACAO` = '".$observacao."'
                        WHERE `idEVOLUCAO` = '".$_POST['idEvolucao']."';
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
                $idEVOLUCAO = $_POST['idEVOLUCAO'];
                
                $sql = "DELETE FROM `evolucao`
                        WHERE `idEVOLUCAO` = '".$idEVOLUCAO."';
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
                        SELECT `evolucao`.`idEVOLUCAO`,
                            `evolucao`.`idCIRURGIA`,
                            `evolucao`.`LEITO`,
                            `evolucao`.`ORIGEM`,
                            `evolucao`.`ABERTURAOCULAR`,
                            `evolucao`.`RESPOSTAVERBAL`,
                            `evolucao`.`RESPOSTAMOTORA`,
                            `evolucao`.`CONSCIENCIA`,
                            `evolucao`.`ORIENTACAO`,
                            `evolucao`.`PULSO`,
                            `evolucao`.`DESCRICAOPULSO`,
                            `evolucao`.`FC`,
                            `evolucao`.`DESCRICAOFC`,
                            `evolucao`.`PA`,
                            `evolucao`.`DESCRICAOPA`,
                            `evolucao`.`PADRAORESPIRATORIO`,
                            `evolucao`.`DESCPADRAORESPIRATORIO`,
                            `evolucao`.`RESPIRACAO`,
                            `evolucao`.`MV`,
                            `evolucao`.`DESCMV`,
                            `evolucao`.`ABDOMEM`,
                            `evolucao`.`RHA`,
                            `evolucao`.`ALIMENTACAO`,
                            `evolucao`.`RESIDUOS`,
                            `evolucao`.`ELIMINACAO`,
                            `evolucao`.`VIA`,
                            `evolucao`.`DESCVIA`,
                            `evolucao`.`DIURESE`,
                            `evolucao`.`DEBITO`,
                            `evolucao`.`HD`,
                            `evolucao`.`HIPOGLICEMIANTES`,
                            `evolucao`.`NIVEISGLICEMICOS`,
                            `evolucao`.`CATETERES`,
                            `evolucao`.`AVC`,
                            `evolucao`.`VENOCLISE`,
                            `evolucao`.`SONDAS`,
                            `evolucao`.`DRENOS`,
                            `evolucao`.`CURATIVOS`,
                            `evolucao`.`SINTOMAS`,
                            `evolucao`.`MEDICACAO`,
                            `evolucao`.`OBSERVACAO`,
                            `evolucao`.`STATUS`
                        FROM `evolucao`
                        WHERE evolucao.idCIRURGIA='".$_POST['$idCirurgia']."';
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