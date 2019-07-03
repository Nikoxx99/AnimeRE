<?php

$imagenPortada = str_replace(' ','%20',$crow['StrImagenFb']);

/*$v720 = $crow['StrOpcion0'];
$v480 = $crow['StrOpcion0'] . '&q=480p';
$v360 = $crow['StrOpcion0'] . '&q=360p';




include 'admin/simple_html_dom.php';
$url = $v720;
$html = file_get_html($url);
foreach($html->find('source') as $element);

$url2 = $v480;
$html1 = file_get_html($url2);
foreach($html1->find('source') as $element1);

$url3 = $v360;
$html2 = file_get_html($url3);
foreach($html2->find('source') as $element2);*/

    echo"
    <ul class='nav nav-pills nav-fill' id='pills-tab' role='tablist'>
        <li class='nav-item''>
            <a id='pills-hls-tab' data-toggle='pill' href='#pills-hls' role='tab' aria-controls='pills-hls' aria-selected='true' class='nav-link active show rounded-0' style='color:#ebcc34;'><i class='fab fa-youtube'></i> AnimeRE</a>
        </li>
        <li class='nav-item' style='".$display1."'>
            <a id='pills-o1-tab' data-toggle='pill' href='#pills-o1' role='tab' aria-controls='pills-o1' aria-selected='false' class='nav-link rounded-0' style='color:#ebcc34;'>Lelouch</a>
        </li>
        <li class='nav-item' style='".$display2."'>
            <a id='pills-o2-tab' data-toggle='pill' href='#pills-o1' role='tab' aria-controls='pills-o2' aria-selected='false' class='nav-link rounded-0' style='color:#ebcc34;'>Kaori</a>
        </li>
        <li class='nav-item' style='".$display3."'>
            <a id='pills-o3-tab' data-toggle='pill' href='#pills-o1' role='tab' aria-controls='pills-o3' aria-selected='false' class='nav-link rounded-0' style='color:#ebcc34;'>Arararagi</a>
        </li>
        <li class='nav-item' style='".$display4."'>
            <a id='pills-o4-tab' data-toggle='pill' href='#pills-o1' role='tab' aria-controls='pills-o4' aria-selected='false' class='nav-link rounded-0' style='color:#ebcc34;'>Horo</a>
        </li>
        <li class='nav-item' style='".$display5."'>
            <a id='pills-o6-tab' data-toggle='pill' href='#pills-o1' role='tab' aria-controls='pills-o6' aria-selected='false' class='nav-link rounded-0' style='color:#ebcc34;'>Eugeo</a>
        </li>
        <li class='nav-item' style='".$display6."'>
            <a id='pills-o7-tab' data-toggle='pill' href='#pills-o1' role='tab' aria-controls='pills-o7' aria-selected='false' class='nav-link rounded-0' style='color:#ebcc34;'>Hestia</a>
        </li>
        <li class='nav-item' style='".$display7."'>
            <a id='pills-o8-tab' data-toggle='pill' href='#pills-o1' role='tab' aria-controls='pills-o8' aria-selected='false' class='nav-link rounded-0' style='color:#ebcc34;'>Yuzu</a>
        </li>
        <li class='nav-item'>
            <a id='pills-o5-tab' data-toggle='pill' href='#pills-o5' role='tab' aria-controls='pills-o5' aria-selected='false' class='nav-link rounded-0' style='color:#ebcc34;'>Descargar</a>
        </li>
</ul>
    <div class='tab-content' id='pills-tabContent'>
        <div class='tab-pane fade active show' id='pills-hls' role='tabpanel' aria-labelledby='pills-hls-tab'>
            <video id='are_ren' class='video-js vjs-default-skin vjs-fluid' controls poster='../".$imagenPortada."'>
                <source
                    src='".$crow['HLS']."'
                    type='application/x-mpegURL'>
            </video>
        </div>
        <div class='embed-responsive embed-responsive-16by9 tab-pane fade' id='pills-o1' role='tabpanel' aria-labelledby='pills-o1-tab'>

        </div>

        <div class='embed-responsive tab-pane fade' id='pills-o5' role='tabpanel' aria-labelledby='pills-o5-tab'>
            <div class='d-flex justify-content-center'><h2><i class='fas fa-download'></i> Descargar ".$crow['StrNombre']."</h2></div>
            <a class='rounded-0 btn btn-primary btn-lg btn-block align-self-center' href='".$crow['StrOpcionD']."'<span class='glyphicon glyphicon-th-list'></span><i class='fas fa-download'></i> Zero Two</a>
            <a class='rounded-0 btn btn-primary btn-lg btn-block align-self-center' href='".$crow['StrOpcionD2']."'<span class='glyphicon glyphicon-th-list'></span><i class='fas fa-download'></i> Hina</a>
            <a class='rounded-0 btn btn-primary btn-lg btn-block align-self-center mb-2' href='".$crow['StrOpcionD3']."'<span class='glyphicon glyphicon-th-list'></span><i class='fas fa-download'></i> Tony</a>
        </div>
    </div>

";


?>
