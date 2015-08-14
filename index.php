<?php
require 'funcionIndex.php';
include 'header.html';
//cargamos los resultados
$results = seleccTodoBlog();
?>

    <!--<div class="col-md-4 ">-->
<? foreach ($results as $post): ?>
    <div class="panel col-sm-6" onclick='window.document.location="post.php?whatever=<? echo $post['id'] ?>"'>
        <div class="panel-heading"><b><a href="post.php?whatever=<? echo $post['id'] ?>">Tittle: <h7><? echo $post['titulo'] ?></h7></a></b></div>
        <div class="panel-body"><b>Author: <? echo $post['autor'] ?></b></div>
        <div class="panel-body"><b>Date: <? echo $post['fecha'] ?></b></div>
        <? $textoCorto = $post['texto'];
        $textoFinal = substr($textoCorto, 0, 20);?>
        <div class="panel-body"><b>Body: <? echo $textoFinal ?></b></div>
    </div>
<? endforeach; ?>

<? include 'footer.html';?>