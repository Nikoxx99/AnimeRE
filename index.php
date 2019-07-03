<?php 
	include 'bin/core/conexion.php';
	include "slider/admin/db.php";
 	$images = get_imgs();
?>
<!DOCTYPE html>
<html lang="es">
<?php 
	include 'header.php';
?>
<style>
			.morecontent span {
			    display: none;
			    color:#fff;
			}
			.morelink {
			    display: block;
			    color:#fff;
			}
	</style>

<body>
<?php				
	session_start();
  if(!isset($_SESSION["usuario"])) {
    echo '';
  } else {
		echo '
			<ul style="background-color:#ebcc43;padding:10px;" class="nav justify-content-center">
				<li class="nav-item">
					<a href="https://animere.net/admin/administracion.php" class="nav-link btn btn-success">'.$_SESSION["usuario"].' Panel Admin</a>
				</li>
			</ul>
			' ;
		}
?>  
<div id="fb-root"></div>
<script async defer src="https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v3.2"></script>

<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '1929989280461762',
      cookie     : true,
      xfbml      : true,
      version    : 'v3.3'
    });
      
    FB.AppEvents.logPageView();   
      
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "https://connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));


	 FB.getLoginStatus(function(response) {
				statusChangeCallback(response);
		});
</script>
	<div class="container-fluid init_bg">
    <div class="container">
			<div class="">
			<nav class="navbar navbar-expand-lg navbar-dark bg-bark p-0">
				<a class="navbar-brand" href="https://animere.net/"><img src="https://animere.net/img/a.png" width="190" height=""></a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse justify-content-center" id="navbarTogglerDemo02">
					<ul class="navbar-nav ml-auto mr-auto mt-2 mt-lg-0">
						<li class="nav-item active">
							<a class="text-warning nav-link" href="https://animere.net/"><b style="font-size:1.3rem !important;" class="are_nav_t">INICIO</b></a>
						</li>
						<li class="nav-item">
							<a class="text-warning nav-link" href="https://animere.net/animes.php"><b style="font-size:1.3rem !important;" class="are_nav_t">ANIMES</b></a>
						</li>
						<li  class="nav-item">
							<a class="text-warning nav-link" href="https://animere.net/emision.php"><b style="font-size:1.3rem !important;" class="are_nav_t">EMISION</b></a>
						</li>
						<li class="nav-item">
							<a class="text-warning nav-link" href="https://noticias.animere.net/" tabindex="-1" aria-disabled="true"><b style="font-size:1.3rem !important;" class="are_nav_t">NOTICIAS</b></a>
						</li>
						
					</ul>
					<form class="form-inline" id="buscar1" style="color: #fff0 !important;">
						<form action="" method="post" class="navbar-form navbar-right" autocomplete="off" id="form-search">
									<input name="buscar" id="buscar" method="post" type="text" class="form-control"  placeholder="Buscar Anime">
						</form>
						<div id="resultado-q"></div>
					</form>
							
				</div>
			
			</nav>
			</div>
		</div>
