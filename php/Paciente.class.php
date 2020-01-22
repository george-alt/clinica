<?php
    final class Paciente
    {
        
        public function getDados()
        {
            try
            {
                $sql = '
                    SELECT `paciente`.`idPACIENTE`,
                        `paciente`.`NOME` as "Nome",
                        `paciente`.`DATANASC` as "Data de Nascimento",
                        `paciente`.`SEXO` as "Sexo",
                        `paciente`.`CEP` as "Cep",
                        `paciente`.`ENDERECO` as "Endereço",
                        `paciente`.`NUMERO` as "Numero",
                        `paciente`.`BAIRRO` as "Bairro",
                        `paciente`.`CIDADE` as "Cidade",
                        `paciente`.`UF`,
                        `paciente`.`COMPLEMENTO` as "Complemento",
                        `paciente`.`TELEFONE` as "Telefone",
                        CASE `paciente`.`STATUS`
                        WHEN 0 THEN "Inativo"
                        WHEN 1 THEN "Ativo"
                        END as "Status"
                    FROM `paciente`;

                ';
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
                                if($col === "idPACIENTE")
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
                            if($col === "idPACIENTE")
                            {
                                $html .= "<td style='display:none;'>".$value."</td>";
                            }
                            else
                            {
                                if($col === "Nome")
                                {
                                    $html .= '<td><img width="28" height="28" src="assets/img/user.jpg" class="rounded-circle m-r-5" alt=""> '.$value.'</td>';
                                }
                                else if($col === "Status")
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
        
        public function newPaciente()
        {
            try
            {
                $sql = "
                    SELECT 
                        `paciente`.`NOME` AS 'Nome',
                        `paciente`.`TELEFONE` AS 'Telefone'
                    FROM
                        `paciente`
                    order by 
                        paciente.idPACIENTE desc
                    limit 10;";
                $factory = new Factory();
                $arrayResult = $factory->ExecuteDataSet($sql);
                
                $html = "<tbody>";
                $cont = 0;
                foreach($arrayResult as $field)
                {
                        $html .= "<tr>";
                        foreach($field as $col => $value)
                        {
                            if($col === "idPACIENTE")
                            {
                                $html .= "<td style='display:none;'>".$value."</td>";
                            }
                            else
                            {
                                if($col === "Nome")
                                {
                                    $html .= '<td><img width="28" height="28" src="assets/img/user.jpg" class="rounded-circle m-r-5" alt=""> '.$value.'</td>';
                                }
                                else
                                {
                                    $html .= "<td>".$value."</td>";
                                }
                            }
                        }
                        
                }
                    $html .= "</tbody>";

                return $html;
            }
            catch(Exception $e)
            {
                return $e->getMessage();
            }
        }
        
        public function proximosCompromissos()
        {
            try
            {
                $sql = '
                    SELECT 
                        paciente.NOME as "PACIENTE",
                        paciente.CIDADE,
                        paciente.UF,
                        medico.NOME AS "MEDICO",
                        cirurgia.HORACIRURGIA
                    FROM
                        paciente,
                        colaboradores medico,
                        colaboradores enfermeiro,
                        cirurgia
                    WHERE paciente.idPACIENTE = cirurgia.PACIENTE
                    and medico.idCOLOBORADORES = cirurgia.MEDICO
                    and enfermeiro.idCOLOBORADORES = cirurgia.ENFERMEIRO
                    and cirurgia.DATACIRURGIA = "'.date("Y-m-d").'"
                    and cirurgia.HORACIRURGIA >= "'.date("h:i:s").'";

                ';
                $factory = new Factory();
                $arrayResult = $factory->ExecuteDataSet($sql);
                
                $html = "<tbody>";
                $cont = 0;
                foreach($arrayResult as $field)
                {
                        $html .= "<tr>";
                        foreach($field as $col => $value)
                        {
                            if($col === "PACIENTE")
                            {
                                $nome = $value;
                                $rest = substr($nome, 0, 1);
                            }
                            else if($col === "CIDADE")
                            {
                                $cidade = $value;
                            }
                            if($col === "UF")
                            {
                                $uf = $value;
                            }
                            if($col === "MEDICO")
                            {
                                $medico = $value;
                            }
                            else
                            {
                                $hora = $value;
                            }
                        }
                    
                    $html .= '
                            
                            <tr>
                                <td style="min-width: 200px;">
                                    <a class="avatar" href="#">'.$rest.'</a>
                                    <h2><a href="#">'.$nome.' <span>'.$cidade.', '.$uf.'</span></a></h2>
                                </td>                 
                                <td>
                                    <h5 class="time-title p-0">Nomeação com</h5>
                                    <p>'.$medico.'</p>
                                </td>
                                <td>
                                    <h5 class="time-title p-0">Horário</h5>
                                    <p>'.$hora.'</p>
                                </td>
                            </tr>
                            
                    ';
                        
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
                $nome = $_POST['nome'];
                $dataNasc = $_POST['dataNasc'];
                $sexo = $_POST['sexo'];
                $cep = $_POST['cep'];
                $endereco = $_POST['endereco'];
                $bairro = $_POST['bairro'];
                $cidade = $_POST['cidade'];
                $uf = $_POST['uf'];
                $numero = $_POST['numero'];
                $complemento = $_POST['complemento'];
                $telefone = $_POST['telefone'];
                $status = $_POST['status'];
                
                /*$dataNew = explode("/",$dataNasc);
                $dataNasc = $dataNew[2]."-".$dataNew[1]."-".$dataNew[0];*/
                
                $sql = "INSERT INTO `paciente`
                        (
                        `NOME`,
                        `DATANASC`,
                        `SEXO`,
                        `CEP`,
                        `ENDERECO`,
                        `NUMERO`,
                        `BAIRRO`,
                        `CIDADE`,
                        `UF`,
                        `COMPLEMENTO`,
                        `TELEFONE`,
                        `STATUS`)
                        VALUES
                        (
                            '".$nome."',
                            '".$dataNasc."',
                            '".$sexo."',
                            '".$cep."',
                            '".$endereco."',
                            '".$numero."',
                            '".$bairro."',
                            '".$cidade."',
                            '".$uf."',
                            '".$complemento."',
                            '".$telefone."',
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
                $nome = $_POST['nome'];
                $dataNasc = $_POST['dataNasc'];
                $sexo = $_POST['sexo'];
                $cep = $_POST['cep'];
                $endereco = $_POST['endereco'];
                $bairro = $_POST['bairro'];
                $cidade = $_POST['cidade'];
                $uf = $_POST['uf'];
                $numero = $_POST['numero'];
                $complemento = $_POST['complemento'];
                $telefone = $_POST['telefone'];
                $status = $_POST['status'];
                
                /*$dataNew = explode("/",$dataNasc);
                $dataNasc = $dataNew[2]."-".$dataNew[1]."-".$dataNew[0];*/
                
                $sql = "UPDATE `paciente`
                        SET
                            `NOME` = '".$nome."',
                            `DATANASC` = '".$dataNasc."',
                            `SEXO` = '".$sexo."',
                            `CEP` = '".$cep."',
                            `ENDERECO` = '".$endereco."',
                            `NUMERO` = '".$numero."',
                            `BAIRRO` = '".$bairro."',
                            `CIDADE` = '".$cidade."',
                            `UF` = '".$uf."',
                            `COMPLEMENTO` = '".$complemento."',
                            `TELEFONE` = '".$telefone."',
                            `STATUS` = '".$status."'
                        WHERE `idPACIENTE` = '".$_SESSION['idPACIENTE']."';

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
                $idPACIENTE = $_POST['idPACIENTE'];
                
                $sql = "DELETE FROM `paciente`
                        WHERE `idPACIENTE` = '".$idPACIENTE."';
                        ";
                    
                $factory = new Factory();
                $factory->ExecuteNonQuery($sql);
                
            }
            catch(Exception $e)
            {
                return $e->getMessage();
            }
        }
        
        public function contPaciente()
        {
            try
            {
                $sql = "SELECT count(paciente.idPACIENTE) as 'PACIENTE' FROM paciente;";
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