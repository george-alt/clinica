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
                        <h4 class="page-title">Antes da indução anestésica Check in</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <div>
                            <div class="row">
                                <div class="col-sm-6 col-md-6 col-lg-3">
                                    <div class="form-group">
                                        <label>Cirurgia</label>
                                        <select class="form-control select" name="idCirurgia">
                                            <?php
                                                $cirurgia = new Cirurgia();
                                                echo $cirurgia->montCampoCirurgia();
                                            ?>
                                        </select>
                                    </div>
                                </div>
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
												<select class="form-control select" name="MSOAPP">
													<option value="Sim">Sim</option>
													<option value="Não">Não</option>
												</select>
											</div>
										</div>
                                        <div class="col-sm-6 col-md-6 col-lg-3">
											<div class="form-group">
												<label>Revisão dos equipamentos de anestesia</label>
												<select class="form-control select" name="REA">
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
												<select class="form-control select" name="RPS">
													<option value="Sim">Sim</option>
													<option value="Não">Não</option>
												</select>
											</div>
										</div>
                                        <div class="col-sm-6 col-md-6 col-lg-3">
											<div class="form-group">
												<label>Acesso venoso adequado e pérvio?</label>
												<select class="form-control select" name="AVAP">
													<option value="Sim AVC AVP">Sim AVC AVP</option>
													<option value="Não">Não</option>
												</select>
											</div>
										</div>
                                        <div class="col-sm-6 col-md-6 col-lg-3">
											<div class="form-group">
												<label>O cliente tem alergia?</label>
												<select class="form-control select" name="clienteAlergia">
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
                                <a href="trans1.php" class="btn btn-primary submit-btn">Voltar</a>
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
    var idTrans1 = "<?php  if(isset($_SESSION['idTRANS1']))echo $_SESSION['idTRANS1'];?>";
    var idCirurgia = "<?php  if(isset($_SESSION['idCIRURGIA']))echo $_SESSION['idCIRURGIA'];?>";
    var CSC = "<?php  if(isset($_SESSION['CSC']))echo $_SESSION['CSC'];?>";
    var NVADF = "<?php  if(isset($_SESSION['NVADF']))echo $_SESSION['NVADF'];?>";
    var MSOAP = "<?php  if(isset($_SESSION['MSOAP']))echo $_SESSION['MSOAP'];?>";
    var REA = "<?php  if(isset($_SESSION['REA']))echo $_SESSION['REA'];?>";
    var RPS = "<?php  if(isset($_SESSION['RPS']))echo $_SESSION['RPS'];?>";
    var AVAP = "<?php  if(isset($_SESSION['AVAP']))echo $_SESSION['AVAP'];?>";
    var clienteAlergia = "<?php  if(isset($_SESSION['clienteAlergia']))echo $_SESSION['clienteAlergia'];?>";
    var obser = "<?php  if(isset($_SESSION['obser']))echo $_SESSION['obser'];?>";
    var status = "<?php  if(isset($_SESSION['status']))echo $_SESSION['status'];?>";
    
    var statusNivel;
    
    if(status === "Inativo")
    {
        statusNivel = 1;
    }
    else
    {
        statusNivel = 0;
    }
    
    if(idTrans1 > 0)
    {
        var re = /\s*,\s*/;
        var nameList1 = CSC.split(re);
        var nameList2 = NVADF.split(re);
        
        $("select[name=idCirurgia]").val(idCirurgia);
        
        for(var x = 0; x <= nameList1.length; x++)
        {
            for(var i = 0; i <= $("input[name=CSC]").length; i++)
            {
                if(nameList1[x] === $("input[name=CSC]").eq(i).val())
                {
                    $("input[name=CSC]").eq(i).prop("checked", true);
                }
            }
        }
        
        for(var x = 0; x <= nameList2.length; x++)
        {
            for(var i = 0; i <= $("input[name=NVADF]").length; i++)
            {
                if(nameList2[x] === $("input[name=NVADF]").eq(i).val())
                {
                    $("input[name=NVADF]").eq(i).prop("checked", true);
                }
            }
        }
        
        $("select[name=MSOAPP]").val(MSOAP);
        $("select[name=REA]").val(REA);
        $("select[name=RPS]").val(RPS);
        $("select[name=AVAP]").val(AVAP);
        $("select[name=clienteAlergia]").val(clienteAlergia);
        $("textarea[name=obser]").val(obser);
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
        $CSC = "";
        $NVADF = "";
        
        $idCirurgia = $("select[name=idCirurgia]").val();
        
        for(var i = 0; i <= $("input[name=CSC]").length; i++)
        {
            if($("input[name=CSC]").eq(i).is(":checked") === true)
            {
                $CSC += $("input[name=CSC]").eq(i).val()+",";
            }
        }
        $MSOAP = $("select[name=MSOAPP]").val();
        $REA = $("select[name=REA]").val();
        
        for(var x = 0; x <= $("input[name=NVADF]").length; x++)
        {
            if($("input[name=NVADF]").eq(x).is(":checked") === true)
            {
                $NVADF += $("input[name=NVADF]").eq(x).val()+",";
            }
        }
        
        $RPS = $("select[name=RPS]").val();
        $AVAP = $("select[name=AVAP]").val();
        $clienteAlergia = $("select[name=clienteAlergia]").val();
        $obser = $("textarea[name=obser]").val();
        $status = $("input[name=status]").val();
        
        
        var metodo;
        
        if($idCirurgia !== "" && $CSC !== "" && $NVADF !== "" && $MSOAP !== "" && $REA !== "" && $RPS !== "" && $AVAP !== "" && $clienteAlergia !== "" && $obser !== "" && $status !== "")
        {
            if(idTrans1 > 0)
            {
                metodo = "update";
            }
            else
            {
                metodo = "add";
            }
            $.ajax({
                url: 'php/ajax/trans1.php',
                type: 'POST',
                 data: {
                        metodo: metodo,
                        idCirurgia:$idCirurgia,
                        CSC: $CSC,
                        NVADF: $NVADF,
                        MSOAP: $MSOAP,
                        REA: $REA,
                        RPS: $RPS,
                        AVAP: $AVAP,
                        clienteAlergia:$clienteAlergia,
                        obser: $obser,
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
                            window.location.href = "trans1.php";
                        }
                        
                     }, 2000);
                },
            });
        }
        else
        {
            $("input").css({"border":"red solid 1px"});
            toastr.warning("Informe todos os campos", "Alerta");
            
        }
        
    });
</script>

<!-- add-doctor24:06-->
</html>
