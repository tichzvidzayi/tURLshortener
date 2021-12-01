<?php 
require_once 'dbConfig.php';
require_once 'Shortener.class.php';
$shortener = new Shortener($db);
$shortCode = $_GET["c"];
try{
    $url = $shortener->shortCodeToUrl($shortCode);   //retrieve long url
    header("Location: ".$url);
    exit;
}catch(Exception $e){
    echo $e->getMessage();
}

?> 