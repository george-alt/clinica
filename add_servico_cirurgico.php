<?php include('seguranca/scriptSeg.php');?>
<!DOCTYPE html>
<html lang="en">
<style>
    .ARNTipoS, .ARNTipoC, .ARNBaixo{
        display: none !important;
    }
    .stylenivelRisco
    {
        color: black !important;
    }
    .corLinhaTable{
        background: #0389e1 !important;
        color:white;
    }
    
    input[type=radio], input[type=checkbox]{
        display:none; /* Esconde os inputs */
    }
 
    label {
        cursor: pointer;
    }
    input[type="radio"] + label:before, input[type="checkbox"] + label:before {
        border: 1px solid #5D5C5C;
        content: "\00a0";
        display: inline-block;
        font: 16px/1em sans-serif;
        height: 16px;
        margin: 0 .25em 0 0;
        padding:0;
        vertical-align: top;
        width: 16px;
        border-radius:4px;
    }
     
    input[type="radio"]:checked + label:before, input[type="checkbox"]:checked + label:before {
        background: #A0A0A0;
        color: #FFF;
        content: "\2713";
        text-align: center;
    }
     
    input[type="radio"]:checked + label:after, input[type="checkbox"]:checked + label:after {
        font-weight: bold;
    }
    #pre,#trans,#pos,#trocarPaciente{
        cursor: pointer;
    }
</style>

<!-- patients23:17-->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <title>NOME CLINICA</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <!--[if lt IE 9]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
	<![endif]-->
    <link rel="stylesheet" type="text/css" href="assets/css/toastr.css">
</head>

