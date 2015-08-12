<?php
require 'funcionSearch.php';
if ((($_REQUEST['search'] != ""))) {
    $results = searchBlog($_REQUEST['search']);
} else {
    echo "<h2>No ha insertado ningun contenido para la busqueda</h2>";
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
    <style>
        span {
            background-color: white;
            font-size: 20px;
        }
         h2{
             color:red;
         }
        .celda {
            text-align: center;
            height: auto;
            width: auto;
        }

        form {
            text-align: center;
            left: 10px;
        }

        #textoNoBorde {
            text-align: center;
            height: auto;
            width: auto;
            border-width: 0;
        }
    </style>
</head>
<body>
<br>
<br>
<br>


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

<? if (empty($results)) : ?>
        <h2>No existe el blog deseado</h2>
        <br>
      <? else: ?>
            <table class='table table-bordered table-hover' id='tabla' align='center' border='1' cellspacing='1' cellpadding='2' style='font-size: 8pt'>
                <tr class='warning'>
                    <td class='celda'><b>Autor</b></td>
                    <td class='celda'><b>Fecha</b></td>
                    <td class='celda'><b>Titulo</b></td>
                    <td class='celda'><b>Texto</b></td>
                </tr>
           <? foreach ($results as $post): ?>
                <tr class='info'><td class='celda'><input type='text' size=auto id='textoNoBorde' name='Autor' value="<? echo $post['autor'] ?>" readonly></td>
                    <td class='celda'><input type='text' id='textoNoBorde' name='Fecha' value="<? echo $post['fecha'] ?>" readonly></td>
                   <td class='celda'><input type='text' id='textoNoBorde' name='Titulo' value="<? echo $post['titulo'] ?>" readonly></td>
                    <td class='celda'><textarea  id='textoNoBorde' name='Texto' readonly><? echo $post['texto'] ?></textarea></td>
        <? endforeach; ?>
      <? endif; ?>
            </tr>
            </table>
</body>
</html>
