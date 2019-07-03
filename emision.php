<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>En Emisión | AnimeRE</title>
	<link rel="shourtcut icon" type="image/x-icon" href="https://animere.net/img/favicon.png">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	<script type="text/javascript" src="js/dpdw.js"></script>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script type="text/javascript" src="js/jquery.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	<style>
			.morecontent span {
			    display: none;
			}
			.morelink {
			    display: block;
			}
			.anime-card{
				background:rgb(34, 6, 45) !important;
			}
	</style>
	<script>
		$(document).ready(function() {
		    // Configure/customize these variables.
		    var showChar = 70;  // How many characters are shown by default
		    var ellipsestext = "...";
		    var moretext = "Ver Mas...>";
		    var lesstext = "Ver Menos...";
		    

		    $('.more').each(function() {
		        var content = $(this).html();
		 
		        if(content.length > showChar) {
		 
		            var c = content.substr(0, showChar);
		            var h = content.substr(showChar, content.length - showChar);
		 
		            var html = c + '<span class="moreellipses">' + ellipsestext+ '&nbsp;</span><span class="morecontent"><span>' + h + '</span>&nbsp;&nbsp;<a href="" class="morelink">' + moretext + '</a></span>';
		 
		            $(this).html(html);
		        }
		 
		    });
		 
		    $(".morelink").click(function(){
		        if($(this).hasClass("less")) {
		            $(this).removeClass("less");
		            $(this).html(moretext);
		        } else {
		            $(this).addClass("less");
		            $(this).html(lesstext);
		        }
		        $(this).parent().prev().toggle();
		        $(this).prev().toggle();
		        return false;
		    });
		});
	</script>
</head>
<body>
<?php include'navbar.php'; ?>
<div class="container" style="padding:15px;">
<style>#M439140ScriptRootC383475 {min-height: 300px;}</style>
<!-- Composite Start -->
<div id="M439140ScriptRootC383475">
        <div id="M439140PreloadC383475">
        Loading...    </div>
        <script>
                (function(){
            var D=new Date(),d=document,b='body',ce='createElement',ac='appendChild',st='style',ds='display',n='none',gi='getElementById',lp=d.location.protocol,wp=lp.indexOf('http')==0?lp:'https:';
            var i=d[ce]('iframe');i[st][ds]=n;d[gi]("M439140ScriptRootC383475")[ac](i);try{var iw=i.contentWindow.document;iw.open();iw.writeln("<ht"+"ml><bo"+"dy></bo"+"dy></ht"+"ml>");iw.close();var c=iw[b];}
            catch(e){var iw=d;var c=d[gi]("M439140ScriptRootC383475");}var dv=iw[ce]('div');dv.id="MG_ID";dv[st][ds]=n;dv.innerHTML=383475;c[ac](dv);
            var s=iw[ce]('script');s.async='async';s.defer='defer';s.charset='utf-8';s.src=wp+"//jsc.adskeeper.co.uk/a/n/animere.net.383475.js?t="+D.getYear()+D.getMonth()+D.getUTCDate()+D.getUTCHours();c[ac](s);})();
    </script>
    </div>
