<?php include('seguranca/scriptSeg.php');?>
<!DOCTYPE html>
<html lang="en">
<!-- add-doctor24:06-->
<head>
    <style>
        .campoAlerta{
        border:orange solid 1px !important;
    }
    </style>
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
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Nome de usuário <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="usuario">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Email <span class="text-danger">*</span></label>
                                    <input class="form-control" type="email" name="email">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Senha</label>
                                    <input class="form-control" type="password" name="senha">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Confirme Senha</label>
                                    <input class="form-control" type="password" name="confirmeSenha">
                                </div>
                            </div>
                            <div class="col-sm-6">
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
                                    <div class="col-sm-6 col-md-6 col-lg-3">
                                        <div class="form-group">
                                            <label>Cargo</label>
                                            <select class="form-control" name="cargo">
                                                <option value="1">Médico(a)</option>
                                                <option value="2">Enfermeiro(a)</option>
                                                <option value="3">Anestesiologista</option>
                                                <option value="4">Instrumentador(a)</option>
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
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Telefone </label>
                                    <input class="form-control" type="text" name="telefone">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Curta biografia</label>
                            <textarea class="form-control" rows="3" cols="30" name="biografia"></textarea>
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
                            <a href="colaboradores.php" class="btn btn-primary submit-btn">Voltar</a>
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
			success: function(resposta){
				$("input[name=endereco]").val(resposta.logradouro);
                $("input[name=bairro]").val(resposta.bairro);
                $("input[name=cidade]").val(resposta.localidade);
                $("select[name=uf]").val(resposta.uf);
				$("input[name=numero]").focus();
			}
		});
	});
    
    var idCol = "<?php  if(isset($_SESSION['idColaboradores']))echo $_SESSION['idColaboradores'];?>";
    
    if(idCol > 0)
    {
        loadDados();
    }
    function loadDados()
    {
        
        $.ajax({
                url: 'php/ajax/colaboradores.php',
                type: 'POST',
                 data: {
                        metodo: "getDadosUp",
                        idCol: idCol
                      },
                cache: false,
                datatype: "json",
                error: function(jqXHR) {
                    toastr.error(jqXHR.responseText, "Error");
                },
                success: function(data) {
                    if(data.msg.length > 0)
                    {
                        $("input[name=nome]").val(data.msg[0].NOME);
                        $("input[name=usuario]").val(data.msg[0].USUARIO);
                        $("input[name=email]").val(data.msg[0].EMAIL);
                        $("input[name=senha]").val(data.msg[0].SENHA);
                        $("input[name=dataNasc]").val(data.msg[0].DATANASCIMENTO);
                        if(data.msg[0].GENERO === "Feminino")
                        {
                            sexoNivel = 1;
                        }
                        else
                        {
                            sexoNivel = 0;
                        }
                        $("input[name=sexo]").eq(sexoNivel).prop("checked", true);
                        $("input[name=cep]").val(data.msg[0].CEP);
                        $("input[name=endereco]").val(data.msg[0].ENDERECO);
                        $("input[name=bairro]").val(data.msg[0].BAIRRO);
                        $("input[name=cidade]").val(data.msg[0].CIDADE);
                        $("select[name=uf]").val(data.msg[0].UF);
                        $("input[name=numero]").val(data.msg[0].NUMERO);
                        $("select[name=cargo]").val(data.msg[0].CARGO);
                        $("textarea[name=complemento]").val(data.msg[0].COMPLEMENTO);
                        $("input[name=telefone]").val(data.msg[0].TELEFONE);
                        $("textarea[name=biografia]").val(data.msg[0].CURTABIOGRAFIA);
                        if(data.msg[0].STATUS === "0")
                        {
                            statusNivel = 1;
                        }
                        else
                        {
                            statusNivel = 0;
                        }
                        $("input[name=status]").eq(statusNivel).prop("checked", true);
                    }
                },
            });
    }
    
    $(document).on("click", "input[name=status]", function(){
        $status = $(this).val();
    });
    
    $(document).on("click", ".btnCriar", function(){

        $nome = $("input[name=nome]").val();
        $user = $("input[name=usuario]").val();
        $email = $("input[name=email]").val();
        $senha = $("input[name=senha]").val();
        $confirmeSenha = $("input[name=confirmeSenha]").val();
        $dataNasc = $("input[name=dataNasc]").val();
        $sexo = $("input[name=sexo]").val();
        $cep = $("input[name=cep]").val();
        $endereco = $("input[name=endereco]").val();
        $bairro = $("input[name=bairro]").val();
        $cidade = $("input[name=cidade]").val();
        $uf = $("select[name=uf]").val();
        $numero = $("input[name=numero]").val();
        $cargo = $("select[name=cargo]").val();
        $complemento = $("textarea[name=complemento]").val();
        $telefone = $("input[name=telefone]").val();
        $biografia = $("textarea[name=biografia]").val();
        $status = $("input[name=status]").val();
        
        var metodo;
        
        if($confirmeSenha !== $senha)
        {
            $("input[name=senha]").addClass("campoAlerta");
            $("input[name=confirmeSenha]").addClass("campoAlerta");
            $("input[name=senha]").focus();
            return toastr.warning("Senhas diferentes", "Alerta");
        }
        if($nome !== "" && $user !== "" && $email !== "" && $senha !== "" && $dataNasc !== "" && $sexo !== "" && $cep !== "" &&
           $endereco !== "" && $bairro !== "" && $cidade !== "" && $uf !== "" && $numero !== "" && $cargo !== "" && $complemento !== "" &&
           $telefone !== "" && $biografia !== "" && $status !== "")
        {
            if(idCol > 0)
            {
                metodo = "update";
            }
            else
            {
                metodo = "add";
            }
            $.ajax({
                url: 'php/ajax/colaboradores.php',
                type: 'POST',
                 data: {
                        metodo: metodo,
                        nome:$nome,
                        user: $user,
                        email: $email,
                        senha: $senha,
                        dataNasc: $dataNasc,
                        sexo: $sexo,
                        cep: $cep,
                        endereco:$endereco,
                        bairro: $bairro,
                        cidade: $cidade,
                        uf: $uf,
                        numero: $numero,
                        cargo: $cargo,
                        complemento:$complemento,
                        telefone: $telefone,
                        biografia: $biografia,
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
                            window.location.href = "colaboradores.php";
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
