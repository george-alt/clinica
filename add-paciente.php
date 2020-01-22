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
                        <h4 class="page-title">Colaboradores</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Nome <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="nome">
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Data de nascimento</label>
                                    <div class="cal-icon">
                                        <input type="text" class="form-control datetimepicker" name="dataNasc">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group gender-select">
                                    <label class="gen-label">Gênero:</label>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" name="sexo" class="form-check-input" value="Masculino">Masculino
                                        </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" name="sexo" class="form-check-input" value="Feminino">Feminino
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="col-sm-6 col-md-6 col-lg-3">
                                        <div class="form-group">
                                            <label>CEP</label>
                                            <input type="text" class="form-control" name="cep">
                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="form-group">
                                            <label>Endereço</label>
                                            <input type="text" class="form-control" name="endereco">
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label>Nº</label>
                                            <input type="text" class="form-control" name="numero">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-3">
                                        <div class="form-group">
                                            <label>Bairro</label>
                                            <input type="text" class="form-control" name="bairro">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-3">
                                        <div class="form-group">
                                            <label>Cidade</label>
                                            <input type="text" class="form-control" name="cidade">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-3">
                                        <div class="form-group">
                                            <label>UF</label>
                                            <select class="form-control" name="uf">
                                                <option value="AC">AC</option>
                                                <option value="AL">AL</option>
                                                <option value="AP">AP</option>
                                                <option value="AM">AM</option>
                                                <option value="BA">BA</option>
                                                <option value="CE">CE</option>
                                                <option value="DF">DF</option>
                                                <option value="ES">ES</option>
                                                <option value="GO">GO</option>
                                                <option value="MA">MA</option>
                                                <option value="MT">MT</option>
                                                <option value="MS">MS</option>
                                                <option value="MG">MG</option>
                                                <option value="PA">PA</option>
                                                <option value="PB">PB</option>
                                                <option value="PR">PR</option>
                                                <option value="PE">PE</option>
                                                <option value="PI">PI</option>
                                                <option value="RJ">RJ</option>
                                                <option value="RN">RN</option>
                                                <option value="RS">RS</option>
                                                <option value="RO">RO</option>
                                                <option value="RR">RR</option>
                                                <option value="SC">SC</option>
                                                <option value="SP">SP</option>
                                                <option value="SE">SE</option>
                                                <option value="TO">TO</option>
                                                
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Complemento</label>
                                            <textarea type="text" class="form-control" name="complemento"></textarea>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Telefone </label>
                                    <input class="form-control" type="text" name="telefone">
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
                            <a href="paciente.php" class="btn btn-primary submit-btn">Voltar</a>
                            <button class="btn btn-success submit-btn btnCriar">Confirmar</button>
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
    <script src="assets/js/jquery.mask.min.js"></script>
    <script src="js/logout.js"></script>
</body>

