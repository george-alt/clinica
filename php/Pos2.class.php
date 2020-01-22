<?php
    final class Pos2
    {
        
        public function setDados()
        {
            try
            {
                $idCirurgia = $_POST['$idCirurgia'];
                $dataPos2 = $_POST['dataPos2'];
                $dor = $_POST['dor'];
                $sistemaRespiratorio = $_POST['sistemaRespiratorio'];
                $sistemaDU = $_POST['sistemaDU'];
                $sistemaCardiovascular = $_POST['sistemaCardiovascular'];
                $sistemaTegumentar = $_POST['sistemaTegumentar'];
                $oberSistemaTegumentar = $_POST['oberSistemaTegumentar'];
                $sitioCirurgico = $_POST['sitioCirurgico'];
                
                $sql = "INSERT INTO `pos2`
                (
                `idCIRURGIA`,
                `DATA`,
                `DOR`,
                `sistemaRespiratorio`,
                `sistemaDU`,
                `sistemaCardiovascular`,
                `sistemaTegumentar`,
                `oberSistemaTegumentar`,
                `sitioCirurgico`)
                VALUES
                (
                    '".$idCirurgia."',
                    '".$dataPos2."',
                    '".$dor."',
                    '".$sistemaRespiratorio."',
                    '".$sistemaDU."',
                    '".$sistemaCardiovascular."',
                    '".$sistemaTegumentar."',
                    '".$oberSistemaTegumentar."',
                    '".$sitioCirurgico."'
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
                $nivelConsciencia = $_POST['nivelConsciencia'];
                $nivelConscienciaOp = $_POST['nivelConscienciaOp'];
                $sinaisVE = $_POST['sinaisVE'];
                $oberSinaisVE = $_POST['oberSinaisVE'];
                $nauseaVomito = $_POST['nauseaVomito'];
                $oberNauseaVomito = $_POST['oberNauseaVomito'];
                $tipoAnestesia = $_POST['tipoAnestesia'];
                $tipoAnestesiaOp = $_POST['tipoAnestesiaOp'];
                $CPPTE = $_POST['CPPTE'];
                $CPPTEOp = $_POST['CPPTEOp'];
                $sistemaDrenagem = $_POST['sistemaDrenagem'];
                $sistemaDrenagemOp = $_POST['sistemaDrenagemOp'];
                $oberSistemaDrenagem = $_POST['oberSistemaDrenagem'];
                $curativoCirurgico = $_POST['curativoCirurgico'];
                $curativoCirurgicoOp = $_POST['curativoCirurgicoOp'];
                $mobilidadeMembros = $_POST['mobilidadeMembros'];
                $mobilidadeMembrosOp = $_POST['mobilidadeMembrosOp'];
                $prescricaoMedica = $_POST['prescricaoMedica'];
                $avisadoMedico = $_POST['avisadoMedico'];
                $fichaETRP = $_POST['fichaETRP'];
                $fichaETRPOp = $_POST['fichaETRPOp'];
                $oberFichaETRP = $_POST['oberFichaETRP'];
                $acessoVP = $_POST['acessoVP'];
                $acessoVPOp = $_POST['acessoVPOp'];
                $oberAcessoVP = $_POST['oberAcessoVP'];
                $pacienteRDA = $_POST['pacienteRDA'];
                $pacienteRDAOp = $_POST['pacienteRDAOp'];
                $recomendacaoEspecial = $_POST['recomendacaoEspecial'];
                $oberRecomendacaoEspecial = $_POST['oberRecomendacaoEspecial'];
                
                $sql = "UPDATE `pos1`
                        SET
                        `nivelConsciencia` = '".$nivelConsciencia."',
                        `nivelConscienciaOp` = '".$nivelConscienciaOp."',
                        `sinaisVE` = '".$sinaisVE."',
                        `oberSinaisVE` = '".$oberSinaisVE."',
                        `nauseaVomito` = '".$nauseaVomito."',
                        `oberNauseaVomito` = '".$oberNauseaVomito."',
                        `tipoAnestesia` = '".$tipoAnestesia."',
                        `tipoAnestesiaOp` = '".$tipoAnestesiaOp."',
                        `CPPTE` = '".$CPPTE."',
                        `CPPTEOp` = '".$CPPTEOp."',
                        `sistemaDrenagem` = '".$sistemaDrenagem."',
                        `sistemaDrenagemOp` = '".$sistemaDrenagemOp."',
                        `oberSistemaDrenagem` = '".$oberSistemaDrenagem."',
                        `curativoCirurgico` = '".$curativoCirurgico."',
                        `curativoCirurgicoOp` = '".$curativoCirurgicoOp."',
                        `mobilidadeMembros` = '".$mobilidadeMembros."',
                        `mobilidadeMembrosOp` = '".$mobilidadeMembrosOp."',
                        `prescricaoMedica` = '".$prescricaoMedica."',
                        `avisadoMedico` = '".$avisadoMedico."',
                        `fichaETRP` = '".$fichaETRP."',
                        `fichaETRPOp` = '".$fichaETRPOp."',
                        `oberFichaETRP` = '".$oberFichaETRP."',
                        `acessoVP` = '".$acessoVP."',
                        `acessoVPOp` = '".$acessoVPOp."',
                        `oberAcessoVP` = '".$oberAcessoVP."',
                        `pacienteRDA` = '".$pacienteRDA."',
                        `pacienteRDAOp` = '".$pacienteRDAOp."',
                        `recomendacaoEspecial` = '".$recomendacaoEspecial."',
                        `oberRecomendacaoEspecial` = '".$oberRecomendacaoEspecial."'
                        WHERE `idPOS1` = '".$_POST['idPos1']."';
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
                        FROM `pos2`
                        WHERE pos2.idCIRURGIA='".$_POST['$idCirurgia']."';
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