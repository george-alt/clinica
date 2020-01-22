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
                        <h4 class="page-title">Consulta</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Nome Paciente<span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="nomePaciente">
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
												<select class="form-control select" name="comorbidades">
													<option value="1">Sim</option>
													<option value="0">Não</option>
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
												<select class="form-control select" name="tabagista">
													<option value="1">Sim</option>
													<option value="0">Não</option>
												</select>
											</div>
										</div>
                                        <div class="col-sm-6 col-md-6 col-lg-3">
											<div class="form-group">
												<label>Etilista</label>
												<select class="form-control select" name="etilista">
													<option value="1">Sim</option>
													<option value="0">Não</option>
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
												<select class="form-control select" name="alergias">
													<option value="1">Sim</option>
													<option value="0">Não</option>
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
												<select class="form-control select" name="rpi">
													<option value="1">Sim</option>
													<option value="0">Não</option>
                                                    <option value="2">Não se aplica</option>
												</select>
											</div>
										</div>
                                        <div class="col-sm-6 col-md-6 col-lg-3">
											<div class="form-group">
												<label>Realização da demarcação cirúrgica</label>
												<select class="form-control select" name="rdc">
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
    var idCONSULTA              = "<?php if(isset($_SESSION['idCONSULTA']))echo $_SESSION['idCONSULTA'];?>";
    var nome                    = "<?php if(isset($_SESSION['nome']))echo $_SESSION['nome'];?>";
    var dataNasc                = "<?php if(isset($_SESSION['dataNasc'])) {$dataNew = explode("-",$_SESSION['dataNasc']);
                                         $dataNew = $dataNew[2]."/".$dataNew[1]."/".$dataNew[0];
                                         echo $dataNew;}?>";
    var leito                   = "<?php if(isset($_SESSION['leito']))echo $_SESSION['leito'];?>";
    var dataInternacao          = "<?php if(isset($_SESSION['dataInternacao'])){$dataNew = explode("-",$_SESSION['dataInternacao']);
                                         $dataNew = $dataNew[2]."/".$dataNew[1]."/".$dataNew[0];
                                         echo $dataNew;}?>";
    var pcp                     = "<?php if(isset($_SESSION['pcp']))echo $_SESSION['pcp'];?>";
    var pca                     = "<?php if(isset($_SESSION['pca']))echo $_SESSION['pca'];?>";
    var pa                      = "<?php if(isset($_SESSION['pa']))echo $_SESSION['pa'];?>";
    var t                       = "<?php if(isset($_SESSION['t']))echo $_SESSION['t'];?>";
    var f                       = "<?php if(isset($_SESSION['f']))echo $_SESSION['f'];?>";
    var fr                      = "<?php if(isset($_SESSION['fr']))echo $_SESSION['fr'];?>";
    var cirurgiaAnterior        = "<?php if(isset($_SESSION['cirurgiaAnterior']))echo $_SESSION['cirurgiaAnterior'];?>";
    var comorbidades            = "<?php if(isset($_SESSION['comorbidades']))echo $_SESSION['comorbidades'];?>";
    var observacaoComorbidades  = "<?php if(isset($_SESSION['observacaoComorbidades']))echo $_SESSION['observacaoComorbidades'];?>";
    var examesDiponiveis        = "<?php if(isset($_SESSION['examesDiponiveis']))echo $_SESSION['examesDiponiveis'];?>";
    var medicacaoDomicilio      = "<?php if(isset($_SESSION['medicacaoDomicilio']))echo $_SESSION['medicacaoDomicilio'];?>";
    var tabagista               = "<?php if(isset($_SESSION['tabagista']))echo $_SESSION['tabagista'];?>";
    var etilista                = "<?php if(isset($_SESSION['etilista']))echo $_SESSION['etilista'];?>";
    var alergias                = "<?php if(isset($_SESSION['alergias']))echo $_SESSION['alergias'];?>";
    var observacaoAlergias      = "<?php if(isset($_SESSION['observacaoAlergias']))echo $_SESSION['observacaoAlergias'];?>";
    var rpi                     = "<?php if(isset($_SESSION['rpi']))echo $_SESSION['rpi'];?>";
    var rdc                     = "<?php if(isset($_SESSION['rdc']))echo $_SESSION['rdc'];?>";
    var status                  = "<?php if(isset($_SESSION['status']))echo $_SESSION['status'];?>";
    
    
    var statusNivel;
    
    if(comorbidades === "Sim")    {    comorbidades = 1;    }
    else    {    comorbidades = 0;    }
    if(tabagista === "Sim")    {    tabagista = 1;    }
    else    {    tabagista = 0;    }
    if(etilista === "Sim")    {    etilista = 1;    }
    else    {    etilista = 0;    }
    if(alergias === "Sim")    {    alergias = 1;    }
    else{    alergias = 0;    }
    if(rpi === "Sim")    {    rpi = 1;    }
    else if(rpi === "Não se aplica")    {    rpi = 2;    }
    else{    rpi = 0;    }
    if(rdc === "Sim")    {    rdc = 1;    }
    else if(rdc === "Não se aplica")    {    rdc = 2;    }
    else{    rdc = 0;    }
    
    if(status === "Inativo")
    {
        statusNivel = 1;
    }
    else
    {
        statusNivel = 0;
    }
    
    
    if(idCONSULTA > 0)
    {
        $("input[name=nomePaciente]").val(nome);
        $("input[name=dataNacismento]").val(dataNasc);
        $("input[name=leito]").val(leito);
        $("input[name=dataInternacao]").val(dataInternacao);
        $("input[name=pcp]").val(pcp);
        $("input[name=pca]").val(pca);
        $("input[name=pa]").val(pa);
        $("input[name=t]").val(t);
        $("input[name=f]").val(f);
        $("input[name=fr]").val(fr);
        $("select[name=comorbidades]").val(comorbidades);
        $("textarea[name=especificarComorbidades]").val(observacaoComorbidades);
        $("select[name=tabagista]").val(tabagista);
        $("select[name=etilista]").val(etilista);
        $("select[name=alergias]").val(alergias);
        $("textarea[name=especificarAlergias]").val(observacaoAlergias);
        $("select[name=rpi]").val(rpi);
        $("select[name=rdc]").val(rdc);
        $("input[name=examesDiponiveis]").val(examesDiponiveis);
        $("input[name=MedicacaoDomicilio]").val(medicacaoDomicilio);
        $("input[name=cirurgiaAnterior]").val(cirurgiaAnterior);
        $("input[name=status]").eq(statusNivel).prop("checked", true);
        
    }
    
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
        $nomePaciente = $("input[name=nomePaciente]").val();
        $dataNacismento = $("input[name=dataNacismento]").val();
        $leito = $("input[name=leito]").val();
        $dataInternacao = $("input[name=dataInternacao]").val();
        $pcp = $("input[name=pcp]").val();
        $pca = $("input[name=pca]").val();
        $pa = $("input[name=pa]").val();
        $t = $("input[name=t]").val();
        $f = $("input[name=f]").val();
        $fr = $("input[name=fr]").val();
        $comorbidades = $("select[name=comorbidades]").val();
        $especificarComorbidades = $("textarea[name=especificarComorbidades]").val();
        $tabagista = $("select[name=tabagista]").val();
        $etilista = $("select[name=etilista]").val();
        $alergias = $("select[name=alergias]").val();
        $especificarAlergias = $("textarea[name=especificarAlergias]").val();
        $rpi = $("select[name=rpi]").val();
        $rdc = $("select[name=rdc]").val();
        $examesDiponiveis = $("input[name=examesDiponiveis]").val();
        $MedicacaoDomicilio = $("input[name=MedicacaoDomicilio]").val();
        $cirurgiaAnterior = $("input[name=cirurgiaAnterior]").val();
        $status = $("input[name=status]").val();
        
        
        var metodo;
        
        if($nomePaciente !== "" && $dataNacismento !== "" && $leito !== "" && $dataInternacao !== "" && $pcp !== "" && $pca !== "" && $pa !== "" &&
           $t !== "" && $f !== "" && $fr !== "" && $comorbidades !== "" && $especificarComorbidades !== "" && $tabagista !== "" && $etilista !== "" &&
           $alergias !== "" && $especificarAlergias !== "" && $rpi !== "" && $rdc !== "" && $examesDiponiveis !== "" && $MedicacaoDomicilio !== "" && $status !== "")
        {
            if(idCONSULTA > 0)
            {
                metodo = "update";
            }
            else
            {
                metodo = "add";
            }
            $.ajax({
                url: 'php/ajax/consulta.php',
                type: 'POST',
                 data: {
                        metodo: metodo,
                        nomePaciente: $nomePaciente,
                        dataNacismento: $dataNacismento,
                        leito: $leito,
                        dataInternacao: $dataInternacao,
                        pcp:$pcp,
                        pca:$pca,
                        pa:$pa,
                        t:$t,
                        f:$f,
                        fr:$fr,
                        comorbidades:$comorbidades,
                        especificarComorbidades:$especificarComorbidades,
                        tabagista:$tabagista,
                        etilista:$etilista,
                        alergias:$alergias,
                        especificarAlergias:$especificarAlergias,
                        rpi:$rpi,
                        rdc:$rdc,
                        examesDiponiveis: $examesDiponiveis,
                        MedicacaoDomicilio: $MedicacaoDomicilio,
                        cirurgiaAnterior:$cirurgiaAnterior,
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
                        if( metodo === "add")
                        {
                            window.location.reload(1);
                        }
                        else
                        {
                            window.location.href = "consulta.php";
                        }
                        
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
