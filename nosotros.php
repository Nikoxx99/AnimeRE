<!-- AnimeRE Todos los Derechos reservados -->
<!-- By Subaru -->
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Terminos y condiciones</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	<script type="text/javascript" src="js/dpdw.js"></script>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<script type="text/javascript" src="js/bootstrap.js"></script>
</head>
<body>
	<nav class="navbar navbar-inverse navbar-static-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" data-toggle="collapse" class="navbar-toggle collapsed" data-target="#anipelex">
					<span class="sr-only">Desplegar / Menu</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a href="" class="navbar-brand">Anipelex</a>
			</div>
			<div class="collapse navbar-collapse" id="anipelex">
				<ul class="nav navbar-nav navbar-right">
					<li><a href="">Inicio</a></li>
					<li class="active"><a href="">Nosotros</a></li>
					<li>
							<?php 
								session_start();
								if(!isset($_SESSION['usuario'])){
							?>
							<a class="hidden-sm hidden-md hidden-lg" href="login/login">Iniciar sesion</a>
							<a class="hidden-sm hidden-md hidden-lg" href="login/login">Registrate</a>
								<div class="dpdwmr hidden-xs">
									<button onclick="myFunction()" class="btn btn-info btn-button">Login</button>
									<div id="myDropdown" class="dropdown-content arrow">
	    								<div class="dpdw-title">
	    									Iniciar Sesion
	   									</div>
	    								<div class="form-group">
	    									<a href="login.php"><input type="button" class="btn btn-info btn-dpdw" value="Iniciar sesion"></a>
	   									</div>
	   									<a href="#"><input type="button" class="btn btn-primary btn-dpdw" value="Registrate"></a>
									</div>
								</div>
								<?php 
									}else{ ?>
									<a class="hidden-sm hidden-md hidden-lg" href="admin/administracion">Administracion</a>
									<a class="hidden-sm hidden-md hidden-lg" href="form/logout">Cerrar sesion</a>
								<div class="dpdwmr hidden-xs">
									<button onclick="myFunction()" class="btn btn-info btn-button">Opciones</button>
									<div id="myDropdown" class="dropdown-content arrow">
									<?php
										include 'bin/core/conexion.php';
										$sql = "SELECT * FROM usuarios WHERE Email = '" . $_SESSION['usuario'] . "'";
										$perfil_info = $base->query($sql);
										if($crow=$perfil_info->fetch(PDO::FETCH_ASSOC)){
											echo "<div class='dpdw-title'>
	  											Bienvenido " . $crow['Nombre'] . "
	  										</div>";
										}
									?>
	   									<div class="form-group">
	   										<a href="admin/administracion" class="btn btn-danger btn-dpdw">Administración</a>
										</div>
										<div class="form-group">
	   										<a href="page/perfil" class="btn btn-success btn-dpdw">Perfil</a>
										</div>
										<a href="bin/controller/logout.php"><input type="button" class="btn btn-primary btn-dpdw" value="Cerrar Sesion"></a>
									</div>
								</div>
								<?php } ?>
		 			</li>
					<li>
						<form action="" method="post" class="navbar-form navbar-right">
							<input type="text" class="form-control" placeholder="Buscar...">
						</form>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="content">
					<h2>Acerca de nosotros</h2>
					<p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
					 Eum, sed sapiente alias ullam. Nostrum totam dolores laborum minima quas. 
					 Sunt optio ex pariatur nisi nobis nesciunt debitis, vero cumque tenetur.</p>
				</div>
			</div>
		</div>
	</div>
	<footer class="footer">
		<div class="container">
			<h5>Todos derechos reservados <span class="nm-footer">Anipelex</span>.</h5>
		</div>
	</footer>
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script type="text/javascript" src="https://code.jquery.com/jquery-latest.js"></script>
</body>
</html>