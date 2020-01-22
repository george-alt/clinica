<?php
    final class Cirurgia
    {
        
        public function getDados()
        {
            try
            {
                $sql = "
                        
                        SELECT 
                            cirurgia.idCIRURGIA,
                            cirurgia.DESCRICAO AS 'Descrição',
                            cirurgia.PACIENTE AS 'idPaciente',
                            paciente.NOME as 'Paciente',
                            cirurgia.ENFERMEIRO AS 'idEnfermeiro',
                            col.NOME AS 'Enfermeiro(a)',
                            cirurgia.MEDICO AS 'idMédico',
                            colaboradores.NOME AS 'Médico(a)',
                            DATE_FORMAT(cirurgia.DATACIRURGIA, '%d/%m/%Y') AS 'Cirurgia',
                            cirurgia.HORACIRURGIA AS 'Hora',
                            CASE cirurgia.STATUS
                                WHEN 0 THEN 'Em Andamento'
                                WHEN 1 THEN 'Completo'
                            END AS 'Status'
                        FROM
                            cirurgia,
                            colaboradores,
                            paciente,
                            colaboradores col
                        WHERE
                            colaboradores.idCOLOBORADORES = cirurgia.MEDICO
                                AND col.idCOLOBORADORES = cirurgia.ENFERMEIRO
                                AND paciente.idPACIENTE = cirurgia.PACIENTE
                ";
                $factory = new Factory();
                $arrayResult = $factory->ExecuteDataSet($sql);
                
                $html = "<thead>";
                $cont = 0;
                foreach($arrayResult as $field)
                {
                    if($cont == 0)
                    {
                        $html .= "<tr>";
                            foreach($field as $col => $value)
                            {
                                if($col === "idCIRURGIA" || $col === "idEnfermeiro" || $col === "idMédico" || $col === "idPaciente")
                                {
                                    $html .= "<th style='display:none;'>".$col."</th>";
                                }
                                else
                                {
                                    $html .= "<th>".$col."</th>";
                                }
                            }
                        
                        $html .= "<th></th>";
                        $html .= "<th></th>";
                        $html .= "<th></th>";
                        $html .= "<th class='text-right'>Opções</th>";
                        $html .= "</tr>";
                        $html .= "</thead>";
                        
                        $cont++;
                        
                        $html .= "<tbody>";
                    }
                        $html .= "<tr>";
                        foreach($field as $col => $value)
                        {
                            if($col === "idCIRURGIA" || $col === "idEnfermeiro" || $col === "idMédico" || $col === "idPaciente")
                            {
                                $html .= "<td style='display:none;'>".$value."</td>";
                            }
                            else
                            {
                                if($col === "Status")
                                {
                                    if($value === "Completo")
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
                    
                    $html .= '<td class="circulo1Click"><img src="img/circle-icon-orange.png" class="img-thumbnail" alt="Pré" width="40px" height="40px"> Pré</td>';
                    $html .= '<td class="circulo2Click"><img src="img/circle-icon-green.png" class="img-thumbnail" alt="Trans" width="45px" height="45px"></div> Trans</td>';
                    $html .= '<td class="circulo3Click"><img src="img/circle-icon-blue.png" class="img-thumbnail" alt="Pos" width="40px" height="40px"> Pos</td>';
                    
                    
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
                $paciente = $_POST['paciente'];
                $enfermeiro = $_POST['enfermeiro'];
                $medico = $_POST['medico'];
                $descricao = $_POST['descricao'];
                $data = $_POST['data'];
                $hora = $_POST['hora'];
                $satus = $_POST['status'];
                
                $dataNew = explode("/",$data);
                $data = $dataNew[2]."-".$dataNew[1]."-".$dataNew[0];
                
                $sql = "INSERT INTO `cirurgia`
                        (
                        `DESCRICAO`,
                        `PACIENTE`,
                        `ENFERMEIRO`,
                        `MEDICO`,
                        `DATACIRURGIA`,
                        `HORACIRURGIA`,
                        `DATACADASTRO`,
                        `status`)
                        VALUES
                        (
                            '".$descricao."',
                            '".$paciente."',
                            '".$enfermeiro."',
                            '".$medico."',
                            '".$data."',
                            '".$hora."',
                            '".date("Y-m-d")."',
                            '".$satus."'
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
                $paciente = $_POST['paciente'];
                $enfermeiro = $_POST['enfermeiro'];
                $medico = $_POST['medico'];
                $descricao = $_POST['descricao'];
                $data = $_POST['data'];
                $hora = $_POST['hora'];
                $status = $_POST['status'];
                
                $dataNew = explode("/",$data);
                $data = $dataNew[2]."-".$dataNew[1]."-".$dataNew[0];
                
                $sql = "UPDATE `cirurgia`
                        SET
                            `DESCRICAO` = '".$descricao."',
                            `PACIENTE` = '".$paciente."',
                            `ENFERMEIRO` = '".$enfermeiro."',
                            `MEDICO` = '".$medico."',
                            `DATACIRURGIA` = '".$data."',
                            `HORACIRURGIA` = '".$hora."',
                            `status` = '".$status."'
                        WHERE `idCIRURGIA` = '".$_SESSION['idCirurgia']."';
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
                $idCirurgia = $_POST['idCirurgia'];
                
                $sql = "DELETE FROM `cirurgia`
                        WHERE `idCIRURGIA` = '".$idCirurgia."';
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
        
        public function montCampoMedico()
        {
            try
            {
                
                $sql = "SELECT colaboradores.idCOLOBORADORES, colaboradores.NOME FROM colaboradores where CARGO = 1;";
                    
                $factory = new Factory();
                $arrayResult = $factory->ExecuteDataSet($sql);
                
                $html = "";
                
                for($i = 0; $i <= count($arrayResult[0]); $i++)
                {
                    
                    $html .= "<option value='".$arrayResult[$i]['idCOLOBORADORES']."'>".$arrayResult[$i]['NOME']."</option>";
                }
                
                return $html;
            }
            catch(Exception $e)
            {
                return $e->getMessage();
            }
        }
        
        public function montCampoEnfermeiro()
        {
            try
            {
                
                $sql = "SELECT colaboradores.idCOLOBORADORES, colaboradores.NOME FROM colaboradores where CARGO = 2;";
                    
                $factory = new Factory();
                $arrayResult = $factory->ExecuteDataSet($sql);
                
                $html = "";
                
                for($i = 0; $i <= count($arrayResult[0]); $i++)
                {
                    
                    $html .= "<option value='".$arrayResult[$i]['idCOLOBORADORES']."'>".$arrayResult[$i]['NOME']."</option>";
                }
                
                return $html;
            }
            catch(Exception $e)
            {
                return $e->getMessage();
            }
        }
        
        public function montCampo($cargo)
        {
            try
            {
                
                $sql = "SELECT colaboradores.idCOLOBORADORES, colaboradores.NOME FROM colaboradores where CARGO = '".$cargo."';";
                    
                $factory = new Factory();
                $arrayResult = $factory->ExecuteDataSet($sql);
                
                $html = "";
                
                for($i = 0; $i <= count($arrayResult[0]); $i++)
                {
                    
                    $html .= "<option value='".$arrayResult[$i]['idCOLOBORADORES']."'>".$arrayResult[$i]['NOME']."</option>";
                }
                
                return $html;
            }
            catch(Exception $e)
            {
                return $e->getMessage();
            }
        }
        
        public function montCampOPaciente()
        {
            try
            {
                
                $sql = "SELECT `paciente`.`idPACIENTE`, `paciente`.`NOME` FROM `paciente`;";
                    
                $factory = new Factory();
                $arrayResult = $factory->ExecuteDataSet($sql);
                
                $html = "";
                
                for($i = 0; $i <= count($arrayResult[0]); $i++)
                {
                    
                    $html .= "<option value='".$arrayResult[$i]['idPACIENTE']."'>".$arrayResult[$i]['NOME']."</option>";
                }
                
                return $html;
            }
            catch(Exception $e)
            {
                return $e->getMessage();
            }
        }

        public function contCirurgiaIndex()
        {
            try
            {
                $sql = "SELECT count(cirurgia.status) as 'STATUS' FROM cirurgia where cirurgia.status = 0;";
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