</div>

	<div class="container-fluid" style="overflow:hidden;">
	  <div class="row justify-content-center">
		<div class="bd-example">
			<div id="carouselExampleCaptions" class="carousel slide are_c_c" data-ride="carousel">
				<div class="carousel-inner">
				<?php 
						try{
							include 'bin/core/conexion.php';
							include 'bin/bin/funciones.php';
							$sql="SELECT * FROM series WHERE enSlider = 1 ORDER BY series.Id DESC LIMIT 1";
							$resultado = $base->prepare($sql);
							$resultado->execute(array());
							while($crow=$resultado->fetch(PDO::FETCH_ASSOC)) {
							
								echo'
											<div class="carousel-item" style="z-index:-100;">
											<a class="" href="../../serie/'.url($crow["Id"],$crow["StrNombre"]).'">
												<div class="are_bg_init"><img src="'.$crow['StrImagenFondo'].'" class="thumbnail vw100_are" alt="..."></div>
											</a>
											<div class="carousel-caption d-none d-md-block">
												<h2 style="color:#f1f1f1;background-color:rgba(0,0,0,0.5)">'.$crow['StrNombre'].'</h2>
												<p style="color:#f1f1f1;background-color:rgba(0,0,0,0.5)" class="more">'.$crow['StrSinopsis'].'</p>
											</div>
										</div>
								
										';
							}
						}catch(Exception $e){
							echo "Error temporal, por favor reporta esto a un Administrador" . $e->getMessage();
						}
					?>
				</div>
				<a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
			</div>
		</div>
	  </div>
	</div>


	<!-- Capitulos Recientes  -->
	<div class="container are_grid">

						<!-- Aqui el div de NOTICIAS -->
	
	<!-- Termina div de NOTICIAS -->

		<div class="row">
				<article class="content">
					<div class="container-fluid">
					<h1 class="bdr-title title" align="center"><i class="fab fa-youtube"></i> CAPÍTULOS RECIENTES</h1>
						<div class="row" style="display:flex;">
					<?php 
						try{
							include 'bin/core/conexion.php';
							$sql="SELECT capitulos.Id,capitulos.IdRel,capitulos.StrNombre,capitulos.StrImagen,capitulos.nCap,series.tipo FROM capitulos INNER JOIN series on capitulos.IdRel=series.Id WHERE capitulos.oculto = 0 ORDER BY capitulos.Id DESC LIMIT 40";
							$resultado = $base->prepare($sql);
							$resultado->execute(array());
							while($crow=$resultado->fetch(PDO::FETCH_ASSOC)) {
								if($crow['tipo'] == 0){
									$infoCap = "Capitulo ". $crow['nCap'];
								}else if($crow['tipo'] == 1){
									$infoCap = "Pelicula";
								}else if($crow['tipo'] == 2){
									$infoCap = "OVA";
								}else{
									$infoCap = "ONA";
								}
								echo"
									<div class='dflex p-0 mr-1 col-are-3 col-sm-6 are_mobile'>
										<div class='capitulo_are'>
											<i class='far fa-play-circle are_icon_c'></i>
											<a class='post-vp' href='ver/". url($crow['Id'],$crow['StrNombre'])."'>
											
												<p style='position:absolute;float:right;' class='mt-2 ml-2 badge badge-pills badge-are'>".$infoCap."</p>
												<div class='img-fluid-are-div'><img  class='img-fluid-are lazyload' src='".$crow['StrImagen']."'></div>
												<h5 class='title_cap'>".$crow['StrNombre']."</h5>
											</a>
										</div>
									</div>
						
								
								
					";
							}
						}catch(Exception $e){
							echo "Error temporal, por favor reporta esto a un Administrador" . $e->getMessage();
						}
					?>
						</div>
					</div>
				</article>
				</div>
		</div>
	</div>
		<!-- JuicyAds v3.0 -->
<div class="container" style="padding:15px;">
	<div class="row justify-content-center">
			<div class="are_ad_mobile">
				<script type="text/javascript" data-cfasync="false" async src="https://adserver.juicyads.com/js/jads.js"></script>
				<ins id="755354" data-width="300" data-height="112"></ins>
				<script type="text/javascript" data-cfasync="false" async>(adsbyjuicy = window.adsbyjuicy || []).push({'adzone':755354});</script>
			</div>
	</div>
