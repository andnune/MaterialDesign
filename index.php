<?php
require 'funcionIndex.php';
include 'header.html';
require_once 'model/ModelPost.php';
require_once "collection/Collection.php";
$results=Post::getAllPosts();
$cuenta=($results->getCount());
?>
    <? $i=0; ?>
    <div class="row row1">
        <div class="col-lg-6 col-xs-12 col-sm-12 col-md-6">
            <? for($i=0;$i<$cuenta;$i++):
                $blog=$results->getItem($i);
               ?>
                <div class="row">
                    <div class="col-lg-4">
                        <img src="<? echo $blog->getAlgo('img') ?>" class="img-responsive"/>
                    </div>
                    <div class="col-lg-8">
                        <small class="text-muted"><? echo $blog->getAlgo('fecha') ?>
                            por <? echo $blog->getAlgo('autor') ?></small>
                        <h2><a href="post.php?whatever=<? echo $blog->getAlgo('id') ?>"><? echo $blog->getAlgo('titulo') ?></a>
                        </h2>
                        <? $textoCorto = $blog->getAlgo('texto');
                        $textoFinal = substr($textoCorto, 0, 120); ?>
                        <p><? echo $textoFinal ?></p>
                    </div>
                </div>
                <hr>
            <? endfor; ?>
        </div>
<? include 'footer.html'; ?>