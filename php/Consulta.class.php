<?php
    final class Consulta
    {
        
        public function getDados()
        {
            try
            {
                $sql = 'SELECT `consulta`.`idCONSULTA`,
                            `consulta`.`NOME` as "Nome",
                            `consulta`.`DATANASC` as "Nascimento",
                            `consulta`.`LEITO` as "Leito",
                            `consulta`.`DATAINTERNACAO` as "Internação",
                            `consulta`.`PCP`,
                            `consulta`.`PCA`,
                            `consulta`.`PA`,
                            `consulta`.`T`,
                            `consulta`.`F`,
                            `consulta`.`FR`,
                            `consulta`.`CIRURGIAANTERIOR` as "Cirurgia Anterior",
                            CASE `consulta`.`COMORBIDADES`
                            WHEN 0 THEN "Não"
                            WHEN 1 THEN "Sim"
                            END as "Comorbidades",
                            `consulta`.`COMENTARIOCOMORBIDADES` as "Observação Comorbidades",
                            `consulta`.`EXAMESDISPONIVEIS` as "Exames Disponiveis",
                            `consulta`.`MEDICACAODOMICILIO` as "Medicação Domicilio",
                            CASE `consulta`.`TABAGISTA`
                            WHEN 0 THEN "Não"
                            WHEN 1 THEN "Sim"
                            END  as "Tabagista",
                            CASE `consulta`.`ETILISTA`
                            WHEN 0 THEN "Não"
                            WHEN 1 THEN "Sim"
                            END as "Etilista",
                            CASE `consulta`.`ALERGIAS`
                            WHEN 0 THEN "Não"
                            WHEN 1 THEN "Sim"
                            END as "Alergias",
                            `consulta`.`COMENTARIOALERGIA` as "Observação Alergias",
                            CASE `consulta`.`RPI`
                            WHEN 0 THEN "Não"
                            WHEN 1 THEN "Sim"
                            WHEN 2 THEN "Não se aplica"
                            END as "RPI",
                            CASE `consulta`.`RDC`
                            WHEN 0 THEN "Não"
                            WHEN 1 THEN "Sim"
                            WHEN 2 THEN "Não se aplica"
                            END as "RDC",
                            CASE `consulta`.status
                            WHEN 0 THEN "Inativo"
                            WHEN 1 THEN "Ativo"
                            END as "Status"
                        FROM `consulta`;';
                        
                $factory = new Factory();
                $arrayResult = $factory->ExecuteDataSet($sql);
                
                if($arrayResult == null)
                {
                    $html = "<thead>
                                <tr>
                                    <th>NOME</th>
                                    <th>Nascimento</th>
                                    <th>Leito</th>
                                    <th>Internação</th>
                                    <th>PCA</th>
                                    <th>PA</th>
                                    <th>T</th>
                                    <th>F</th>
                                    <th>FT</th>
                                    <th>Cirurgia Anterior</th>
                                    <th>Comorbidas</th>
                                    <th>Exames Disponiveis</th>
                                    <th>Medicação Domicilio</th>
                                    <th>Tabagista</th>
                                    <th>Etilista</th>
                                    <th>Alergias</th>
                                    <th>Observação</th>
                                    <th>RPI</th>
                                    <th>RDC</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                    ";
                    
                    return $html;
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
                                if($col === "idCONSULTA")
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
                            if($col === "idCONSULTA")
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
                $dataNacismento = $_POST['dataNacismento'];
                $leito = $_POST['leito'];
                $dataInternacao = $_POST['dataInternacao'];
                $pcp = $_POST['pcp'];
                $pca = $_POST['pca'];
                $pa = $_POST['pa'];
                $t = $_POST['t'];
                $f = $_POST['f'];
                $fr = $_POST['fr'];
                $comorbidades = $_POST['comorbidades'];
                $especificarComorbidades = $_POST['especificarComorbidades'];
                $tabagista = $_POST['tabagista'];
                $etilista = $_POST['etilista'];
                $alergias = $_POST['alergias'];
                $especificarAlergias = $_POST['especificarAlergias'];
                $rpi = $_POST['rpi'];
                $rdc = $_POST['rdc'];
                $examesDiponiveis = $_POST['examesDiponiveis'];
                $MedicacaoDomicilio = $_POST['MedicacaoDomicilio'];
                $cirurgiaAnterior = $_POST['cirurgiaAnterior'];
                $status = $_POST['status'];
                
                $sql = "INSERT INTO `consulta`
                                (
                                    `idCIRURGIA`,
                                    `DATANASC`,
                                    `LEITO`,
                                    `DATAINTERNACAO`,
                                    PCP,
                                    `PCA`,
                                    `PA`,
                                    `T`,
                                    `F`,
                                    `FR`,
                                    `CIRURGIAANTERIOR`,
                                    `COMORBIDADES`,
                                    `EXAMESDISPONIVEIS`,
                                    `MEDICACAODOMICILIO`,
                                    `TABAGISTA`,
                                    `ETILISTA`,
                                    `ALERGIAS`,
                                    `COMENTARIOALERGIA`,
                                    `RPI`,
                                    `RDC`,
                                    `COMENTARIOCOMORBIDADES`,
                                    status
                                )
                                VALUES
                                (
                                    '".$idCirurgia."',
                                    '".$dataNacismento."',
                                    '".$leito."',
                                    '".$dataInternacao."',
                                    '".$pcp."',
                                    '".$pca."',
                                    '".$pa."',
                                    '".$t."',
                                    '".$f."',
                                    '".$fr."',
                                    '".$cirurgiaAnterior."',
                                    '".$comorbidades."',
                                    '".$examesDiponiveis."',
                                    '".$MedicacaoDomicilio."',
                                    '".$tabagista."',
                                    '".$etilista."',
                                    '".$alergias."',
                                    '".$especificarAlergias."',
                                    '".$rpi."',
                                    '".$rdc."',
                                    '".$especificarComorbidades."',
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
                $dataNacismento = $_POST['dataNacismento'];
                $leito = $_POST['leito'];
                $dataInternacao = $_POST['dataInternacao'];
                $pcp = $_POST['pcp'];
                $pca = $_POST['pca'];
                $pa = $_POST['pa'];
                $t = $_POST['t'];
                $f = $_POST['f'];
                $fr = $_POST['fr'];
                $comorbidades = $_POST['comorbidades'];
                $especificarComorbidades = $_POST['especificarComorbidades'];
                $tabagista = $_POST['tabagista'];
                $etilista = $_POST['etilista'];
                $alergias = $_POST['alergias'];
                $especificarAlergias = $_POST['especificarAlergias'];
                $rpi = $_POST['rpi'];
                $rdc = $_POST['rdc'];
                $examesDiponiveis = $_POST['examesDiponiveis'];
                $MedicacaoDomicilio = $_POST['MedicacaoDomicilio'];
                $cirurgiaAnterior = $_POST['cirurgiaAnterior'];
                $status = $_POST['status'];
                
                
                $sql = "UPDATE `consulta`
                        SET
                            `DATANASC` = '".$dataNacismento."',
                            `LEITO` = '".$leito."',
                            `DATAINTERNACAO` = '".$dataInternacao."',
                            `PCP` = '".$pcp."',
                            `PCA` = '".$pca."',
                            `PA` = '".$pa."',
                            `T` = '".$t."',
                            `F` = '".$f."',
                            `FR` = '".$fr."',
                            `CIRURGIAANTERIOR` = '".$cirurgiaAnterior."',
                            `COMORBIDADES` = '".$comorbidades."',
                            `EXAMESDISPONIVEIS` = '".$examesDiponiveis."',
                            `MEDICACAODOMICILIO` = '".$MedicacaoDomicilio."',
                            `TABAGISTA` = '".$tabagista."',
                            `ETILISTA` = '".$etilista."',
                            `ALERGIAS` = '".$alergias."',
                            `COMENTARIOALERGIA` = '".$especificarAlergias."',
                            `RPI` = '".$rpi."',
                            `RDC` = '".$rdc."',
                            `COMENTARIOCOMORBIDADES` = '".$especificarComorbidades."',
                            status = '".$status."'
                        WHERE `idCONSULTA` = '".$_POST['idCONSULTA']."';
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
                $idCONSULTA = $_POST['idCONSULTA'];
                
                $sql = "DELETE FROM `consulta`
                        WHERE `idCONSULTA` = '".$idCONSULTA."';
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
                        SELECT `consulta`.`idCONSULTA`,
                            `consulta`.`idCIRURGIA`,
                            `consulta`.`DATANASC`,
                            `consulta`.`LEITO`,
                            `consulta`.`DATAINTERNACAO`,
                            `consulta`.`PCA`,
                            `consulta`.`PA`,
                            `consulta`.`T`,
                            `consulta`.`F`,
                            `consulta`.`FR`,
                            `consulta`.`CIRURGIAANTERIOR`,
                            `consulta`.`COMORBIDADES`,
                            `consulta`.`EXAMESDISPONIVEIS`,
                            `consulta`.`MEDICACAODOMICILIO`,
                            `consulta`.`TABAGISTA`,
                            `consulta`.`ETILISTA`,
                            `consulta`.`ALERGIAS`,
                            `consulta`.`COMENTARIOALERGIA`,
                            `consulta`.`RPI`,
                            `consulta`.`RDC`,
                            `consulta`.`COMENTARIOCOMORBIDADES`,
                            `consulta`.`status`,
                            `consulta`.`PCP`
                        FROM `consulta`
                        WHERE consulta.idCIRURGIA='".$_POST['$idCirurgia']."';
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