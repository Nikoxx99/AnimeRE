<!-- AnimeRE Todos los Derechos reservados -->
<!-- By Subaru -->
<?php
	include 'adminProtect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Administracon</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../css/estilos.css">
	<script type="text/javascript" src="../js/dpdw.js"></script>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<script type="text/javascript" src="../js/bootstrap.js"></script>
</head>
<body>
	<?php include"../navbar-ver.php"; ?><BR><BR><BR><BR><BR>
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<div class="content">
					<h3 class="breadcrumb">Añadir una Categoria</h3>
					<div class="form-group">
						<form method="post" action="../form/cat.php" class="subida">
							<div class="form-group">
								<input type="text" class="form-control" id="categoria" name="categoria" placeholder="Nombre de la Categoria">
							</div>
							<input type="submit" class="btn btn-success" value="Agregar">
						</form>
					</div>
				</div>
			</div>
			<div class="col-md-4">
			<div class="row">
				<div class="jumbotron"><h2>Acceso Rapido: Panel de Administracion<h2></div>
				<a class="btn btn-primary btn-block" href="https://animere.net/admin/subir-cap.php" role="button">Subir Capitulos (No necesariamente de este mismo anime)</a>
				<a class="btn btn-danger btn-block" href="https://animere.net/admin/subir.php" role="button">Agregar un Anime</a>
				<a class="btn btn-success btn-block" href="https://animere.net/admin/administracion.php" role="button">Volver al menu principal del Panel Admin</a>
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