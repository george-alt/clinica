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
                        <h4 class="page-title">Antes de iniciar a cirurgia Time out</h4>
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
                                    <fieldset>
                                        <legend>Apresentação oral, nome e função de todos os profissionais</legend>
                                        <div class="row">
                                            <div class="col-sm-6 col-md-6 col-lg-3">
                                                <div class="form-group">
                                                    <label>Staff</label>
                                                    <select class="form-control select" name="staff">
                                                        <option value="Sim">Sim</option>
                                                        <option value="Não">Não</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6 col-lg-3">
                                                <div class="form-group">
                                                    <label>1º Cirurgião</label>
                                                    <select class="form-control select" name="1cirurgiao">
                                                        <option value="Sim">Sim</option>
                                                        <option value="Não">Não</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6 col-lg-3">
                                                <div class="form-group">
                                                    <label>2º Cirrugião</label>
                                                    <select class="form-control select" name="2cirurgiao">
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
                                                    <select class="form-control select" name="anestesista">
                                                        <option value="Sim">Sim</option>
                                                        <option value="Não">Não</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6 col-lg-3">
                                                <div class="form-group">
                                                    <label>Circulante</label>
                                                    <select class="form-control select" name="circulante">
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
                                            <input class="form-check-input" type="checkbox" name="CAEEC" id="doctor_active11" value="Identificação do Cliente">
                                            <label class="form-check-label" for="doctor_active11">
                                            Identificação do Cliente
                                            </label>
                                        </div>
                                        
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" name="CAEEC" id="doctor_inactive22" value="Sitio Cirurgico">
                                            <label class="form-check-label" for="doctor_inactive22">
                                            Sitio Cirurgico
                                            </label>
                                        </div>
                                        
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" name="CAEEC" id="doctor_inactive33" value="Procedimento a ser realizado">
                                            <label class="form-check-label" for="doctor_inactive33">
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
												<select class="form-control select" name="placaEletrocauterio">
													<option value="Posicionada">Posicionada</option>
													<option value="Não Aplica">Não Aplica</option>
												</select>
											</div>
										</div>
                                        <div class="col-sm-6 col-md-6 col-lg-3">
											<div class="form-group">
												<label>Uso de anibióticos profilático</label>
												<select class="form-control select" name="UAP">
													<option value="Sim">Sim</option>
													<option value="Não">Não</option>
												</select>
											</div>
										</div>
                                        <div class="col-sm-6 col-md-6 col-lg-3">
											<div class="form-group">
												<label>Exames de imagem estão disponiveis</label>
												<select class="form-control select" name="EID">
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
                                                    <select class="form-control select" name="sanguineas">
                                                        <option value="Sim">Sim</option>
                                                        <option value="Não">Não</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6 col-lg-3">
                                                <div class="form-group">
                                                    <label>Revisão do anestesista</label>
                                                    <select class="form-control select" name="revisaoAnestesista">
                                                        <option value="Sim">Sim</option>
                                                        <option value="Não">Não</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6 col-lg-3">
                                                <div class="form-group">
                                                    <label>Fixação das etiquetas de esterilização no prontuário</label>
                                                    <select class="form-control select" name="FEEP">
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
                                <a href="trans1.1.php" class="btn btn-primary submit-btn">Voltar</a>
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
    var idTrans1_1 = "<?php  if(isset($_SESSION['idTRANS1_1']))echo $_SESSION['idTRANS1_1'];?>";
    var idCirurgia = "<?php  if(isset($_SESSION['idCIRURGIA']))echo $_SESSION['idCIRURGIA'];?>";
    var staff = "<?php  if(isset($_SESSION['staff']))echo $_SESSION['staff'];?>";
    var cirurgiao1 = "<?php  if(isset($_SESSION['cirurgiao1']))echo $_SESSION['cirurgiao1'];?>";
    var cirurgiao2 = "<?php  if(isset($_SESSION['cirurgiao2']))echo $_SESSION['cirurgiao2'];?>";
    var anestesista = "<?php  if(isset($_SESSION['anestesista']))echo $_SESSION['anestesista'];?>";
    var circulante = "<?php  if(isset($_SESSION['circulante']))echo $_SESSION['circulante'];?>";
    var placaEletrocauterio = "<?php  if(isset($_SESSION['placaEletrocauterio']))echo $_SESSION['placaEletrocauterio'];?>";
    var UAP = "<?php  if(isset($_SESSION['UAP']))echo $_SESSION['UAP'];?>";
    var EID = "<?php  if(isset($_SESSION['EID']))echo $_SESSION['EID'];?>";
    var CAEEC = "<?php  if(isset($_SESSION['CAEEC']))echo $_SESSION['CAEEC'];?>";
    var sanguineas = "<?php  if(isset($_SESSION['sanguineas']))echo $_SESSION['sanguineas'];?>";
    var revisaoAnestesista = "<?php  if(isset($_SESSION['revisaoAnestesista']))echo $_SESSION['revisaoAnestesista'];?>";
    var FEEP = "<?php  if(isset($_SESSION['FEEP']))echo $_SESSION['FEEP'];?>";
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
    
    if(idTrans1_1 > 0)
    {
        var re = /\s*,\s*/;
        var nameList1 = CAEEC.split(re);
        
        for(var x = 0; x <= nameList1.length; x++)
        {
            for(var i = 0; i <= $("input[name=CAEEC]").length; i++)
            {
                if(nameList1[x] === $("input[name=CAEEC]").eq(i).val())
                {
                    $("input[name=CAEEC]").eq(i).prop("checked", true);
                }
            }
        }
        
        $("select[name=idCirurgia]").val(idCirurgia);
        $("select[name=staff]").val(staff);
        $("select[name=1cirurgiao]").val(cirurgiao1);
        $("select[name=2cirurgiao]").val(cirurgiao2);
        $("select[name=anestesista]").val(anestesista);
        $("select[name=circulante]").val(circulante);
        $("select[name=placaEletrocauterio]").val(placaEletrocauterio);
        $("select[name=UAP]").val(UAP);
        $("select[name=EID]").val(EID);
        $("select[name=sanguineas]").val(sanguineas);
        $("select[name=revisaoAnestesista]").val(revisaoAnestesista);
        $("select[name=FEEP]").val(FEEP);
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
        $CAEEC = "";
        for(var x = 0; x <= $("input[name=CAEEC]").length; x++)
        {
            if($("input[name=CAEEC]").eq(x).is(":checked") === true)
            {
                $CAEEC += $("input[name=CAEEC]").eq(x).val()+",";
            }
        }
        
        $idCirurgia = $("select[name=idCirurgia]").val();
        $staff = $("select[name=staff]").val();
        $1cirurgiao = $("select[name=1cirurgiao]").val();
        $2cirurgiao = $("select[name=2cirurgiao]").val();
        $anestesista = $("select[name=anestesista]").val();
        $circulante = $("select[name=circulante]").val();
        $placaEletrocauterio = $("select[name=placaEletrocauterio]").val();
        $UAP = $("select[name=UAP]").val();
        $EID = $("select[name=EID]").val();
        $sanguineas = $("select[name=sanguineas]").val();
        $revisaoAnestesista = $("select[name=revisaoAnestesista]").val();
        $FEEP = $("select[name=FEEP]").val();
        $obser = $("textarea[name=obser]").val();
        $status = $("input[name=status]").val();
        
        
        var metodo;
        
        if($idCirurgia !== "" && $staff !== "" && $1cirurgiao !== "" && $2cirurgiao !== "" && $anestesista !== "" && $circulante !== "" && $placaEletrocauterio !== "" &&
           $UAP !== "" && $EID !== "" && $sanguineas !== "" && $revisaoAnestesista !== "" && $FEEP !== ""  && $obser !== ""  && $status !== "" )
        {
            if(idTrans1_1 > 0)
            {
                metodo = "update";
            }
            else
            {
                metodo = "add";
            }
            $.ajax({
                url: 'php/ajax/trans1.1.php',
                type: 'POST',
                 data: {
                        metodo: metodo,
                        idCirurgia:$idCirurgia,
                        staff: $staff,
                        cirurgiao1: $1cirurgiao,
                        cirurgiao2: $2cirurgiao,
                        anestesista: $anestesista,
                        circulante: $circulante,
                        placaEletrocauterio: $placaEletrocauterio,
                        UAP:$UAP,
                        EID: $EID,
                        CAEEC: $CAEEC,
                        sanguineas: $sanguineas,
                        revisaoAnestesista: $revisaoAnestesista,
                        FEEP: $FEEP,
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
                            window.location.href = "trans1.1.php";
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
