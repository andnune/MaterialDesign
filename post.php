<?php
require 'funcionIndex.php';
if ((($_GET['whatever'] != ""))){
    $titulo = $_GET['whatever'];
    $results = seleccTexto($titulo);
    $resultsComments = seleccComments($titulo);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Blog php</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="estilos.css">
</head>
<body>
<br>
<br>
<br>
<div class="container">
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="navbar-inner">
            <div class="container-fluid">
                <span class="brand">blog aplicacion</span>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="index.php">Inicio</a></li>
                    <li><a href="newPost.php">nuevoPost</a></li>
                    <li><a href="searchPost.php">buscarPost</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <? if (empty($results[0])): ?>
        <h2>Error al seleccionar los datos</h2>
        <br>
    <? else: ?>
    <!--cargamos los resultados-->
    <? foreach ($results as $post): ?>
            <div class="panel ">
                <div class="panel-heading"><b>Tittle: <h7><? echo $post['titulo'] ?></h7></b></div>
                <div class="panel-body"><b>Author: <? echo $post['autor'] ?></b></div>
                <div class="panel-body"><b>Body: <? echo $post['texto'] ?></b></div>
                <div class="panel-body"><b>Date: <? echo $post['fecha'] ?></b></div>
            </div>
<? endforeach; ?>
<? endif; ?>
<!-- cargamos el formulario de añadir comentarios-->
<hr>
<form id="formInsertComment" action='insertarComentario.php' method='post'>
    <h4>Nuevo comentario</h4>
    <input type='text' placeholder='Introduce Autor' size='100px' id='textoBorde' name='Autor'><br>
    <input type='text' placeholder='Introduce titulo' size='100px' id='textoBorde' value="<? echo $post['titulo'] ?>"
           name='Titulo' readonly><br>
    <input type='text' placeholder='Introduce Texto' size='100px' id='textoBorde' name='Texto'><br>
    <button class='btn btn-default' id='boton'><i class='glyphicon glyphicon-send'></i>Enviar</button>
</form>
<hr>
<h4 id="Comentarios">Comentarios:</h4>
<hr>
<? if (empty($resultsComments)) : ?>
    <h2>No hay comentarios almacenados</h2>
    <br>
<? else: ?>

        <? foreach ($resultsComments as $post): ?>
        <div class='list-group'>
        <a class="list-group-item ">
            <h4 id="autor" class="list-group-item-heading"><? echo $post['autor'] ?></h4>
                   <p class="list-group-item-text"><? echo $post['texto'] ?></p>
        </a>
        </div>
        <? endforeach; ?>
<? endif; ?>
    </div>
</body>
</html>
