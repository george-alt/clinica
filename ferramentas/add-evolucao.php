<?php include('seguranca/scriptSeg.php');?>
<!DOCTYPE html>
<html lang="en">


<!-- add-doctor24:06-->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <title>NOME CLINICA</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/select2.min.css">
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
                    <div class="col-lg-8 offset-lg-2">
                        <h4 class="page-title">Evolução</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Leito<span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="leito">
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
                                <a href="consulta.php" class="btn btn-primary submit-btn">Voltar</a>
                                <button class="btn btn-success submit-btn btnCriarCirurgia">Confirmar</button>
                            </div>
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
	<script src="assets/js/moment.min.js"></script>
	<script src="assets/js/bootstrap-datetimepicker.min.js"></script>
    <script src="assets/js/app.js"></script>
    
    <script src="assets/js/toastr.min.js"></script>
</body>

<script>
    

    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };
    
    $(document).on("click", ".btnCriarCirurgia", function(){
        $leito = $("input[name=leito]").val();
        $origem = $("input[name=origem]").val();
        $aberturaOcular = $("select[name=aberturaOcular]").val();
        $respostaVerbal = $("select[name=respostaVerbal]").val();
        $respostaMotora = $("select[name=respostaMotora]").val();
        $consciencia = $("select[name=consciencia]").val();
        $orientacao = $("select[name=orientacao]").val();
        $descPulso = $("input[name=descPulso]").val();
        $pulso = $("select[name=pulso]").val();
        $descFc = $("input[name=descFc]").val();
        $FC = $("select[name=FCevol]").val();
        $descPa = $("input[name=descPa]").val();
        $PA = $("select[name=PAevol]").val();
        $descPadraoRespiratorio = $("input[name=descPadraoRespiratorio]").val();
        $padraoRespiratorio = $("select[name=padraoRespiratorio]").val();
        $respiracao = $("select[name=respiracao]").val();
        $abdomen = $("select[name=abdomen]").val();
        $RHA = $("select[name=RHA]").val();
        $alimentacao = $("select[name=alimentacao]").val();
        $residuos = $("input[name=residuos]").val();
        $eliminacao = $("select[name=eliminacao]").val();
        $via = $("select[name=via]").val();
        $descVia = $("input[name=descVia]").val();
        $diurese = $("select[name=diurese]").val();
        $debito = $("select[name=debito]").val();
        $HD = $("select[name=HD]").val();
        $sistemaEndocrino = $("select[name=sistemaEndocrino]").val();
        $niveisGlicemicos = $("select[name=niveisGlicemicos]").val();
        $cateteres = $("select[name=cateteres]").val();
        $sondas = $("select[name=sondas]").val();
        $drenos = $("select[name=drenos]").val();
        $curativos = $("select[name=curativos]").val();
        $sistomas = $("select[name=sistomas]").val();
        $medicacao = $("select[name=medicacao]").val();
        $observacao = $("textarea[name=observacao]").val();
        $status = $("input[name=status]").val();
        
        
        var metodo;
        
        if(true)
        {
            if(false)
            {
                metodo = "update";
            }
            else
            {
                metodo = "add";
            }
            $.ajax({
                url: 'php/ajax/evolucao.php',
                type: 'POST',
                 data: {
                        metodo: metodo,
                        leito:$leito,
                        origem:$origem,
                        aberturaOcular:$aberturaOcular,
                        respostaVerbal:$respostaVerbal,
                        respostaMotora:$respostaMotora,
                        consciencia:$consciencia,
                        orientacao:$orientacao,
                        descPulso:$descPulso,
                        pulso:$pulso,
                        descFc:$descFc,
                        FC:$FC,
                        descPa:$descPa,
                        PA:$PA,
                        descPadraoRespiratorio:$descPadraoRespiratorio,
                        padraoRespiratorio:$padraoRespiratorio,
                        respiracao:$respiracao,
                        abdomen:$abdomen,
                        RHA:$RHA,
                        alimentacao:$alimentacao,
                        residuos:$residuos,
                        eliminacao:$eliminacao,
                        via:$via,
                        descVia:$descVia,
                        diurese:$diurese,
                        debito:$debito,
                        HD:$HD,
                        sistemaEndocrino:$sistemaEndocrino,
                        niveisGlicemicos:$niveisGlicemicos,
                        cateteres:$cateteres,
                        sondas:$sondas,
                        drenos:$drenos,
                        curativos:$curativos,
                        sistomas:$sistomas,
                        medicacao:$medicacao,
                        observacao:$observacao,
                        status:$status
                      },
                cache: false,
                datatype: "json",
                error: function(jqXHR) {
                    toastr.error(jqXHR.responseText, "Error");
                },
                success: function(data) {
                    toastr.success(data.msg, "Sucesso");
                    setTimeout(function(){
                        window.location.reload(1);
                     }, 2000);
                },
            });
        }
        else
        {
            $("input").css({"border":"red solid 1px"});
            $("textarea").css({"border":"red solid 1px"});
            toastr.warning("Informe todos os campos", "Alerta");
            
        }
        
    });
</script>

<!-- add-doctor24:06-->
</html>
