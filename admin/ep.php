<?php

require '../admin/adminProtect.php';

require 'simple_html_dom.php';



$url2 = $_GET["link"];
$html2 = file_get_html($url2);

		$contenidos = $html2->find('article[class=Episode]');

		foreach($contenidos as $contenido){
			$titulo = $contenido->find('h1[class=Title-epi]',0);
			$opt = $contenido->find('div ul li[data-tplayernv]',0);
			$link = $contenido->find('div[class=TPlayerTb] iframe',0);
			$q = $link->src;
		}


echo $titulo->innertext .'<br>'.$opt->innertext. "<br>


				  <textarea name='message' rows='10' cols='30'>". $link ."</textarea>
				  <br>
			";
		


?>
<br>
<a href="https://animere.net/admin/subir-cap.php">Volver a Subir Capitulo</a>