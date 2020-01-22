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
                        <h4 class="page-title">Antes do cliente sair da SO Check out</h4>
                    </div>
                    <div class="col-sm-8 col-9 text-right m-b-20">
                        <a href="add-trans1.2.php" class="btn btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i> Adicionar Trans3</a>
                    </div>
                </div>
				<div class="row">
					<div class="col-md-12">
						<div class="table-responsive">
							<table class="table table-border table-striped custom-table datatable mb-0">
								<?php
                                    $trans1 = new Trans1_2();
                                    if($trans1->getDados() != "0")
                                    {
                                        echo $trans1->getDados();
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
						<h3>Tem certeza de que deseja excluir este Trans1?</h3>
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
            window.location.href = "add-trans1.2.php";
        }
        $(document).on('click','.delete',function(){
            idTRANS1     = $(this).closest('tr').find('td').eq(getColumnValue("idTRANS1_2")).text();
            $('#delete_patient').modal('show');
        });
        $(document).on('click','.apagar',function(){
            $.ajax({
                url: 'php/ajax/trans1.2.php',
                type: 'POST',
                 data: {
                        metodo: "DadosDel",
                        idTRANS1: idTRANS1
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
            $idTRANS1_2             = $(this).closest('tr').find('td').eq(getColumnValue("idTRANS1_2")).text();
            $idCIRURGIA             = $(this).closest('tr').find('td').eq(getColumnValue("idCIRURGIA")).text();
            $precedimentoRealizado  = $(this).closest('tr').find('td').eq(getColumnValue("Procedimento Realizado")).text();
            $CCAIC                  = $(this).closest('tr').find('td').eq(getColumnValue("A contagem de compresas, agulhas e instrumentos está corretos?")).text();
            $PACIARP                = $(this).closest('tr').find('td').eq(getColumnValue("Peças anatômicas/culturas e identificadas adeguadamente e requisição preenchida?")).text();
            $HAPER                  = $(this).closest('tr').find('td').eq(getColumnValue("Houve algum problema com equipamentos que deve ser resolvido?")).text();
            $RIRPAPOC               = $(this).closest('tr').find('td').eq(getColumnValue("Recomendações importantes na recuperação pós-anestésica e pós-operatório desse cliente")).text();
            $status                 = $(this).closest('tr').find('td').eq(getColumnValue("Status")).text();
            
            
            $.ajax({
                url: 'php/ajax/trans1.2.php',
                type: 'POST',
                 data: {
                        metodo: "DadosUpdate",
                        idTRANS1_2: $idTRANS1_2,
                        idCIRURGIA: $idCIRURGIA,
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
                success: function() {
                    window.location.href = "add-trans1.2.php";
                },
            });
        });
    </script>

<!-- patients23:19-->
</html>