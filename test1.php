<?php


require 'simple_html_dom.php';
							$url = 'https://www.rapidvideo.com/v/G2SG48ENY1';
							$html = file_get_html($url);
							foreach($html->find('source') as $element)
						

							echo $element->src;
							






		


		


?>
