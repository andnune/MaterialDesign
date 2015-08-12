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
    <style>
        body{
            padding-top:50px;
        }
        span{
            background-color: white;
            font-size: 20px;
        }
        .celda{
            text-align: center;
            height: auto;
            width: auto;
        }
        #textoNoBorde{
            text-align: center;
            height: auto;
            width: auto;
            border-width:0;
        }
    </style>
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
<table  class='table table-bordered table-hover' id="tabla" align="center" border="1" cellspacing="1" cellpadding="2" style="font-size: 8pt">
    <tr class='warning'>
        <th class="celda"><b>Autor</b></th>
        <th class="celda"><b>Fecha</b></th>
        <th class="celda"><b>Titulo</b></th>
        <th class="celda"><b>Texto</b></th>

    </tr>
    <? foreach ($results as $post): ?>
        <form action='post.php' method='post'>
    <tr class='info'><td class='celda'><input type='text' size=auto id='textoNoBorde'  name='Autor' value="<? echo $post['autor'] ?>" readonly></td>
        <td class='celda'><input type='text' id='textoNoBorde' name='Fecha' value="<? echo $post['fecha'] ?>" readonly></td>
        <td class='celda'><input type='text' id='textoNoBorde' name='Titulo' value="<? echo $post['titulo'] ?>"  readonly></td>
       <? $textoCorto = $post['texto'];
        $textoFinal = substr($textoCorto, 0, 20);?>
       <td class='celda'><input type='text' id='textoNoBorde' name='Texto' value="<? echo $textoFinal ?>" readonly></td>
        <td class='celda'><button class='btn btn-default' id='boton' name='Acceder' readonly><i class='glyphicon glyphicon-eye-open'></i>Acceder</td>
        </tr>
            </form>
    <? endforeach; ?>
</body>
</html>
