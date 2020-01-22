<?php
    final class Profilaxia2
    {
        
        public function setDados()
        {
            try
            {
                $idCirurgia = $_POST['idCirurgia'];
                $fatoRiscoParaTEV = $_POST['fatoRiscoParaTEV'];
                
                
                $sql = "
                            INSERT INTO `profilaxia2`
                                    (
                                    `idCIRURGIA`,
                                    `DESCRICAO`)
                                    VALUES
                                    (
                                        '".$idCirurgia."',
                                        '".$fatoRiscoParaTEV."'
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
                $fatoRiscoParaTEV = $_POST['fatoRiscoParaTEV'];
                
                $sql = "UPDATE `profilaxia2`
                        SET
                            `DESCRICAO` = '".$fatoRiscoParaTEV."'
                        WHERE `idPROFILAXIA2` = '".$_POST['idProfilaxia2']."';
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
                        SELECT `profilaxia2`.`idPROFILAXIA2`,
                               `profilaxia2`.`DESCRICAO`
                        FROM `profilaxia2`
                        WHERE profilaxia2.idCIRURGIA='".$_POST['$idCirurgia']."';
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