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
        span{
            background-color: white;
            font-size: 20px;
        }
        form{
		position:relative;
		left: 10%;
	}
	button{
		position:relative;
		left:25%;
	}
    </style>
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container-fluid">
            <span class="brand">blog aplicacion</span>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="index.php">Inicio</a></li>
                <li><a href="searchPost.php">buscarPost</a></li>
            </ul>
        </div>
    </div>
</nav>
<br>
<br>
<br>
<form action='insertarPost.php' method='post'>
    <input type='text' placeholder="Autor" size="100px" id='textoNoBorde' name='Autor'><br>
    <input type='text' placeholder="Fecha" size="100px" id='textoNoBorde' name='Fecha'><br>
    <input type='text' placeholder="Introduce titulo" size="100px" id='textoNoBorde' name='Titulo'><br>
    <input type='text' placeholder="Texto" size="100px" id='textoNoBorde' name='Texto'><br>
   <button class="btn btn-default" id='boton'><i class="glyphicon glyphicon-eye-open"></i>Enviar
   </form>

</body>
</html>
<?php

?>
