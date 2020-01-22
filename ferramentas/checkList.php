<?php include('seguranca/scriptSeg.php');?>
<!DOCTYPE html>
<html lang="en">
<script>var resulEvolucao = 1;</script>

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
                        <h4 class="page-title">Check List</h4>
                    </div>
                    <div class="col-sm-8 col-9 text-right m-b-20">
                        <a href="add-checkList.php" class="btn btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i> Adicionar Check List</a>
                    </div>
                </div>
				<div class="row">
					<div class="col-md-12">
						<div class="table-responsive">
							<table class="table table-border table-striped custom-table datatable mb-0">
								<?php
                                    $checklist = new CheckList();
                                    if($checklist->getDados() != "0")
                                    {
                                        echo $checklist->getDados();
                                    }
                                    else
                                    {
                                        echo "<script>resulEvolucao = 0;</script>";
                                    }
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
						<h3>Tem certeza de que deseja excluir este Check-List?</h3>
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
        if(resulEvolucao == 0)
        {
            window.location.href = "add-checkList.php";
        }
        $(document).on('click','.delete',function(){
            $idCHECKLIST     = $(this).closest('tr').find('td').eq(getColumnValue("idCHECKLIST")).text();
            $('#delete_patient').modal('show');
        });
        $(document).on('click','.apagar',function(){
            $.ajax({
                url: 'php/ajax/checkList.php',
                type: 'POST',
                 data: {
                        metodo: "DadosDel",
                        idCHECKLIST: $idCHECKLIST
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
            $idCHECKLIST        = $(this).closest('tr').find('td').eq(getColumnValue("idCHECKLIST")).text();
            $idenCliente        = $(this).closest('tr').find('td').eq(getColumnValue("Identificação do Cliente")).text();
            $ponCompleto        = $(this).closest('tr').find('td').eq(getColumnValue("Prontúario Completo")).text();
            $SCD                = $(this).closest('tr').find('td').eq(getColumnValue("Sitio Cirúrgico Demarcado")).text();
            $CAA                = $(this).closest('tr').find('td').eq(getColumnValue("Consentimento e Avaliação Anestésico")).text();
            $conCirurgico       = $(this).closest('tr').find('td').eq(getColumnValue("Consentimento Cirúrgico")).text();
            $conTransfunsional  = $(this).closest('tr').find('td').eq(getColumnValue("Consentimento Transfusional")).text();
            $banho              = $(this).closest('tr').find('td').eq(getColumnValue("Banho")).text();
            $horaBanho          = $(this).closest('tr').find('td').eq(getColumnValue("Horário Banho")).text();
            $tricotomia         = $(this).closest('tr').find('td').eq(getColumnValue("Tricotomia")).text();
            $horaTricotomia     = $(this).closest('tr').find('td').eq(getColumnValue("Horário Tricotomia")).text();
            $localTricotomia    = $(this).closest('tr').find('td').eq(getColumnValue("Local Tricotomia")).text();
            $jejum              = $(this).closest('tr').find('td').eq(getColumnValue("Jejum")).text();
            $inicioJejum        = $(this).closest('tr').find('td').eq(getColumnValue("Inicio Jejum")).text();
            $exames             = $(this).closest('tr').find('td').eq(getColumnValue("Exames")).text();
            $RPA                = $(this).closest('tr').find('td').eq(getColumnValue("Retirada Prótese e Adornos")).text();
            $tipoPrecaucao      = $(this).closest('tr').find('td').eq(getColumnValue("Tipo de Precaução")).text();
            $status             = $(this).closest('tr').find('td').eq(getColumnValue("Status")).text();
            
            $.ajax({
                url: 'php/ajax/checklist.php',
                type: 'POST',
                 data: {
                        metodo: "DadosUpdate",
                        idCHECKLIST: $idCHECKLIST,
                        idenCliente:$idenCliente,
                        ponCompleto: $ponCompleto,
                        SCD: $SCD,
                        CAA: $CAA,
                        conCirurgico: $conCirurgico,
                        conTransfunsional: $conTransfunsional,
                        banho: $banho,
                        horaBanho: $horaBanho,
                        tricotomia: $tricotomia,
                        horaTricotomia: $horaTricotomia,
                        localTricotomia: $localTricotomia,
                        jejum: $jejum,
                        inicioJejum: $inicioJejum,
                        exames: $exames,
                        RPA: $RPA,
                        tipoPrecaucao: $tipoPrecaucao,
                        status: $status
                      },
                cache: false,
                datatype: "json",
                error: function(jqXHR) {
                    toastr.error(jqXHR.responseText, "Error");
                },
                success: function() {
                    window.location.href = "add-checklist.php";
                },
            });
        });
    </script>

<!-- patients23:19-->
</html>