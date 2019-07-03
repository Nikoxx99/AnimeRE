<?php

$element = '';
$element1 = '';
$element2 = '';
$elementMP4U = '';

//Variables de Rapidvideo
$v720 = $crow['StrOpcion0'] . '&q=720p';
$v480 = $crow['StrOpcion0'] . '&q=480p';
$v360 = $crow['StrOpcion0'] . '&q=360p';


//Scraping Rapidvideo
include 'admin/simple_html_dom.php';
$url = $v720;
$html = file_get_html($url);
foreach($html->find('source') as $element);

$url2 = $v480;
$html1 = file_get_html($url2);
foreach($html1->find('source') as $element1);

$url3 = $v360;
$html2 = file_get_html($url3);
foreach($html2->find('source') as $element2);


var_dump($elementMP4U->src); 

//Variables del resto de opciones que van por iFrame
$v01 = $crow['StrOpcion01'];
$v1 = $crow['StrOpcion1'];
$v2 = $crow['StrOpcion2'];
$v3 = $crow['StrOpcion3'];
$v4 = $crow['StrOpcion4'];
$v5 = $crow['StrOpcion5'];
$v6 = $crow['StrOpcion6'];
$v7 = $crow['StrOpcion7'];

if ($element == null && $element1 == null && $element2 == null) {
    include 'init.php';

}else if($element == null && $element1 == null){
    echo"
    <ul class='nav nav-pills nav-fill' id='pills-tab' role='tablist'>
    <li class='nav-item'>
        <a id='pills-o0-tab' data-toggle='pill' href='#pills-o0' role='tab' aria-controls='pills-o0' aria-selected='true' class='nav-link active show rounded-0' style='color:#ebcc34;'>AnimeRE</a>
    </li>
    <li class='nav-item'>
        <a id='pills-o01-tab' data-toggle='pill' href='#pills-o01' role='tab' aria-controls='pills-o01' aria-selected='false' class='nav-link rounded-0' style='color:#ebcc34;'>RE-Chan</a>
    </li>
    <li class='nav-item'>
        <a id='pills-o1-tab' data-toggle='pill' href='#pills-o1' role='tab' aria-controls='pills-o1' aria-selected='false' class='nav-link rounded-0' style='color:#ebcc34;'>Lelouch</a>
    </li>
    <li class='nav-item'>
        <a id='pills-o2-tab' data-toggle='pill' href='#pills-o2' role='tab' aria-controls='pills-o2' aria-selected='false' class='nav-link rounded-0' style='color:#ebcc34;'>Kaori</a>
    </li>
    <li class='nav-item'>
        <a id='pills-o3-tab' data-toggle='pill' href='#pills-o3' role='tab' aria-controls='pills-o3' aria-selected='false' class='nav-link rounded-0' style='color:#ebcc34;'>Arararagi</a>
    </li>
    <li class='nav-item'>
        <a id='pills-o4-tab' data-toggle='pill' href='#pills-o4' role='tab' aria-controls='pills-o4' aria-selected='false' class='nav-link rounded-0' style='color:#ebcc34;'>Horo</a>
    </li>
    <li class='nav-item'>
        <a id='pills-o6-tab' data-toggle='pill' href='#pills-o6' role='tab' aria-controls='pills-o6' aria-selected='false' class='nav-link rounded-0' style='color:#ebcc34;'>Eugeo</a>
    </li>
    <li class='nav-item'>
        <a id='pills-o7-tab' data-toggle='pill' href='#pills-o7' role='tab' aria-controls='pills-o7' aria-selected='false' class='nav-link rounded-0' style='color:#ebcc34;'>Hestia</a>
    </li>
    <li class='nav-item'>
        <a id='pills-o8-tab' data-toggle='pill' href='#pills-o8' role='tab' aria-controls='pills-o8' aria-selected='false' class='nav-link rounded-0' style='color:#ebcc34;'>Yuzu</a>
    </li>
    <li class='nav-item'>
        <a id='pills-o5-tab' data-toggle='pill' href='#pills-o5' role='tab' aria-controls='pills-o5' aria-selected='false' class='nav-link rounded-0' style='color:#ebcc34;'>Descargar</a>
    </li>
</ul>
    <div class='tab-content' id='pills-tabContent'>
        <div class='tab-pane fade active show' id='pills-o0' role='tabpanel' aria-labelledby='pills-o0-tab'>
            <video controls crossorigin playsinline poster='".$crow['StrImagen']."'>
                <source src='".$element2->src."' type='video/mp4' size='360'>
            </video>
        </div>
        <div class='tab-pane fade' id='pills-o01' role='tabpanel' aria-labelledby='pills-o01-tab'>
            <video controls crossorigin playsinline poster='".$crow['StrImagen']."'>
                <source src='".$elementMP4U->src."' type='video/mp4' size='1080'>
            </video>
        </div>
        <div class='embed-responsive embed-responsive-16by9 tab-pane fade' id='pills-o1' role='tabpanel' aria-labelledby='pills-o1-tab'>

        </div>

        <div class='embed-responsive embed-responsive-16by9 tab-pane fade' id='pills-o5' role='tabpanel' aria-labelledby='pills-o5-tab'>
            <a class='rounded-0 btn btn-primary btn-lg btn-block align-self-center' href='".$element2->src."'<span class='glyphicon glyphicon-th-list'></span>Chitoge (Descarga Directa)</a>
            <a class='rounded-0 btn btn-primary btn-lg btn-block align-self-center' href='".$elementMP4U->src."'<span class='glyphicon glyphicon-th-list'></span>Mafuyu (Descarga Directa)</a>
            <a class='rounded-0 btn btn-primary btn-lg btn-block align-self-center' href='".$crow['StrOpcionD']."'<span class='glyphicon glyphicon-th-list'></span>Zero Two</a>
            <a class='rounded-0 btn btn-primary btn-lg btn-block align-self-center' href='".$crow['StrOpcionD2']."'<span class='glyphicon glyphicon-th-list'></span>Hina</a>
        </div>
    </div>

";
}else if($element == null){
    echo"
    <ul class='nav nav-pills nav-fill' id='pills-tab' role='tablist'>
    <li class='nav-item'>
        <a id='pills-o0-tab' data-toggle='pill' href='#pills-o0' role='tab' aria-controls='pills-o0' aria-selected='true' class='nav-link active show rounded-0' style='color:#ebcc34;'>AnimeRE</a>
    </li>
    <li class='nav-item'>
        <a id='pills-o01-tab' data-toggle='pill' href='#pills-o01' role='tab' aria-controls='pills-o01' aria-selected='false' class='nav-link rounded-0' style='color:#ebcc34;'>RE-Chan</a>
    </li>
    <li class='nav-item'>
        <a id='pills-o1-tab' data-toggle='pill' href='#pills-o1' role='tab' aria-controls='pills-o1' aria-selected='false' class='nav-link rounded-0' style='color:#ebcc34;'>Lelouch</a>
    </li>
    <li class='nav-item'>
        <a id='pills-o2-tab' data-toggle='pill' href='#pills-o2' role='tab' aria-controls='pills-o2' aria-selected='false' class='nav-link rounded-0' style='color:#ebcc34;'>Kaori</a>
    </li>
    <li class='nav-item'>
        <a id='pills-o3-tab' data-toggle='pill' href='#pills-o3' role='tab' aria-controls='pills-o3' aria-selected='false' class='nav-link rounded-0' style='color:#ebcc34;'>Arararagi</a>
    </li>
    <li class='nav-item'>
        <a id='pills-o4-tab' data-toggle='pill' href='#pills-o4' role='tab' aria-controls='pills-o4' aria-selected='false' class='nav-link rounded-0' style='color:#ebcc34;'>Horo</a>
    </li>
    <li class='nav-item'>
        <a id='pills-o6-tab' data-toggle='pill' href='#pills-o6' role='tab' aria-controls='pills-o6' aria-selected='false' class='nav-link rounded-0' style='color:#ebcc34;'>Eugeo</a>
    </li>
    <li class='nav-item'>
        <a id='pills-o7-tab' data-toggle='pill' href='#pills-o7' role='tab' aria-controls='pills-o7' aria-selected='false' class='nav-link rounded-0' style='color:#ebcc34;'>Hestia</a>
    </li>
    <li class='nav-item'>
        <a id='pills-o8-tab' data-toggle='pill' href='#pills-o8' role='tab' aria-controls='pills-o8' aria-selected='false' class='nav-link rounded-0' style='color:#ebcc34;'>Yuzu</a>
    </li>
    <li class='nav-item'>
        <a id='pills-o5-tab' data-toggle='pill' href='#pills-o5' role='tab' aria-controls='pills-o5' aria-selected='false' class='nav-link rounded-0' style='color:#ebcc34;'>Descargar</a>
    </li>
</ul>
    <div class='tab-content' id='pills-tabContent'>
        <div class='tab-pane fade active show' id='pills-o0' role='tabpanel' aria-labelledby='pills-o0-tab'>
            <video controls crossorigin playsinline poster='".$crow['StrImagen']."'>
                <source src='".$element1->src."' type='video/mp4' size='720'>
                <source src='".$element2->src."' type='video/mp4' size='360'>
            </video>
        </div>
        <div class='tab-pane fade' id='pills-o01' role='tabpanel' aria-labelledby='pills-o01-tab'>
            <video controls crossorigin playsinline poster='".$crow['StrImagen']."'>
                <source src='".$elementMP4U->src."' type='video/mp4' size='1080'>
            </video>
        </div>
        <div class='embed-responsive embed-responsive-16by9 tab-pane fade' id='pills-o1' role='tabpanel' aria-labelledby='pills-o1-tab'>

        </div>

        <div class='embed-responsive embed-responsive-16by9 tab-pane fade' id='pills-o5' role='tabpanel' aria-labelledby='pills-o5-tab'>
            <a class='rounded-0 btn btn-primary btn-lg btn-block align-self-center' href='".$element1->src."'<span class='glyphicon glyphicon-th-list'></span>Chitoge (Descarga Directa)</a>
            <a class='rounded-0 btn btn-primary btn-lg btn-block align-self-center' href='".$elementMP4U->src."'<span class='glyphicon glyphicon-th-list'></span>Mafuyu (Descarga Directa)</a>
            <a class='rounded-0 btn btn-primary btn-lg btn-block align-self-center' href='".$crow['StrOpcionD']."'<span class='glyphicon glyphicon-th-list'></span>Zero Two</a>
            <a class='rounded-0 btn btn-primary btn-lg btn-block align-self-center' href='".$crow['StrOpcionD2']."'<span class='glyphicon glyphicon-th-list'></span>Hina</a>
        </div>
    </div>

";
}else{
    echo"
    <ul class='nav nav-pills nav-fill' id='pills-tab' role='tablist'>
    <li class='nav-item'>
        <a id='pills-o0-tab' data-toggle='pill' href='#pills-o0' role='tab' aria-controls='pills-o0' aria-selected='true' class='nav-link active show rounded-0' style='color:#ebcc34;'>AnimeRE</a>
    </li>
    <li class='nav-item'>
        <a id='pills-o01-tab' data-toggle='pill' href='#pills-o01' role='tab' aria-controls='pills-o01' aria-selected='false' class='nav-link rounded-0' style='color:#ebcc34;'>RE-Chan</a>
    </li>
    <li class='nav-item'>
        <a id='pills-o1-tab' data-toggle='pill' href='#pills-o1' role='tab' aria-controls='pills-o1' aria-selected='false' class='nav-link rounded-0' style='color:#ebcc34;'>Horo</a>
    </li>
    <li class='nav-item'>
        <a id='pills-o2-tab' data-toggle='pill' href='#pills-o2' role='tab' aria-controls='pills-o2' aria-selected='false' class='nav-link rounded-0' style='color:#ebcc34;'>Kaori</a>
    </li>
    <li class='nav-item'>
        <a id='pills-o3-tab' data-toggle='pill' href='#pills-o3' role='tab' aria-controls='pills-o3' aria-selected='false' class='nav-link rounded-0' style='color:#ebcc34;'>Konata</a>
    </li>
    <li class='nav-item'>
        <a id='pills-o4-tab' data-toggle='pill' href='#pills-o4' role='tab' aria-controls='pills-o4' aria-selected='false' class='nav-link rounded-0' style='color:#ebcc34;'>Hinata</a>
    </li>
    <li class='nav-item'>
        <a id='pills-o6-tab' data-toggle='pill' href='#pills-o6' role='tab' aria-controls='pills-o6' aria-selected='false' class='nav-link rounded-0' style='color:#ebcc34;'>Eugeo</a>
    </li>
    <li class='nav-item'>
        <a id='pills-o7-tab' data-toggle='pill' href='#pills-o7' role='tab' aria-controls='pills-o7' aria-selected='false' class='nav-link rounded-0' style='color:#ebcc34;'>Hestia</a>
    </li>
    <li class='nav-item'>
        <a id='pills-o8-tab' data-toggle='pill' href='#pills-o8' role='tab' aria-controls='pills-o8' aria-selected='false' class='nav-link rounded-0' style='color:#ebcc34;'>Yuzu</a>
    </li>
    <li class='nav-item'>
        <a id='pills-o5-tab' data-toggle='pill' href='#pills-o5' role='tab' aria-controls='pills-o5' aria-selected='false' class='nav-link rounded-0' style='color:#ebcc34;'>Descargar</a>
    </li>
</ul>
    <div class='tab-content' id='pills-tabContent'>
        <div class='tab-pane fade active show' id='pills-o0' role='tabpanel' aria-labelledby='pills-o0-tab'>
            <video controls crossorigin playsinline poster='".$crow['StrImagen']."'>
                <source src='".$element->src."' type='video/mp4' size='1080'>
                <source src='".$element1->src."' type='video/mp4' size='720'>
                <source src='".$element2->src."' type='video/mp4' size='360'>
            </video>
        </div>
        <div class='tab-pane fade' id='pills-o01' role='tabpanel' aria-labelledby='pills-o01-tab'>
            <video controls crossorigin playsinline poster='".$crow['StrImagen']."'>
                <source src='".$elementMP4U->src."' type='video/mp4' size='1080'>
            </video>
        </div>
        <div class='embed-responsive embed-responsive-16by9 tab-pane fade' id='pills-o1' role='tabpanel' aria-labelledby='pills-o1-tab'>

        </div>
        <div class='embed-responsive embed-responsive-16by9 tab-pane fade' id='pills-o5' role='tabpanel' aria-labelledby='pills-o5-tab'>
            <a class='rounded-0 btn btn-primary btn-lg btn-block align-self-center' href='".$element->src."'<span class='glyphicon glyphicon-th-list'></span>Chitoge (Descarga Directa)</a>
            <a class='rounded-0 btn btn-primary btn-lg btn-block align-self-center' href='".$elementMP4U->src."'<span class='glyphicon glyphicon-th-list'></span>Mafuyu (Descarga Directa)</a>
            <a class='rounded-0 btn btn-primary btn-lg btn-block align-self-center' href='".$crow['StrOpcionD']."'<span class='glyphicon glyphicon-th-list'></span>Zero Two</a>
            <a class='rounded-0 btn btn-primary btn-lg btn-block align-self-center' href='".$crow['StrOpcionD2']."'<span class='glyphicon glyphicon-th-list'></span>Hina</a>
        </div>
    </div>

";
}





?>