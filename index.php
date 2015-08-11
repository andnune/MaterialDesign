<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Blog  php</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <!--<script src="funciones.php"></script>-->

    <style>
        span{
            background-color: white;
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
                <li><a href="newPost.php">nuevoPost</a></li>
                <li><a href="searchPost.php">buscarPost</a></li>
            </ul>
        </div>
    </div>
</nav>
    <br>
    <br>
    <br>
    <?php
    require 'funciones.php';
    //include("./funciones.php");
/*$server = "localhost";
$user = "root";
$pass="9psCXanh";
$db = "blog";
// Create connection
$conn = new mysqli($server, $user, $pass, $db);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
   // echo "no error\n";
   // echo "<br>";
}
//consultamos
$datos="select * from blog ";
$results = $conn->query($datos);
if(!$results){
    echo "Error al seleccionar los datos\n";
    echo "<br>";
}else{
    //echo "Los datos se seleccionaron correctamente\n";
   // echo "<br>";
}
if (mysqli_num_rows($results)==0){ echo "FALLOOOOO\n";}*/
//cargamos los resultados
$results = seleccTodoBlog();
    $row_cnt = $results->num_rows;
    if ($row_cnt > 0) {
        while ($row = $results->fetch_array()) {
            //}
            //mostramos los datos
            echo "<form action='post.php' method='post'>";
            echo "<tr class='info'><td><input type='text' size=auto id='textoNoBorde' name='Autor' value='" . $row[0] . "' readonly></td>";
            echo "<td id='celda'><input type='text' id='textoNoBorde' name='Fecha' value='" . $row[1] . "' readonly></td>";
            echo "<td id='celda'><input type='text' id='textoNoBorde' name='Titulo' value='" . $row[2] . "' readonly></td>";
            $textoCorto = $row[3];
            $textoFinal = substr($textoCorto, 0, 20);
            echo "<td id='celda'><input type='text' id='textoNoBorde' name='Texto' value='" . $textoFinal . "' readonly></td>";
            echo "<td id='celda'><button class='btn btn-default' id='boton' name='Acceder' readonly><i class='glyphicon glyphicon-eye-open'></i>Acceder</td>";
            echo "</tr>";
            echo "</form>";
        }
        echo "</tr>";
        echo "</table";
    }
        mysql_close($conn);
?>
</body>
</html>
