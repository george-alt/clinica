<div class="header">
	<div class="header-left">
		<a href="index.php" class="logo">
			<img src="assets/img/logo.png" width="35" height="35" alt=""> <span>NOME CLINICA</span>
		</a>
	</div>
	<a id="toggle_btn" href="javascript:void(0);"><i class="fa fa-bars"></i></a>
	<a id="mobile_btn" class="mobile_btn float-left" href="#sidebar"><i class="fa fa-bars"></i></a>
	<ul class="nav user-menu float-right">
		<li class="nav-item dropdown has-arrow">
			<a href="#" class="dropdown-toggle nav-link user-link" data-toggle="dropdown">
				<span class="user-img">
					<img class="rounded-circle" src="assets/img/user.jpg" width="24" alt="Admin">
					<span class="status online"></span>
				</span>
				<span><?php $nome = explode(" ",$_SESSION['usuario']['NOME']); if(count($nome) == 1){ echo $nome[0];} else {echo $nome[0]." ".$nome[1];}?></span>
			</a>
			<div class="dropdown-menu">
				<a class="dropdown-item" href="perfil.php">Perfil</a>
				<a class="dropdown-item logout" href="#">Sair</a>
			</div>
		</li>
	</ul>
	<div class="dropdown mobile-user-menu float-right">
		<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
		<div class="dropdown-menu dropdown-menu-right">
			<a class="dropdown-item" href="perfil.php">Perfil</a>
			<a class="dropdown-item logout" href="#">Sair</a>
		</div>
	</div>
</div>