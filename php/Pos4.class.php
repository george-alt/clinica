<?php
    final class Pos4
    {
        
        public function setDados()
        {
            try
            {
                $idCirurgia = $_POST['$idCirurgia'];
                $alta = $_POST['alta'];
                $obserAlta = $_POST['obserAlta'];
                $bomEG = $_POST['bomEG'];
                $dispositivo = $_POST['dispositivo'];
                $dispositivoOp = $_POST['dispositivoOp'];
                $obserDispositivos = $_POST['obserDispositivos'];
                $avaliacaoFC = $_POST['avaliacaoFC'];
                $avaliacaoFCOp = $_POST['avaliacaoFCOp'];
                $OCADRA= $_POST['OCADRA'];
                $obserOCADRA = $_POST['obserOCADRA'];
                
                
                $sql = "INSERT INTO `pos4`
                        (
                        `idCIRURGIA`,
                        `alta`,
                        `obserAlta`,
                        `bomEG`,
                        `dispositivo`,
                        `dispositivoOp`,
                        `obserDispositivos`,
                        `avaliacaoFC`,
                        `avaliacaoFCOp`,
                        `OCADRA`,
                        `obserOCADRA`)
                        VALUES
                        (
                            '".$idCirurgia."',
                            '".$alta."',
                            '".$obserAlta."',
                            '".$bomEG."',
                            '".$dispositivo."',
                            '".$dispositivoOp."',
                            '".$obserDispositivos."',
                            '".$avaliacaoFC."',
                            '".$avaliacaoFCOp."',
                            '".$OCADRA."',
                            '".$obserOCADRA."'
                        );";
                 
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
                $alta = $_POST['alta'];
                $obserAlta = $_POST['obserAlta'];
                $bomEG = $_POST['bomEG'];
                $dispositivo = $_POST['dispositivo'];
                $dispositivoOp = $_POST['dispositivoOp'];
                $obserDispositivos = $_POST['obserDispositivos'];
                $avaliacaoFC = $_POST['avaliacaoFC'];
                $avaliacaoFCOp = $_POST['avaliacaoFCOp'];
                $OCADRA= $_POST['OCADRA'];
                $obserOCADRA = $_POST['obserOCADRA'];
                
                $sql = "UPDATE `pos4`
                        SET
                            `alta` = '".$alta."',
                            `obserAlta` = '".$obserAlta."',
                            `bomEG` = '".$bomEG."',
                            `dispositivo` = '".$dispositivo."',
                            `dispositivoOp` = '".$dispositivoOp."',
                            `obserDispositivos` = '".$obserDispositivos."',
                            `avaliacaoFC` = '".$avaliacaoFC."',
                            `avaliacaoFCOp` = '".$avaliacaoFCOp."',
                            `OCADRA` = '".$OCADRA."',
                            `obserOCADRA` = '".$obserOCADRA."'
                        WHERE `idPOS4` = '".$_POST['idPos4']."';
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
                        FROM `pos4`
                        WHERE pos4.idCIRURGIA='".$_POST['$idCirurgia']."';
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