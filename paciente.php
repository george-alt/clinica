<?php include('seguranca/scriptSeg.php');?>
<!DOCTYPE html>
<html lang="en">

<script>var resulGrid = 1;</script>
<!-- doctors23:12-->
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
                        <h4 class="page-title">Paciente</h4>
                    </div>
                    <div class="col-sm-8 col-9 text-right m-b-20">
                        <a href="add-paciente.php" class="btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i> Adicionar Paciente</a>
                    </div>
                </div>
				<div class="row">
					<div class="col-md-12">
						<div class="table-responsive">
							<table class="table table-border table-striped custom-table datatable mb-0">
								<?php
                                    $paciente = new Paciente();
                                    if($paciente->getDados() != "0")
                                    {
                                        echo $paciente->getDados();;
                                    }
                                    else
                                    {
                                        echo "<script>resulGrid = 0;</script>";
                                    }
                                ?>
							</table>
						</div>
					</div>
                </div>
            </div>
            
        </div>
		<div id="delete_doctor" class="modal fade delete-modal" role="dialog">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-body text-center">
						<img src="assets/img/sent.png" alt="" width="50" height="46">
						<h3>Tem certeza de que deseja excluir este Paciente?</h3>
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
    <script src="assets/js/jquery.dataTables.min.js"></script>
    <script src="assets/js/dataTables.bootstrap4.min.js"></script>
    <script src="assets/js/moment.min.js"></script>
    <script src="assets/js/bootstrap-datetimepicker.min.js"></script>
    <script src="assets/js/app.js"></script>
    <script src="assets/js/dataTableSearch.js"></script>
    <script src="assets/js/toastr.min.js"></script>
    <script src="js/logout.js"></script>
</body>

<script>
        if(resulGrid == 0)
        {
            window.location.href = "add-paciente.php";
        }
        
        $(document).on('click','.delete',function(){
             $idPACIENTE   = $(this).closest('tr').find('td').eq(getColumnValue("idPACIENTE")).text();
            $('#delete_doctor').modal('show');
        });
        $(document).on('click','.apagar',function(){
            $.ajax({
                url: 'php/ajax/paciente.php',
                type: 'POST',
                 data: {
                        metodo: "DadosDel",
                        idPACIENTE: $idPACIENTE
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
            $idPACIENTE   = $(this).closest('tr').find('td').eq(getColumnValue("idPACIENTE")).text();
            $nome         = $(this).closest('tr').find('td').eq(getColumnValue("Nome")).text();
            $dataNasc     = $(this).closest('tr').find('td').eq(getColumnValue("Data de Nascimento")).text();
            $sexo         = $(this).closest('tr').find('td').eq(getColumnValue("Sexo")).text();
            $cep          = $(this).closest('tr').find('td').eq(getColumnValue("Cep")).text();
            $endereco     = $(this).closest('tr').find('td').eq(getColumnValue("Endereço")).text();
            $numero       = $(this).closest('tr').find('td').eq(getColumnValue("Numero")).text();
            $bairro       = $(this).closest('tr').find('td').eq(getColumnValue("Bairro")).text();
            $cidade       = $(this).closest('tr').find('td').eq(getColumnValue("Cidade")).text();
            $uf           = $(this).closest('tr').find('td').eq(getColumnValue("UF")).text();
            $complemento  = $(this).closest('tr').find('td').eq(getColumnValue("Complemento")).text();
            $telefone     = $(this).closest('tr').find('td').eq(getColumnValue("Telefone")).text();
            $status       = $(this).closest('tr').find('td').eq(getColumnValue("Status")).text();
            
            $.ajax({
                url: 'php/ajax/paciente.php',
                type: 'POST',
                 data: {
                        metodo: "DadosUpdate",
                        idPACIENTE:$idPACIENTE,
                        nome:$nome,
                        dataNasc: $dataNasc,
                        sexo: $sexo,
                        cep: $cep,
                        endereco:$endereco,
                        bairro: $bairro,
                        cidade: $cidade,
                        uf: $uf,
                        numero: $numero,
                        complemento:$complemento,
                        telefone: $telefone,
                        status: $status
                      },
                cache: false,
                datatype: "json",
                error: function(jqXHR) {
                    toastr.error(jqXHR.responseText, "Error");
                },
                success: function() {
                    window.location.href = "add-paciente.php";
                },
            });
        });
    </script>


<!-- doctors23:17-->
</html>