<body>
    <div class="main-wrapper">
        <?php
            //obedecer a ordem 1 -> menuTop / 2 -> menuLateral
            include("menu/menuTop.php");
            include("menu/menuLateral.php");
        ?>
        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-sm-4 col-3">
                        <h4 class="page-title">Serviço Cirurgico</h4>
                    </div>
                    <div class="col-sm-8">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <img src="img/circle-icon-orange.png" class="img-thumbnail" alt="Pré" width="40px" height="40px">
                                    <span style="font-size: 20px;" id="pre">Pré</span>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <img src="img/circle-icon-green.png" class="img-thumbnail" alt="Trans" width="45px" height="45px">
                                    <span style="font-size: 20px;" id="trans">Trans</span>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <img src="img/circle-icon-blue.png" class="img-thumbnail" alt="Pos" width="40px" height="40px">
                                    <span style="font-size: 20px;" id="pos">Pos</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <img src="img/reload.png" class="img-thumbnail" alt="Trocar Paciente" width="45px" height="45px">
                                    <span  style="font-size: 20px;" id="trocarPaciente">Trocar Paciente</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
					<div class="col-md-12">
						<nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                
                                <?php
                                    if($_SESSION['tipoEx'] === "pre")
                                    {
                                        echo '<a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Consulta</a>
                                                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Evolução</a>
                                                <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">CheckList</a>';
                                    }
                                    else if($_SESSION['tipoEx'] === "trans")
                                    {
                                        echo '<a class="nav-item nav-link active" id="nav-transCheck11-tab" data-toggle="tab" href="#nav-transCheck11" role="tab" aria-controls="nav-transCheck11" aria-selected="false">Check 1</a>
                                                <a class="nav-item nav-link" id="nav-transCheck12-tab" data-toggle="tab" href="#nav-transCheck12" role="tab" aria-controls="nav-transCheck12" aria-selected="false">Check 2</a>
                                                <a class="nav-item nav-link" id="nav-transCheck13-tab" data-toggle="tab" href="#nav-transCheck13" role="tab" aria-controls="nav-transCheck13" aria-selected="false">Check 3</a>
                                                <a class="nav-item nav-link" id="nav-Profilaxia1-tab" data-toggle="tab" href="#nav-Profilaxia1" role="tab" aria-controls="nav-Profilaxia1" aria-selected="false">Profilaxia 1</a>
                                                <a class="nav-item nav-link" id="nav-Profilaxia2-tab" data-toggle="tab" href="#nav-Profilaxia2" role="tab" aria-controls="nav-Profilaxia2" aria-selected="false">Profilaxia 2</a>
                                                <a class="nav-item nav-link" id="nav-Profilaxia3-tab" data-toggle="tab" href="#nav-Profilaxia3" role="tab" aria-controls="nav-Profilaxia3" aria-selected="false">Profilaxia 3</a>';
                                    }
                                    else
                                    {
                                        echo '<a class="nav-item nav-link active" id="nav-Pos1-tab" data-toggle="tab" href="#nav-Pos1" role="tab" aria-controls="nav-Pos1" aria-selected="false">Pos 1</a>
                                                <a class="nav-item nav-link" id="nav-Pos2-tab" data-toggle="tab" href="#nav-Pos2" role="tab" aria-controls="nav-Pos2" aria-selected="false">Pos 2</a>
                                                <a class="nav-item nav-link" id="nav-Pos3-tab" data-toggle="tab" href="#nav-Pos3" role="tab" aria-controls="nav-Pos3" aria-selected="false">Pos 3</a>
                                                <a class="nav-item nav-link" id="nav-Pos4-tab" data-toggle="tab" href="#nav-Pos4" role="tab" aria-controls="nav-Pos4" aria-selected="false">Pos 4</a>
                                                <a class="nav-item nav-link" id="nav-laudo-tab" data-toggle="tab" href="#nav-laudo" role="tab" aria-controls="nav-laudo" aria-selected="false">Laudo</a>';
                                    }
                                ?>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab"><!--consulta-->
                                <div class="col-lg-8 offset-lg-2">
                                    <div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Nome Paciente<span class="text-danger">*</span></label>
                                                    <input class="form-control" type="text" name="nomePaciente" readonly>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>Data de Nacismento<span class="text-danger">*</span></label>
                                                    <div class="cal-icon">
                                                        <input type="text" class="form-control datetimepicker" name="dataNacismento">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-2">
                                                <div class="form-group">
                                                    <label>Leito<span class="text-danger">*</span></label>
                                                    <input class="form-control" type="text" name="leito">
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <div class="form-group">
                                                            <label>Data de internação<span class="text-danger">*</span></label>
                                                            <div class="cal-icon">
                                                                <input type="text" class="form-control datetimepicker" name="dataInternacao">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Procedimento cirúrgico proposto<span class="text-danger">*</span></label>
                                                            <input class="form-control" type="text" name="pcp">
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Procedimento cirúrgico autorizado<span class="text-danger">*</span></label>
                                                            <input class="form-control" type="text" name="pca">
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Cirúrgias anteriores<span class="text-danger">*</span></label>
                                                            <input class="form-control" type="text" name="cirurgiaAnterior">
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                            
                                            <div class="col-sm-12">
                                                <div class="row">
                                                    <div class="col-lg-8">
                                                        <h4 class="page-title">Sinais vitais</h4>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-sm-2">
                                                <div class="form-group">
                                                    <label>PA<span class="text-danger">*</span></label>
                                                    <input class="form-control" type="text" name="pa">
                                                </div>
                                            </div>
                                            <div class="col-sm-2">
                                                <div class="form-group">
                                                    <label>T<span class="text-danger">*</span></label>
                                                    <input class="form-control" type="text" name="t">
                                                </div>
                                            </div>
                                            <div class="col-sm-2">
                                                <div class="form-group">
                                                    <label>F<span class="text-danger">*</span></label>
                                                    <input class="form-control" type="text" name="f">
                                                </div>
                                            </div>
                                            <div class="col-sm-2">
                                                <div class="form-group">
                                                    <label>FR<span class="text-danger">*</span></label>
                                                    <input class="form-control" type="text" name="fr">
                                                </div>
                                            </div>
                                            
                                            <div class="col-sm-12">
                                                <div class="row">
                                                    <div class="col-sm-6 col-md-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>Comorbidades</label>
                                                            <select class="form-control" name="comorbidades">
                                                                <option value="1">Sim</option>
                                                                <option value="2">Não</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-md-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label class="col-form-label col-md-2">Especificar</label>
                                                            <textarea rows="5" cols="5" class="form-control" placeholder="Insira o texto aqui" name="especificarComorbidades"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-md-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>Tabagista</label>
                                                            <select class="form-control" name="tabagista">
                                                                <option value="1">Sim</option>
                                                                <option value="2">Não</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-md-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>Etilista</label>
                                                            <select class="form-control" name="etilista">
                                                                <option value="1">Sim</option>
                                                                <option value="2">Não</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                            
                                            <div class="col-sm-12">
                                                <div class="row">
                                                    <div class="col-sm-6 col-md-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>Alergias </label>
                                                            <select class="form-control" name="alergias">
                                                                <option value="1">Sim</option>
                                                                <option value="2">Não</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-md-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label class="col-form-label col-md-2">Especificar</label>
                                                            <textarea rows="5" cols="5" class="form-control" placeholder="Insira o texto aqui" name="especificarAlergias"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-md-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>Realização de preparo intestinal</label>
                                                            <select class="form-control" name="rpi">
                                                                <option value="1">Sim</option>
                                                                <option value="2">Não</option>
                                                                <option value="3">Não se aplica</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-md-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>Realização da demarcação cirúrgica</label>
                                                            <select class="form-control" name="rdc">
                                                                <option value="1">Sim</option>
                                                                <option value="2">Não se aplica</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                            
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Exames disponíveis<span class="text-danger">*</span></label>
                                                    <input class="form-control" type="text" name="examesDiponiveis">
                                                </div>
                                            </div>
                                            
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Medicações em uso em domicílio<span class="text-danger">*</span></label>
                                                    <input class="form-control" type="text" name="MedicacaoDomicilio">
                                                </div>
                                            </div>
                                            
                                            
                                            
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="display-block">Status</label>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="status" id="doctor_active" value="1">
                                                <label class="form-check-label" for="doctor_active">
                                                Ativo
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="status" id="doctor_inactive" value="0">
                                                <label class="form-check-label" for="doctor_inactive">
                                                Inativo
                                                </label>
                                            </div>
                                        </div>
                                        <div class="m-t-20 text-center">
                                            <a href="servico_cirurgico.php" class="btn btn-primary submit-btn">Voltar</a>
                                            <button class="btn btn-success submit-btn btnCriarConsulta">Confirmar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab"><!--Evolução-->
                                <div class="col-lg-8 offset-lg-2">
                                    <div>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>Leito<span class="text-danger">*</span></label>
                                                    <input class="form-control" type="text" name="leitoEvol">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>Origem<span class="text-danger">*</span></label>
                                                    <input class="form-control" type="text" name="origem">
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="row">
                                                    <div class="col-sm-6 col-md-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>Abertura Ocular</label>
                                                            <select class="form-control select" name="aberturaOcular">
                                                                <option value="Não testado">Não testado</option>
                                                                <option value="Ausente">Ausente</option>
                                                                <option value="À pressão">À pressão</option>
                                                                <option value="Ao som">Ao som</option>
                                                                <option value="Espontânea">Espontânea</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-md-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>Resposta Verbal</label>
                                                            <select class="form-control select" name="respostaVerbal">
                                                                <option value="Não testado">Não testado</option>
                                                                <option value="Ausente">Ausente</option>
                                                                <option value="Sons">Sons</option>
                                                                <option value="Palavras">Palavras</option>
                                                                <option value="Confusa">Confusa</option>
                                                                <option value="Orientada">Orientada</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-md-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>Resposta motora</label>
                                                            <select class="form-control select" name="respostaMotora">
                                                                <option value="Não testado">Não testado</option>
                                                                <option value="Ausente">Ausente</option>
                                                                <option value="Extensão">Extensão</option>
                                                                <option value="Flexão anormal">Flexão anormal</option>
                                                                <option value="A localização">A localização</option>
                                                                <option value="A ordem">A ordem</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                            
                                            <div class="col-sm-12">
                                                <div class="row">
                                                    <div class="col-sm-6 col-md-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>Consciência</label>
                                                            <select class="form-control select" name="consciencia">
                                                                <option value="consciente">consciente</option>
                                                                <option value="Alerta">Alerta</option>
                                                                <option value="Letárgico">Letárgico</option>
                                                                <option value="Obnubilado">Obnubilado</option>
                                                                <option value="Torporoso">Torporoso</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-md-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>Orientação</label>
                                                            <select class="form-control select" name="orientacao">
                                                                <option value="Orientado no tempo e espaço">Orientado no tempo e espaço</option>
                                                                <option value="Parcialmente orientado">Parcialmente orientado</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                </div>
                                            </div>
                                            
                                            <fieldset class="col-sm-12">
                                                <legend class="w-auto"><h4>Sistema Cardiovascular</h4></legend>
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <div class="row">
                                                            <fieldset class="col-sm-11 border p-2">
                                                                <legend class="w-auto"><h4>Pulso <span class="text-danger">*</span></h4></legend>
                                                                <div class="row">
                                                                    <div class="col-sm-4">
                                                                        <div class="form-group">
                                                                            <input class="form-control" type="text" name="descPulso">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-5 col-md-5 col-lg-5">
                                                                        <div class="form-group">
                                                                            <select class="form-control select" name="pulso">
                                                                                <option value="regular">regular</option>
                                                                                <option value="Irregular">Irregular</option>
                                                                                <option value="Filiforme">Filiforme</option>
                                                                                <option value="Ausente">Ausente</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </fieldset>
                                                            
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-sm-4">
                                                        <div class="row">
                                                            <fieldset class="col-sm-11 border p-2">
                                                                <legend class="w-auto"><h4>FC <span class="text-danger">*</span></h4></legend>
                                                                <div class="row">
                                                                    <div class="col-sm-4">
                                                                        <div class="form-group">
                                                                            <input class="form-control" type="text" name="descFc">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                                                        <div class="form-group">
                                                                            <select class="form-control select" name="FCevol">
                                                                                <option value="normocardio">normocardio</option>
                                                                                <option value="Taquicardia">Taquicardia</option>
                                                                                <option value="bradicardia">bradicardia</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </fieldset>
                                                            
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-sm-4">
                                                        <div class="row">
                                                            <fieldset class="col-sm-11 border p-2">
                                                                <legend class="w-auto"><h4>PA <span class="text-danger">*</span></h4></legend>
                                                                <div class="row">
                                                                    <div class="col-sm-4">
                                                                        <div class="form-group">
                                                                            <input class="form-control" type="text" name="descPa">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                                                        <div class="form-group">
                                                                            <select class="form-control select" name="PAevol">
                                                                                <option value="normotenso">normotenso</option>
                                                                                <option value="hipertenso">hipertenso</option>
                                                                                <option value="hipotenso">hipotenso</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </fieldset>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>
                                            
                                            
                                        </div>
                                        
                                        <br>
                                        <div class="row">
                                            <fieldset class="col-sm-12">
                                                <legend class="w-auto"><h4>Sistema Respiratório</h4></legend>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="row">
                                                            <fieldset class="col-sm-11 border p-2">
                                                                <legend class="w-auto"><h4>Padrão respiratório <span class="text-danger">*</span></h4></legend>
                                                                <div class="row">
                                                                    <div class="col-sm-5">
                                                                        <div class="form-group">
                                                                            <input class="form-control" type="text" name="descPadraoRespiratorio">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                                                        <div class="form-group">
                                                                            <select class="form-control select" name="padraoRespiratorio">
                                                                                <option value="eupnéico">eupnéico</option>
                                                                                <option value="taquipnéico">taquipnéico</option>
                                                                                <option value="dispneico">dispneico</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </fieldset>
                                                            
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-sm-6">
                                                        <div class="row">
                                                            <fieldset class="col-sm-11 border p-2">
                                                                <legend class="w-auto"><h4>Respiração <span class="text-danger">*</span></h4></legend>
                                                                <div class="row">
                                                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                                                        <div class="form-group">
                                                                            <select class="form-control select" name="respiracao">
                                                                                <option value="sem suporte de O2">sem suporte de O2</option>
                                                                                <option value="canula nasal">canula nasal</option>
                                                                                <option value="MV">MV</option>
                                                                                <option value="TOT">TOT</option>
                                                                                <option value="TQT">TQT</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </fieldset>
                                                            
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                </div>
                                            </fieldset>
                                            </div>
                                        
                                        <br>
                                        <div class="row">
                                            <fieldset class="col-sm-12">
                                                <legend class="w-auto"><h4>Sistema Digestivo</h4></legend>
                                                <div class="row">
                                                    <div class="col-sm-6 col-md-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>Abdomen</label>
                                                            <select class="form-control select" name="abdomen">
                                                                <option value="escavado">escavado</option>
                                                                <option value="globoso">globoso</option>
                                                                <option value="plano">plano</option>
                                                                <option value="distendido">distendido</option>
                                                                <option value="flácido">flácido</option>
                                                                <option value="tenso">tenso</option>
                                                                <option value="dolor a palpação">dolor a palpação</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-sm-6 col-md-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>RHA</label>
                                                            <select class="form-control select" name="RHA">
                                                                <option value="Sim">Sim</option>
                                                                <option value="Não">Não</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                                        <div class="row">
                                                            <div class="col-sm-3 col-md-3 col-lg-3">
                                                                <div class="form-group">
                                                                    <label>Alimentação</label>
                                                                    <select class="form-control select" name="alimentacao">
                                                                        <option value="zero">zero</option>
                                                                        <option value="oral">oral</option>
                                                                        <option value="SNG">SNG</option>
                                                                        <option value="SNE">SNE</option>
                                                                        <option value="GTT">GTT</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <div class="form-group">
                                                                    <label>Resíduos<span class="text-danger">*</span></label>
                                                                    <input class="form-control" type="text" name="residuos">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-sm-6 col-md-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>Eliminações</label>
                                                            <select class="form-control select" name="eliminacao">
                                                                <option value="presente">presente</option>
                                                                <option value="Não">Não</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                                        <div class="row">
                                                            <div class="col-sm-3 col-md-3 col-lg-3">
                                                                <div class="form-group">
                                                                    <label>Via</label>
                                                                    <select class="form-control select" name="via">
                                                                        <option value="retal">retal</option>
                                                                        <option value="ostomia-Tipo">ostomia-Tipo</option>
                                                                        <option value="ausentes">ausentes</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-5">
                                                                <div class="form-group">
                                                                    <label>Descrição Via</label>
                                                                    <input class="form-control" type="text" name="descVia">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                </div>
                                            </fieldset>
                                        </div>
                                        
                                        <br>
                                        <div class="row">
                                            <fieldset class="col-sm-12">
                                                <legend class="w-auto"><h4>Sistema Geniturinário</h4></legend>
                                                <div class="row">
                                                    <div class="col-sm-6 col-md-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>Diurese</label>
                                                            <select class="form-control select" name="diurese">
                                                                <option value="espontânea">espontânea</option>
                                                                <option value="SVD">SVD</option>
                                                                <option value="SVA">SVA</option>
                                                                <option value="Uropen">Uropen</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-sm-6 col-md-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>Debito</label>
                                                            <select class="form-control select" name="debito">
                                                                <option value="anurico">anurico</option>
                                                                <option value="Oligurico">Oligurico</option>
                                                                <option value="Moderado">Moderado</option>
                                                                <option value="Poliuria">Poliuria</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-sm-6 col-md-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>HD</label>
                                                            <select class="form-control select" name="HD">
                                                                <option value="Sim">Sim</option>
                                                                <option value="Não">Não</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                        
                                        <br>
                                        <div class="row">
                                            <fieldset class="col-sm-12">
                                                <legend class="w-auto"><h4>Sistema Endocrino</h4></legend>
                                                <div class="row">
                                                    <div class="col-sm-6 col-md-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>Hipoglicemiantes</label>
                                                            <select class="form-control select" name="sistemaEndocrino">
                                                                <option value="Sim">Sim</option>
                                                                <option value="Não">Não</option>
                                                                <option value="Insulina">Insulina</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-sm-6 col-md-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>Níveis glicêmicos</label>
                                                            <select class="form-control select" name="niveisGlicemicos">
                                                                <option value="1">normais</option>
                                                                <option value="2">hiperglicêmico</option>
                                                                <option value="3">hipoglicêmico</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                        
                                        <div class="row">
                                            <fieldset class="col-sm-12">
                                                <legend class="w-auto"><h4>Invasivos</h4></legend>
                                                <div class="row">
                                                    <div class="col-sm-6 col-md-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>Cateteres</label>
                                                            <select class="form-control select" name="cateteres">
                                                                <option value="Jelco">Jelco</option>
                                                                <option value="Punção">Punção</option>
                                                                <option value="Troca">Troca</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-sm-6 col-md-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>Sondas</label>
                                                            <select class="form-control select" name="sondas">
                                                                <option value="Sim">Sim</option>
                                                                <option value="Não">Não</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-sm-6 col-md-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>Drenos </label>
                                                            <select class="form-control select" name="drenos">
                                                                <option value="Sim">Sim</option>
                                                                <option value="Não">Não</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-sm-6 col-md-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>Curativos  </label>
                                                            <select class="form-control select" name="curativos">
                                                                <option value="Sim">Sim</option>
                                                                <option value="Não">Não</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                        
                                        <div class="row">
                                            <fieldset class="col-sm-12">
                                                <div class="row">
                                                    <div class="col-sm-6 col-md-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>Sintomas</label>
                                                            <select class="form-control select" name="sistomas">
                                                                <option value="Dor:tipo, localização, intensidade e outras característica">Dor:tipo, localização, intensidade e outras característica</option>
                                                                <option value="Náuseas">Náuseas </option>
                                                                <option value="insônia">insônia</option>
                                                                <option value="prurido">prurido</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-sm-6 col-md-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>Medicação</label>
                                                            <select class="form-control select" name="medicacao">
                                                                <option value="Sim">Sim</option>
                                                                <option value="Não">Não</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </fieldset>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label>Observação <span class="text-danger">*</span></label>
                                                    <textarea rows="5" cols="5" class="form-control" placeholder="Insira o texto aqui" name="observacao"></textarea>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        
                                        <div class="m-t-20 text-center">
                                            <a href="servico_cirurgico.php" class="btn btn-primary submit-btn">Voltar</a>
                                            <button class="btn btn-success submit-btn btnCriarEvolucao">Confirmar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab"><!--CheckList-->
                                <div class="col-lg-8 offset-lg-2">
                                    <div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="row">
                                                    <div class="col-sm-6 col-md-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>Identificação do cliente</label>
                                                            <select class="form-control" name="idenCliente">
                                                                <option value="1">Sim</option>
                                                                <option value="2">Não</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-md-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>Prontúario completo</label>
                                                            <select class="form-control" name="pronCompleto">
                                                                <option value="1">Sim</option>
                                                                <option value="2">Não</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-md-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>Sitio cirúrgico demarcado</label>
                                                            <select class="form-control" name="SCD">
                                                                <option value="1">Sim</option>
                                                                <option value="2">Não</option>
                                                                <option value="3">Não aplica</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="row">
                                                    <div class="col-sm-7 col-md-7 col-lg-4">
                                                        <div class="form-group">
                                                            <label>Consentimento e avaliação anestésico</label>
                                                            <select class="form-control" name="CAA">
                                                                <option value="1">Sim</option>
                                                                <option value="2">Não</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-sm-6 col-md-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>Consentimento cirúrgico</label>
                                                            <select class="form-control" name="conCirurgico">
                                                                <option value="1">Sim</option>
                                                                <option value="2">Não</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-sm-6 col-md-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>Consentimento transfusional</label>
                                                            <select class="form-control" name="conTransfunsional">
                                                                <option value="1">Sim</option>
                                                                <option value="2">Não</option>
                                                                <option value="3">Não Aplica</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-sm-6">
                                                        <div class="row">
                                                            <div class="col-sm-6 col-md-6 col-lg-3">
                                                                <div class="form-group">
                                                                    <label>Banho</label>
                                                                    <select class="form-control" name="banho">
                                                                        <option value="1">Sim</option>
                                                                        <option value="2">Não</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6 col-md-6 col-lg-3">
                                                                <div class="form-group">
                                                                    <label>Horário</label>
                                                                    <input class="form-control" type="Time" name="horaBanho">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="row">
                                                    
                                                    <div class="col-sm-12">
                                                        <div class="row">
                                                            <div class="col-sm-6 col-md-6 col-lg-3">
                                                                <div class="form-group">
                                                                    <label>Tricotomia</label>
                                                                    <select class="form-control" name="tricotomia">
                                                                        <option value="1">Sim</option>
                                                                        <option value="2">Não</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6 col-md-6 col-lg-3">
                                                                <div class="form-group">
                                                                    <label>Horário</label>
                                                                    <input class="form-control" type="Time" name="triHora">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6 col-md-6 col-lg-5">
                                                                <div class="form-group">
                                                                    <label>Local</label>
                                                                    <input class="form-control" type="text" name="triLocal">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                </div>
                                            </div>
                                            
                                            <div class="col-sm-12">
                                                <div class="row">
                                                    
                                                    <div class="col-sm-12">
                                                        <div class="row">
                                                            <div class="col-sm-6 col-md-6 col-lg-3">
                                                                <div class="form-group">
                                                                    <label>Jejum</label>
                                                                    <select class="form-control" name="jejum">
                                                                        <option value="1">Sim</option>
                                                                        <option value="2">Não</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6 col-md-6 col-lg-3">
                                                                <div class="form-group">
                                                                    <label>Inicio</label>
                                                                    <input class="form-control" type="Time" name="JejumInicio">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                </div>
                                            </div>
                                            
                                            <div class="col-sm-12">
                                                <div class="row">
                                                    <div class="col-sm-6 col-md-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>Exames</label>
                                                            <select class="form-control" name="exames">
                                                                <option value="1">Laboratoriais</option>
                                                                <option value="2">Imagem</option>
                                                                <option value="3">Biópsia</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-md-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>Retirada prótese e adornos?</label>
                                                            <select class="form-control" name="RPA">
                                                                <option value="1">Sim</option>
                                                                <option value="2">Não</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-md-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>Tipo de precaução</label>
                                                            <select class="form-control" name="tipoPrecaucao">
                                                                <option value="1">Padrão</option>
                                                                <option value="2">Contato</option>
                                                                <option value="3">Reverso</option>
                                                                <option value="4">Goticulas</option>
                                                                <option value="5">Aerossóis</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                           
                                            
                                            
                                        </div>
                                        
                                        
                                        <div class="m-t-20 text-center">
                                            <a href="servico_cirurgico.php" class="btn btn-primary submit-btn">Voltar</a>
                                            <button class="btn btn-success submit-btn btnCriarCheckList">Confirmar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="tab-pane fade show" id="nav-transCheck11" role="tabpanel" aria-labelledby="nav-transCheck11-tab"><!--CheckList 1.1-->
                                
                                <div class="col-lg-8 offset-lg-2">
                                    <div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label class="display-block">Confirmação sobre o cliente</label>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" name="CSC" id="doctor_active1" value="Identificação do cliente">
                                                        <label class="form-check-label" for="doctor_active1">
                                                        Identificação do cliente
                                                        </label>
                                                    </div>
                                                    
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" name="CSC" id="doctor_inactive2" value="Local da Cirurgia a ser feita">
                                                        <label class="form-check-label" for="doctor_inactive2">
                                                        Local da Cirurgia a ser feita
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" name="CSC" id="doctor_inactive3" value="Consentimento anestésico e cirúgico">
                                                        <label class="form-check-label" for="doctor_inactive3">
                                                        Consentimento anestésico e cirúgico
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" name="CSC" id="doctor_inactive4" value="Sitio cirúgico certo">
                                                        <label class="form-check-label" for="doctor_inactive4">
                                                        Sitio cirúgico certo
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="row">
                                                    <div class="col-sm-6 col-md-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>Montagem do SO de acordo com o procedimento programado</label>
                                                            <select class="form-control" name="MSOAPP">
                                                                <option value="Sim">Sim</option>
                                                                <option value="Não">Não</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-md-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>Revisão dos equipamentos de anestesia</label>
                                                            <select class="form-control" name="REA">
                                                                <option value="Sim">Sim</option>
                                                                <option value="Não">Não</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label class="display-block">Materiais de vias aéreas disponiveis e funcionantes</label>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" name="NVADF" id="doctor_active11" value="Laringoscópio">
                                                        <label class="form-check-label" for="doctor_active11">
                                                        Laringoscópio
                                                        </label>
                                                    </div>
                                                    
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" name="NVADF" id="doctor_inactive22" value="Máscara de 02">
                                                        <label class="form-check-label" for="doctor_inactive22">
                                                        Máscara de 02
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" name="NVADF" id="doctor_inactive33" value="Fio guia">
                                                        <label class="form-check-label" for="doctor_inactive33">
                                                        Fio guia
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" name="NVADF" id="doctor_inactive44" value="Ambú">
                                                        <label class="form-check-label" for="doctor_inactive44">
                                                        Ambú
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" name="NVADF" id="doctor_inactive55" value="Bougie">
                                                        <label class="form-check-label" for="doctor_inactive55">
                                                        Bougie
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" name="NVADF" id="doctor_inactive66" value="Aspirador">
                                                        <label class="form-check-label" for="doctor_inactive66">
                                                        Aspirador
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" name="NVADF" id="doctor_inactive77" value="Guedei">
                                                        <label class="form-check-label" for="doctor_inactive77">
                                                        Guedei
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" name="NVADF" id="doctor_inactive88" value="Cânula endotraqueal">
                                                        <label class="form-check-label" for="doctor_inactive88">
                                                        Cânula endotraqueal
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="row">
                                                    <div class="col-sm-6 col-md-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>Há risco de perda sanguínea > 500mL (7mL/kg em crianças)?</label>
                                                            <select class="form-control" name="RPS">
                                                                <option value="Sim">Sim</option>
                                                                <option value="Não">Não</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-md-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>Acesso venoso adequado e pérvio?</label>
                                                            <select class="form-control" name="AVAP">
                                                                <option value="Sim AVC AVP">Sim AVC AVP</option>
                                                                <option value="Não">Não</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-md-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>O cliente tem alergia?</label>
                                                            <select class="form-control" name="clienteAlergia">
                                                                <option value="Sim">Sim</option>
                                                                <option value="Não">Não</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                </div>
                                            </div>
                                            
                                            
                                        </div>
                                        
                                        
                                        <div class="row">
                                            <div class="col-sm-9 col-md-9 col-lg-9">
                                                <div class="form-group">
                                                    <label>Observação</label>
                                                    <textarea class="form-control" name="obser"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="m-t-20 text-center">
                                            <a href="servico_cirurgico.php" class="btn btn-primary submit-btn">Voltar</a>
                                            <button class="btn btn-success submit-btn btnCriarCheck11">Confirmar</button>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            
                            <div class="tab-pane fade" id="nav-transCheck12" role="tabpanel" aria-labelledby="nav-transCheck12-tab"><!--CheckList 1.2-->
                                <div class="col-lg-8 offset-lg-2">
                                    <div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <fieldset>
                                                    <legend>Apresentação oral, nome e função de todos os profissionais</legend>
                                                    <div class="row">
                                                        <div class="col-sm-6 col-md-6 col-lg-3">
                                                            <div class="form-group">
                                                                <label>Staff</label>
                                                                <select class="form-control " name="staff">
                                                                    <option value="Sim">Sim</option>
                                                                    <option value="Não">Não</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 col-md-6 col-lg-3">
                                                            <div class="form-group">
                                                                <label>1º Cirurgião</label>
                                                                <select class="form-control " name="1cirurgiao">
                                                                    <option value="Sim">Sim</option>
                                                                    <option value="Não">Não</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 col-md-6 col-lg-3">
                                                            <div class="form-group">
                                                                <label>2º Cirrugião</label>
                                                                <select class="form-control " name="2cirurgiao">
                                                                    <option value="Sim">Sim</option>
                                                                    <option value="Não">Não</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-6 col-md-6 col-lg-3">
                                                            <div class="form-group">
                                                                <label>Anestesista</label>
                                                                <select class="form-control " name="anestesista">
                                                                    <option value="Sim">Sim</option>
                                                                    <option value="Não">Não</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 col-md-6 col-lg-3">
                                                            <div class="form-group">
                                                                <label>Circulante</label>
                                                                <select class="form-control " name="circulante">
                                                                    <option value="Sim">Sim</option>
                                                                    <option value="Não">Não</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                </fieldset>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label class="display-block">Cirurgiões, anestesistas e equipe de enfermagem confirmam</label>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" name="CAEEC" id="doctor_activeTrans11" value="Identificação do Cliente">
                                                        <label class="form-check-label" for="doctor_activeTrans11">
                                                        Identificação do Cliente
                                                        </label>
                                                    </div>
                                                    
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" name="CAEEC" id="doctor_activeTrans22" value="Sitio Cirurgico">
                                                        <label class="form-check-label" for="doctor_activeTrans22">
                                                        Sitio Cirurgico
                                                        </label>
                                                    </div>
                                                    
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" name="CAEEC" id="doctor_activeTrans33" value="Procedimento a ser realizado">
                                                        <label class="form-check-label" for="doctor_activeTrans33">
                                                        Procedimento a ser realizado
                                                        </label>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="row">
                                                    <div class="col-sm-6 col-md-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>Placa de eletrocautério</label>
                                                            <select class="form-control " name="placaEletrocauterio">
                                                                <option value="Posicionada">Posicionada</option>
                                                                <option value="Não Aplica">Não Aplica</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-md-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>Uso de anibióticos profilático</label>
                                                            <select class="form-control " name="UAP">
                                                                <option value="Sim">Sim</option>
                                                                <option value="Não">Não</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-md-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>Exames de imagem estão disponiveis</label>
                                                            <select class="form-control " name="EID">
                                                                <option value="Sim">Sim</option>
                                                                <option value="Não">Não</option>
                                                                <option value="Não">Não Aplica</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-sm-12">
                                                <fieldset>
                                                    <legend>Revisão do cirurgião. Passos criticos duração estimada /Possiveis perdas</legend>
                                                    <div class="row">
                                                        <div class="col-sm-6 col-md-6 col-lg-3">
                                                            <div class="form-group">
                                                                <label>Sanguineas</label>
                                                                <select class="form-control " name="sanguineas">
                                                                    <option value="Sim">Sim</option>
                                                                    <option value="Não">Não</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 col-md-6 col-lg-3">
                                                            <div class="form-group">
                                                                <label>Revisão do anestesista</label>
                                                                <select class="form-control " name="revisaoAnestesista">
                                                                    <option value="Sim">Sim</option>
                                                                    <option value="Não">Não</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 col-md-6 col-lg-3">
                                                            <div class="form-group">
                                                                <label>Fixação das etiquetas de esterilização no prontuário</label>
                                                                <select class="form-control " name="FEEP">
                                                                    <option value="Sim">Sim</option>
                                                                    <option value="Não">Não</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                            </div>
                                            
                                            
                                        </div>
                                        
                                        
                                        <div class="row">
                                            <div class="col-sm-9 col-md-9 col-lg-9">
                                                <div class="form-group">
                                                    <label>Observação</label>
                                                    <textarea class="form-control" name="obserTrans12"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="m-t-20 text-center">
                                            <a href="servico_cirurgico.php" class="btn btn-primary submit-btn">Voltar</a>
                                            <button class="btn btn-success submit-btn btnCriarTrans12">Confirmar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="tab-pane fade" id="nav-transCheck13" role="tabpanel" aria-labelledby="nav-transCheck13-tab"><!--CheckList 1.3-->
                                <div class="col-lg-8 offset-lg-2">
                                    <div>
                                        <div class="row">
                                            
                                            <div class="col-sm-12">
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-9">
                                                        <div class="form-group">
                                                            <label>Procedimento realizado</label>
                                                            <textarea class="form-control" name="precedimentoRealizado"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="row">
                                                    <div class="col-sm-6 col-md-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>A contagem de compresas, agulhas e instrumentos está corretos?</label>
                                                            <select class="form-control" name="CCAIC">
                                                                <option value="Sim">Sim</option>
                                                                <option value="Não">Não</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-md-6 col-lg-4">
                                                        <div class="form-group">
                                                            <label>Peças anatômicas/culturas e identificadas adeguadamente e requisição preenchida?</label>
                                                            <select class="form-control" name="PACIARP">
                                                                <option value="Sim">Sim</option>
                                                                <option value="Não">Não</option>
                                                                <option value="Não">Não Aplica</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-md-6 col-lg-4">
                                                        <div class="form-group">
                                                            <label>Houve algum problema com equipamentos que deve ser resolvido?</label>
                                                            <select class="form-control" name="HAPER">
                                                                <option value="Sim">Sim</option>
                                                                <option value="Não">Não</option>
                                                                <option value="Não">Não Aplica</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            
                                        </div>
                                        
                                        
                                        <div class="row">
                                            <div class="col-sm-9 col-md-9 col-lg-9">
                                                <div class="form-group">
                                                    <label>Recomendações importantes na recuperação pós-anestésica e pós-operatório desse cliente</label>
                                                    <textarea class="form-control" name="RIRPAPOC"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="m-t-20 text-center">
                                            <a href="servico_cirurgico.php" class="btn btn-primary submit-btn">Voltar</a>
                                            <button class="btn btn-success submit-btn btnCriarTrans13">Confirmar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="tab-pane fade" id="nav-Profilaxia1" role="tabpanel" aria-labelledby="nav-Profilaxia1-tab"><!--Profilaxia 1-->
                                <div class="col-lg-8 offset-lg-2">
                                    <div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <fieldset>
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="tipoRisco" id="CARisco_active1" value="1">
                                                                <label class="form-check-label" for="CARisco_active1">
                                                                    Cirurgia de Altíssimo Risco
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="row">
                                                        <div class="col-sm-6 col-md-6 col-lg-3">
                                                            <div class="form-group">
                                                                <label>Astroplastia de quadril</label>
                                                                <select class="form-control " name="astroplastiaQuadril" disabled>
                                                                    <option value="Sim">Sim</option>
                                                                    <option value="Não">Não</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 col-md-6 col-lg-3">
                                                            <div class="form-group">
                                                                <label>Astroplastia de joelho</label>
                                                                <select class="form-control " name="astroplastiaJoelho" disabled>
                                                                    <option value="Sim">Sim</option>
                                                                    <option value="Não">Não</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 col-md-6 col-lg-3">
                                                            <div class="form-group">
                                                                <label>Fratura de quadril</label>
                                                                <select class="form-control" name="faturaQuadril" disabled>
                                                                    <option value="Sim">Sim</option>
                                                                    <option value="Não">Não</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 col-md-6 col-lg-3">
                                                            <div class="form-group">
                                                                <label>Ontológica curativo</label>
                                                                <select class="form-control" name="ontologicaCurativo" disabled>
                                                                    <option value="Sim">Sim</option>
                                                                    <option value="Não">Não</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 col-md-6 col-lg-3">
                                                            <div class="form-group">
                                                                <label>Treuma requimedular</label>
                                                                <select class="form-control" name="treumaRequimedular" disabled>
                                                                    <option value="Sim">Sim</option>
                                                                    <option value="Não">Não</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 col-md-6 col-lg-3">
                                                            <div class="form-group">
                                                                <label>Plitreuma</label>
                                                                <select class="form-control" name="plitreuma" disabled>
                                                                    <option value="Sim">Sim</option>
                                                                    <option value="Não">Não</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                            </div>
                                        </div>    
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <fieldset>
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="tipoRisco" id="CARisco_active2" value="2">
                                                                <label class="form-check-label" for="CARisco_active2">
                                                                    Cirurgia de porte médio e alto
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="row">
                                                        <div class="col-sm-6 col-md-6 col-lg-3">
                                                            <div class="form-group">
                                                                <label>Idade</label>
                                                                <select class="form-control" name="idade" disabled>
                                                                    <option value="Menor que 40 anos">Menor que 40 anos</option>
                                                                    <option value="Entre 40 a 60 anos">Entre 40 a 60 anos</option>
                                                                    <option value="Maior que 60 anos">Maior que 60 anos</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 col-md-6 col-lg-3">
                                                            <div class="form-group">
                                                                <label>Fatores de Riscos para TEV?</label>
                                                                <select class="form-control " name="fatoresRTEV" disabled>
                                                                    <option value="Sim">Sim</option>
                                                                    <option value="Não">Não</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <fieldset>
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="tipoRisco" id="CARisco_active3" value="3">
                                                                <label class="form-check-label" for="CARisco_active3">
                                                                    Cirurgia de pequeno porte c/ duração de < 60min. Internação de < 2 dias
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="row">
                                                        <div class="col-sm-6 col-md-6 col-lg-3">
                                                            <div class="form-group">
                                                                <label>Endoscopia(Incluir ressecção prostática transuretral)</label>
                                                                <select class="form-control" name="endoscopia" disabled>
                                                                    <option value="Sim">Sim</option>
                                                                    <option value="Não">Não</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 col-md-6 col-lg-3">
                                                            <div class="form-group">
                                                                <label>Laparoscopia</label>
                                                                <select class="form-control " name="laparoscopia" disabled>
                                                                    <option value="Sim">Sim</option>
                                                                    <option value="Não">Não</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 col-md-6 col-lg-3">
                                                            <div class="form-group">
                                                                <label>Superficial(mama, plástica, dematológica)</label>
                                                                <select class="form-control " name="superficial" disabled>
                                                                    <option value="Sim">Sim</option>
                                                                    <option value="Não">Não</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 col-md-6 col-lg-3">
                                                            <div class="form-group">
                                                                <label>Oftalmologia</label>
                                                                <select class="form-control " name="oftalmologia" disabled>
                                                                    <option value="Sim">Sim</option>
                                                                    <option value="Não">Não</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 col-md-6 col-lg-3">
                                                            <div class="form-group">
                                                                <label>Otorrinolaringologia</label>
                                                                <select class="form-control " name="otorrinolaringologia" disabled>
                                                                    <option value="Sim">Sim</option>
                                                                    <option value="Não">Não</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 col-md-6 col-lg-3">
                                                            <div class="form-group">
                                                                <label>Outras</label>
                                                                <textarea class="form-control" name="outras" disabled></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                            </div>
                                        </div>
                                    
                                    <br><br>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <div class="form-check form-check-inline offset-md-3">
                                                        <input class="form-check-input" type="radio" name="nivelRisco" id="nivelRisco1" value="1" disabled>
                                                        <label class="form-check-label" for="nivelRisco1">
                                                            Risco Alto
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline offset-md-1">
                                                        <input class="form-check-input" type="radio" name="nivelRisco" id="nivelRisco2" value="2" disabled>
                                                        <label class="form-check-label labelNivelRisco2" for="nivelRisco2">
                                                            Risco Intermediário
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline offset-md-1">
                                                        <input class="form-check-input" type="radio" name="nivelRisco" id="nivelRisco3" value="3" disabled>
                                                        <label class="form-check-label labelNivelRisco3" for="nivelRisco3">
                                                            Risco Baixo
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    
                                    <br><br>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <h4>Contra-Indicação</h4>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col-sm-6 col-md-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>Sangramento ativo</label>
                                                            <select class="form-control" name="sangramentoAtivo" disabled>
                                                                <option value="Sim">Sim</option>
                                                                <option value="Não">Não</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-md-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>Úlcera péptica ativa</label>
                                                            <select class="form-control" name="ulceraPA" disabled>
                                                                <option value="Sim">Sim</option>
                                                                <option value="Não">Não</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-md-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>Cirurgia craniana ou ocular < 2 semanas</label>
                                                            <select class="form-control" name="cirurgiaCO2S" disabled>
                                                                <option value="Sim">Sim</option>
                                                                <option value="Não">Não</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-md-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>Alergia ou plaquetopenia por heparina</label>
                                                            <select class="form-control" name="alergiaPPH" disabled>
                                                                <option value="Sim">Sim</option>
                                                                <option value="Não">Não</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-md-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>Coagulopatia(plaquetopenia ou INR > 1,5)</label>
                                                            <select class="form-control" name="coagulopatia" disabled>
                                                                <option value="Sim">Sim</option>
                                                                <option value="Não">Não</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-md-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>Colete de LCR < 24h</label>
                                                            <select class="form-control" name="coleteLCR" disabled>
                                                                <option value="Sim">Sim</option>
                                                                <option value="Não">Não</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-md-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>Insuficiência Renal (CICr < 30 mL/min)</label>
                                                            <select class="form-control" name="insuficienciaRenal" disabled>
                                                                <option value="Sim">Sim</option>
                                                                <option value="Não">Não</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-md-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>HAS não controlada(> 180 X 110 mmHg)</label>
                                                            <select class="form-control" name="HASNC" disabled>
                                                                <option value="Sim">Sim</option>
                                                                <option value="Não">Não</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    
                                    
                                        <div class="m-t-20 text-center">
                                            <a href="servico_cirurgico.php" class="btn btn-primary submit-btn">Voltar</a>
                                            <button class="btn btn-success submit-btn btnCriarProfilaxia1">Confirmar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="tab-pane fade" id="nav-Profilaxia2" role="tabpanel" aria-labelledby="nav-Profilaxia2-tab"><!--Profilaxia 2-->
                                <div class="col-lg-8 offset-lg-2">
                                    <div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <fieldset>
                                                    <div class="col-sm-10">
                                                        <span><h4>Fator de risco para TEV</h4></span>
                                                    </div>
                                                <br><br>
                                                <div class="row">    
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="checkbox" name="fatoRiscoParaTEV" id="fatoRiscoParaTEV1" value="1">
                                                                <label class="form-check-label" for="fatoRiscoParaTEV1">
                                                                    AVC
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="checkbox" name="fatoRiscoParaTEV" id="fatoRiscoParaTEV2" value="2">
                                                                <label class="form-check-label" for="fatoRiscoParaTEV2">
                                                                    Câncer
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="checkbox" name="fatoRiscoParaTEV" id="fatoRiscoParaTEV3" value="3">
                                                                <label class="form-check-label" for="fatoRiscoParaTEV3">
                                                                    Doença respiratória grave
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="checkbox" name="fatoRiscoParaTEV" id="fatoRiscoParaTEV4" value="4">
                                                                <label class="form-check-label" for="fatoRiscoParaTEV4">
                                                                    Gravidez e pós-parto
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="checkbox" name="fatoRiscoParaTEV" id="fatoRiscoParaTEV5" value="5">
                                                                <label class="form-check-label" for="fatoRiscoParaTEV5">
                                                                    IAM
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="checkbox" name="fatoRiscoParaTEV" id="fatoRiscoParaTEV6" value="6">
                                                                <label class="form-check-label" for="fatoRiscoParaTEV6">
                                                                    ICC classe  II ou IV
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="checkbox" name="fatoRiscoParaTEV" id="fatoRiscoParaTEV7" value="7">
                                                                <label class="form-check-label" for="fatoRiscoParaTEV7">
                                                                    Infecção (exceto torâcica)
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="checkbox" name="fatoRiscoParaTEV" id="fatoRiscoParaTEV8" value="8">
                                                                <label class="form-check-label" for="fatoRiscoParaTEV8">
                                                                    Doença reumatolôgica aguda
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="checkbox" name="fatoRiscoParaTEV" id="fatoRiscoParaTEV9" value="9">
                                                                <label class="form-check-label" for="fatoRiscoParaTEV9">
                                                                    Histórico prévia de TEV
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="checkbox" name="fatoRiscoParaTEV" id="fatoRiscoParaTEV10" value="10">
                                                                <label class="form-check-label" for="fatoRiscoParaTEV10">
                                                                    Respiração hormonal/Contraceptivos
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="checkbox" name="fatoRiscoParaTEV" id="fatoRiscoParaTEV11" value="11">
                                                                <label class="form-check-label" for="fatoRiscoParaTEV11">
                                                                    Paresia/Paralisa MMII
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="checkbox" name="fatoRiscoParaTEV" id="fatoRiscoParaTEV12" value="12">
                                                                <label class="form-check-label" for="fatoRiscoParaTEV12">
                                                                    Doença inflamatoria intestinal
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="checkbox" name="fatoRiscoParaTEV" id="fatoRiscoParaTEV13" value="13">
                                                                <label class="form-check-label" for="fatoRiscoParaTEV13">
                                                                    Trombofilia
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="checkbox" name="fatoRiscoParaTEV" id="fatoRiscoParaTEV14" value="14">
                                                                <label class="form-check-label" for="fatoRiscoParaTEV14">
                                                                    Sindrome nefótica
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="checkbox" name="fatoRiscoParaTEV" id="fatoRiscoParaTEV15" value="15">
                                                                <label class="form-check-label" for="fatoRiscoParaTEV15">
                                                                    Obesidade(IMC >= 30 Kg/m2)
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="checkbox" name="fatoRiscoParaTEV" id="fatoRiscoParaTEV16" value="16">
                                                                <label class="form-check-label" for="fatoRiscoParaTEV16">
                                                                    Varizes/ Insuficiência venosa crônica
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="checkbox" name="fatoRiscoParaTEV" id="fatoRiscoParaTEV17" value="17">
                                                                <label class="form-check-label" for="fatoRiscoParaTEV17">
                                                                    Cateteres centrais
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="checkbox" name="fatoRiscoParaTEV" id="fatoRiscoParaTEV18" value="18">
                                                                <label class="form-check-label" for="fatoRiscoParaTEV18">
                                                                    insuficiência arterial periférica
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="checkbox" name="fatoRiscoParaTEV" id="fatoRiscoParaTEV19" value="19">
                                                                <label class="form-check-label" for="fatoRiscoParaTEV19">
                                                                    Quimio/Harmoniaterapia
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="checkbox" name="fatoRiscoParaTEV" id="fatoRiscoParaTEV20" value="20">
                                                                <label class="form-check-label" for="fatoRiscoParaTEV20">
                                                                    Internação em UTI
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                    
                                                </fieldset>
                                            </div>
                                        </div>    
                                        
                                    
                                    
                                        <div class="m-t-20 text-center">
                                            <a href="servico_cirurgico.php" class="btn btn-primary submit-btn">Voltar</a>
                                            <button class="btn btn-success submit-btn btnCriarProfilaxia2">Confirmar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="tab-pane fade" id="nav-Profilaxia3" role="tabpanel" aria-labelledby="nav-Profilaxia3-tab"><!--Profilaxia 3-->
                                <div class="col-lg-8 offset-lg-2">
                                    <div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <fieldset>
                                                    <div class="col-sm-10">
                                                        <span><h4>Avaliação do risco e necessidade de profilaxia</h4></span>
                                                    </div>
                                                <br><br>
                                                <div class="row">
                                                    <div class="col-sm-6 col-md-6 col-lg-4">
                                                        <div class="form-group">
                                                            <label>Risco</label>
                                                            <select class="form-control" name="ARNPRisco">
                                                                <option value="1">Alto s/ contra-indicação</option>
                                                                <option value="2">Intermediário s/ contra-indicação</option>
                                                                <option value="3">Alto c/ contra-indicação</option>
                                                                <option value="4">Intermediário c/ contra-indicação</option>
                                                                <option value="5">Baixo</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">    
                                                    <div class="col-sm-12">
                                                        <div class="form-group ARNTipoSOb">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="checkbox" name="ARNTipoS" id="ARNTipoS1" value="1">
                                                                <label class="form-check-label" for="ARNTipoS1">
                                                                    Risco intermediário: Enoxaparina 20mg 1x/dia.
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="checkbox" name="ARNTipoS" id="ARNTipoS2" value="2">
                                                                <label class="form-check-label" for="ARNTipoS2">
                                                                    Risco alto: Enoxaparina 40mg 1x/dia.
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">    
                                                    <div class="col-sm-12">
                                                        <div class="form-group ARNTipoCOb ARNTipoC">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="checkbox" name="ARNTipoC" id="ARNTipoC1" value="1">
                                                                <label class="form-check-label" for="ARNTipoC1">
                                                                    Meia elástica de compressão gradual (MECG)
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="checkbox" name="ARNTipoC" id="ARNTipoC2" value="2">
                                                                <label class="form-check-label" for="ARNTipoC2">
                                                                    Compressão pneumática intermitente (CPI)
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group ARNTipoCOb ARNTipoC">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="checkbox" name="ARNTipoC" id="ARNTipoC3" value="3">
                                                                <label class="form-check-label" for="ARNTipoC3">
                                                                    Fisioterapia motora para pernas
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="checkbox" name="ARNTipoC" id="ARNTipoC4" value="4">
                                                                <label class="form-check-label" for="ARNTipoC4">
                                                                    Nenhum
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="row">    
                                                    <div class="col-sm-12">
                                                        <p class="ARNBaixoOb ARNBaixo">Deambulação precoce, Fisioterapia, Heparina não indicado.</p>
                                                    </div>
                                                </div>
                                                    
                                                </fieldset>
                                            </div>
                                        </div>
                                    
                                        <div class="m-t-20 text-center">
                                            <a href="servico_cirurgico.php" class="btn btn-primary submit-btn">Voltar</a>
                                            <button class="btn btn-success submit-btn btnCriarProfilaxia3">Confirmar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="tab-pane fade show" id="nav-Pos1" role="tabpanel" aria-labelledby="nav-Pos1-tab"><!--POS 1-->
                                <div class="col-lg-8 offset-lg-2">
                                    <div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <fieldset>
                                                    <div class="col-sm-10">
                                                        <span><h4>Retorno do paciente do CC para unidade de internação</h4></span>
                                                    </div>
                                                <br><br>
                                                <div class="row">
                                                    <div class="col-sm-6 col-md-6 col-lg-4">
                                                        <div class="form-group">
                                                            <label>Nivel de consciência</label>
                                                            <select class="form-control" name="nivelConsciencia">
                                                                <option value="Sim">Sim</option>
                                                                <option value="Não">Não</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">    
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="nivelConscienciaOp" id="nivelConsciencia1" value="1">
                                                                <label class="form-check-label" for="nivelConsciencia1">
                                                                    Consciente
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="nivelConscienciaOp" id="nivelConsciencia2" value="2">
                                                                <label class="form-check-label" for="nivelConsciencia2">
                                                                    Semiconsciente
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="nivelConscienciaOp" id="nivelConsciencia3" value="3">
                                                                <label class="form-check-label" for="nivelConsciencia3">
                                                                    Sonolento
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="nivelConscienciaOp" id="nivelConsciencia4" value="4">
                                                                <label class="form-check-label" for="nivelConsciencia4">
                                                                    Agitado
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="nivelConscienciaOp" id="nivelConsciencia5" value="5">
                                                                <label class="form-check-label" for="nivelConsciencia5">
                                                                    Choroso
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="row">
                                                    <div class="col-sm-6 col-md-6 col-lg-4">
                                                        <div class="form-group">
                                                            <label>Sinais vitais estáveis</label>
                                                            <select class="form-control" name="sinaisVE">
                                                                <option value="Sim">Sim</option>
                                                                <option value="Não">Não</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-7">
                                                        <div class="form-group">
                                                            <label>Observação</label>
                                                            <textarea class="form-control" name="oberSinaisVE"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="row">
                                                    <div class="col-sm-6 col-md-6 col-lg-4">
                                                        <div class="form-group">
                                                            <label>Nâusea/vômito</label>
                                                            <select class="form-control" name="nauseaVomito">
                                                                <option value="Sim">Sim</option>
                                                                <option value="Não">Não</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-7">
                                                        <div class="form-group">
                                                            <label>Observação</label>
                                                            <textarea class="form-control" name="oberNauseaVomito"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="row">
                                                    <div class="col-sm-6 col-md-6 col-lg-4">
                                                        <div class="form-group">
                                                            <label>Tipo de anestesia realizada</label>
                                                            <select class="form-control" name="tipoAnestesia">
                                                                <option value="Sim">Sim</option>
                                                                <option value="Não">Não</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">    
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="tipoAnestesiaOp" id="tipoAnestesiaOp1" value="1">
                                                                <label class="form-check-label" for="tipoAnestesiaOp1">
                                                                    Geral
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="tipoAnestesiaOp" id="tipoAnestesiaOp2" value="2">
                                                                <label class="form-check-label" for="tipoAnestesiaOp2">
                                                                    Local
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="tipoAnestesiaOp" id="tipoAnestesiaOp3" value="3">
                                                                <label class="form-check-label" for="tipoAnestesiaOp3">
                                                                    Raquidiana
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="tipoAnestesiaOp" id="tipoAnestesiaOp4" value="4">
                                                                <label class="form-check-label" for="tipoAnestesiaOp4">
                                                                    Peridural
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="tipoAnestesiaOp" id="tipoAnestesiaOp5" value="5">
                                                                <label class="form-check-label" for="tipoAnestesiaOp5">
                                                                    Plexular
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="tipoAnestesiaOp" id="tipoAnestesiaOp6" value="6">
                                                                <label class="form-check-label" for="tipoAnestesiaOp6">
                                                                    Sedação
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="row">
                                                    <div class="col-sm-6 col-md-6 col-lg-4">
                                                        <div class="form-group">
                                                            <label>Condições da pele e perfusão tecidual extremidades</label>
                                                            <select class="form-control" name="CPPTE">
                                                                <option value="Sim">Sim</option>
                                                                <option value="Não">Não</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">    
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="CPPTEOp" id="CPPTEOp1" value="1">
                                                                <label class="form-check-label" for="CPPTEOp1">
                                                                    Normocorado
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="CPPTEOp" id="CPPTEOp2" value="2">
                                                                <label class="form-check-label" for="CPPTEOp2">
                                                                    Hipocorado
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="CPPTEOp" id="CPPTEOp3" value="3">
                                                                <label class="form-check-label" for="CPPTEOp3">
                                                                    Ferimento / Queimaduras
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="CPPTEOp" id="CPPTEOp4" value="4">
                                                                <label class="form-check-label" for="CPPTEOp4">
                                                                    Sudorese
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="CPPTEOp" id="CPPTEOp5" value="5">
                                                                <label class="form-check-label" for="CPPTEOp5">
                                                                    Hematoma / Equimose
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="row">
                                                    <div class="col-sm-6 col-md-6 col-lg-4">
                                                        <div class="form-group">
                                                            <label>Sistema de drenagem</label>
                                                            <select class="form-control" name="sistemaDrenagem">
                                                                <option value="Sim">Sim</option>
                                                                <option value="Não">Não</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">    
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="sistemaDrenagemOp" id="sistemaDrenagemOp1" value="1">
                                                                <label class="form-check-label" for="sistemaDrenagemOp1">
                                                                    Sonda vesical de demora
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="sistemaDrenagemOp" id="sistemaDrenagemOp2" value="2">
                                                                <label class="form-check-label" for="sistemaDrenagemOp2">
                                                                    Sonda nasogastrica
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="sistemaDrenagemOp" id="sistemaDrenagemOp3" value="3">
                                                                <label class="form-check-label" for="sistemaDrenagemOp3">
                                                                    Ostomia
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="sistemaDrenagemOp" id="sistemaDrenagemOp4" value="4">
                                                                <label class="form-check-label" for="sistemaDrenagemOp4">
                                                                    Dreno
                                                                </label>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-12 col-md-12 col-lg-7">
                                                                    <div class="form-group">
                                                                        <label></label>
                                                                        <textarea class="form-control" name="oberSistemaDrenagem" disabled></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="row">
                                                    <div class="col-sm-6 col-md-6 col-lg-4">
                                                        <div class="form-group">
                                                            <label>Curativo cirúrgico</label>
                                                            <select class="form-control" name="curativoCirurgico">
                                                                <option value="Sim">Sim</option>
                                                                <option value="Não">Não</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">    
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="curativoCirurgicoOp" id="curativoCirurgicoOp1" value="1">
                                                                <label class="form-check-label" for="curativoCirurgicoOp1">
                                                                    Sem sangramento
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="curativoCirurgicoOp" id="curativoCirurgicoOp2" value="2">
                                                                <label class="form-check-label" for="curativoCirurgicoOp2">
                                                                    Cem sangramento
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="row">
                                                    <div class="col-sm-6 col-md-6 col-lg-4">
                                                        <div class="form-group">
                                                            <label>Mobilidade dos membros</label>
                                                            <select class="form-control" name="mobilidadeMembros">
                                                                <option value="Sim">Sim</option>
                                                                <option value="Não">Não</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">    
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="mobilidadeMembrosOp" id="mobilidadeMembrosOp1" value="1">
                                                                <label class="form-check-label" for="mobilidadeMembrosOp1">
                                                                    Paresia
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="mobilidadeMembrosOp" id="mobilidadeMembrosOp2" value="2">
                                                                <label class="form-check-label" for="mobilidadeMembrosOp2">
                                                                    Plegia
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="mobilidadeMembrosOp" id="mobilidadeMembrosOp3" value="3">
                                                                <label class="form-check-label" for="mobilidadeMembrosOp3">
                                                                    Parestesia
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="mobilidadeMembrosOp" id="mobilidadeMembrosOp4" value="4">
                                                                <label class="form-check-label" for="mobilidadeMembrosOp4">
                                                                    Paralisia
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="mobilidadeMembrosOp" id="mobilidadeMembrosOp5" value="5">
                                                                <label class="form-check-label" for="mobilidadeMembrosOp5">
                                                                    MS
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="mobilidadeMembrosOp" id="mobilidadeMembrosOp6" value="6">
                                                                <label class="form-check-label" for="mobilidadeMembrosOp6">
                                                                    MI
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="mobilidadeMembrosOp" id="mobilidadeMembrosOp7" value="7">
                                                                <label class="form-check-label" for="mobilidadeMembrosOp7">
                                                                    MMSS
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="mobilidadeMembrosOp" id="mobilidadeMembrosOp8" value="8">
                                                                <label class="form-check-label" for="mobilidadeMembrosOp8">
                                                                    MMII
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="row">
                                                    <div class="col-sm-6 col-md-6 col-lg-4">
                                                        <div class="form-group">
                                                            <label>Prescrição médica pós-operatório</label>
                                                            <select class="form-control" name="prescricaoMedica">
                                                                <option value="Sim">Sim</option>
                                                                <option value="Não">Não</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-md-6 col-lg-4">
                                                        <div class="form-group">
                                                            <label>Avisado médico responsavel?</label>
                                                            <select class="form-control" name="avisadoMedico">
                                                                <option value="Sim">Sim</option>
                                                                <option value="Não">Não</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="row">
                                                    <div class="col-sm-6 col-md-6 col-lg-4">
                                                        <div class="form-group">
                                                            <label>Ficha de enfermagem transoperatório e REPAI preenchidas</label>
                                                            <select class="form-control" name="fichaETRP">
                                                                <option value="Sim">Sim</option>
                                                                <option value="Não">Não</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">    
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="fichaETRPOp" id="fichaETRPOp1" value="1">
                                                                <label class="form-check-label" for="fichaETRPOp1">
                                                                    Intercorrência Intraoperatória
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="fichaETRPOp" id="fichaETRPOp2" value="2">
                                                                <label class="form-check-label" for="fichaETRPOp2">
                                                                    Intercorrência REPAI
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="fichaETRPOp" id="fichaETRPOp3" value="3">
                                                                <label class="form-check-label" for="fichaETRPOp3">
                                                                    Outras
                                                                </label>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-12 col-md-12 col-lg-7">
                                                                    <div class="form-group">
                                                                        <label></label>
                                                                        <textarea class="form-control" name="oberFichaETRP"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="row">
                                                    <div class="col-sm-6 col-md-6 col-lg-4">
                                                        <div class="form-group">
                                                            <label>Acesso venoso permeável</label>
                                                            <select class="form-control" name="acessoVP">
                                                                <option value="Sim">Sim</option>
                                                                <option value="Não">Não</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">    
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="acessoVPOp" id="acessoVPOp1" value="1">
                                                                <label class="form-check-label" for="acessoVPOp1">
                                                                    Cateter periférico
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="acessoVPOp" id="acessoVPOp2" value="2">
                                                                <label class="form-check-label" for="acessoVPOp2">
                                                                    Cateter central
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="acessoVPOp" id="acessoVPOp3" value="3">
                                                                <label class="form-check-label" for="acessoVPOp3">
                                                                    Outras
                                                                </label>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-12 col-md-12 col-lg-7">
                                                                    <div class="form-group">
                                                                        <label></label>
                                                                        <textarea class="form-control" name="oberAcessoVP"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="row">
                                                    <div class="col-sm-6 col-md-6 col-lg-4">
                                                        <div class="form-group">
                                                            <label>Paciente refere ou demostra dor aguda</label>
                                                            <select class="form-control" name="pacienteRDA">
                                                                <option value="Sim">Sim</option>
                                                                <option value="Não">Não</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">    
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="pacienteRDAOp" id="pacienteRDAOp1" value="1">
                                                                <label class="form-check-label" for="pacienteRDAOp1">
                                                                    Cateter peridural para analgesia
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="row">
                                                    <div class="col-sm-6 col-md-6 col-lg-4">
                                                        <div class="form-group">
                                                            <label>Recomendação especial</label>
                                                            <select class="form-control" name="recomendacaoEspecial">
                                                                <option value="Sim">Sim</option>
                                                                <option value="Não">Não</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">    
                                                    <div class="col-sm-12 col-md-12 col-lg-7">
                                                        <div class="form-group">
                                                            <label>Especifique</label>
                                                            <textarea class="form-control" name="oberRecomendacaoEspecial"></textarea>
                                                        </div>
                                                    </div>  
                                                </div>
                                                    
                                                </fieldset>
                                            </div>
                                        </div>
                                    
                                        <div class="m-t-20 text-center">
                                            <a href="servico_cirurgico.php" class="btn btn-primary submit-btn">Voltar</a>
                                            <button class="btn btn-success submit-btn btnCriarPos1">Confirmar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="tab-pane fade" id="nav-Pos2" role="tabpanel" aria-labelledby="nav-Pos2-tab"><!--POS 2-->
                                <div class="col-lg-8 offset-lg-2">
                                    <div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <fieldset>
                                                    <div class="col-sm-10">
                                                        <span><h4>Pós-operatório mediato (POM) (24 horas após a cirurgia até a alta hospitalar)</h4></span>
                                                    </div>
                                                <br><br>
                                                <div class="row">
                                                    <div class="col-sm-6 col-md-6 col-lg-4">
                                                        <div class="form-group">
                                                            <label>Data</label>
                                                            <div class="cal-icon">
                                                                <input type="text" class="form-control datetimepicker" name="dataPos2">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6 col-md-6 col-lg-4">
                                                        <div class="form-group">
                                                            <label>Dor</label>
                                                            <select class="form-control" name="dor">
                                                                <option value="Sim">Sim</option>
                                                                <option value="Não">Não</option>
                                                                <option value="Cateter peridual">Cateter peridual</option>
                                                                <option value="Bomba de PCA">Bomba de PCA</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                
                                                    <div class="col-sm-6 col-md-6 col-lg-4">
                                                        <div class="form-group">
                                                            <label>Sistema respiratorio</label>
                                                            <select class="form-control" name="sistemaRespiratorio">
                                                                <option value="Taquipneia">Taquipneia</option>
                                                                <option value="Bradipneia">Bradipneia</option>
                                                                <option value="Hipóxia">Hipóxia</option>
                                                                <option value="Sem alterações">Sem alterações</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="row">
                                                    <div class="col-sm-6 col-md-6 col-lg-4">
                                                        <div class="form-group">
                                                            <label>Sistema digestório e urinário</label>
                                                            <select class="form-control" name="sistemaDU">
                                                                <option value="Náusea/Vômito">Náusea/Vômito</option>
                                                                <option value="Diarreia">Diarreia</option>
                                                                <option value="constipação">constipação</option>
                                                                <option value="Hematúria">Hematúria</option>
                                                                <option value="Sem alterações">Sem alterações</option>
                                                                <option value="Dispositivos">Dispositivos</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                
                                                    <div class="col-sm-6 col-md-6 col-lg-4">
                                                        <div class="form-group">
                                                            <label>Sistema cardiovascular</label>
                                                            <select class="form-control" name="sistemaCardiovascular">
                                                                <option value="Bradicardia">Bradicardia</option>
                                                                <option value="Taquicardia">Taquicardia</option>
                                                                <option value="Hipotensão">Hipotensão</option>
                                                                <option value="Hipertensão">Hipertensão</option>
                                                                <option value="Hipotermia">Hipotermia</option>
                                                                <option value="Hipertermia">Hipertermia</option>
                                                                <option value="Sem alterações">Sem alterações</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="row">
                                                    <div class="col-sm-6 col-md-6 col-lg-4">
                                                        <div class="form-group">
                                                            <label>Sistema tegumentar</label>
                                                            <select class="form-control" name="sistemaTegumentar">
                                                                <option value="Úlcera pressão">Úlcera pressão</option>
                                                                <option value="Lesões">Lesões</option>
                                                                <option value="Sem alterações">Sem alterações</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                
                                                    <div class="col-sm-12 col-md-12 col-lg-4">
                                                        <div class="form-group">
                                                            <label>Especifique</label>
                                                            <textarea class="form-control" name="oberSistemaTegumentar" disabled></textarea>
                                                        </div>
                                                    </div>  
                                                </div>
                                                
                                                <div class="row">
                                                    <div class="col-sm-6 col-md-6 col-lg-4">
                                                        <div class="form-group">
                                                            <label>Sitio cirúrgico</label>
                                                            <select class="form-control" name="sitioCirurgico">
                                                                <option value="Sangramento">Sangramento</option>
                                                                <option value="Deiscência">Deiscência</option>
                                                                <option value="Sinais flogisticos">Sinais flogisticos</option>
                                                                <option value="Drenagem">Drenagem</option>
                                                                <option value="Sem alterações">Sem alterações</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                    
                                                </fieldset>
                                            </div>
                                        </div>
                                    
                                        <div class="m-t-20 text-center">
                                            <a href="servico_cirurgico.php" class="btn btn-primary submit-btn">Voltar</a>
                                            <button class="btn btn-success submit-btn btnCriarPos2">Confirmar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="tab-pane fade" id="nav-Pos3" role="tabpanel" aria-labelledby="nav-Pos3-tab"><!--POS 3-->
                                <div class="col-lg-8 offset-lg-2">
                                    <div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <fieldset>
                                                    <div class="col-sm-10">
                                                        <span><h4>Complicações</h4></span>
                                                    </div>
                                                <br><br>
                                                
                                                <div class="row">    
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="checkbox" name="complicaoPos3op" id="complicaoPos3op1" value="1">
                                                                    <label class="form-check-label" for="complicaoPos3op1">
                                                                        TEV
                                                                    </label>
                                                                </div>
                                                                <div class="col-sm-3 col-md-3 col-lg-3">
                                                                    <div class="form-group">
                                                                        <div class="cal-icon">
                                                                            <input type="text" class="form-control datetimepicker" name="dataPos3">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="checkbox" name="complicaoPos3op" id="complicaoPos3op2" value="2">
                                                                    <label class="form-check-label" for="complicaoPos3op2">
                                                                        Queda
                                                                    </label>
                                                                </div>
                                                                <div class="col-sm-3 col-md-3 col-lg-3">
                                                                    <div class="form-group">
                                                                        <div class="cal-icon">
                                                                            <input type="text" class="form-control datetimepicker" name="dataPos3">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="checkbox" name="complicaoPos3op" id="complicaoPos3op3" value="3">
                                                                    <label class="form-check-label" for="complicaoPos3op3">
                                                                        Sangramento
                                                                    </label>
                                                                </div>
                                                                <div class="col-sm-12 col-md-12 col-lg-3">
                                                                    <div class="form-group">
                                                                        <div class="cal-icon">
                                                                            <input type="text" class="form-control datetimepicker" name="dataPos3">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="checkbox" name="complicaoPos3op" id="complicaoPos3op4" value="4">
                                                                    <label class="form-check-label" for="complicaoPos3op4">
                                                                        Anemia/transfusão sanguinea
                                                                    </label>
                                                                </div>
                                                                <div class="col-sm-12 col-md-12 col-lg-3">
                                                                    <div class="form-group">
                                                                        <div class="cal-icon">
                                                                            <input type="text" class="form-control datetimepicker" name="dataPos3">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="checkbox" name="complicaoPos3op" id="complicaoPos3op5" value="5">
                                                                    <label class="form-check-label" for="complicaoPos3op5">
                                                                        Reação adversa aos medicamentos
                                                                    </label>
                                                                </div>
                                                                <div class="col-sm-12 col-md-12 col-lg-4">
                                                                    <div class="form-group">
                                                                        <textarea class="form-control" name="obserReacaoAM" disabled></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 col-md-12 col-lg-3">
                                                                    <div class="form-group">
                                                                        <div class="cal-icon">
                                                                            <input type="text" class="form-control datetimepicker" name="dataPos3">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="checkbox" name="complicaoPos3op" id="complicaoPos3op6" value="6">
                                                                    <label class="form-check-label" for="complicaoPos3op6">
                                                                        Infecção de sitio cirúrgico
                                                                    </label>
                                                                </div>
                                                                <div class="col-sm-12 col-md-12 col-lg-3">
                                                                    <div class="form-group">
                                                                        <div class="cal-icon">
                                                                            <input type="text" class="form-control datetimepicker" name="dataPos3">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="checkbox" name="complicaoPos3op" id="complicaoPos3op7" value="7">
                                                                    <label class="form-check-label" for="complicaoPos3op7">
                                                                        Infecção de trato respiratorio
                                                                    </label>
                                                                </div>
                                                                <div class="col-sm-12 col-md-12 col-lg-3">
                                                                    <div class="form-group">
                                                                        <div class="cal-icon">
                                                                            <input type="text" class="form-control datetimepicker" name="dataPos3">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="checkbox" name="complicaoPos3op" id="complicaoPos3op8" value="8">
                                                                    <label class="form-check-label" for="complicaoPos3op8">
                                                                        Infecção trato urinário
                                                                    </label>
                                                                </div>
                                                                <div class="col-sm-12 col-md-12 col-lg-3">
                                                                    <div class="form-group">
                                                                        <div class="cal-icon">
                                                                            <input type="text" class="form-control datetimepicker" name="dataPos3">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="checkbox" name="complicaoPos3op" id="complicaoPos3op9" value="9">
                                                                    <label class="form-check-label" for="complicaoPos3op9">
                                                                        Infecção primária corrente sanguinea
                                                                    </label>
                                                                </div>
                                                                <div class="col-sm-12 col-md-12 col-lg-3">
                                                                    <div class="form-group">
                                                                        <div class="cal-icon">
                                                                            <input type="text" class="form-control datetimepicker" name="dataPos3">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="checkbox" name="complicaoPos3op" id="complicaoPos3op10" value="10">
                                                                    <label class="form-check-label" for="complicaoPos3op10">
                                                                        Fistula
                                                                    </label>
                                                                </div>
                                                                <div class="col-sm-12 col-md-12 col-lg-3">
                                                                    <div class="form-group">
                                                                        <div class="cal-icon">
                                                                            <input type="text" class="form-control datetimepicker" name="dataPos3">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="checkbox" name="complicaoPos3op" id="complicaoPos3op11" value="11">
                                                                    <label class="form-check-label" for="complicaoPos3op11">
                                                                        Deiscência / Evisceração
                                                                    </label>
                                                                </div>
                                                                <div class="col-sm-12 col-md-12 col-lg-3">
                                                                    <div class="form-group">
                                                                        <div class="cal-icon">
                                                                            <input type="text" class="form-control datetimepicker" name="dataPos3">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="checkbox" name="complicaoPos3op" id="complicaoPos3op12" value="12">
                                                                    <label class="form-check-label" for="complicaoPos3op12">
                                                                        Choque / Séptico
                                                                    </label>
                                                                </div>
                                                                <div class="col-sm-12 col-md-12 col-lg-3">
                                                                    <div class="form-group">
                                                                        <div class="cal-icon">
                                                                            <input type="text" class="form-control datetimepicker" name="dataPos3">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="checkbox" name="complicaoPos3op" id="complicaoPos3op13" value="13">
                                                                    <label class="form-check-label" for="complicaoPos3op13">
                                                                        Parada cardiorrespiratoria
                                                                    </label>
                                                                </div>
                                                                <div class="col-sm-12 col-md-12 col-lg-3">
                                                                    <div class="form-group">
                                                                        <div class="cal-icon">
                                                                            <input type="text" class="form-control datetimepicker" name="dataPos3">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="checkbox" name="complicaoPos3op" id="complicaoPos3op14" value="14">
                                                                    <label class="form-check-label" for="complicaoPos3op14">
                                                                        Outra
                                                                    </label>
                                                                </div>
                                                                <div class="col-sm-12 col-md-12 col-lg-4">
                                                                    <div class="form-group">
                                                                        <textarea class="form-control" name="obserOutra" disabled></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-12 col-md-12 col-lg-3">
                                                                    <div class="form-group">
                                                                        <div class="cal-icon">
                                                                            <input type="text" class="form-control datetimepicker" name="dataPos3">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input" type="checkbox" name="complicaoPos3op" id="complicaoPos3op15" value="15">
                                                                    <label class="form-check-label" for="complicaoPos3op15">
                                                                        Óbito
                                                                    </label>
                                                                </div>
                                                                <div class="col-sm-12 col-md-12 col-lg-3">
                                                                    <div class="form-group">
                                                                        <div class="cal-icon">
                                                                            <input type="text" class="form-control datetimepicker" name="dataPos3">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-5">
                                                        <div class="form-group">
                                                            <label>Observação</label>
                                                            <textarea class="form-control" name="obserPos3"></textarea>
                                                        </div>
                                                    </div>  
                                                </div>
                                                
                                                    
                                                </fieldset>
                                            </div>
                                        </div>
                                    
                                        <div class="m-t-20 text-center">
                                            <a href="servico_cirurgico.php" class="btn btn-primary submit-btn">Voltar</a>
                                            <button class="btn btn-success submit-btn btnCriarPos3">Confirmar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="tab-pane fade" id="nav-Pos4" role="tabpanel" aria-labelledby="nav-Pos4-tab"><!--POS 4-->
                                <div class="col-lg-8 offset-lg-2">
                                    <div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <fieldset>
                                                    <div class="col-sm-10">
                                                        <span><h4>Alta</h4></span>
                                                    </div>
                                                <br><br>
                                                <div class="row">
                                                    <div class="col-sm-6 col-md-6 col-lg-4">
                                                        <div class="form-group">
                                                            <label>Alta</label>
                                                            <select class="form-control" name="alta">
                                                                <option value="Hospitalar">Hospitalar</option>
                                                                <option value="Domicilio">Domicilio</option>
                                                                <option value="Outro local">Outro local</option>
                                                                <option value="Transferência (para outro setor)">Transferência (para outro setor)</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                
                                                    <div class="col-sm-12 col-md-12 col-lg-5">
                                                        <div class="form-group">
                                                            <label>Especifique</label>
                                                            <textarea class="form-control" name="obserAlta" disabled></textarea>
                                                        </div>
                                                    </div> 
                                                </div>
                                                
                                                <div class="row">
                                                    <div class="col-sm-6 col-md-6 col-lg-4">
                                                        <div class="form-group">
                                                            <label>Bom estado geral</label>
                                                            <select class="form-control" name="bomEG">
                                                                <option value="Sim">Sim</option>
                                                                <option value="Não">Não</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="row">
                                                    <div class="col-sm-6 col-md-6 col-lg-4">
                                                        <div class="form-group">
                                                            <label>Dispositivos</label>
                                                            <select class="form-control" name="dispositivo">
                                                                <option value="Sim">Sim</option>
                                                                <option value="Não">Não</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">    
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="dispositivoOp" id="dispositivoOp1" value="1">
                                                                <label class="form-check-label" for="dispositivoOp1">
                                                                    Sonda Nasogástrica
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="dispositivoOp" id="dispositivoOp2" value="2">
                                                                <label class="form-check-label" for="dispositivoOp2">
                                                                    Nasoenteral
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="dispositivoOp" id="dispositivoOp3" value="3">
                                                                <label class="form-check-label" for="dispositivoOp3">
                                                                    Sonda vesical de demora
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="dispositivoOp" id="dispositivoOp4" value="4">
                                                                <label class="form-check-label" for="dispositivoOp4">
                                                                    Ostomia
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="dispositivoOp" id="dispositivoOp5" value="5">
                                                                <label class="form-check-label" for="dispositivoOp5">
                                                                    Dreno
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="dispositivoOp" id="dispositivoOp6" value="6">
                                                                <label class="form-check-label" for="dispositivoOp6">
                                                                    Outros
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-8">
                                                        <div class="form-group">
                                                            <label>Especifique</label>
                                                            <textarea class="form-control" name="obserDispositivos" disabled></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="row">
                                                    <div class="col-sm-6 col-md-6 col-lg-4">
                                                        <div class="form-group">
                                                            <label>Avaliação de ferida cirúrgica</label>
                                                            <select class="form-control" name="avaliacaoFC">
                                                                <option value="Sim">Sim</option>
                                                                <option value="Não">Não</option>
                                                                <option value="NSA">NSA</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">    
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="avaliacaoFCOp" id="avaliacaoFCOp1" value="1">
                                                                <label class="form-check-label" for="avaliacaoFCOp1">
                                                                    Limpa em cicatrização
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="avaliacaoFCOp" id="avaliacaoFCOp2" value="2">
                                                                <label class="form-check-label" for="avaliacaoFCOp2">
                                                                    Aberta
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="avaliacaoFCOp" id="avaliacaoFCOp3" value="3">
                                                                <label class="form-check-label" for="avaliacaoFCOp3">
                                                                    Infecção
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="row">
                                                    <div class="col-sm-6 col-md-6 col-lg-4">
                                                        <div class="form-group">
                                                            <label>Orientações para cuidados no âmbito domiciliar e retorno ambulatorial.</label>
                                                            <select class="form-control" name="OCADRA">
                                                                <option value="Sim">Sim</option>
                                                                <option value="Não">Não</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-8">
                                                        <div class="form-group">
                                                            <label>Especifique</label>
                                                            <textarea class="form-control" name="obserOCADRA"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                
                                                    
                                                </fieldset>
                                            </div>
                                        </div>
                                    
                                        <div class="m-t-20 text-center">
                                            <a href="servico_cirurgico.php" class="btn btn-primary submit-btn">Voltar</a>
                                            <button class="btn btn-success submit-btn btnCriarPos4">Confirmar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="tab-pane fade" id="nav-laudo" role="tabpanel" aria-labelledby="nav-laudo-tab"><!--Laudo-->
                            
                                <div class="col-lg-8 offset-lg-2">
                                    <div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <fieldset>
                                                    <div class="col-sm-10">
                                                        <span><h4>Laudo Cirúrgico</h4></span>
                                                    </div>
                                                <br><br>
                                                <div class="row">
                                                    <div class="col-sm-6 col-md-6 col-lg-4">
                                                        <div class="form-group">
                                                            <label>Equipe Cirúrgica</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6 col-md-6 col-lg-4">
                                                        <div class="form-group">
                                                            <label>1º</label>
                                                            <select class="form-control" name="medico1">
                                                                <?php
                                                                    $cirurgia = new Cirurgia();
                                                                    echo $cirurgia->montCampoMedico();
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                
                                                    <div class="col-sm-6 col-md-6 col-lg-4">
                                                        <div class="form-group">
                                                            <label>2º</label>
                                                            <select class="form-control" name="medico2">
                                                                <?php
                                                                    $cirurgia = new Cirurgia();
                                                                    echo $cirurgia->montCampoMedico();
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                
                                                    <div class="col-sm-6 col-md-6 col-lg-4">
                                                        <div class="form-group">
                                                            <label>3º</label>
                                                            <select class="form-control" name="medico3">
                                                                <?php
                                                                    $cirurgia = new Cirurgia();
                                                                    echo $cirurgia->montCampoMedico();
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                
                                                    <div class="col-sm-6 col-md-6 col-lg-4">
                                                        <div class="form-group">
                                                            <label>4º</label>
                                                            <select class="form-control" name="medico4">
                                                                <?php
                                                                    $cirurgia = new Cirurgia();
                                                                    echo $cirurgia->montCampoMedico();
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-sm-6 col-md-6 col-lg-4">
                                                        <div class="form-group">
                                                            <label>5º</label>
                                                            <select class="form-control" name="medico5">
                                                                <?php
                                                                    $cirurgia = new Cirurgia();
                                                                    echo $cirurgia->montCampoMedico();
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="row">
                                                    <div class="col-sm-6 col-md-6 col-lg-4">
                                                        <div class="form-group">
                                                            <label>Enfermeiro(a)</label>
                                                            <select class="form-control select" name="laudoEnfermeiro">
                                                                <?php
                                                                    $cirurgia = new Cirurgia();
                                                                    echo $cirurgia->montCampo(2);
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-sm-6 col-md-6 col-lg-4">
                                                        <div class="form-group">
                                                            <label>Anestesiologista</label>
                                                            <select class="form-control select" name="laudoAnestesiologista">
                                                                <?php
                                                                    $cirurgia = new Cirurgia();
                                                                    echo $cirurgia->montCampo(3);
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-sm-6 col-md-6 col-lg-4">
                                                        <div class="form-group">
                                                            <label>Instrumentador(a)</label>
                                                            <select class="form-control select" name="laudoInstrumentador">
                                                                <?php
                                                                    $cirurgia = new Cirurgia();
                                                                    echo $cirurgia->montCampo(4);
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                                        <div class="form-group">
                                                            <label>Anestesia</label>
                                                            <textarea class="form-control" name="obserLaudoAnestesia"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                                        <div class="form-group">
                                                            <label>Profilaxia</label>
                                                            <textarea class="form-control" name="obserLaudoProfilaxia"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                                        <div class="form-group">
                                                            <label>Diagnósticos pré-operatórios</label>
                                                            <textarea class="form-control" name="obserLaudoDiagnosticoPreOperatorio"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                                        <div class="form-group">
                                                            <label>Achados cirúrgicos</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="row">
                                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                                        <div class="form-group">
                                                            <label>1º</label>
                                                            <textarea class="form-control" name="obserLaudoAchadosCirurgico1"></textarea>
                                                        </div>
                                                    </div>
                                                
                                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                                        <div class="form-group">
                                                            <label>2º</label>
                                                            <textarea class="form-control" name="obserLaudoAchadosCirurgico2"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                                        <div class="form-group">
                                                            <label>Procedimentos cirúrgicos efetuados</label>
                                                            <textarea class="form-control" name="obserLaudoPCE"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                                        <div class="form-group">
                                                            <label>Preparo e posicionamento do paciente na sala cirúrgico</label>
                                                            <textarea class="form-control" name="obserLaudoPPPSC"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="row">
                                                    <div class="col-sm-6 col-md-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>Tempo total da cirurgia</label>
                                                            <input type="time" class="form-control" name="laudoTempoTC">
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-sm-6 col-md-6 col-lg-3">
                                                        <div class="form-group">
                                                            <label>Perda sanguínea</label>
                                                            <input type="text" class="form-control" name="laudoPerdaSanguina">
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                                
                                                    
                                                </fieldset>
                                            </div>
                                        </div>
                                    
                                        <div class="m-t-20 text-center">
                                            <a href="servico_cirurgico.php" class="btn btn-primary submit-btn">Voltar</a>
                                            <button class="btn btn-success submit-btn btnCriarLaudo">Confirmar</button>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            
                        </div>
					</div>
                </div>
            </div>
            
        </div>
		<div id="delete_patient" class="modal fade delete-modal" role="dialog">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-body text-center">
						<img src="assets/img/sent.png" alt="" width="50" height="46">
						<h3>Tem certeza de que deseja excluir está cirurgia?</h3>
						<div class="m-t-20"> <a href="#" class="btn btn-white" data-dismiss="modal">Fechar</a>
							<button class="btn btn-danger apagar">Apagar</button>
						</div>
					</div>
				</div>
			</div>
			
		</div>
    </div>
    <div class="sidebar-overlay" data-reff=""></div>
    <script src="assets/js/jquery-3.2.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.slimscroll.js"></script>
    <script src="assets/js/select2.min.js"></script>
    <script src="assets/js/jquery.dataTables.min.js"></script>
    <script src="assets/js/dataTables.bootstrap4.min.js"></script>
    <script src="assets/js/moment.min.js"></script>
    <script src="assets/js/bootstrap-datetimepicker.min.js"></script>
    <script src="assets/js/app.js"></script>
    <script src="assets/js/dataTableSearch.js"></script>
    <script src="assets/js/toastr.min.js"></script>
    <script src="js/consulta.js"></script>
    <script src="js/evolucao.js"></script>
    <script src="js/checkList.js"></script>
    <script src="js/trans11.js"></script>
    <script src="js/trans12.js"></script>
    <script src="js/trans13.js"></script>
    <script src="js/profilaxia1.js"></script>
    <script src="js/profilaxia2.js"></script>
    <script src="js/profilaxia3.js"></script>
    <script src="js/pos1.js"></script>
    <script src="js/pos2.js"></script>
    <script src="js/pos3.js"></script>
    <script src="js/pos4.js"></script>
    <script src="js/laudo.js"></script>
    
    <script src="js/logout.js"></script>
