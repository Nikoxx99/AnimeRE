<?php 
	include 'bin/core/conexion.php';
?>
<!-- AnimeRE Todos los Derechos reservados -->
<!-- By Subaru -->
<!DOCTYPE html>
<html lang="en">
<?php 
	include 'header.php';
?>
<body>
	<?php 
	include 'navbar.php';
	?>
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<div class="">
					<!-- Aqui va el contenido de publicidad -->
				</div>
			</div>
			<div class="col-md-4">
				<div class="content">
					<h1 style="color:#fff;">Iniciar sesion AnimeRE 2019 Panel v1.3</h1>
					<form class="" action="bin/controller/log.php" method="post">
						<input type="email" name="email" class="form-control" placeholder="Ingrese su EMail">
						<br/>
						<input type="password" name="password" class="form-control" placeholder="Digita tu contraseña">
						<br/>
						<input type="submit" class="btn btn-success" value="Loguearse">
					</form>
				</div>
			</div>
		</div>
	</div>
	<?php include "footer.php"?>
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script type="text/javascript" src="https://code.jquery.com/jquery-latest.js"></script>
</body>
</html>