<?php


require 'simple_html_dom.php';


$url2 = $_POST["URL"];
$html2 = file_get_html($url2);

		$contenidos = $html2->find('article[class=Episode]');

		foreach($contenidos as $contenido){
			$titulo = $contenido->find('h1[class=Title-epi]',0);
			$opt = $contenido->find('div ul li[data-tplayernv]',0);
			$link = $contenido->find('div[class=TPlayer]',0);
		}


echo $titulo->innertext .'<br>'.$opt->innertext. "<br>


				  <textarea name='message' rows='10' cols='30'>". $link ."</textarea>
				  <br>
			";
		


?>