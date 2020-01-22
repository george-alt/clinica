<?php
    final class Pos3
    {
        
        public function setDados()
        {
            try
            {
                $idCirurgia = $_POST['$idCirurgia'];
                $complicaoPos3op = $_POST['complicaoPos3op'];
                $dataComplicaoPos3op = $_POST['dataComplicaoPos3op'];
                $obserReacaoAM = $_POST['obserReacaoAM'];
                $obserOutra = $_POST['obserOutra'];
                
                $sql = "INSERT INTO `pos3`
                        (
                        `idCIRURGIA`,
                        `complicaoPos3op`,
                        `dataComplicaoPos3op`,
                        `obserReacaoAM`,
                        `obserOutra`)
                        VALUES
                        (
                            '".$idCirurgia."',
                            '".$complicaoPos3op."',
                            '".$dataComplicaoPos3op."',
                            '".$obserReacaoAM."',
                            '".$obserOutra."'
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
                $idCirurgia = $_POST['$idCirurgia'];
                $complicaoPos3op = $_POST['complicaoPos3op'];
                $dataComplicaoPos3op = $_POST['dataComplicaoPos3op'];
                $obserReacaoAM = $_POST['obserReacaoAM'];
                $obserOutra = $_POST['obserOutra'];
                
                $sql = "UPDATE `pos3`
                        SET
                            `complicaoPos3op` = '".$complicaoPos3op."',
                            `dataComplicaoPos3op` = '".$dataComplicaoPos3op."',
                            `obserReacaoAM` = '".$obserReacaoAM."',
                            `obserOutra` = '".$obserOutra."'
                        WHERE `idPOS3` = '".$_POST['idPos3']."';
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
                    
                //$factory = new Factory();
                //$factory->ExecuteNonQuery($sql);
                
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
                        SELECT *
                        FROM `pos3`
                        WHERE pos3.idCIRURGIA='".$_POST['$idCirurgia']."';
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