</body>

    <script>
        
        
        //pegar dados tabela
        var $idCirurgia = 0;
        var $idPaciente = 0;
        var idCONSULTA = 0;
        var idEvolucao = 0;
        var idCHECKLIST = 0;
        var idTrans1 = 0;
        var idTrans1_2 = 0;
        var idTrans1_3 = 0;
        var idProfilaxia1 = 0;
        var idProfilaxia2 = 0;
        var idProfilaxia3 = 0;
        var idPos1 = 0;
        var idPos2 = 0;
        var idPos3 = 0;
        var idPos4 = 0;
        var idLaudo = 0;
        
        function loadPag()
        {
            $idCirurgia = "<?php  if(isset($_SESSION['idCirurgia']))echo $_SESSION['idCirurgia'];?>";
            $("input[name=nomePaciente]").val("<?php  if(isset($_SESSION['nomePaciente']))echo $_SESSION['nomePaciente'];?>");
            getConsulta();
            getEvolucao();
            getCheckList();
            getTrans1();
            getTrans12();
            getTrans13();
            profilaxia1();
            profilaxia2();
            profilaxia3();
            pos1();
            pos2();
            pos3();
            pos4();
            laudo();
            
            //abas active
            var tipoExPhp = "<?php echo $_SESSION['tipoEx'];?>";
            if(tipoExPhp === "pre")
            {
                $("#nav-home").addClass("active");
            }
            else if(tipoExPhp === "trans")
            {
                $("#nav-transCheck11").addClass("active");
            }
            else
            {
                $("#nav-Pos1").addClass("active");
            }
        }
        
        loadPag();
        
        
        $(document).on("click","#pre" ,function(){
            setServicosMenu("pre");
        });
        $(document).on("click","#trans" ,function(){
            setServicosMenu("trans");
        });
        $(document).on("click","#pos" ,function(){
            setServicosMenu("pos");
        });
        $(document).on("click","#trocarPaciente" ,function(){
            window.location.href = "servico_cirurgico.php";
        });
        
        function setServicosMenu($tipo)
        {
            $.ajax({
                url: 'php/ajax/cirurgia.php',
                type: 'POST',
                 data: {
                        metodo: "setServicosMenu",
                        tipoEx:$tipo
                      },
                cache: false,
                datatype: "json",
                error: function(jqXHR) {
                    toastr.error(jqXHR.responseText, "Error");
                },
                success: function() {
                    window.location.reload();
                },
            });
        }
    </script>

<!-- patients23:19-->
</html>