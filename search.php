<?php
require 'funcionIndex.php';
include("header.html");
require_once 'model/ModelPost.php';
if ((($_REQUEST['search'] != ""))) {
    $results = Post::searchPost($_REQUEST['search']);
    $cuenta = ($results->getCount());
} else {
    $results = "blanco";
    echo "<div class='container'><h2>No ha insertado ningun contenido para la busqueda</h2></div>";
}
?>
<? if ($cuenta == 0) : ?>
    <h2>No hay ningun resultado para la busqueda</h2>
<? else: ?>
    <? if (empty($results)) : ?>
        <h2>No existe el blog deseado</h2>
        <br>
    <? else: ?>
        <div class="row">
            <div class="col-lg-8">
                <? for ($i = 0; $i < $cuenta; $i++):
                    $post = $results->getItem($i);
                    ?>
                    <h4>
                        <a href="post.php?whatever=<? echo $post->getAlgo('id') ?>"><? echo $post->getAlgo('titulo') ?></a>
                    </h4>
                    <small class="text-muted"><? echo $post->getAlgo('fecha') ?>
                        por <? echo $post->getAlgo('autor') ?></small>
                    <? $textoCorto = $post->getAlgo('texto')
                ;
                    $textoFinal = substr($textoCorto, 0, 120); ?>
                    <p><? echo $textoFinal ?></p>
                    <hr>
                <? endfor; ?>
            </div>
        </div>

    <? endif; ?>
<? endif; ?>
<? include("footer.html"); ?>