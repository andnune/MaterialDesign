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
    $blog=new Post();
    $consulta=$blog->insertBlog($autor,$titulo,$fecha,$texto,$img);
} else {
    $seguir = 0;
    echo "<div class='container'><h2>Fallo en los datos a insertar</h2></div>";
}
?>
<? if ($seguir == 1) : ?>
    <? if ($consulta == 0) : ?>
        <div class='container'><h2>Error al insertar los datos</h2></div>
    <? else: ?>
        <? header('Location: http://localhost/primeroPhpStorm/index.php'); ?>
    <? endif; ?>
<? endif; ?>
<? include ("footer.html"); ?>