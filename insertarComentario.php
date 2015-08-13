<?php
require ('funcionIndex.php');
if ((($_REQUEST['Autor'] != "")) && (($_REQUEST['Titulo'] != "")) && (($_REQUEST['Texto'] != ""))) {
    $seguir = 1;
    $autor = $_REQUEST['Autor'];
    $titulo = $_REQUEST['Titulo'];
    $texto = $_REQUEST['Texto'];
    $consulta = insertComment($autor,$titulo,$texto);
} else {
    $seguir = 0;
    echo "<div class='container'><h2> Los datos no pueden  quedar sin rellenar </h2></div>";
}
?>
<html>
<meta charset="utf-8">
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="estilos.css">
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
</head>
<body>
<? if ($seguir == 1) : ?>
    <? if ($consulta == 0) : ?>
        <div class='container'><h2>Error al insertar los datos en el comentario</h2></div>
    <? else: ?>
        <? header('Location: http://localhost/primeroPhpStorm/index.php'); ?>
    <? endif; ?>
<? endif; ?>
</body>
</html>
