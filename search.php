<?php
require 'funcionIndex.php';
include("header.html");
require_once 'model/ModelPost.php';
if ((($_REQUEST['search'] != ""))) {
    $results = Post::searchPost($_REQUEST['search']);
    $cuenta = ($results->getCount());
} else {
    $cuenta =0;
    $results = "blanco";
    echo " <div class='demo-container mdl-grid'>
        <div class='mdl-cell mdl-cell--2-col mdl-cell--hide-tablet mdl-cell--hide-phone'></div>
        <h2>No ha insertado ningun contenido para la busqueda</h2></div>";
}
?>
<? if (($results != 'blanco') && ($results->getCount()==0)) : ?>
    <div class="demo-container mdl-grid">
        <div class="mdl-cell mdl-cell--2-col mdl-cell--hide-tablet mdl-cell--hide-phone"></div>
        <h2>No existe el blog deseado</h2></div>
<? else: ?>
            <? for ($i = 0; $i < $cuenta; $i++):
                $post = $results->getItem($i);
                ?>
            <div class="demo-container mdl-grid">
                <div class="mdl-cell mdl-cell--2-col mdl-cell--hide-tablet mdl-cell--hide-phone"></div>
                <div class="blog-card-wide1 mdl-card mdl-shadow--2dp">
                    <div class="mdl-card__title">
                            <a class="mdl-card__title-text"
                               href="post.php?whatever=<? echo $post->getAlgo('id') ?>"><? echo $post->getAlgo('titulo') ?></a>
                    </div>
                    <div class="mdl-card__supporting-text">
                        <small class="text-muted"><? echo $post->getAlgo('fecha') ?>
                            por <? echo $post->getAlgo('autor') ?></small>
                        <? $textoCorto = $post->getAlgo('texto');
                        $textoFinal = substr($textoCorto, 0, 120); ?>
                        <p><? echo $textoFinal ?></p>
                    </div>
                </div>
                <hr>
            </div>
            <? endfor; ?>


<? endif; ?>
<? include("footer.html"); ?>