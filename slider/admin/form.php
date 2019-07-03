<html>
	<head>
		<title>Subir Multiples Imagenes y/o Archivos - By Evilnapsis</title>
	  <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
	</head>
	<body>
<?php include("navbar.php");?>

		<div class="container">
			<div class="row">
				<div class="col-md-12">		
		<h1>Subir imagenes o archivos</h1>
		<form enctype="multipart/form-data" method="post" action="upload.php">

  <div class="form-group">
    <label for="exampleInputPassword1">Titulo</label>
    <input type="text"  name="title" class="form-control"  placeholder="Titulo">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Sinopsis</label>
    <input type="text"  name="sinopsis" class="form-control"  placeholder="Sinopsis">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">URL del Anime</label>
    <input type="text"  name="url" class="form-control"  placeholder="https://animere.net/serie/xx-xx-xx">
  </div>
  <div class="form-group">
    <label for="exampleInputFile">Imagen</label>
    <input type="file" name="image" required>
  </div>

		<input type="submit" value="Subir imagen" class="btn btn-primary">
		</form>
	</div>
</div>
</div>
	</body>

</html>
