<?php
    final class Profilaxia3
    {
        
        public function setDados()
        {
            try
            {
                $idCirurgia = $_POST['idCirurgia'];
                $ARNTipoS = $_POST['ARNTipoS'];
                $ARNTipoC = $_POST['ARNTipoC'];
                $risco = $_POST['risco'];
                
                
                $sql = "
                            INSERT INTO `profilaxia3`
                            (
                            `idCIRURGIA`,
                            `ARNTipoS`,
                            `ARNTipoC`,
                            `risco`)
                            VALUES
                            (
                                '".$idCirurgia."',
                                '".$ARNTipoS."',
                                '".$ARNTipoC."',
                                '".$risco."'
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
                $ARNTipoS = $_POST['ARNTipoS'];
                $ARNTipoC = $_POST['ARNTipoC'];
                $risco = $_POST['risco'];
                
                $sql = "UPDATE `profilaxia3`
                        SET
                            `ARNTipoS` = '".$ARNTipoS."',
                            `ARNTipoC` = '".$ARNTipoC."',
                            `risco` = '".$risco."'
                        WHERE `idPROFILAXIA3` = '".$_POST['idProfilaxia3']."';
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
                        SELECT *
                        FROM `profilaxia3`
                        WHERE profilaxia3.idCIRURGIA='".$_POST['$idCirurgia']."';
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