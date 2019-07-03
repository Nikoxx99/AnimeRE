<!-- AnimeRE Todos los Derechos reservados -->
<!-- By Subaru -->
<?php
	include 'adminProtect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Administracion | AnimeRE</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<link rel="shourtcut icon" type="image/x-icon" href="https://animere.net/img/favicon.png">
	<link rel="stylesheet" type="text/css" href="../css/estilos.css">
	<script type="text/javascript" src="../js/dpdw.js"></script>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<script type="text/javascript" src="../js/bootstrap.js"></script>
</head>
<body>
	<?php 
	include '../navbar-ver.php';
	?>
	<br>
	<br>
	<br>
	<br>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="d-flex flex-column bd-highlight mb-3">
				  <div class="p-2 bd-highlight"><a href="subir.php" type="button" class="btn btn-primary btn-lg btn-block">Agregar Serie</a></div>
				  <div class="p-2 bd-highlight"><a href="subir-cap.php" type="button" class="btn btn-danger btn-lg btn-block">Subir Capitulo</a></div>
				  <div class="p-2 bd-highlight"><a href="add_category.php" type="button" class="btn btn-info btn-lg btn-block">Agregar Categoria</a></div>
				  <div class="p-2 bd-highlight"><a href="#" type="button" class="btn btn-danger btn-lg btn-block">Eliminar (Proximamente)</a></div>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row justify-content-center">
			<?php
			include '../bin/core/conexion.php';
			$sql="SELECT * FROM reportes WHERE solucionado = 0 ORDER BY Id DESC LIMIT 20";
			$resultado= $base->prepare($sql);
			$resultado->execute(array());
			$count = $resultado->rowCount();
			?>
			<h3 class="title">Episodios Caidos (<?php echo $count;?>)</h3>
			<table class="table">
				<thead>
					<tr>
					<th scope="col">#</th>
					<th scope="col">Episodio</th>
					<th scope="col">Problema</th>
					<th scope="col">Email Usuario</th>
					</tr>
				</thead>
				<tbody>
					
						<?php	
							while($crow=$resultado->fetch(PDO::FETCH_ASSOC)){
								if($crow['tipo_reporte'] == 1){
									$tipo_reporte = "Capitulo Caido";
								}else if($crow['tipo_reporte'] == 2){
									$tipo_reporte = "Capitulo Erroneo";
								}

								echo "
								<tr>
								<td>".$crow['id']."</td>
								<td>".$crow['id_capitulo']."</td>
								<td>".$tipo_reporte."</td>
								<td>".$crow['email_usuario']."</td>
								<td>
									<form role='form' method='post'>
										<input type='hidden' name='id' value='".$crow['id']."'>
										<input type='hidden' name='id_capitulo' value='".$crow['id_capitulo']."'>
										<input type='hidden' name='solucionado' value='1'>
										<input type='hidden' name='email_usuario' value='".$crow['email_usuario']."'>
										<button type='submit' name='solucionado_r'>Solucionado</button>
									</form>
								</td>
								</tr>
								";
							}
						
						?>
					
				</tbody>
			</table>
		</div>
	</div>
	<?php
		include 'phpmailer.php';
		include 'smtp.php';
		use PHPMailer\PHPMailer\PHPMailer;
		use PHPMailer\PHPMailer\Exception;
	if(isset($_POST['solucionado_r'])){
		$id = $_POST['id'];
		$id_cap = $_POST['id_capitulo'];
		$solucionado = $_POST['solucionado'];
		$email_usuario = $_POST['email_usuario'];
	  
	  
		try {
	  
		  $sql = "UPDATE reportes SET 
			  solucionado='$solucionado'
			  WHERE id='$id'";
		
		  // Prepare statement
		  $stmt = $base->prepare($sql);
		
		  // execute the query
		  $stmt->execute();
		  
		  
		  // Instantiation and passing `true` enables exceptions
		  $mail = new PHPMailer(true);
		  
		  try {
			  //Server settings
			  $mail->SMTPDebug = 0;                                       // Enable verbose debug output
			  $mail->isSMTP();                                            // Set mailer to use SMTP
			  $mail->Host       = 'mail.animere.net';  // Specify main and backup SMTP servers
			  $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
			  $mail->Username   = 'informacion@animere.net';                     // SMTP username
			  $mail->Password   = 'WeAre@AnimeRE20';                               // SMTP password
			  $mail->SMTPSecure = 'ssl';                                  // Enable TLS encryption, `ssl` also accepted
			  $mail->Port       = 465;                                    // TCP port to connect to
		  
			  //Recipients
			  $mail->setFrom('informacion@animere.net', 'AnimeRE | Is Anime Revolution');    // Add a recipient
			  $mail->addAddress($email_usuario);               // Name is optional
		  
			  // Content
			  $mail->isHTML(true);                                  // Set email format to HTML
			  $mail->Subject = 'Tu reporte ha sido atendido!';
			  $mail->Body    = 'Gracias por reportar un fallo en el capitulo de '.$id_cap.'! Te informamos que ya arreglamos el problema y puedes verlo!';
		  
			  $mail->send();
			  echo 'Se ha notificado al usuario que el capitulo ha sido arreglado!';
		  } catch (Exception $e) {
			  echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
		  }
		
		  // echo a message to say the UPDATE succeeded
		  }catch(PDOException $e)
		  {
		  echo $sql . "<br>" . $e->getMessage();
		  }
		
		$base = null;
	   }

	?>
			
			
	<footer class="footer">
		<div class="container">
			<h5>Este es un script realizado para <span class="nm-footer">AnimeRE 2019 v1.6</span>.</h5>
		</div>
		<div class="konata" style="position:fixed;bottom:0;left:0;"><img data-toggle="tooltip" data-placement="top" title="Deja de holgazanear y ponte a subir animes '-.- la gente lo espera" src="konata.png" alt=""></div>
	</footer>
	<script type="text/javascript" src="../js/jquery.js"></script>
	<script type="text/javascript" src="../js/bootstrap.js"></script>
	<script type="text/javascript" src="https://code.jquery.com/jquery-latest.js"></script>
</body>
</html>