</div>
	<div class="container mt-2">
	<h1 syle="justify-content:center;" class="bdr-title title" align="center"><i class="far fa-calendar-alt"></i> Animes en Emisión</h1>
		<div class="row mt-2" style="background-color:#ebcc43;">
			<div style="width:100% !important;" class="accordion" id="accordionExample">
			  <div class="card" >
			    <div class="card-header" id="headingOne">
			      <h2 class="mb-0">
			        <button class="btn btn-link text-dark" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
			          Sabado
			        </button>
			      </h2>
			    </div>
					
			    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
			      <div style="display:flex;" class="card-body row">
					<?php
						include "bin/core/conexion.php";
						include "bin/bin/funciones.php";

						$sql="SELECT * FROM series WHERE DiaEmision = 1 AND estado1 = 'En Emision'";
						$resultado = $base->query($sql);
						while($crow=$resultado->fetch(PDO::FETCH_ASSOC)){
							if ($crow['DiaEmision'] == 1) {
								echo'
							      	<div class="d-flex flex-row flex-lg-row flex-md-row flex-sm-row mb-4 border-bottom">
												<div class="pl-4 pr-4 flex-fill">
													<figure class="img_emision">
															<img src="'. $crow['StrImagen'] .'" alt="">
													</figure>
												</div>
												<div class="p-2">
													<a class="text-decoration-none" href="../../serie/'.url($crow["Id"],$crow["StrNombre"]).'"><div><h3>' . $crow['StrNombre'] . '</h3><p class="emision_sinopsis p-2">' . $crow['StrSinopsis'] . '</p></div></a>
												</div>
											</div>
							';
							
							}else{
								echo"No hay series en emision este día.";
							}
						}
					?>

						
					
			      </div>
			    </div>
			  </div>
			  <div class="card">
			    <div class="card-header" id="headingTwo">
			      <h2 class="mb-0">
			        <button class="text-dark btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
			          Domingo
			        </button>
			      </h2>
			    </div>
			    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
			      <div style="display:flex;" class="card-body row">
			       	<?php
						include "bin/core/conexion.php";

						$sql="SELECT * FROM series WHERE DiaEmision = 2 AND estado1 = 'En Emision'";
						$resultado = $base->query($sql);
						while($crow=$resultado->fetch(PDO::FETCH_ASSOC)){
							if ($crow['DiaEmision'] == 2) {
								echo'

								<div class="d-flex flex-row flex-lg-row flex-md-row flex-sm-row mb-4 border-bottom">
								<div class="pl-4 pr-4 flex-fill">
									<figure class="img_emision">
											<img src="'. $crow['StrImagen'] .'" alt="">
									</figure>
								</div>
								<div class="p-2">
									<a class="text-decoration-none" href="../../serie/'.url($crow["Id"],$crow["StrNombre"]).'"><div><h3>' . $crow['StrNombre'] . '</h3><p class="emision_sinopsis p-2">' . $crow['StrSinopsis'] . '</p></div></a>
								</div>
							</div>

							';
							}else{
								echo"No hay series en emision este día.";
							}
						}
					?>
			       </div>
			    </div>
			  </div>
			  <div class="card">
			    <div class="card-header" id="headingThree">
			      <h2 class="mb-0">
			        <button class="text-dark btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
			          Lunes
			        </button>
			      </h2>
			    </div>
			    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
			      <div style="display:flex;" class="card-body row">
			      		<?php
						include "bin/core/conexion.php";

						$sql="SELECT * FROM series WHERE DiaEmision = 3 AND estado1 = 'En Emision'";
						$resultado = $base->query($sql);
						while($crow=$resultado->fetch(PDO::FETCH_ASSOC)){
							if ($crow['DiaEmision'] == 3) {
								echo'

								<div class="d-flex flex-row flex-lg-row flex-md-row flex-sm-row mb-4 border-bottom">
								<div class="pl-4 pr-4 flex-fill">
									<figure class="img_emision">
											<img src="'. $crow['StrImagen'] .'" alt="">
									</figure>
								</div>
								<div class="p-2">
									<a class="text-decoration-none" href="../../serie/'.url($crow["Id"],$crow["StrNombre"]).'"><div><h3>' . $crow['StrNombre'] . '</h3><p class="emision_sinopsis p-2">' . $crow['StrSinopsis'] . '</p></div></a>
								</div>
							</div>

							';
							}else{
								echo"No hay series en emision este día.";
							}
						}
					?>
			       </div>
			    </div>
			  </div>
			  <div class="card">
			    <div class="card-header" id="headingFour">
			      <h2 class="mb-0">
			        <button class="text-dark btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
			          Martes
			        </button>
			      </h2>
			    </div>
			    <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
			      <div style="display:flex;" class="card-body row">
			      	<?php
						include "bin/core/conexion.php";

						$sql="SELECT * FROM series WHERE DiaEmision = 4 AND estado1 = 'En Emision'";
						$resultado = $base->query($sql);
						while($crow=$resultado->fetch(PDO::FETCH_ASSOC)){
							if ($crow['DiaEmision'] == 4) {
								echo'

								<div class="d-flex flex-row flex-lg-row flex-md-row flex-sm-row mb-4 border-bottom">
								<div class="pl-4 pr-4 flex-fill">
									<figure class="img_emision">
											<img src="'. $crow['StrImagen'] .'" alt="">
									</figure>
								</div>
								<div class="p-2">
									<a class="text-decoration-none" href="../../serie/'.url($crow["Id"],$crow["StrNombre"]).'"><div><h3>' . $crow['StrNombre'] . '</h3><p class="emision_sinopsis p-2">' . $crow['StrSinopsis'] . '</p></div></a>
								</div>
							</div>

							';
							}else{
								echo"No hay series en emision este día.";
							}
						}
					?>
			      </div>
			    </div>
			  </div>
			  <div class="card">
			    <div class="card-header" id="headingFive">
			      <h2 class="mb-0">
			        <button class="text-dark btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
			          Miercoles
			        </button>
			      </h2>
			    </div>
			    <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
			      <div style="display:flex;" class="card-body row">
			      	<?php
						include "bin/core/conexion.php";

						$sql="SELECT * FROM series WHERE DiaEmision = 5 AND estado1 = 'En Emision'";
						$resultado = $base->query($sql);
						while($crow=$resultado->fetch(PDO::FETCH_ASSOC)){
							if ($crow['DiaEmision'] == 5) {
								echo'

								<div class="d-flex flex-row flex-lg-row flex-md-row flex-sm-row mb-4 border-bottom">
								<div class="pl-4 pr-4 flex-fill">
									<figure class="img_emision">
											<img src="'. $crow['StrImagen'] .'" alt="">
									</figure>
								</div>
								<div class="p-2">
									<a class="text-decoration-none" href="../../serie/'.url($crow["Id"],$crow["StrNombre"]).'"><div><h3>' . $crow['StrNombre'] . '</h3><p class="emision_sinopsis p-2">' . $crow['StrSinopsis'] . '</p></div></a>
								</div>
							</div>

							';
							}else{
								echo"No hay series en emision este día.";
							}
						}
					?>
			      </div>
			    </div>
			  </div>
			  <div class="card">
			    <div class="card-header" id="headingSix">
			      <h2 class="mb-0">
			        <button class="text-dark btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
			          Jueves
			        </button>
			      </h2>
			    </div>
			    <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordionExample">
			      <div style="display:flex;" class="card-body row">
			      	<?php
						include "bin/core/conexion.php";

						$sql="SELECT * FROM series WHERE DiaEmision = 6 AND estado1 = 'En Emision'";
						$resultado = $base->query($sql);
						while($crow=$resultado->fetch(PDO::FETCH_ASSOC)){
							if ($crow['DiaEmision'] == 6) {
								echo'

								<div class="d-flex flex-row flex-lg-row flex-md-row flex-sm-row mb-4 border-bottom">
								<div class="pl-4 pr-4 flex-fill">
									<figure class="img_emision">
											<img src="'. $crow['StrImagen'] .'" alt="">
									</figure>
								</div>
								<div class="p-2">
									<a class="text-decoration-none" href="../../serie/'.url($crow["Id"],$crow["StrNombre"]).'"><div><h3>' . $crow['StrNombre'] . '</h3><p class="emision_sinopsis p-2">' . $crow['StrSinopsis'] . '</p></div></a>
								</div>
							</div>
							';
							}else{
								echo"No hay series en emision este día.";
							}
						}
					?>
			      </div>
			    </div>
			  </div>
			  <div class="card">
			    <div class="card-header" id="headingSeven">
			      <h2 class="mb-0">
			        <button class="text-dark btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
			          Viernes
			        </button>
			      </h2>
			    </div>
			    <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-parent="#accordionExample">
			      <div style="display:flex;" class="card-body row">
			      	<?php
						include "bin/core/conexion.php";

						$sql="SELECT * FROM series WHERE DiaEmision = 7 AND estado1 = 'En Emision'";
						$resultado = $base->query($sql);
						while($crow=$resultado->fetch(PDO::FETCH_ASSOC)){
							if ($crow['DiaEmision'] == 7) {
								echo'

								<div class="d-flex flex-row flex-lg-row flex-md-row flex-sm-row mb-4 border-bottom">
								<div class="pl-4 pr-4 flex-fill">
									<figure class="img_emision">
											<img src="'. $crow['StrImagen'] .'" alt="">
									</figure>
								</div>
								<div class="p-2">
									<a class="text-decoration-none" href="../../serie/'.url($crow["Id"],$crow["StrNombre"]).'"><div><h3>' . $crow['StrNombre'] . '</h3><p class="emision_sinopsis p-2">' . $crow['StrSinopsis'] . '</p></div></a>
								</div>
							</div>

							';
							}else{
								echo"No hay series en emision este día.";
							}
						}
					?>
			      </div>
			    </div>
			  </div>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
	<script type="text/javascript" src="js/ajax.js"></script>
</body>
</html>