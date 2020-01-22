<?php include('seguranca/scriptSeg.php');?>
<!DOCTYPE html>
<html lang="en">

<?php
    
    //Dados quando o usuario logado
    $nomePerfil = $_SESSION["usuario"]["NOME"];
    if($_SESSION["usuario"]["CARGO"] === "1")
    {
        $cargoPerfil = "Médico(a)";
    }
    else
    {
        $cargoPerfil = "Enfermeiro(a)";
    }
    $enderecoPerfil = $_SESSION["usuario"]["ENDERECO"].", ".$_SESSION["usuario"]["NUMERO"].", ".$_SESSION["usuario"]["BAIRRO"].", ".$_SESSION["usuario"]["CIDADE"].", ".$_SESSION["usuario"]["UF"].", ".$_SESSION["usuario"]["CEP"];
    
    $telefonePerfil = $_SESSION["usuario"]["TELEFONE"];
    $generoPerfil = $_SESSION["usuario"]["GENERO"];
    $dataNascPerfil = $_SESSION["usuario"]["DATANASCIMENTO"];
    $emailPerfil = $_SESSION["usuario"]["EMAIL"];
?>
<!-- profile22:59-->
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
                    <div class="col-sm-7 col-6">
                        <h4 class="page-title">Perfil</h4>
                    </div>

                    <div class="col-sm-5 col-6 text-right m-b-30">
                        <a href="#" class="btn btn-primary btn-rounded"><i class="fa fa-plus"></i> Editar Perfil</a>
                    </div>
                </div>
                <div class="card-box profile-header">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="profile-view">
                                <div class="profile-img-wrap">
                                    <div class="profile-img">
                                        <a href="#"><img class="avatar" src="assets/img/user.jpg" alt=""></a>
                                    </div>
                                </div>
                                <div class="profile-basic">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="profile-info-left">
                                                <h3 class="user-name m-t-0 mb-0"><?php echo $nomePerfil;?></h3>
                                                <small class="text-muted"><?php echo $cargoPerfil;?></small>
                                                <div class="staff-id">ID do Empregado : DR-0001</div>
                                                <!--<div class="staff-msg"><a href="chat.html" class="btn btn-primary">Send Message</a></div>-->
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            <ul class="personal-info">
                                                <li>
                                                    <span class="title">Telefone:</span>
                                                    <span class="text"><a href="#"><?php echo $telefonePerfil;?></a></span>
                                                </li>
                                                <li>
                                                    <span class="title">Email:</span>
                                                    <span class="text"><a href="#"><?php echo $emailPerfil;?></a></span>
                                                </li>
                                                <li>
                                                    <span class="title">Aniversário:</span>
                                                    <span class="text"><?php echo $dataNascPerfil;?></span>
                                                </li>
                                                <li>
                                                    <span class="title">Endereço:</span>
                                                    <span class="text"><?php echo $enderecoPerfil;?></span>
                                                </li>
                                                <li>
                                                    <span class="title">Gênero:</span>
                                                    <span class="text"><?php echo $generoPerfil;?></span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>                        
                        </div>
                    </div>
                </div>
				<div class="profile-tabs">
					<ul class="nav nav-tabs nav-tabs-bottom">
						<li class="nav-item"><a class="nav-link active" href="#about-cont" data-toggle="tab">Sobre</a></li>
						<li class="nav-item"><a class="nav-link" href="#bottom-tab2" data-toggle="tab">Perfil</a></li>
						<li class="nav-item"><a class="nav-link" href="#bottom-tab3" data-toggle="tab">Mensagens</a></li>
					</ul>

					<!--<div class="tab-content">
						<div class="tab-pane show active" id="about-cont">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card-box">
                                        <h3 class="card-title">Education Informations</h3>
                                        <div class="experience-box">
                                            <ul class="experience-list">
                                                <li>
                                                    <div class="experience-user">
                                                        <div class="before-circle"></div>
                                                    </div>
                                                    <div class="experience-content">
                                                        <div class="timeline-content">
                                                            <a href="#/" class="name">International College of Medical Science (UG)</a>
                                                            <div>MBBS</div>
                                                            <span class="time">2001 - 2003</span>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="experience-user">
                                                        <div class="before-circle"></div>
                                                    </div>
                                                    <div class="experience-content">
                                                        <div class="timeline-content">
                                                            <a href="#/" class="name">International College of Medical Science (PG)</a>
                                                            <div>MD - Obstetrics & Gynaecology</div>
                                                            <span class="time">1997 - 2001</span>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="card-box mb-0">
                                        <h3 class="card-title">Experience</h3>
                                        <div class="experience-box">
                                            <ul class="experience-list">
                                                <li>
                                                    <div class="experience-user">
                                                        <div class="before-circle"></div>
                                                    </div>
                                                    <div class="experience-content">
                                                        <div class="timeline-content">
                                                            <a href="#/" class="name">Consultant Gynecologist</a>
                                                            <span class="time">Jan 2014 - Present (4 years 8 months)</span>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="experience-user">
                                                        <div class="before-circle"></div>
                                                    </div>
                                                    <div class="experience-content">
                                                        <div class="timeline-content">
                                                            <a href="#/" class="name">Consultant Gynecologist</a>
                                                            <span class="time">Jan 2009 - Present (6 years 1 month)</span>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="experience-user">
                                                        <div class="before-circle"></div>
                                                    </div>
                                                    <div class="experience-content">
                                                        <div class="timeline-content">
                                                            <a href="#/" class="name">Consultant Gynecologist</a>
                                                            <span class="time">Jan 2004 - Present (5 years 2 months)</span>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
						</div>
						<div class="tab-pane" id="bottom-tab2">
							Tab content 2
						</div>
						<div class="tab-pane" id="bottom-tab3">
							Tab content 3
						</div>
					</div>-->
				</div>
            </div>
            
        </div>
    </div>
    <div class="sidebar-overlay" data-reff=""></div>
    <script src="assets/js/jquery-3.2.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.slimscroll.js"></script>
    <script src="assets/js/app.js"></script>
</body>


<!-- profile23:03-->
</html>