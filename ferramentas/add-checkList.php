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
                        <h4 class="page-title">Check List</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <div>
                            <div class="row">
								<div class="col-sm-12">
									<div class="row">
										<div class="col-sm-6 col-md-6 col-lg-3">
											<div class="form-group">
												<label>Identificação do cliente</label>
												<select class="form-control select" name="idenCliente">
													<option value="1">Sim</option>
													<option value="2">Não</option>
												</select>
											</div>
										</div>
                                        <div class="col-sm-6 col-md-6 col-lg-3">
											<div class="form-group">
												<label>Prontúario completo</label>
												<select class="form-control select" name="pronCompleto">
													<option value="1">Sim</option>
													<option value="2">Não</option>
												</select>
											</div>
										</div>
                                        <div class="col-sm-6 col-md-6 col-lg-3">
											<div class="form-group">
												<label>Sitio cirúrgico demarcado</label>
												<select class="form-control select" name="SCD">
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
												<select class="form-control select" name="CAA">
													<option value="1">Sim</option>
													<option value="2">Não</option>
												</select>
											</div>
										</div>
                                        
                                        <div class="col-sm-6 col-md-6 col-lg-3">
											<div class="form-group">
												<label>Consentimento cirúrgico</label>
												<select class="form-control select" name="conCirurgico">
													<option value="1">Sim</option>
													<option value="2">Não</option>
												</select>
											</div>
										</div>
                                        
                                        <div class="col-sm-6 col-md-6 col-lg-3">
											<div class="form-group">
												<label>Consentimento transfusional</label>
												<select class="form-control select" name="conTransfunsional">
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
                                                        <select class="form-control select" name="banho">
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
                                                        <select class="form-control select" name="tricotomia">
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
                                                        <select class="form-control select" name="jejum">
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
												<select class="form-control select" name="exames">
													<option value="1">Laboratoriais</option>
													<option value="2">Imagem</option>
                                                    <option value="3">Biópsia</option>
												</select>
											</div>
										</div>
                                        <div class="col-sm-6 col-md-6 col-lg-3">
											<div class="form-group">
												<label>Retirada prótese e adornos?</label>
												<select class="form-control select" name="RPA">
													<option value="1">Sim</option>
													<option value="2">Não</option>
												</select>
											</div>
										</div>
                                        <div class="col-sm-6 col-md-6 col-lg-3">
											<div class="form-group">
												<label>Tipo de precaução</label>
												<select class="form-control select" name="tipoPrecaucao">
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
                                <a href="checkList.php" class="btn btn-primary submit-btn">Voltar</a>
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
    var idCHECKLIST         = "<?php  if(isset($_SESSION['idCHECKLIST']))echo $_SESSION['idCHECKLIST'];?>";
    var idenCliente         = "<?php  if(isset($_SESSION['idenCliente']))echo $_SESSION['idenCliente'];?>";
    var ponCompleto         = "<?php  if(isset($_SESSION['ponCompleto']))echo $_SESSION['ponCompleto'];?>";
    var SCD                 = "<?php  if(isset($_SESSION['SCD']))echo $_SESSION['SCD'];?>";
    var CAA                 = "<?php  if(isset($_SESSION['CAA']))echo $_SESSION['CAA'];?>";
    var conCirurgico        = "<?php  if(isset($_SESSION['conCirurgico']))echo $_SESSION['conCirurgico'];?>";
    var conTransfunsional   = "<?php  if(isset($_SESSION['conTransfunsional']))echo $_SESSION['conTransfunsional'];?>";
    var banho               = "<?php  if(isset($_SESSION['banho']))echo $_SESSION['banho'];?>";
    var horaBanho           = "<?php  if(isset($_SESSION['horaBanho']))echo $_SESSION['horaBanho'];?>";
    var tricotomia          = "<?php  if(isset($_SESSION['tricotomia']))echo $_SESSION['tricotomia'];?>";
    var horaTricotomia      = "<?php  if(isset($_SESSION['horaTricotomia']))echo $_SESSION['horaTricotomia'];?>";
    var localTricotomia     = "<?php  if(isset($_SESSION['localTricotomia']))echo $_SESSION['localTricotomia'];?>";
    var jejum               = "<?php  if(isset($_SESSION['jejum']))echo $_SESSION['jejum'];?>";
    var inicioJejum         = "<?php  if(isset($_SESSION['inicioJejum']))echo $_SESSION['inicioJejum'];?>";
    var exames              = "<?php  if(isset($_SESSION['exames']))echo $_SESSION['exames'];?>";
    var RPA                 = "<?php  if(isset($_SESSION['RPA']))echo $_SESSION['RPA'];?>";
    var tipoPrecaucao       = "<?php  if(isset($_SESSION['tipoPrecaucao']))echo $_SESSION['tipoPrecaucao'];?>";
    var status              = "<?php  if(isset($_SESSION['status']))echo $_SESSION['status'];?>";
    
    if(idenCliente == "Sim"){idenCliente = 1;}else{idenCliente = 2;}
    if(ponCompleto == "Sim"){ponCompleto = 1;}else{ponCompleto = 2;}
    if(SCD == "Sim"){SCD = 1;}else if(SCD == "Não"){SCD = 2;}else{SCD = 3;}
    if(CAA == "Sim"){CAA = 1;}else{CAA = 2;}
    if(conCirurgico == "Sim"){conCirurgico = 1;}else{conCirurgico = 2;}
    if(conTransfunsional == "Sim"){conTransfunsional = 1;}else if(conTransfunsional == "Não"){conTransfunsional = 2;}else{conTransfunsional = 3;}
    if(banho == "Sim"){banho = 1;}else{banho = 2;}
    if(tricotomia == "Sim"){tricotomia = 1;}else{tricotomia = 2;}
    if(jejum == "Sim"){jejum = 1;}else{jejum = 2;}
    if(exames == "Laboratoriais"){exames = 1;}else if(exames == "Imagem"){exames = 2;}else{exames = 3;}
    if(RPA == "Sim"){RPA = 1;}else{RPA = 2;}
    if(tipoPrecaucao == "Padrão"){tipoPrecaucao = 1;}else if(tipoPrecaucao == "Contato"){tipoPrecaucao = 2;}else if(tipoPrecaucao == "Reverso"){tipoPrecaucao = 3;}else if(tipoPrecaucao == "Goticulas"){tipoPrecaucao = 4;}else{tipoPrecaucao = 5;}
    
    var statusNivel;
    
    if(status === "Inativo")
    {
        statusNivel = 1;
    }
    else
    {
        statusNivel = 0;
    }
    
    if(idCHECKLIST > 0)
    {
        $("select[name=idenCliente]").val(idenCliente);
        $("select[name=pronCompleto]").val(ponCompleto);
        $("select[name=SCD]").val(SCD);
        $("select[name=CAA]").val(CAA);
        $("select[name=conCirurgico]").val(conCirurgico);
        $("select[name=conTransfunsional]").val(conTransfunsional);
        $("select[name=banho]").val(banho);
        $("input[name=horaBanho]").val(horaBanho);
        $("select[name=tricotomia]").val(tricotomia);
        $("input[name=triHora]").val(horaTricotomia);
        $("input[name=triLocal]").val(localTricotomia);
        $("select[name=jejum]").val(jejum);
        $("input[name=JejumInicio]").val(inicioJejum);
        $("select[name=exames]").val(exames);
        $("select[name=RPA]").val(RPA);
        $("select[name=tipoPrecaucao]").val(tipoPrecaucao);
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
        
        $idenCliente = $("select[name=idenCliente]").val();
        $pronCompleto = $("select[name=pronCompleto]").val();
        $SCD = $("select[name=SCD]").val();
        $CAA = $("select[name=CAA]").val();
        $conCirurgico = $("select[name=conCirurgico]").val();
        $conTransfunsional = $("select[name=conTransfunsional]").val();
        $banho = $("select[name=banho]").val();
        $horaBanho = $("input[name=horaBanho]").val();
        $tricotomia = $("select[name=tricotomia]").val();
        $triHora = $("input[name=triHora]").val();
        $triLocal = $("input[name=triLocal]").val();
        $jejum = $("select[name=jejum]").val();
        $JejumInicio = $("input[name=JejumInicio]").val();
        $exames = $("select[name=exames]").val();
        $RPA = $("select[name=RPA]").val();
        $tipoPrecaucao = $("select[name=tipoPrecaucao]").val();
        $status = $("input[name=status]").val();
        
        var metodo;
        
        if($idenCliente !== "" && $pronCompleto !== "" && $SCD !== "" && $CAA !== "" && $conCirurgico !== "" && $conTransfunsional !== "" && $banho !== "" &&
           $tricotomia !== "" && $triHora !== "" && $triLocal !== "" && $jejum !== "" && $JejumInicio !== "" && $exames !== "" && $RPA !== "" && $tipoPrecaucao !== "")
        {
            if(idCHECKLIST > 0)
            {
                metodo = "update";
            }
            else
            {
                metodo = "add";
            }
            $.ajax({
                url: 'php/ajax/checkList.php',
                type: 'POST',
                 data: {
                        metodo: metodo,
                        idenCliente: $idenCliente,
                        pronCompleto: $pronCompleto,
                        SCD: $SCD,
                        CAA: $CAA,
                        conCirurgico: $conCirurgico,
                        conTransfunsional: $conTransfunsional,
                        banho: $banho,
                        horaBanho: $horaBanho,
                        tricotomia: $tricotomia,
                        triHora: $triHora,
                        triLocal: $triLocal,
                        jejum: $jejum,
                        JejumInicio:$JejumInicio,
                        exames:$exames,
                        rpa:$RPA,
                        tipoPrecaucao: $tipoPrecaucao,
                        status: $status
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
                            window.location.href = "checkList.php";
                        }
                        
                     }, 2000);
                },
            });
        }
        else
        {
            $("input").css({"border":"red solid 1px"});
            $("select").css({"border":"red solid 1px"});
            toastr.warning("Informe todos os campos", "Alerta");
            
        }
        
    });
</script>

<!-- add-doctor24:06-->
</html>
