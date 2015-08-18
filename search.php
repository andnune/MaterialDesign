<?php
require 'funcionIndex.php';
include("header.html");
require_once  'model/Model.php';
if ((($_REQUEST['search'] != ""))) {
    $blog=new Post();
    $results =$blog-> searchBlog($_REQUEST['search']);
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
                <? foreach ($results as $post): ?>
                    <h4><a href="post.php?whatever=<? echo $post['blog_id'] ?>"><? echo $post['titulo'] ?></a></h4>
                    <small class="text-muted"><? echo $post['fecha'] ?> por <? echo $post['autor'] ?></small>
                    <? $textoCorto = $post['texto'];
                    $textoFinal = substr($textoCorto, 0, 120); ?>
                    <p><? echo $textoFinal ?></p>
                    <hr>
                <? endforeach; ?>
            </div>
        </div>
    <? endif; ?>
<? endif; ?>
<? include("footer.html"); ?>