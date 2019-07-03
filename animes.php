<?php
define("ROW_PER_PAGE",20);
require_once('bin/bin/funciones.php');
require_once('bin/core/conexion.php');
?>
<html>
<head>
<meta charset="UTF-8">
	<title>Series | AnimeRE</title>
	<link rel="shourtcut icon" type="image/x-icon" href="https://animere.net/img/favicon.png">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	<script type="text/javascript" src="js/dpdw.js"></script>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script type="text/javascript" src="js/jquery.js"></script>
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
    <style>
        body{font-family:arial;letter-spacing:1px;line-height:20px;}
        .tbl-qa{width: 100%;font-size:0.9em;background-color: #f5f5f5;}
        .tbl-qa th.table-header {padding: 5px;text-align: left;padding:10px;}
        .tbl-qa .table-row td {padding:10px;background-color: #FDFDFD;vertical-align:top;}
        .button_link {color:#FFF;text-decoration:none; background-color:#428a8e;padding:10px;}
        #keyword{border: #CCC 1px solid; border-radius: 4px; padding: 7px;background:url("demo-search-icon.png") no-repeat center right 7px;}
        .btn-page{margin-right:10px;padding:5px 10px; border: #ebcc43 1px solid; background:#222;color:#ebcc43; border-radius:4px;cursor:pointer;}
        .btn-page:hover{background:#444;}
        .btn-page.current{background:#ebcc43;color:#222;}
    </style>
</head>
<body>
    <?php include 'navbar-ver.php';?>
<?php
	$cat = $_POST['cat'];
	if(!empty($_POST['catS'])){
		$cat = $_POST['cat'];
	}
	$search_keyword = '';
	if(!empty($_POST['search']['keyword'])) {
		$search_keyword = $_POST['search']['keyword'];
	}
	if($cat == ''){
		$sql = 'SELECT * FROM series ORDER BY StrNombre ASC ';
	}else{
		$sql = 'SELECT * FROM series WHERE series.A1="'.$cat.'" ORDER BY StrNombre ASC ';
	}
	
	/* Pagination Code starts */
	$per_page_html = '';
	$page = 1;
	$start=0;
	if(!empty($_POST["page"])) {
		$page = $_POST["page"];
		$start=($page-1) * ROW_PER_PAGE;
	}
	$limit=" limit " . $start . "," . ROW_PER_PAGE;
	$pagination_statement = $base->prepare($sql);
	$pagination_statement->bindValue(':keyword', '%' . $search_keyword . '%', PDO::PARAM_STR);
	$pagination_statement->execute();

	$row_count = $pagination_statement->rowCount();
	if(!empty($row_count)){
		$per_page_html .= "<div style='text-align:center;margin:20px 0px;'>";
		$page_count=ceil($row_count/ROW_PER_PAGE);
		if($page_count>1) {
			for($i=1;$i<=$page_count;$i++){
				if($i==$page){
					$per_page_html .= '<input type="submit" name="page" value="' . $i . '" class="btn-page current" />';
				} else {
					$per_page_html .= '<input type="submit" name="page" value="' . $i . '" class="btn-page" />';
				}
			}
		}
		$per_page_html .= "</div>";
	}
	
	$query = $sql.$limit;
	$pdo_statement = $base->prepare($query);
	$pdo_statement->bindValue(':keyword', '%' . $search_keyword . '%', PDO::PARAM_STR);
	$pdo_statement->execute();
	$result = $pdo_statement->fetchAll();
?>
<div class="container">
<form role="form" method="POST" action="">
								<?php 
									if($_POST['cat'] == ''){
										$catInf = "Todos";
									}else{
										$catInf = $_POST['cat'];
									}
									try{
										$sql1="SELECT * FROM categorias";
										$resultado1 = $base->prepare($sql1);
										$resultado1->execute(array());
										echo"<div class='space'><select class='space form-control' type='text' name='cat'><option value='0'>Género: ".$catInf."</option>";
										while($crow1=$resultado1->fetch(PDO::FETCH_ASSOC)){
											echo"<option value='".$crow1['Nombre']."'>".$crow1['Nombre']."</option>";
										}
										echo"</select></div>";
									}catch (Exception $e){
										echo"Fallo en la base de datos ". $e->getLine();
									}
								?>
								<button name="catS" type="submit" class="btn btn-success">Filtrar</button>
			</form>
</div>
<form name='frmSearch' action='' method='post'>

<div class="container">
	    <div class="row title justify-content-center"><h3 class="mt-2"><i class="fas fa-search"></i> Explorar Series</h3></div>
		    <div class="anime-grid row justify-content-sm-center">
				<?php
					if(!empty($result)) { 
						foreach($result as $crow) {
					?>
					<div class="col-are-3 anime-card m-1">
						<div class="card">
							<a href="../../serie/<?php echo url($crow["Id"],$crow["StrNombre"]);?>">
								<p style="position:absolute;float:right;" class="mt-2 ml-2 badge badge-pills badge-are"><?php echo $tipoA ;?></p>
								<p class="a_description more"><?php echo $crow['StrSinopsis'];?></p>
								<div class="div_img_s"><img src="<?php echo $crow['StrImagen'];?>" class="card-img-top rounded-0 lazyload" alt="..."></div>
								<div class="are_info_s">
									<h5 class="are_s_title"><?php echo $crow['StrNombre']; ?></h5>
									<p class="badge badge-pills badge-are text-light mb-0">Estreno: <?php echo $crow['StrFechaEstreno']; ?></p>
									<p class="badge badge-pills badge-are text-light mb-0"><?php echo $crow['estado1']; ?></p>
								</div>
								</a>
							</div>
						</div>
					<?php
				}
			}
		?>
		<?php echo $per_page_html; ?>
		</div>
    </div>
</div>
</form>
<div class="container-fluid" style="background-color:#ebcc43">
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
</div>
<footer class="footer">
		<div class="container">
			<h5>Todos derechos reservados <span class="nm-footer">AnimeRE 2019</span>.</h5>
		</div>
	</footer>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script type="text/javascript" src="https://code.jquery.com/jquery-latest.js"></script>
	<script type="text/javascript" src="js/ajax.js"></script>
</body>
</html>