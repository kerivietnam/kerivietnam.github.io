<?php

require_once '../module/authentication.module.php';
$authen = new Authentication();


$nameScreen = isset($_POST["nameScreen"]) ? $_POST["nameScreen"] : null ;
$urlScreen = isset($_POST["urlScreen"]) ? $_POST["urlScreen"] : null  ;
$useId = isset($_POST["userId"]) ? $_POST["userId"] : null;
$listAuthen = isset($_POST["listAuthen"]) ? $_POST["listAuthen"] : null ;

if($nameScreen === null &&  $urlScreen === null && $useId !== null && $listAuthen !== null){
    $code = $authen->updateAuthen($useId,$listAuthen);
    echo $code;
    return;
}

if( $nameScreen !== null &&  $urlScreen !== null && $useId !== null && $listAuthen !== null){
    $code = $authen->insertAuthen($nameScreen,$urlScreen,$useId,$listAuthen);
    echo $code;
    return;
}
