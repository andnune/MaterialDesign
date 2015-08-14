<?php
require 'funcionIndex.php';
include ("header.html");
if ((($_REQUEST['search'] != "")) && $_REQUEST['search'] != " ") {
    $results = searchBlog($_REQUEST['search']);
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
        <? $num =0; ?>
        <? foreach ($results as $post): ?>
            <? $num++; ?> <div class="panel col-sm-4" onclick='window.document.location="post.php?whatever=<? echo $post['blog_id'] ?>"'>
                <num><? echo $num; ?></num>
                <div class="panel-heading"><b><a href="post.php?whatever=<? echo $post['titulo'] ?>">Tittle:
                            <h7><? echo $post['titulo'] ?></h7>
                        </a></b></div>
                <div class="panel-body"><b>Author: <? echo $post['autor'] ?></b></div>
                <div class="panel-body"><b>Body: <? echo $post['texto'] ?></b></div>
                <div class="panel-body"><b>Date: <? echo $post['fecha'] ?></b></div>
            </div>
        <? endforeach; ?>
    <? endif; ?>
<? endif; ?>
<? include ("footer.html"); ?>