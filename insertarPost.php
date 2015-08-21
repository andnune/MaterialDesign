<?php
include ("header.html");
require_once 'model/ModelPost.php';
if ((($_REQUEST['Autor'] != "")) && (($_REQUEST['Titulo'] != "")) && (($_REQUEST['Fecha'] != "")) && (($_REQUEST['Texto'] != ""))) {
    $seguir = 1;
    $autor = $_REQUEST['Autor'];
    $titulo = $_REQUEST['Titulo'];
    $fecha = $_REQUEST['Fecha'];
    $texto = $_REQUEST['Texto'];
    $img = $_REQUEST['Imagen'];
    require 'funcionIndex.php';
    $consulta=Post::insertPost($autor,$titulo,$fecha,$texto,$img);
} else {
    $seguir = 0;
    echo "<div class='demo-container mdl-grid'><div class='mdl-cell mdl-cell--2-col mdl-cell--hide-tablet mdl-cell--hide-phone'>
    </div><h2>Fallo en los datos a insertar</h2></div>";
}
?>
<? if ($seguir == 1) : ?>
        <? header('Location: http://localhost/primeroPhpStorm/index.php'); ?>
<? endif; ?>
<? include ("footer.html"); ?>