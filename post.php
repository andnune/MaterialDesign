<?php
require 'funcionSelectTexto.php';
require 'funcionComments.php';
if ((($_REQUEST['Autor'] != " ")) && (($_REQUEST['Titulo'] != " ")) && (($_REQUEST['Fecha'] != " ")) && (($_REQUEST['Texto'] != " "))) {
    $autor = $_REQUEST['Autor'];
    $titulo = $_REQUEST['Titulo'];
    $fecha = $_REQUEST['Fecha'];
    $texto = $_REQUEST['Texto'];
    $results = seleccTexto($titulo);
}
$resultsComments = seleccComments($titulo);
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
    <script>
        function myFunction() {
            location.replace("http://localhost/primeroPhpStorm/index.php");
        }
    </script>
    <style>
        h4{
            text-align: center;
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
	form{
		text-align: center;
		left:10px;		
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
<br>
<br>
<br>
<table  class='table table-bordered table-hover' id="tabla" align="center" border="1" cellspacing="1" cellpadding="2" style="font-size: 8pt">
    <tr class='warning'>
        <td class="celda"><b>Autor</b></td>
        <td class="celda"><b>Fecha</b></td>
        <td class="celda"><b>Titulo</b></td>
        <td class="celda"><b>Texto</b></td>

    </tr>

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

    <? if(empty($results)): ?>
    <h4>Error al seleccionar los datos</h4>
    <br>
    <? else: ?>
<!--cargamos los resultados-->
   <? foreach ($results as $post): ?>
        <tr class='info'><td><input type='text' align='center' size=auto id='textoNoBorde' name='Autor' value="<? echo $post['autor'] ?>" readonly></td>
        <td id='celda'><input type='text' align='center' id='textoNoBorde' name='Fecha' value="<? echo $post['fecha'] ?>" readonly></td>
        <td id='celda'><input type='text' align='center' id='textoNoBorde' name='Titulo' value="<? echo $post['titulo'] ?>" readonly></td>
        <td id='celda'><textarea  align='center' id='textoNoBorde' name='Texto' readonly>"<? echo $post['texto'] ?>"</textarea></td>
        </tr>
        </table>
    <? endforeach; ?>
    <? endif; ?>
<!-- cargamos el formulario de añadir comentarios-->
<hr>

<form action='insertarComentario.php' method='post'>
    <h4>Nuevo comentario</h4>
    <input type='text' placeholder='Introduce Autor' size='100px' id='textoBorde' name='Autor'><br>
    <input type='text' placeholder='Introduce titulo' size='100px' id='textoBorde' value='$titulo' name='Titulo'><br>
    <input type='text' placeholder='Introduce Texto' size='100px' id='textoBorde' name='Texto'><br>
   <button class='btn btn-default' id='boton'><i class='glyphicon glyphicon-send'></i>Enviar</button>
   </form>
<hr>
<h4>Comentarios:</h4>
<hr>
<? if (empty($resultsComments)) : ?>
    <h2>No hay comentarios almacenados</h2>
    <br>
<? else: ?>
    <div class='container'>
        <? foreach ($resultsComments as $post): ?>
    <div class='jumbotron'><p><b><? echo $post['autor'] ?></b><br>
    <b><? echo $post['texto'] ?></b></p><br></div>
        <? endforeach; ?>
    </div>
<? endif; ?>
</body>
</html>
