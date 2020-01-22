<?php
    final class Profilaxia1
    {
        
        public function setDados()
        {
            try
            {
                $idCirurgia = $_POST['idCirurgia'];
                $tipoRisco = $_POST['tipoRisco'];
                $astroplastiaQuadril = $_POST['astroplastiaQuadril'];
                $astroplastiaJoelho = $_POST['astroplastiaJoelho'];
                $faturaQuadril = $_POST['faturaQuadril'];
                $ontologicaCurativo = $_POST['ontologicaCurativo'];
                $treumaRequimedular = $_POST['treumaRequimedular'];
                $plitreuma = $_POST['plitreuma'];
                $idade = $_POST['idade'];
                $fatoresRTEV = $_POST['fatoresRTEV'];
                $endoscopia = $_POST['endoscopia'];
                $laparoscopia = $_POST['laparoscopia'];
                $superficial = $_POST['superficial'];
                $oftalmologia = $_POST['oftalmologia'];
                $otorrinolaringologia = $_POST['otorrinolaringologia'];
                $outras = $_POST['outras'];
                $varnivelRisco = $_POST['varnivelRisco'];
                $sangramentoAtivo = $_POST['sangramentoAtivo'];
                $ulceraPA = $_POST['ulceraPA'];
                $cirurgiaCO2S = $_POST['cirurgiaCO2S'];
                $alergiaPPH = $_POST['alergiaPPH'];
                $coagulopatia = $_POST['coagulopatia'];
                $coleteLCR = $_POST['coleteLCR'];
                $insuficienciaRenal = $_POST['insuficienciaRenal'];
                $HASNC = $_POST['HASNC'];
                
                
                $sql = "
                            INSERT INTO `profilaxia1`
                                    (
                                    `idCIRURGIA`,
                                    `TIPORISCO`,
                                    `astroplastiaQuadril`,
                                    `astroplastiaJoelho`,
                                    `faturaQuadril`,
                                    `ontologicaCurativo`,
                                    `treumaRequimedular`,
                                    `plitreuma`,
                                    `idade`,
                                    `fatoresRTEV`,
                                    `endoscopia`,
                                    `laparoscopia`,
                                    `superficial`,
                                    `oftalmologia`,
                                    `otorrinolaringologia`,
                                    `outras`,
                                    `varnivelRisco`,
                                    `sangramentoAtivo`,
                                    `ulceraPA`,
                                    `cirurgiaCO2S`,
                                    `alergiaPPH`,
                                    `coagulopatia`,
                                    `coleteLCR`,
                                    `insuficienciaRenal`,
                                    `HASNC`)
                                    VALUES
                                    (
                                        '".$idCirurgia."',
                                        '".$tipoRisco."',
                                        '".$astroplastiaQuadril."',
                                        '".$astroplastiaJoelho."',
                                        '".$faturaQuadril."',
                                        '".$ontologicaCurativo."',
                                        '".$treumaRequimedular."',
                                        '".$plitreuma."',
                                        '".$idade."',
                                        '".$fatoresRTEV."',
                                        '".$endoscopia."',
                                        '".$laparoscopia."',
                                        '".$superficial."',
                                        '".$oftalmologia."',
                                        '".$otorrinolaringologia."',
                                        '".$outras."',
                                        '".$varnivelRisco."',
                                        '".$sangramentoAtivo."',
                                        '".$ulceraPA."',
                                        '".$cirurgiaCO2S."',
                                        '".$alergiaPPH."',
                                        '".$coagulopatia."',
                                        '".$coleteLCR."',
                                        '".$insuficienciaRenal."',
                                        '".$HASNC."'
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
                $tipoRisco = $_POST['tipoRisco'];
                $astroplastiaQuadril = $_POST['astroplastiaQuadril'];
                $astroplastiaJoelho = $_POST['astroplastiaJoelho'];
                $faturaQuadril = $_POST['faturaQuadril'];
                $ontologicaCurativo = $_POST['ontologicaCurativo'];
                $treumaRequimedular = $_POST['treumaRequimedular'];
                $plitreuma = $_POST['plitreuma'];
                $idade = $_POST['idade'];
                $fatoresRTEV = $_POST['fatoresRTEV'];
                $endoscopia = $_POST['endoscopia'];
                $laparoscopia = $_POST['laparoscopia'];
                $superficial = $_POST['superficial'];
                $oftalmologia = $_POST['oftalmologia'];
                $otorrinolaringologia = $_POST['otorrinolaringologia'];
                $outras = $_POST['outras'];
                $varnivelRisco = $_POST['varnivelRisco'];
                $sangramentoAtivo = $_POST['sangramentoAtivo'];
                $ulceraPA = $_POST['ulceraPA'];
                $cirurgiaCO2S = $_POST['cirurgiaCO2S'];
                $alergiaPPH = $_POST['alergiaPPH'];
                $coagulopatia = $_POST['coagulopatia'];
                $coleteLCR = $_POST['coleteLCR'];
                $insuficienciaRenal = $_POST['insuficienciaRenal'];
                $HASNC = $_POST['HASNC'];
                
                $sql = "UPDATE `profilaxia1`
                        SET
                            `TIPORISCO` = '".$tipoRisco."',
                            `astroplastiaQuadril` = '".$astroplastiaQuadril."',
                            `astroplastiaJoelho` = '".$astroplastiaJoelho."',
                            `faturaQuadril` = '".$faturaQuadril."',
                            `ontologicaCurativo` = '".$ontologicaCurativo."',
                            `treumaRequimedular` = '".$treumaRequimedular."',
                            `plitreuma` = '".$plitreuma."',
                            `idade` = '".$idade."',
                            `fatoresRTEV` = '".$fatoresRTEV."',
                            `endoscopia` = '".$endoscopia."',
                            `laparoscopia` = '".$laparoscopia."',
                            `superficial` = '".$superficial."',
                            `oftalmologia` = '".$oftalmologia."',
                            `otorrinolaringologia` = '".$otorrinolaringologia."',
                            `outras` = '".$outras."',
                            `varnivelRisco` = '".$varnivelRisco."',
                            `sangramentoAtivo` = '".$sangramentoAtivo."',
                            `ulceraPA` = '".$ulceraPA."',
                            `cirurgiaCO2S` = '".$cirurgiaCO2S."',
                            `alergiaPPH` = '".$alergiaPPH."',
                            `coagulopatia` = '".$coagulopatia."',
                            `coleteLCR` = '".$coleteLCR."',
                            `insuficienciaRenal` = '".$insuficienciaRenal."',
                            `HASNC` = '".$HASNC."'
                        WHERE `idPROFILAXIA1` = '".$_POST['idProfilaxia1']."';
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
                        SELECT `profilaxia1`.`idPROFILAXIA1`,
                            `profilaxia1`.`idCIRURGIA`,
                            `profilaxia1`.`TIPORISCO`,
                            `profilaxia1`.`astroplastiaQuadril`,
                            `profilaxia1`.`astroplastiaJoelho`,
                            `profilaxia1`.`faturaQuadril`,
                            `profilaxia1`.`ontologicaCurativo`,
                            `profilaxia1`.`treumaRequimedular`,
                            `profilaxia1`.`plitreuma`,
                            `profilaxia1`.`idade`,
                            `profilaxia1`.`fatoresRTEV`,
                            `profilaxia1`.`endoscopia`,
                            `profilaxia1`.`laparoscopia`,
                            `profilaxia1`.`superficial`,
                            `profilaxia1`.`oftalmologia`,
                            `profilaxia1`.`otorrinolaringologia`,
                            `profilaxia1`.`outras`,
                            `profilaxia1`.`varnivelRisco`,
                            `profilaxia1`.`sangramentoAtivo`,
                            `profilaxia1`.`ulceraPA`,
                            `profilaxia1`.`cirurgiaCO2S`,
                            `profilaxia1`.`alergiaPPH`,
                            `profilaxia1`.`coagulopatia`,
                            `profilaxia1`.`coleteLCR`,
                            `profilaxia1`.`insuficienciaRenal`,
                            `profilaxia1`.`HASNC`
                        FROM `profilaxia1`
                        WHERE profilaxia1.idCIRURGIA='".$_POST['$idCirurgia']."';
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