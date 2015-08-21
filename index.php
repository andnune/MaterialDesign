<?php
require 'funcionIndex.php';
include 'header.html';
require_once 'model/ModelPost.php';
require_once "collection/Collection.php";
$results = Post::getAllPosts();
$cuenta = ($results->getCount());
?>
<? $i = 0; ?>

<? for ($i = 0; $i < $cuenta; $i++):
    $blog = $results->getItem($i);
    ?>
    <div class="mdl-grid">
        <div class="mdl-cell mdl-cell--2-col mdl-cell--hide-tablet mdl-cell--hide-phone"></div>
            <div class="blog-card-wide mdl-card mdl-shadow--2dp">
                <div class="mdl-card__title"
                     style="background: url('<? echo $blog->getAlgo('img') ?>') center / cover;">
                    <h2 class="mdl-card__title-text"><? echo $blog->getAlgo('titulo') ?></h2>
                </div>
                <div class="mdl-card__supporting-text">
                    <? $textoCorto = $blog->getAlgo('texto');
                    $textoFinal = substr($textoCorto, 0, 120); ?>
                    <p><? echo $textoFinal ?></p>
                </div>
                <div class="mdl-card__actions mdl-card--border">
                    <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect"
                       href="post.php?whatever=<? echo $blog->getAlgo('id') ?>">
                        Leer Mas
                    </a>
                </div>
            </div>
    </div>
<? endfor; ?>


<? include 'footer.html'; ?>