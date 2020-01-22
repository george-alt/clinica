<!DOCTYPE html>
<html lang="en">


<!-- login23:11-->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <title>NOME CLINICA</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <!--[if lt IE 9]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
	<![endif]-->
    <link rel="stylesheet" type="text/css" href="assets/css/toastr.css">
</head>

<body>
    <div class="main-wrapper account-wrapper">
        <div class="account-page">
			<div class="account-center">
				<div class="account-box">
                    <div class="form-signin">
						<div class="account-logo">
                            <a href="index-2.html"><img src="assets/img/logo-dark.png" alt=""></a>
                        </div>
                        <div class="form-group">
                            <label>Nome de usuário ou Email</label>
                            <input type="text" autofocus="" class="form-control" name="userEmail">
                        </div>
                        <div class="form-group">
                            <label>Senha</label>
                            <input type="password" class="form-control" name="senha">
                        </div>
                        <div class="form-group text-right">
                            <!--<a href="#">Esqueceu sua senha?</a>-->
                        </div>
                        <div class="form-group text-center">
                            <button class="btn btn-primary account-btn entrar">Entrar</button>
                        </div>
                        <div class="text-center register-link">
                            <!---Não tem uma conta? <a href="#">Registrar agora</a>-->
                        </div>
                    </div>
                </div>
			</div>
        </div>
    </div>
    <script src="assets/js/jquery-3.2.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/app.js"></script>
    
    <script src="assets/js/toastr.min.js"></script>
</body>

<script>
    
    $(document).on("click", ".entrar", function(){
        
        $userEmail = $("input[name=userEmail]").val();
        $senha = $("input[name=senha]").val();
        
        if($userEmail !== "" && $senha !== "")
        {
        
            $.ajax({
                url: 'php/ajax/usuario.php',
                type: 'POST',
                 data: {
                        metodo: "login",
                        userEmail:$userEmail,
                        senha: $senha
                      },
                cache: false,
                datatype: "json",
                error: function(jqXHR) {
                    toastr.error(jqXHR.responseText, "Error");
                },
                success: function(data) {
                    
                    if(data.msg === "index.php")
                    {
                        window.location.href="index.php";
                    }
                    else
                    {
                        toastr.warning(data.msg, "Alerta");
                    }
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

<!-- login23:12-->
</html>