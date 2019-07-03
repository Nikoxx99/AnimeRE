<!-- AnimeRE Todos los Derechos reservados -->
<!-- By Subaru -->
<!DOCTYPE html>
<?php
					session_start();		//Tomar los datos de sesión

					$id = $_GET['Id'];					
					$nombre = $_GET['StrNombre'];


						include "bin/core/conexion.php";
						
						$sql="SELECT capitulos.Id,capitulos.StrNombre,capitulos.StrOpcion1,capitulos.StrImagen,capitulos.StrImagenFb,series.StrSinopsis,capitulos.IdRel FROM capitulos INNER JOIN series ON capitulos.Idrel = series.Id WHERE capitulos.id='".$id."'";
						$resultado= $base->prepare($sql);
						$resultado->execute(array());
						$crow=$resultado->fetch(PDO::FETCH_ASSOC);
						$url1 = str_replace('../','https://animere.net/',$crow['StrImagenFb']);
						
					//Marcar en la base de datos el capitulo como visto si es un usuario logueado
					if(isset($_SESSION["usuario"]))
					{
						$idUser = $_SESSION["idUser"]; 		//Id del usuario en la bd						
						//Introducimos el valor en la base de datos
						$sql = "INSERT IGNORE INTO vistos (id_usuario, id_capitulo) VALUES (:usuario , :capitulo)";
						$usuario = htmlentities(addslashes($idUser));
						$capitulo = htmlentities(addslashes($id));
						$resultado = $base->prepare($sql);
						$resultado->bindValue(':usuario', $usuario);
						$resultado->bindValue(':capitulo', $capitulo); 
						$resultado->execute();
						
					}
