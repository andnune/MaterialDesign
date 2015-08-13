<?php
require 'funcionIndex.php';
//cargamos los resultados
$results = seleccTodoBlog();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Blog  php</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="estilos.css">
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container-fluid">
            <span class="brand">blog aplicacion</span>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="newPost.php">nuevoPost</a></li>
                <li><a href="searchPost.php">buscarPost</a></li>
            </ul>
        </div>
    </div>
</nav>
<div class='container-fluid'>
<!--<div class="col-md-4 ">-->
    <? foreach ($results as $post): ?>
        <div class="panel col-sm-4" onclick='window.document.location="post.php?whatever=<? echo $post['titulo'] ?>"'>
            <div class="panel-heading"><b><a href="post.php?whatever=<? echo $post['titulo'] ?>">Tittle: <h7><? echo $post['titulo'] ?></h7></a></b></div>
            <div class="panel-body"><b>Author: <? echo $post['autor'] ?></b></div>
            <div class="panel-body"><b>Date: <? echo $post['fecha'] ?></b></div>
            <? $textoCorto = $post['texto'];
        $textoFinal = substr($textoCorto, 0, 20);?>
            <div class="panel-body"><b>Body: <? echo /*$post['texto']*/$textoFinal ?></b></div>
        </div>
    <? endforeach; ?>
    </div>
</body>
</html>
