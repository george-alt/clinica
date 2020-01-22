<?php include('seguranca/scriptSeg.php');?>
<!DOCTYPE html>
<html lang="en">


<!-- doctors23:12-->
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
                    <div class="col-sm-4 col-3">
                        <h4 class="page-title">Colaboradores</h4>
                    </div>

                    <div class="col-sm-8 col-9 text-right m-b-20">
                        <a href="add-colaboradores.php" class="btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i> Adicionar colaborador</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2">
                            <div class="form-group">
                                <select class="form-control" name="cargoFiltro">
                                    <option value="">Cargo</option>
                                    <option value="1">Médico(a)</option>
                                    <option value="2">Enfermeiro(a)</option>
                                    <option value="3">Anestesiologista</option>
                                    <option value="4">Instrumentador(a)</option>
                                </select>
                            </div>
                        </div>
                    
                    <div class="col-sm-2 text-right m-b-20">
                        <button class="btn btn-success btn-rounded float-right btnSearch"><i class="fa fa-search"></i> Pesquisar</button>
                    </div>
                </div>
				<div class="row doctor-grid">
                    
                        <?php
                            $cola = new Colaboradores();
                            echo $cola->getDados();
                        ?>
                    
                    
                </div>
				<!--<div class="row">
                    <div class="col-sm-12">
                        <div class="see-all">
                            <a class="see-all-btn" href="javascript:void(0);">Carregue mais</a>
                        </div>
                    </div>
                </div>-->
            </div>
            
        </div>
		<div id="delete_doctor" class="modal fade delete-modal" role="dialog">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-body text-center">
						<img src="assets/img/sent.png" alt="" width="50" height="46">
						<h3>Tem certeza de que deseja excluir este Colaborador?</h3>
						<div class="m-t-20"> <a href="#" class="btn btn-white" data-dismiss="modal">Fechar</a>
							<button type="submit" class="btn btn-danger apagar">Excluir</button>
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
        $(document).on('click','.delete',function(){
             $id     = $(this).closest('div').parent().closest('div').parent().closest('div').find(".idColaborador").text();
            $('#delete_patient').modal('show');
        });
        $(document).on('click','.apagar',function(){
            $.ajax({
                url: 'php/ajax/colaboradores.php',
                type: 'POST',
                 data: {
                        metodo: "DadosDel",
                        idColaboradores: $id
                      },
                cache: false,
                datatype: "json",
                error: function(jqXHR) {
                    toastr.error(jqXHR.responseText, "Error");
                },
                success: function() {
                    setTimeout(function(){
                        window.location.reload(1);
                     }, 1000);
                },
            });
        });
        $(document).on('click','.edit',function(){
            $id     = $(this).closest('div').parent().closest('div').parent().closest('div').find(".idColaborador").text();
            
            $.ajax({
                url: 'php/ajax/colaboradores.php',
                type: 'POST',
                 data: {
                        metodo: "DadosUpdate",
                        idColaboradores:$id
                      },
                cache: false,
                datatype: "json",
                error: function(jqXHR) {
                    toastr.error(jqXHR.responseText, "Error");
                },
                success: function() {
                    window.location.href = "add-colaboradores.php";
                },
            });
        });
        
        $(document).on('click','.btnSearch',function(){
            $.ajax({
                url: 'php/ajax/colaboradores.php',
                type: 'POST',
                 data: {
                        metodo: "getDados",
                        cargoFiltro:$("select[name=cargoFiltro]").val()
                      },
                cache: false,
                datatype: "json",
                error: function(jqXHR) {
                    toastr.error(jqXHR.responseText, "Error");
                },
                success: function($data) {
                    $(".doctor-grid").html($data.msg);
                },
            });
        });
    </script>


<!-- doctors23:17-->
</html>