</div>
<!--JuicyAds END-->
<!-- Aqui el div de NOTICIAS -->
	<!-- Termina div de NOTICIAS -->
		<!-- JuicyAds v3.0 -->
			<div class="container" style="padding:15px;">
				<div class="row justify-content-center">
					<div class="are_ad_banner">
						<script type="text/javascript" data-cfasync="false" async src="https://adserver.juicyads.com/js/jads.js"></script>
						<ins id="755350" data-width="728" data-height="102"></ins>
						<script type="text/javascript" data-cfasync="false" async>(adsbyjuicy = window.adsbyjuicy || []).push({'adzone':755350});</script>
				</div>
				</div>
			</div>
		<!--JuicyAds END-->
	<div class="container">
	<h1 class="bdr-title title" align="center"><i class="far fa-play-circle"></i> ANIMES RECIENTES</h1>
		<div class="anime-grid row justify-content-sm-center">
			
				
			<?php

				$sql="SELECT * FROM series ORDER BY Id DESC LIMIT 20";
				$resultado = $base->query($sql);			
				while($crow=$resultado->fetch(PDO::FETCH_ASSOC)){
					if($crow['tipo'] == 0){
						$tipoA = "Serie";
					}else if($crow['tipo'] == 1){
						$tipoA = "Pelicula";
					}else if($crow['tipo'] == 2){
						$tipoA = "OVA";
					}else{
						$tipoA = "ONA";
					}
					echo'
							<div class="col-are-3 anime-card m-1">
								<div class="card">
									<a href="../../serie/'.url($crow["Id"],$crow["StrNombre"]).'">
										<p style="position:absolute;float:right;" class="mt-2 ml-2 badge badge-pills badge-are">'.$tipoA.'</p>
										<p class="a_description more">'.$crow['StrSinopsis'].'</p>
										<div class="div_img_s"><img src="'. $crow['StrImagen'] .'" class="card-img-top rounded-0 lazyload" alt="..."></div>
										<div class="are_info_s">
											<h5 class="are_s_title">' . $crow['StrNombre'] . '</h5>
											<p class="badge badge-pills badge-are text-light mb-0">Estreno: '. $crow['StrFechaEstreno'] .'</p>
											<p class="badge badge-pills badge-are text-light mb-0">'.$crow['estado1'].'</p>
										</div>
									</a>
								</div>
							</div>
					';
				}
			?>
			
			

		</div>
	</div>
	<div class="container">
		<div class="row" style="color #fff !important;">
			<div style="background-color:#ffeb97;" class="rounded fb-comments" data-href="https://animere.net/index.php" data-numposts="10" data-width='100%' data-colorscheme='light'></div>
		</div>
	</div>
<!-- 
	<div class="konata" style="position:fixed;bottom:0;left:0;"><a href="https://www.facebook.com/AnimeResurrection/" data-toggle="tooltip" title="Dejame! '-.- ponte a ver tus monas chinas mejor."><img src="admin/konata.png" alt=""></a></div>
	<div class="konata" style="position:fixed;bottom:0;right:0;"><a data-toggle="tooltip" title="¿Puedes Colaborarnos?" href="https://paypal.me/animere?locale.x=es_XC"><img class="donar" src="img/donar.png" alt=""></a></div> -->

	<?php include "footer.php";?>
	<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script src="/slider/jquery.min.js"></script>
	<script src="/slider/bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/ajax.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/simple-parallax-js@4.0.0/dist/simpleParallax.min.js"></script>
	<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/lazyload@2.0.0-rc.2/lazyload.js"></script>
	<script>
		var image = document.getElementsByClassName('thumbnail');
		new simpleParallax(image, {
			scale: 1.1
		});
	</script>
	<script>
		window.addEventListener("load", function(event) {
				lazyload();
		});
	
	</script>
	<script>
		$(document).ready(function() {
		    // Configure/customize these variables.
		    var showChar = 270;  // How many characters are shown by default
		    var ellipsestext = "...";
		    var moretext = "Ver Mas...>";
		    var lesstext = "Ver Menos...";
		    

		    $('.more').each(function() {
		        var content = $(this).html();
		 
		        if(content.length > showChar) {
		 
		            var c = content.substr(0, showChar);
		            var h = content.substr(showChar, content.length - showChar);
		 
		            var html = c + '<span class="moreellipses">' + ellipsestext+ '&nbsp;</span><span class="morecontent"><span>' + h;
		 
		            $(this).html(html);
		        }
		 
		    });

				$(".carousel-item:first").addClass("active")
		});
	</script>

</body>
</html>