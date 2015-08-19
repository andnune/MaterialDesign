<?php
require 'funcionIndex.php';
include("header.html");
require_once 'model/ModelPost.php';
if ((($_REQUEST['search'] != ""))) {
    //$blog=new Post();
    $results = Post::searchPost($_REQUEST['search']);
    $cuenta = ($results->getCount());
} else {
    $results = "blanco";
    echo "<div class='container'><h2>No ha insertado ningun contenido para la busqueda</h2></div>";
}
?>
<? if ($results == 'blanco') : ?>
<? else: ?>
    <? if (empty($results)) : ?>
        <h2>No existe el blog deseado</h2>
        <br>
    <? else: ?>
        <div class="row">
            <div class="col-lg-8">
                <? for ($i = 0; $i < $cuenta; $i++)://each($results as $blog) :
                    $post = $results->getItem($i);
                    ?>
                    <? //foreach ($results as $post):
                    ?>
                    <h4>
                        <a href="post.php?whatever=<? echo $post->getAlgo('id')/*$post['blog_id']*/ ?>"><? echo $post->getAlgo('titulo')/*$post['titulo']*/ ?></a>
                    </h4>
                    <small class="text-muted"><? echo $post->getAlgo('fecha')/*$post['fecha']*/ ?>
                        por <? echo $post->getAlgo('autor')/*$post['autor']*/ ?></small>
                    <? $textoCorto = $post->getAlgo('texto')/*$post['texto']*/
                ;
                    $textoFinal = substr($textoCorto, 0, 120); ?>
                    <p><? echo $textoFinal ?></p>
                    <hr>
                    <? //endforeach;
                    ?>
                <? endfor; ?>
            </div>
        </div>

    <? endif; ?>
<? endif; ?>
<? include("footer.html"); ?>