<script>
    $('input[name=telefone]').mask('(00) 00000-0000');
    $("input[name=cep]").focusout(function(){
		$.ajax({
			url: 'https://viacep.com.br/ws/'+$(this).val()+'/json/unicode/',
			dataType: 'json',
            error: function() {
                    toastr.warning("Cep não encrotrado.", "Alerta");
                    $("input[name=cep]").focus();
            },
			success: function(resposta){
				$("input[name=endereco]").val(resposta.logradouro);
                $("input[name=bairro]").val(resposta.bairro);
                $("input[name=cidade]").val(resposta.localidade);
                $("select[name=uf]").val(resposta.uf);
				$("input[name=numero]").focus();
			}
		});
	});
    
    var idPACIENTE = "<?php  if(isset($_SESSION['idPACIENTE']))echo $_SESSION['idPACIENTE'];?>";
    var nome = "<?php  if(isset($_SESSION['nome']))echo $_SESSION['nome'];?>";
    var dataNasc = "<?php  if(isset($_SESSION['dataNasc']))echo $_SESSION['dataNasc'];?>";
    var sexo = "<?php  if(isset($_SESSION['sexo']))echo $_SESSION['sexo'];?>";
    var cep = "<?php  if(isset($_SESSION['cep']))echo $_SESSION['cep'];?>";
    var endereco = "<?php  if(isset($_SESSION['endereco']))echo $_SESSION['endereco'];?>";
    var bairro = "<?php  if(isset($_SESSION['bairro']))echo $_SESSION['bairro'];?>";
    var cidade = "<?php  if(isset($_SESSION['cidade']))echo $_SESSION['cidade'];?>";
    var uf = "<?php  if(isset($_SESSION['uf']))echo $_SESSION['uf'];?>";
    var numero = "<?php  if(isset($_SESSION['numero']))echo $_SESSION['numero'];?>";
    var complemento = "<?php  if(isset($_SESSION['complemento']))echo $_SESSION['complemento'];?>";
    var telefone = "<?php  if(isset($_SESSION['telefone']))echo $_SESSION['telefone'];?>";
    var status = "<?php  if(isset($_SESSION['status']))echo $_SESSION['status'];?>";
    
    
    if(idPACIENTE > 0)
    {
        loadDados();
    }
    
    function loadDados()
    {
        $("input[name=nome]").val(nome);
        $("input[name=dataNasc]").val(dataNasc);
        if(sexo === "Feminino")
        {
            sexoNivel = 1;
        }
        else
        {
            sexoNivel = 0;
        }
        $("input[name=sexo]").eq(sexoNivel).prop("checked", true);
        $("input[name=cep]").val(cep);
        $("input[name=endereco]").val(endereco);
        $("input[name=bairro]").val(bairro);
        $("input[name=cidade]").val(cidade);
        $("select[name=uf]").val(uf);
        $("input[name=numero]").val(numero);
        $("textarea[name=complemento]").val(complemento);
        $("input[name=telefone]").val(telefone);
        if(status === "0")
        {
            statusNivel = 1;
        }
        else
        {
            statusNivel = 0;
        }
        $("input[name=status]").eq(statusNivel).prop("checked", true);
        
    }
    
    $(document).on("click", "input[name=status]", function(){
        $status = $(this).val();
    });
    
    $(document).on("click", ".btnCriar", function(){

        $nome = $("input[name=nome]").val();
        $dataNasc = $("input[name=dataNasc]").val();
        $sexo = $("input[name=sexo]").val();
        $cep = $("input[name=cep]").val();
        $endereco = $("input[name=endereco]").val();
        $bairro = $("input[name=bairro]").val();
        $cidade = $("input[name=cidade]").val();
        $uf = $("select[name=uf]").val();
        $numero = $("input[name=numero]").val();
        $complemento = $("textarea[name=complemento]").val();
        $telefone = $("input[name=telefone]").val();
        
        
        var metodo;
        
        if($nome !== "" && $dataNasc !== "" && $sexo !== "" && $cep !== "" && $endereco !== "" && $bairro !== "" && $cidade !== "" &&
           $uf !== "" && $numero !== "" && $complemento !== "" && $telefone !== "" && $status !== "")
        {
            if(idPACIENTE > 0)
            {
                metodo = "update";
            }
            else
            {
                metodo = "add";
            }
            $.ajax({
                url: 'php/ajax/paciente.php',
                type: 'POST',
                 data: {
                        metodo: metodo,
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
                success: function(data) {
                    toastr.success(data.msg, "Sucesso");
                    
                    setTimeout(function(){
                        if( metodo === "add")
                        {
                            window.location.reload(1);
                        }
                        else
                        {
                            window.location.href = "paciente.php";
                        }
                        
                     }, 2000);
                },
            });
        }
        else
        {
            $("input").css({"border":"red solid 1px"});
            $("select").css({"border":"red solid 1px"});
            $("textarea").css({"border":"red solid 1px"});
            toastr.warning("Informe todos os campos", "Alerta");
            
        }
        
    });
    
</script>
<!-- add-doctor24:06-->
</html>
