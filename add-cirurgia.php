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
                        <h4 class="page-title">Cirurgia</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Descrição <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="descricao">
                                    </div>
                                </div>
								<div class="col-sm-12">
									<div class="row">
										<div class="col-sm-6 col-md-6 col-lg-3">
											<div class="form-group">
												<label>Paciente</label>
												<select class="form-control" name="paciente">
													<?php
                                                        $cirurgia = new Cirurgia();
                                                        echo $cirurgia->montCampOPaciente();
                                                    ?>
												</select>
											</div>
										</div>
                                        <div class="col-sm-6 col-md-6 col-lg-3">
											<div class="form-group">
												<label>Médico(a)</label>
												<select class="form-control" name="medico">
                                                    <?php
                                                        $cirurgia = new Cirurgia();
                                                        echo $cirurgia->montCampoMedico();
                                                    ?>
                                                </select>
											</div>
										</div>
                                        <div class="col-sm-6 col-md-6 col-lg-3">
											<div class="form-group">
												<label>Enfermeiro(a)</label>
												<select class="form-control" name="enfermeiro">
													<?php
                                                        $cirurgia = new Cirurgia();
                                                        echo $cirurgia->montCampoEnfermeiro();
                                                    ?>
												</select>
											</div>
										</div>
										
									</div>
								</div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Data <span class="text-danger">*</span></label>
                                        <div class="cal-icon">
                                            <input type="text" class="form-control datetimepicker" name="dataCirurgia">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Hora <span class="text-danger">*</span></label>
                                        <input class="form-control" type="Time" name="horaCirurgia">
                                    </div>
                                </div>
                                
                            </div>
							
                            <div class="form-group">
                                <label class="display-block">Status</label>
								<div class="form-check form-check-inline">
									<input class="form-check-input" type="radio" name="status" id="doctor_activeRadio" value="1">
									<label class="form-check-label" for="doctor_activeRadio">
									Completo
									</label>
								</div>
								<div class="form-check form-check-inline">
									<input class="form-check-input" type="radio" name="status" id="doctor_inactiveRadio" value="0">
									<label class="form-check-label" for="doctor_inactiveRadio">
									Em Andamento
									</label>
								</div>
                            </div>
                            <div class="m-t-20 text-center">
                                <a href="servico_cirurgico.php" class="btn btn-primary submit-btn">Voltar</a>
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
    <script src="js/logout.js"></script>
</body>

<script>
    var idCirurgia = "<?php  if(isset($_SESSION['idCirurgia']))echo $_SESSION['idCirurgia'];?>";
    var paciente = "<?php  if(isset($_SESSION['paciente']))echo $_SESSION['paciente'];?>";
    var medico = "<?php  if(isset($_SESSION['medico']))echo $_SESSION['medico'];?>";
    var descricao = "<?php  if(isset($_SESSION['descricao']))echo $_SESSION['descricao'];?>";
    var status = "<?php  if(isset($_SESSION['status']))echo $_SESSION['status'];?>";
    var data = "<?php  if(isset($_SESSION['data']))echo $_SESSION['data'];?>";
    var hora = "<?php  if(isset($_SESSION['hora']))echo $_SESSION['hora'];?>";
    var enfermeiro = "<?php  if(isset($_SESSION['enfermeiro']))echo $_SESSION['enfermeiro'];?>";

    var statusNivel;
    
    if(status === "Inativo")
    {
        statusNivel = 1;
    }
    else
    {
        statusNivel = 0;
    }
    
    if(idCirurgia > 0)
    {
        $("select[name=paciente]").val(paciente);
        $("select[name=medico]").val(medico);
        $("select[name=enfermeiro]").val(enfermeiro);
        $("input[name=descricao]").val(descricao);
        $("input[name=status]").eq(statusNivel).prop("checked", true);
        $("input[name=dataCirurgia]").val(data);
        $("input[name=horaCirurgia]").val(hora);
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
    $(document).on("click", "input[name=status]", function(){
        $status = $(this).val();
    });
    
    $(document).on("click", ".btnCriarCirurgia", function(){
        
        $paciente = $("select[name=paciente]").val();
        $medico = $("select[name=medico]").val();
        $enfermeiro = $("select[name=enfermeiro]").val();
        $descricao = $("input[name=descricao]").val();
        $data = $("input[name=dataCirurgia]").val();
        $hora = $("input[name=horaCirurgia]").val();
        
        var metodo;
        
        if($paciente !== "" && $medico !== "" && $descricao !== "" && $status !== "" && $data !== "" && $hora !== "" && $enfermeiro !== "")
        {
            if(idCirurgia > 0)
            {
                metodo = "update";
            }
            else
            {
                metodo = "add";
            }
            $.ajax({
                url: 'php/ajax/cirurgia.php',
                type: 'POST',
                 data: {
                        metodo: metodo,
                        paciente:$paciente,
                        medico: $medico,
                        descricao: $descricao,
                        status: $status,
                        data: $data,
                        hora: $hora,
                        enfermeiro: $enfermeiro
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
                            window.location.href = "servico_cirurgico.php";
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
