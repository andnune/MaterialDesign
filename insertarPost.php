<html>
<meta charset="utf-8">
<meta charset="UTF-8">
<head>
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
    span{
        background-color: white;
        font-size: 20px;
    }
    h2{
        color:red;
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
                <li><a href="newPost.php">nuevoPost</a></li>
            </ul>
        </div>
    </div>
</nav>
<br>
<br>
<br>
<?php

if ((($_REQUEST['Autor'] != "")) && (($_REQUEST['Titulo'] != "")) && (($_REQUEST['Fecha'] != "")) && (($_REQUEST['Texto'] != ""))) {
    $autor = $_REQUEST['Autor'];
    $titulo = $_REQUEST['Titulo'];
    $fecha = $_REQUEST['Fecha'];
    $texto = $_REQUEST['Texto'];
    require 'funcionInsertPost.php';
    $consulta=insertBlog($autor,$titulo,$fecha,$texto);
    if ($consulta == 0) {
        echo "<h2>Error al insertar los datos</h2><br>";
    } else {
        echo '<script type="text/javascript">'
        , 'myFunction();'
        , '</script>';
    }
} else {
    echo " <h2>Fallo en los datos a insertar</h2>";
}

        //$conn->close();
?>
</body>
</html>
