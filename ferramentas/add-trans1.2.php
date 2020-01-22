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
                        <h4 class="page-title">Antes do cliente sair da SO Check out</h4>
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
												<select class="form-control select" name="CCAIC">
													<option value="Sim">Sim</option>
													<option value="Não">Não</option>
												</select>
											</div>
										</div>
                                        <div class="col-sm-6 col-md-6 col-lg-4">
											<div class="form-group">
												<label>Peças anatômicas/culturas e identificadas adeguadamente e requisição preenchida?</label>
												<select class="form-control select" name="PACIARP">
													<option value="Sim">Sim</option>
													<option value="Não">Não</option>
                                                    <option value="Não">Não Aplica</option>
												</select>
											</div>
										</div>
                                        <div class="col-sm-6 col-md-6 col-lg-4">
											<div class="form-group">
												<label>Houve algum problema com equipamentos que deve ser resolvido?</label>
												<select class="form-control select" name="HAPER">
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
                                <a href="trans1.2.php" class="btn btn-primary submit-btn">Voltar</a>
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
    var idTrans1_2 = "<?php  if(isset($_SESSION['idTRANS1_2']))echo $_SESSION['idTRANS1_2'];?>";
    var idCirurgia = "<?php  if(isset($_SESSION['idCIRURGIA']))echo $_SESSION['idCIRURGIA'];?>";
    var precedimentoRealizado = "<?php  if(isset($_SESSION['precedimentoRealizado']))echo $_SESSION['precedimentoRealizado'];?>";
    var CCAIC = "<?php  if(isset($_SESSION['CCAIC']))echo $_SESSION['CCAIC'];?>";
    var PACIARP = "<?php  if(isset($_SESSION['PACIARP']))echo $_SESSION['PACIARP'];?>";
    var HAPER = "<?php  if(isset($_SESSION['HAPER']))echo $_SESSION['HAPER'];?>";
    var RIRPAPOC = "<?php  if(isset($_SESSION['RIRPAPOC']))echo $_SESSION['RIRPAPOC'];?>";
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
    
    if(idTrans1_2 > 0)
    {
        
        $("select[name=idCirurgia]").val(idCirurgia);
        $("textarea[name=precedimentoRealizado]").val(precedimentoRealizado);
        $("select[name=CCAIC]").val(CCAIC);
        $("select[name=PACIARP]").val(PACIARP);
        $("select[name=HAPER]").val(HAPER);
        $("textarea[name=RIRPAPOC]").val(RIRPAPOC);
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
        
        $idCirurgia = $("select[name=idCirurgia]").val();
        $precedimentoRealizado = $("textarea[name=precedimentoRealizado]").val();
        $CCAIC = $("select[name=CCAIC]").val();
        $PACIARP = $("select[name=PACIARP]").val();
        $HAPER = $("select[name=HAPER]").val();
        $RIRPAPOC = $("textarea[name=RIRPAPOC]").val();
        $status = $("input[name=status]").val();
        
        
        var metodo;
        
        if($idCirurgia !== "" && $precedimentoRealizado !== "" && $CCAIC !== "" && $PACIARP !== "" && $HAPER !== "" && $status !== "" )
        {
            if(idTrans1_2 > 0)
            {
                metodo = "update";
            }
            else
            {
                metodo = "add";
            }
            $.ajax({
                url: 'php/ajax/trans1.2.php',
                type: 'POST',
                 data: {
                        metodo: metodo,
                        idCirurgia:$idCirurgia,
                        precedimentoRealizado: $precedimentoRealizado,
                        CCAIC: $CCAIC,
                        PACIARP: $PACIARP,
                        HAPER: $HAPER,
                        RIRPAPOC: $RIRPAPOC,
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
                            window.location.href = "trans1.2.php";
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