?>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title><?php include"bin/bin/funciones.php"; titulo($_GET['StrNombre']);?></title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"/>
	<meta property="fb:app_id" content="1929989280461762" />
	<meta property="og:site_name" content="AnimeRE.net"/>
	<meta property="og:title" content="<?php titulo($_GET['StrNombre'])?>"/>
	<meta property="og:image" content="<?php echo $url1; ?>"/>
	<meta property="og:description" content="<?php echo $crow['StrSinopsis']?>"/>
	<meta content="AnimeRE <?php titulo($_GET['StrNombre'])?> online gratis en hd, ver <?php titulo($_GET['StrNombre'])?> gratis online en AnimeRE" name="description"/>
	<meta content="<?php titulo($_GET['StrNombre'])?> online gratis en hd, ver <?php titulo($_GET['StrNombre'])?> gratis online" name="keywords"/>
	<meta content="all, index, follow" name="robots"/>
	<META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE">
	<link rel="stylesheet" type="text/css" href="../../css/estilos.css"/>
	<link rel="shourtcut icon" type="image/x-icon" href="https://animere.net/img/favicon.png"/>
	<link rel="stylesheet" type="text/css" href="../../css/bootstrap.css"/>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous"/>
	<link rel="stylesheet" href="../../css/stars.css">
	<link href="https://vjs.zencdn.net/7.5.4/video-js.css" rel="stylesheet">
	<link rel="stylesheet" href="../../css/videojs-mobile-ui.css">

	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-133390883-2"></script>
	<script type="text/javascript" src="https://animere.net/js/swfobject-2.2.min.js"></script>
	<script type="text/javascript" src="http://www.java.com/js/dtjava.js"></script>
	<script src="https://animere.net/js/are-cookie.js"></script>
	<script>var ec1 = new evercookie();</script>
	<script>
	  window.dataLayer = window.dataLayer || [];
		  function gtag(){dataLayer.push(arguments);}
		  gtag('js', new Date());

		  gtag('config', 'UA-133390883-2');
		</script>

		<link rel="manifest" href="/manifest.json" />
		<script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>
	<script>
		var OneSignal = window.OneSignal || [];
		OneSignal.push(function() {
			OneSignal.init({
				appId: "744aebc2-8509-4ed9-8e2e-025fd206f36e",
			});
		});
	</script>
		<style>
		button:focus {
			outline: 0px auto -webkit-focus-ring-color !important;
		}
		.vjs-big-play-button .vjs-icon-placeholder:before{
			content: " " !important;
		}
		.video-js {
			font-size: 13px;
			color: #ebcc43;
			}
			.vjs-default-skin .vjs-big-play-button {
			font-size: 3em;

			line-height: 1.5em;
			height: 1.5em;
			width: 3em;
			border: 0 solid #ebcc43;
			border-radius: 0.3em;
			left: 50%;
			top: 50%;
			margin-left: -1.5em;
			margin-top: -0.75em;
			}
			.video-js .vjs-control-bar {
				background: linear-gradient(rgba(0,0,0,0),rgba(0,0,0,.6),rgba(0,0,0,.7)) !important;
				border: 0;
			}
			.video-js .vjs-current-time {
				display: block !important;
				font-weight: bold !important;
			}
			.vjs-time-divider {
				display: block !important;
			}
			.video-js .vjs-duration {
				display: block !important;
				font-weight: bold !important;
			}
			.video-js .vjs-remaining-time {
				display:none !important;
			}
			.video-js .vjs-big-play-button {
				background-image: url(https://animere.net/img/play_are.png) !important;
				background-position: center !important;
				background-repeat: no-repeat !important;
				transition: all 0.2s;
				background-color: rgba(0,0,0,0) !important;
			}
			.vjs-default-skin .vjs-big-play-button {
				height: 2.8em;
				border: 0 solid #ebcc43;
				border-radius: 0;
			}
			.video-js:hover .vjs-big-play-button {
				background-image: url(https://animere.net/img/play_are.png) !important;
				background-position: center !important;
				background-repeat: no-repeat !important;
				background-color: rgba(0,0,0,0) !important;
				transition: all 0.2s !important;
				transform: scale(0.9);
				
			}
			.video-js .vjs-control-bar,
			.video-js .vjs-big-play-button,
			.video-js .vjs-menu-button .vjs-menu-content {
			background-color: #111;
			background-color: rgba(17, 17, 17, 0.7);
			}
			.video-js .vjs-control-bar,
			.video-js .vjs-big-play-button:hover,
			.video-js .vjs-menu-button .vjs-menu-content {
			background-color: #111;
			background-color: rgba(10, 10, 10, 0.79);
			}
			.video-js .vjs-slider {
			background-color: #111;
			background-color: rgba(10, 10, 10, 0.5);
			}
			.video-js .vjs-volume-level,
			.video-js .vjs-play-progress,
			.video-js .vjs-slider-bar {
			background: #ebcc43;
			}
			.video-js .vjs-load-progress {
			background: #8501ff87 !important;
			background: rgba(10, 10, 10, 0.5);
			}
			.video-js .vjs-load-progress div {
			background: #e5e5e5;
			background: rgba(101, 101, 101, 0.75);
			}
	
	</style>
	<!-- <style>
			.plyr--full-ui input[type=range] {
				color: #ebcc43 !important;
			}

			.plyr--video .plyr__control.plyr__tab-focus, .plyr--video .plyr__control:hover, .plyr--video .plyr__control[aria-expanded=true] {
				background: #ebcc43 !important;
			}

			.plyr__control.plyr__tab-focus {
				box-shadow: 0 0 0 5px #ebcc4363 !important;
			}
	
			.plyr__control--overlaid {
				background: #ebcc43 !important;
			}
	</style> -->
</head>
<body>
<div style="position:fixed;height:100%;top:0;left:0;width:100%;z-index:-100;">
	<div id="stars"></div>
	<div id="stars3"></div>
</div>
<div id="fb-root"></div>
	<script async defer src="https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v3.2"></script>
	<?php include "navbar-ver.php";?>

		<div class="container">
			<div class="row justify-content-md-center">
				<?php
				$id = $_GET['Id'];					
				$nombre = $_GET['StrNombre'];
					try{
						include "bin/core/conexion.php";
						$sql="SELECT capitulos.Id,capitulos.StrNombre,capitulos.StrOpcion1,capitulos.StrImagen,capitulos.IdRel FROM capitulos INNER JOIN series ON capitulos.Idrel = series.Id WHERE capitulos.id='".$id."'";
						$resultado= $base->prepare($sql);
						$resultado->execute(array());
						if($crow=$resultado->fetch(PDO::FETCH_ASSOC)){
							$cookie_name = $crow['Id'];
									$visto = "";
									if(!isset($_COOKIE[$cookie_name])) {
										$visto = "";
									} else {
										$visto .= "<div class='badge badge-pills badge-are-c'>Visto <i class='fas fa-check'></i></div>";
									}
							echo"<h3 class='tituloh2' style='color:#ebcc34;'>".$crow['StrNombre']." ".$visto."</h3>";
						}
						}catch(Exception $e){
							echo "Fallo en la base datos" . $e->getMessage();
						}
						
					?>
			<div class="container">
				<div style="padding-left:15px;padding-right:15px;" class="row justify-content-md-center">
					<?php 
						try {
							include "bin/core/conexion.php";
							$id = $_GET['Id'];					
							$nombre = $_GET['StrNombre'];

							//Obtener información del capítulo actual
							$sql="SELECT idRel, nCap FROM capitulos WHERE Id='".$id."'";
							$resultado= $base->prepare($sql);
							$resultado->execute(array());
							$capData=$resultado->fetch(PDO::FETCH_ASSOC);
							$capIdRel = $capData['idRel'];
							$capNCap = $capData['nCap'];
							
							//Capitulo anterior
							$sql="SELECT capitulos.Id,capitulos.StrOpcion1,capitulos.StrImagen,capitulos.IdRel,series.StrNombre FROM capitulos INNER JOIN series ON capitulos.Idrel = series.Id WHERE IdRel = ".$capIdRel." AND nCap = " . (string)($capNCap - 1);
							$resultado= $base->prepare($sql);
							$resultado->execute(array());
							$crow=$resultado->fetch(PDO::FETCH_ASSOC);

							if($capNCap == 1){
								echo"<div style='border-radius: 5px 0px 0px 0px;
								-moz-border-radius: 5px 0px 0px 0px;
								-webkit-border-radius: 5px 0px 0px 0px;
								' class='btn btn-primary col-lg-1 col-md-3 col-sm-3 col-3 btn-block'><span class=' pull-right fas fa-chevron-left' disabled></span></div>";
							}else{
								echo"<div style='border-radius: 5px 0px 0px 0px;
								-moz-border-radius: 5px 0px 0px 0px;
								-webkit-border-radius: 5px 0px 0px 0px;
								' class='btn-primary col-lg-1 col-md-3 col-sm-3 col-3 btn-block'><a class='btn btn-block' href='../".url($crow['Id'],$crow['StrNombre'])."'>
								<span class=' pull-right fas fa-chevron-left'></span></a></div>";
							}
							
							//Lista de Capitulos
							$cod = $_GET['Id'];				
							$nombre = $_GET['StrNombre'];

							include "bin/core/conexion.php";
							$sql="SELECT capitulos.Id,capitulos.StrOpcion1,capitulos.StrImagen,capitulos.IdRel,series.StrNombre FROM capitulos INNER JOIN series ON capitulos.Idrel = series.Id WHERE capitulos.id='".$id."'";
							$resultado= $base->query($sql);
							$resultado->execute(array());
							if($crow=$resultado->fetch(PDO::FETCH_ASSOC)){
								echo"<div style='padding-left:0;padding-right:0;border-left: solid 1px #290944;border-right:solid 1px #290944;' class='col-lg-10 col-md-6 col-sm-6 col-6'><a class='rounded-0 btn btn-primary btn-block' href='../../serie/".url($crow['IdRel'],$crow['StrNombre'])."'<span class='glyphicon glyphicon-th-list'></span>Lista de Capitulos</a></div>";
							}

							//Capitulo siguiente
							$sql = "SELECT capitulos.Id,capitulos.StrOpcion1,capitulos.StrImagen,capitulos.IdRel,series.StrNombre FROM capitulos INNER JOIN series ON capitulos.Idrel = series.Id WHERE IdRel = $capIdRel AND nCap = " . (string)($capNCap + 1);
							$resultado= $base->prepare($sql);
							$resultado->execute(array());
							$crow = $resultado->fetch(PDO::FETCH_ASSOC);

							if($resultado->rowCount() > 0){
								echo"<div style='border-radius: 0px 5px 0px 0px;
								-moz-border-radius: 0px 5px 5px 0px;
								-webkit-border-radius: 0px 5px 0px 0px;
								' class='col-lg-1 col-md-3 col-sm-3 col-3 btn-primary btn-block'><a class='btn btn-block' href='../".url($crow['Id'],$crow['StrNombre'])."'><span class=' pull-right fas fa-chevron-right'></span></a></div>";
							}else{
								echo"<div style='border-radius: 0px 5px 0px 0px;
								-moz-border-radius: 0px 5px 5px 0px;
								-webkit-border-radius: 0px 5px 0px 0px;
								' class='col-lg-1 col-md-3 col-sm-3 col-3 btn btn-primary btn-block'><span class=' pull-right fas fa-chevron-right' disabled></span></div>";
							}

						}catch(Exception $e) {
							echo "Fallo en la base de datos" . $e->getMessage();
						}
					?>
				</div>
				<!-- Zona del reproductor -->
			<div class="col-lg-12">
				<?php 
					$id = $_GET['Id'];					
					$nombre = $_GET['StrNombre'];
					try{
						include "bin/core/conexion.php";
						$sql1="SELECT capitulos.Id,capitulos.StrNombre,capitulos.HLS,capitulos.StrOpcion1,capitulos.StrOpcion2,capitulos.StrOpcion3,capitulos.StrOpcion4,capitulos.StrOpcion5,capitulos.StrOpcion6,capitulos.StrOpcion7,
						capitulos.StrOpcionD,capitulos.StrOpcionD2,capitulos.StrImagen,capitulos.StrImagenFb,capitulos.IdRel FROM capitulos INNER JOIN series ON capitulos.Idrel = series.Id WHERE capitulos.id='".$id."'";
						$resultado= $base->prepare($sql1);
						$resultado->execute(array());
						
						if($crow=$resultado->fetch(PDO::FETCH_ASSOC) and $crow['HLS'] == null ){ /*and $crow['StrOpcion0'] == null and $crow['StrOpcion01'] == null*/
							$v1 = $crow['StrOpcion1'];
							$v2 = $crow['StrOpcion2'];
							$v3 = $crow['StrOpcion3'];
							$v4 = $crow['StrOpcion4'];
							$v5 = $crow['StrOpcion5'];
							$v6 = $crow['StrOpcion6'];
							$v7 = $crow['StrOpcion7'];

							include 'ver/control.php';
							//Este se ejecuta si la opcion HLS es nula
							include 'ver/init.php';

							//Este se ejecuta si HLS esta disponible
							}else{
								$v1 = $crow['StrOpcion1'];
								$v2 = $crow['StrOpcion2'];
								$v3 = $crow['StrOpcion3'];
								$v4 = $crow['StrOpcion4'];
								$v5 = $crow['StrOpcion5'];
								$v6 = $crow['StrOpcion6'];
								$v7 = $crow['StrOpcion7'];

								include 'ver/control.php';
								include 'ver/hls_rv.php';
							}

						}catch(Exception $e){
							echo "Fallo en la base datos" . $e->getMessage();
						}
					
					
					?>
					</div>
				</div>
			</div>
		</div>
		<div id="btn_reportar" class="container">
				<div class="btn btn-primary col-lg-12 col-md-12 col-sm-12 col-12 btn-block rounded-0">Reportar Capitulo</div>
		</div>
		<div id="reportar" class="container" style="display:none;">
				<?php include 'report_form.php';?>
		</div>
		<!-- <div class="container mt-2" style="background-color:#333; color:#ebcc43;">
			<div class="row p-2">
				
			</div>
		</div> -->
	<div class="container" style="padding:15px;">
		<div id="M439140ScriptRootC383461">
			<div id="M439140PreloadC383461">
				Loading...    </div>
				<script>
						(function(){
					var D=new Date(),d=document,b='body',ce='createElement',ac='appendChild',st='style',ds='display',n='none',gi='getElementById',lp=d.location.protocol,wp=lp.indexOf('http')==0?lp:'https:';
					var i=d[ce]('iframe');i[st][ds]=n;d[gi]("M439140ScriptRootC383461")[ac](i);try{var iw=i.contentWindow.document;iw.open();iw.writeln("<ht"+"ml><bo"+"dy></bo"+"dy></ht"+"ml>");iw.close();var c=iw[b];}
					catch(e){var iw=d;var c=d[gi]("M439140ScriptRootC383461");}var dv=iw[ce]('div');dv.id="MG_ID";dv[st][ds]=n;dv.innerHTML=383461;c[ac](dv);
					var s=iw[ce]('script');s.async='async';s.defer='defer';s.charset='utf-8';s.src=wp+"//jsc.adskeeper.co.uk/a/n/animere.net.383461.js?t="+D.getYear()+D.getMonth()+D.getUTCDate()+D.getUTCHours();c[ac](s);})();
			</script>
		</div>
		<!-- Composite End -->
		<!-- Composite Start -->
		<div id="M439140ScriptRootC383483">
				<script>
						(function(){
					var D=new Date(),d=document,b='body',ce='createElement',ac='appendChild',st='style',ds='display',n='none',gi='getElementById',lp=d.location.protocol,wp=lp.indexOf('http')==0?lp:'https:';
					var i=d[ce]('iframe');i[st][ds]=n;d[gi]("M439140ScriptRootC383483")[ac](i);try{var iw=i.contentWindow.document;iw.open();iw.writeln("<ht"+"ml><bo"+"dy></bo"+"dy></ht"+"ml>");iw.close();var c=iw[b];}
					catch(e){var iw=d;var c=d[gi]("M439140ScriptRootC383483");}var dv=iw[ce]('div');dv.id="MG_ID";dv[st][ds]=n;dv.innerHTML=383483;c[ac](dv);
					var s=iw[ce]('script');s.async='async';s.defer='defer';s.charset='utf-8';s.src=wp+"//jsc.adskeeper.co.uk/a/n/animere.net.383483.js?t="+D.getYear()+D.getMonth()+D.getUTCDate()+D.getUTCHours();c[ac](s);})();
			</script>
			</div>
		<!-- Composite End -->
	</div>
		
	<div style="padding-top:2em;" class="container">
		<div class="row">
				<?php
							try {
								$id = $_GET['Id'];
								$nombre = $_GET['StrNombre'];
								include 'bin/core/conexion.php';

								$sql="SELECT capitulos.Id,capitulos.HLS,capitulos.StrNombre,capitulos.StrOpcion1,
								capitulos.StrOpcion2,capitulos.StrOpcion3,capitulos.StrOpcion4,capitulos.StrOpcion5,capitulos.StrOpcion6,capitulos.StrOpcion7,
								capitulos.StrOpcionD,capitulos.StrImagen,capitulos.IdRel FROM capitulos INNER JOIN series ON capitulos.Idrel = series.Id WHERE capitulos.id='".$id."'";
								$resultado = $base->query($sql);
								if ($crow=$resultado->fetch(PDO::FETCH_ASSOC)) {
												echo"
												<div data-colorscheme='light' style='background-color:#ffeb97;margin-left:15px;margin-right:15px;' class='rounded fb-comments' data-href='https://animere.net/ver/".url($crow['Id'],$crow['StrNombre'])."' data-numposts='10' width='100%'></div>
													";
								
								}

							}catch(Exception $e){
								echo "Error en linea: " . $e->getMessage();
							}
						?>
		</div>
	</div>
	<!--<div class="konata1"><img style="position:fixed;bottom:0;right:0px;max-width:20%;" data-toggle="tooltip" data-placement="top" title="Dejame! '-.- ponte a ver tus monas chinas mejor." src="/img/konata.png" alt=""></div>-->
	<?php include "footer.php";?>
	
	<script type="text/javascript" src="https://animere.net/js/jquery.js"></script>
	<script type="text/javascript" src="https://animere.net/js/bootstrap.js"></script>
	<script type="text/javascript" src="https://animere.net/js/ajax.js"></script>
	<script src='https://cdnjs.cloudflare.com/ajax/libs/video.js/6.13.0/video.min.js'></script>
    <script src="../../js/videojs-hlsjs-plugin.js"></script>
	<script src="https://animere.net/js/videojs-mobile-ui.min.js"></script>
	<script> 

			var name = <?php echo json_encode($crow["Id"]); ?>;
			ec1.set(name, "1"); 
	</script>
	<script>
			$('.toast').toast('hide')
		</script>
	<!-- <script>
    	document.addEventListener('DOMContentLoaded', () => {
		const source = <?php echo json_encode($crow["HLS"]); ?>;
		const video = document.querySelector('video');
		
		// For more options see: https://github.com/sampotts/plyr/#options
		// captions.update is required for captions to work with hls.js
		const player = new Plyr(video, {captions: {active: false, update: true, language: 'es'},
										seekTime: 10,
										clickToPlay: true,
										invertTime: true,
										displayDuration: true,
										tooltips: { controls: false, seek: true },
										previewThumbnails:{ enabled: true, src: '<?php echo json_encode($imagenPortada); ?>' },
										controls:['play-large','rewind','fast-forward' , 'play', 'progress', 'current-time','duration', 'mute', 'volume', 'pip', 'fullscreen']
									}
								);
		
		if (!Hls.isSupported()) {
			video.src = source;
		} else {
			// For more Hls.js options, see https://github.com/dailymotion/hls.js
			const hls = new Hls();
			hls.loadSource(source);
			hls.attachMedia(video);
			window.hls = hls;
		}
		
		// Expose player so it can be used from the console
		window.player = player;
	});
	</script> -->
	<script>
		var options = {
				html5: {
					hlsjsConfig: {
					// Put your hls.js config here
					}
				}
			};

			// setup beforeinitialize hook
			videojs.Html5Hlsjs.addHook('beforeinitialize', (videojsPlayer, hlsjsInstance) => {
				// here you can interact with hls.js instance and/or video.js playback is initialized
			});

		var player_hls = videojs('are_ren', options);
		player_hls.mobileUi();
	</script>
	<script>	
		$(document).ready(function(){
			var v1 = <?php echo json_encode($crow["StrOpcion1"]); ?>,
				v2 = <?php echo json_encode($crow["StrOpcion2"]); ?>,
				v3 = <?php echo json_encode($crow["StrOpcion3"]); ?>,
				v4 = <?php echo json_encode($crow["StrOpcion4"]); ?>,
				v5 = <?php echo json_encode($crow["StrOpcion5"]); ?>,
				v6 = <?php echo json_encode($crow["StrOpcion6"]); ?>,
				v7 = <?php echo json_encode($crow["StrOpcion7"]); ?>;
			$("a[id=pills-o1-tab]").ready(function(){
				$("div[id=pills-o1]").html(v1);
			});
			$("a[id=pills-o1-tab]").click(function(){
				$("div[id=pills-o1]").html(v1);
			});
			$("a[id=pills-o2-tab]").click(function(){
				$("div[id=pills-o1]").html(v2);
			});
			$("a[id=pills-o3-tab]").click(function(){
				$("div[id=pills-o1]").html(v3);
			});
			$("a[id=pills-o4-tab]").click(function(){
				$("div[id=pills-o1]").html(v4);
			});
			$("a[id=pills-o6-tab]").click(function(){
				$("div[id=pills-o1]").html(v5);
			});
			$("a[id=pills-o7-tab]").click(function(){
				$("div[id=pills-o1]").html(v6);
			});
			$("a[id=pills-o8-tab]").click(function(){
				$("div[id=pills-o1]").html(v7);
			});

			$("#btn_reportar").click(function(){
				$("#reportar").slideToggle();
			});
			
		});

	</script>
</body>
</html>