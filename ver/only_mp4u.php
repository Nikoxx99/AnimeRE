<?php
$mp4upload = $crow['StrOpcion01'];

$mp4url = $mp4upload;
$htmlMP4U = file_get_html($mp4url);
foreach($htmlMP4U->find('video') as $elementMP4U);

if($mp4upload != null){

echo"
    <ul class='nav nav-pills nav-fill' id='pills-tab' role='tablist'>
    <li class='nav-item'>
        <a id='pills-o0-tab' data-toggle='pill' href='#pills-o0' role='tab' aria-controls='pills-o0' aria-selected='true' class='nav-link active show rounded-0' style='color:#ebcc34;'>AnimeRE</a>
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
                <source src='".$elementMP4U->src."' type='video/mp4' size='360'>
            </video>
        </div>
        <div class='embed-responsive embed-responsive-16by9 tab-pane fade' id='pills-o1' role='tabpanel' aria-labelledby='pills-o1-tab'>

        </div>

        <div class='embed-responsive embed-responsive-16by9 tab-pane fade' id='pills-o5' role='tabpanel' aria-labelledby='pills-o5-tab'>
            <a class='rounded-0 btn btn-primary btn-lg btn-block align-self-center' href='".$elementMP4U->src."'<span class='glyphicon glyphicon-th-list'></span>Chitoge (Descarga Directa)</a>
            <a class='rounded-0 btn btn-primary btn-lg btn-block align-self-center' href='".$crow['StrOpcionD']."'<span class='glyphicon glyphicon-th-list'></span>Zero Two</a>
            <a class='rounded-0 btn btn-primary btn-lg btn-block align-self-center' href='".$crow['StrOpcionD2']."'<span class='glyphicon glyphicon-th-list'></span>Hina</a>
        </div>
    </div>

";
}else{
    echo "No esta disponible esta opcion. Por favor intenta con otra.";
}

?>