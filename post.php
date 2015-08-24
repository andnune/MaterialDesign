<?php
require 'funcionIndex.php';
include 'header.html';
require_once 'model/ModelPost.php';
require_once 'model/ModelComment.php';
if ((($_GET['whatever'] != ""))) {
    $titulo = $_GET['whatever'];
    $results = Post::getPost($titulo);
    $resultsComments = Comment::seleccComments($titulo);
    $cuenta = ($resultsComments->getCount());
}
?>
<? if (empty($results)): ?>
    <h2>Error al seleccionar los datos</h2>
    <br>
<? else: ?>
    <!--<div class="demo-ribbon"></div>-->
    <!-- <main class="demo-main mdl-layout__content">-->
    <div class="demo-container mdl-grid">
        <div class="mdl-cell mdl-cell--2-col mdl-cell--hide-tablet mdl-cell--hide-phone"></div>
        <div
            class="demo-content mdl-color--white mdl-shadow--4dp content mdl-color-text--grey-800 mdl-cell mdl-cell--8-col">
            <!--<div class="demo-crumbs mdl-color-text--grey-500">
                            Google &gt; Material Design Lite &gt; How to install MDL
                        </div>-->
            <img class=" imagenPost" src="<? echo $results->getAlgo('img') ?>"/>
            <small> <? echo $results->getAlgo('fecha') ?> por: <? echo $results->getAlgo('autor') ?></small>
            <h3><? echo $results->getAlgo('titulo') ?></h3>
            <? echo $results->getAlgo('texto') ?>
        </div>
    </div>
    <!-- </main>-->
<? endif; ?>
    <hr>
    <div class="demo-container mdl-grid">
        <div class="mdl-cell mdl-cell--2-col mdl-cell--hide-tablet mdl-cell--hide-phone"></div>
        <div class="mdl-cell mdl-cell--6-col">
        <h4><i class="material-icons">add_box</i>Nuevo comentario: </h4>
            <form action="insertarComentario.php" method="post" class="mdl-cell--6-col">
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input class="mdl-textfield__input" type="text"  name="Autor"
                           id="Autor"/>
                    <label class="mdl-textfield__label" for="Autor" name="Autor">Autor</label>
                    <span class="mdl-textfield__error">Input is not a string!</span>
                </div>

                <!-- Numeric Textfield with Floating Label -->
<!--                Texto:-->
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
<!--                     <input class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" id="sample4" />-->
<!--                    <textarea rows= "15" cols="50" name="Texto" id="inputTexto"></textarea>-->
                            <textarea class="mdl-textfield__input" type="text" name="Texto" id="inputTexto" ><? //echo $results->getAlgo('texto') ?></textarea>
                        <label class="mdl-textfield__label" for="Texto" name="Texto">Texto</label>
                    <span class="mdl-textfield__error">Input is not a string!</span>
                        <!--</div>-->
                </div>
                <div>
                    <button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored"
                            type="submit"><i class="material-icons">create</i></button>
                </div>
                <input type='hidden' name='id_blog' value="<? echo $results->getAlgo('id') ?>">
            </form>
      </div>
    </div>
    <hr>

    <div class="demo-container mdl-grid">
        <div class="mdl-cell mdl-cell--2-col mdl-cell--hide-tablet mdl-cell--hide-phone"></div>
        <h4 id="Comentarios"><i class="material-icons">list</i>Comentarios:</h4></div>

<? if (($cuenta == 0)) : ?>
    <div class="demo-container mdl-grid">
        <div class="mdl-cell mdl-cell--2-col mdl-cell--hide-tablet mdl-cell--hide-phone"></div>
        <h2>No hay comentarios almacenados</h2></div>

<? else: ?>


    <? for ($i = 0; $i < $cuenta; $i++):
        $comment = $resultsComments->getItem($i);
        ?>
        <div class="demo-container mdl-grid">
            <div class="mdl-cell mdl-cell--2-col mdl-cell--hide-tablet mdl-cell--hide-phone"></div>
            <div class="blog-card-wide1 mdl-card mdl-shadow--2dp">
                <!--<div>-->
            <div class="mdl-card__title">
                <!--<p class="mdl-card__title-text"><? //echo "Fecha: " . $comment->getAlgo('fecha') ?></p>-->
                <p><? echo "Fecha: " . $comment->getAlgo('fecha') ?></p>
            </div>
            <div class="mdl-card__supporting-text">
                <p id="autor"><i class="material-icons">face</i>
                    <? echo "Autor: " . $comment->getAlgo('autor') ?></p>

                <p id="texto"><i class="material-icons">receipt</i>
                    <? echo "Texto: " . $comment->getAlgo('texto') ?></p>
            </div>

            <!--<div class="mdl-card__supporting-text"><i class="material-icons">receipt</i>
            </div>-->
            <!-- </div>-->
            </div>
            <hr>
        </div>
    <? endfor; ?>

<? endif; ?>
<? include 'footer.html'; ?>