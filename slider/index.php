<?php
include "admin/db.php";
 $images = get_imgs();
?>
<!-- Powered by Evilnapsis http://evilnapsis.com/ -->
<!DOCTYPE html>
<html>
<head>
  <title>Carouseles</title>
  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-inverse">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="./">Carousel</a>
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="./">Inicio</a></li>
        <li><a href="./admin" target="_blank">Administar</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<div class="container">
<div class="row">
<div class="col-md-12">
<?php if(count($images)>0):?>
<!-- aqui insertaremos el slider -->
<div id="carousel1" class="carousel slide" data-ride="carousel">
  <!-- Indicatodores -->
  <ol class="carousel-indicators">
<?php $cnt=0; foreach($images as $img):?>
    <li data-target="#carousel1" data-slide-to="0" class="<?php if($cnt==0){ echo 'active'; }?>"></li>
<?php $cnt++; endforeach; ?>
  </ol>

  <!-- Contenedor de las imagenes -->
  <div class="carousel-inner" role="listbox">
<?php $cnt=0; foreach($images as $img):?>
    <div class="item <?php if($cnt==0){ echo 'active'; }?>">
      <img src="<?php echo 'admin/'.$img->folder.$img->src; ?>" alt="Imagen 1">
      <div class="carousel-caption"><?php echo $img->title; ?></div>
    </div>
<?php $cnt++; endforeach; ?>
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel1" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Anterior</span>
  </a>
  <a class="right carousel-control" href="#carousel1" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Siguiente</span>
  </a>

</div>
<?php else:?>
  <h4 class="alert alert-warning">No hay imagenes</h4>
<?php endif; ?>
</div>
</div>
</div>
<script src="jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>

</body>
</html>