<?php include('seguranca/scriptSeg.php');?>
<!DOCTYPE html>
<html lang="en">

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
                        <h4 class="page-title">Consulta</h4>
                    </div>
                    <div class="col-sm-8 col-9 text-right m-b-20">
                        <a href="add-consulta.php" class="btn btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i> Adicionar Consulta</a>
                    </div>
                </div>
				<div class="row">
					<div class="col-md-12">
						<div class="table-responsive">
							<table class="table table-border table-striped custom-table datatable mb-0">
								<?php
                                    $cirurgia = new Consulta();
                                    echo $cirurgia->getDados();
                                ?>
							</table>
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
						<h3>Tem certeza de que deseja excluir está consulta?</h3>
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
</body>

    <script>
        $(document).on('click','.delete',function(){
            $idCONSULTA     = $(this).closest('tr').find('td').eq(getColumnValue("idCONSULTA")).text();
            $('#delete_patient').modal('show');
        });
        $(document).on('click','.apagar',function(){
            $.ajax({
                url: 'php/ajax/consulta.php',
                type: 'POST',
                 data: {
                        metodo: "DadosDel",
                        idCONSULTA: $idCONSULTA
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
            $idCONSULTA                     = $(this).closest('tr').find('td').eq(getColumnValue("idCONSULTA")).text();
            $nome                           = $(this).closest('tr').find('td').eq(getColumnValue("Nome")).text();
            $dataNasc                       = $(this).closest('tr').find('td').eq(getColumnValue("Nascimento")).text();
            $leito                          = $(this).closest('tr').find('td').eq(getColumnValue("Leito")).text();
            $dataInternacao                 = $(this).closest('tr').find('td').eq(getColumnValue("Internação")).text();
            $pcp                            = $(this).closest('tr').find('td').eq(getColumnValue("PCA")).text();
            $pca                            = $(this).closest('tr').find('td').eq(getColumnValue("PCA")).text();
            $pa                             = $(this).closest('tr').find('td').eq(getColumnValue("PA")).text();
            $t                              = $(this).closest('tr').find('td').eq(getColumnValue("T")).text();
            $f                              = $(this).closest('tr').find('td').eq(getColumnValue("F")).text();
            $fr                             = $(this).closest('tr').find('td').eq(getColumnValue("FR")).text();
            $cirurgiaAnterior               = $(this).closest('tr').find('td').eq(getColumnValue("Cirurgia Anterior")).text();
            $comorbidades                   = $(this).closest('tr').find('td').eq(getColumnValue("Comorbidades")).text();
            $observacaoComorbidades         = $(this).closest('tr').find('td').eq(getColumnValue("Observação Comorbidades")).text();
            $examesDiponiveis               = $(this).closest('tr').find('td').eq(getColumnValue("Exames Disponiveis")).text();
            $medicacaoDomicilio             = $(this).closest('tr').find('td').eq(getColumnValue("Medicação Domicilio")).text();
            $tabagista                      = $(this).closest('tr').find('td').eq(getColumnValue("Tabagista")).text();
            $etilista                       = $(this).closest('tr').find('td').eq(getColumnValue("Etilista")).text();
            $alergias                       = $(this).closest('tr').find('td').eq(getColumnValue("Alergias")).text();
            $observacaoAlergias             = $(this).closest('tr').find('td').eq(getColumnValue("Observação Alergias")).text();
            $rpi                            = $(this).closest('tr').find('td').eq(getColumnValue("RPI")).text();
            $rdc                            = $(this).closest('tr').find('td').eq(getColumnValue("RDC")).text();
            $status                         = $(this).closest('tr').find('td').eq(getColumnValue("Status")).text();
            
            $.ajax({
                url: 'php/ajax/consulta.php',
                type: 'POST',
                 data: {
                        metodo: "DadosUpdate",
                        idCONSULTA: $idCONSULTA,
                        nome: $nome,
                        dataNasc: $dataNasc,
                        leito:$leito,
                        dataInternacao:$dataInternacao,
                        pcp:$pcp,
                        pca:$pca,
                        pa:$pa,
                        t:$t,
                        f:$f,
                        fr:$fr,
                        cirurgiaAnterior:$cirurgiaAnterior,
                        comorbidades:$comorbidades,
                        observacaoComorbidades:$observacaoComorbidades,
                        examesDiponiveis:$examesDiponiveis,
                        medicacaoDomicilio:$medicacaoDomicilio,
                        tabagista:$tabagista,
                        etilista:$etilista,
                        alergias:$alergias,
                        observacaoAlergias:$observacaoAlergias,
                        rpi:$rpi,
                        rdc:$rdc,
                        status:$status
                      },
                cache: false,
                datatype: "json",
                error: function(jqXHR) {
                    toastr.error(jqXHR.responseText, "Error");
                },
                success: function() {
                    window.location.href = "add-consulta.php";
                },
            });
        });
    </script>

<!-- patients23:19-->
</html>