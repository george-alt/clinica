<?php
    final class Laudo
    {
        
        public function setDados()
        {
            try
            {
                $idCirurgia = $_POST['$idCirurgia'];
                $medico1 = $_POST['$medico1'];
                $medico2 = $_POST['$medico2'];
                $medico3 = $_POST['$medico3'];
                $medico4 = $_POST['$medico4'];
                $medico5 = $_POST['$medico5'];
                $enfermeiro = $_POST['$enfermeiro'];
                $laudoAnestesiologista = $_POST['$laudoAnestesiologista'];
                $laudoInstrumentador = $_POST['$laudoInstrumentador'];
                $obserLaudoAnestesia= $_POST['$obserLaudoAnestesia'];
                $obserLaudoProfilaxia = $_POST['$obserLaudoProfilaxia'];
                $obserLaudoDiagnosticoPreOperatorio = $_POST['$obserLaudoDiagnosticoPreOperatorio'];
                $obserLaudoAchadosCirurgico1 = $_POST['$obserLaudoAchadosCirurgico1'];
                $obserLaudoAchadosCirurgico2 = $_POST['$obserLaudoAchadosCirurgico2'];
                $obserLaudoPCE= $_POST['$obserLaudoPCE'];
                $obserLaudoPPPSC = $_POST['$obserLaudoPPPSC'];
                $laudoTempoTC= $_POST['$laudoTempoTC'];
                $laudoPerdaSanguina = $_POST['$laudoPerdaSanguina'];
                
                
                $sql = "INSERT INTO `laudo`
                        (
                        `idCIRURGIA`,
                        `MEDICO1`,
                        `MEDICO2`,
                        `MEDICO3`,
                        `MEDICO4`,
                        `MEDICO5`,
                        `ENFERMEIRO`,
                        `ANESTESIOLOGISTA`,
                        `INSTRUMENTADOR`,
                        `ANSTESIA`,
                        `PROFILAXIA`,
                        `DIAGNOSTICOPREOPERATORIO`,
                        `ACHADOCIRURGICO1`,
                        `ACHADOCIRURGICO2`,
                        `PROCEDIMENTOCIRURGICOEFETUADOS`,
                        `PPPSC`,
                        `TEMPOCIRURGIA`,
                        `PERDASANGUINEA`)
                        VALUES
                        (
                            '".$idCirurgia."',
                            '".$medico1."',
                            '".$medico2."',
                            '".$medico3."',
                            '".$medico4."',
                            '".$medico5."',
                            '".$enfermeiro."',
                            '".$laudoAnestesiologista."',
                            '".$laudoInstrumentador."',
                            '".$obserLaudoAnestesia."',
                            '".$obserLaudoProfilaxia."',
                            '".$obserLaudoDiagnosticoPreOperatorio."',
                            '".$obserLaudoAchadosCirurgico1."',
                            '".$obserLaudoAchadosCirurgico2."',
                            '".$obserLaudoPCE."',
                            '".$obserLaudoPPPSC."',
                            '".$laudoTempoTC."',
                            '".$laudoPerdaSanguina."'
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
                $medico1 = $_POST['$medico1'];
                $medico2 = $_POST['$medico2'];
                $medico3 = $_POST['$medico3'];
                $medico4 = $_POST['$medico4'];
                $medico5 = $_POST['$medico5'];
                $enfermeiro = $_POST['$enfermeiro'];
                $laudoAnestesiologista = $_POST['$laudoAnestesiologista'];
                $laudoInstrumentador = $_POST['$laudoInstrumentador'];
                $obserLaudoAnestesia= $_POST['$obserLaudoAnestesia'];
                $obserLaudoProfilaxia = $_POST['$obserLaudoProfilaxia'];
                $obserLaudoDiagnosticoPreOperatorio = $_POST['$obserLaudoDiagnosticoPreOperatorio'];
                $obserLaudoAchadosCirurgico1 = $_POST['$obserLaudoAchadosCirurgico1'];
                $obserLaudoAchadosCirurgico2 = $_POST['$obserLaudoAchadosCirurgico2'];
                $obserLaudoPCE= $_POST['$obserLaudoPCE'];
                $obserLaudoPPPSC = $_POST['$obserLaudoPPPSC'];
                $laudoTempoTC= $_POST['$laudoTempoTC'];
                $laudoPerdaSanguina = $_POST['$laudoPerdaSanguina'];
                
                $sql = "UPDATE `laudo`
                        SET
                            `MEDICO1` = '".$medico1."',
                            `MEDICO2` = '".$medico2."',
                            `MEDICO3` = '".$medico3."',
                            `MEDICO4` = '".$medico4."',
                            `MEDICO5` ='".$medico5."',
                            `ENFERMEIRO` = '".$enfermeiro."',
                            `ANESTESIOLOGISTA` = '".$laudoAnestesiologista."',
                            `INSTRUMENTADOR` = '".$laudoInstrumentador."',
                            `ANSTESIA` = '".$obserLaudoAnestesia."',
                            `PROFILAXIA` = '".$obserLaudoProfilaxia."',
                            `DIAGNOSTICOPREOPERATORIO` = '".$obserLaudoDiagnosticoPreOperatorio."',
                            `ACHADOCIRURGICO1` = '".$obserLaudoAchadosCirurgico1."',
                            `ACHADOCIRURGICO2` = '".$obserLaudoAchadosCirurgico2."',
                            `PROCEDIMENTOCIRURGICOEFETUADOS` = '".$obserLaudoPCE."',
                            `PPPSC` = '".$obserLaudoPPPSC."',
                            `TEMPOCIRURGIA` = '".$laudoTempoTC."',
                            `PERDASANGUINEA` = '".$laudoPerdaSanguina."'
                        WHERE `idLAUDO` = '".$_POST['idLaudo']."';
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
                        FROM `laudo`
                        WHERE laudo.idCIRURGIA='".$_POST['$idCirurgia']."';
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