<?php
require 'funcionIndex.php';
include 'header.html';
//cargamos los resultados
$results = seleccTodoBlog();
$ButtonArray = array();
$var = "<button class='btn btn-warning'>";
?>

    <div class="row">
        <div class="col-lg-6 col-xs-12 col-sm-12 col-md-6">
        <? foreach ($results as $post): ?>
    <div class="row" >
        <div class="col-lg-4">
            <img src="<? echo $post['img'] ?>" class="img-responsive"/>
            </div>
        <div class="col-lg-8">
            <small class="text-muted"><? echo $post['fecha'] ?> por <? echo $post['autor'] ?></small>
            <h2><a href="post.php?whatever=<?  echo $post['id'] ?>"><? echo $post['titulo'] ?></a></h2>
            <? $textoCorto = $post['texto'];
            $textoFinal = substr($textoCorto, 0, 120); ?>
            <p><? echo $textoFinal ?></p>
        </div>
    </div>
            <hr>
        <? endforeach; ?>
       <!-- </div>
        <div class="col-lg-6 col-xs-12 col-sm-12 col-md-6">
            <? //foreach ($results as $post): ?>
                <div class="row" >
                    <div class="col-lg-4">
                        <img src="<? //echo $post['img'] ?>" class="img-responsive"/>
                    </div>
                    <div class="col-lg-8">
                        <small class="text-muted"><? //echo $post['fecha'] ?> por <? //echo $post['autor'] ?></small>
                        <h2><a href="post.php?whatever=<?  //echo $post['id'] ?>"><? //echo $post['titulo'] ?></a></h2>
                        <? //$textoCorto = $post['texto'];
                       // $textoFinal = substr($textoCorto, 0, 120); ?>
                        <p><? //echo $textoFinal ?></p>
                    </div>
                </div>
                <hr>
            <? //endforeach; ?>
       --> </div>
    </div>
<? include 'footer.html'; ?>