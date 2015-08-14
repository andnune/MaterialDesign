<?php
require 'funcionIndex.php';
include 'header.html';
//cargamos los resultados
$results = seleccTodoBlog();
?>

    <div class="row">
        <div class="col-lg-8 col-xs-12 col-sm-12 col-md-12">
            <? foreach ($results as $post): ?>
                <small><? echo $post['fecha'] ?> por <? echo $post['autor'] ?></small>
                <h2><a href="post.php?whatever=<? echo $post['id'] ?>"><? echo $post['titulo'] ?></a></h2>
                <? $textoCorto = $post['texto'];
                $textoFinal = substr($textoCorto, 0, 120); ?>
                <p><? echo $textoFinal ?></p>
                <hr>
            <? endforeach; ?>
        </div>
    </div>
<? include 'footer.html'; ?>