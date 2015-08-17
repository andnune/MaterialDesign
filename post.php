<?php
require 'funcionIndex.php';
include 'header.html';
if ((($_GET['whatever'] != ""))) {
    $titulo = $_GET['whatever'];
    $results = seleccTexto($titulo);
    $resultsComments = seleccComments($titulo);
}
?>
<? if (empty($results)): ?>
    <h2>Error al seleccionar los datos</h2>
    <br>
<? else: ?>
    <!--cargamos los resultados-->
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <img  class="img-responsive imagenPost" src="<? echo $results['img'] ?>"/>
            <small> <? echo $results['fecha'] ?> por: <? echo $results['autor'] ?></small>
            <h3><? echo $results['titulo'] ?></h3>
            <? echo $results['texto'] ?>

            <!-- cargamos el formulario de añadir comentarios-->
            <hr>
            <h4>Nuevo comentario:</h4>
            <form class="form-horizontal" id="formInsertComment" action='insertarComentario.php' method='post'>
                <div class="form-group">
                    <label for="inputAutor" class="col-sm-2 control-label">Autor</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputAutor" placeholder="Autor" name="Autor">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputTexto" class="col-sm-2 control-label">Texto</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputTexto" placeholder="Texto" name="Texto">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10"> <!-- offset para dejar en blanco-->
                        <button type="submit" class="btn btn-success"><i class='glyphicon glyphicon-send'></i> Enviar</button>
                    </div>
                </div>
                <input type='hidden' name='id_blog' value="<? echo $results['id'] ?>">
            </form>
            <hr>

            <!-- ZONA COMMENTS-->
            <h4 id="Comentarios">Comentarios:</h4>
            <? if (empty($resultsComments)) : ?>
                <h2>No hay comentarios almacenados</h2>
            <? else: ?>

                <? foreach ($resultsComments as $post): ?>
                    <div class='list-group'>
                        <a class="list-group-item ">
                            <small class="pull-right"><? echo "Fecha: " . $post['fecha'] ?></small><h4 id="autor" class="list-group-item-heading"><i class="glyphicon glyphicon-user"></i>  <? echo "Autor: " . $post['autor'] ?></h4>

                            <p class="list-group-item-text"><i class='fa fa-user'></i><? echo "Texto: " . $post['texto'] ?></p>
                        </a>
                    </div>
                <? endforeach; ?>
            <? endif; ?>
        </div>
    </div>
<? endif; ?>




<? include 'footer.html'; ?>

