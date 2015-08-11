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

<?php
if ((($_REQUEST['search'] != ""))) {

    $titulo = $_REQUEST['search'];
    $server = "localhost";
    $user = "root";
    $pass = "9psCXanh";
    $db = "blog";
// Create connection para tabla blog
    $conn = new mysqli($server, $user, $pass, $db);
// Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } else {
        // echo "no error\n";
        // echo "<br>";
    }
//consultamos
    $datos = "select * from blog where texto like '%" . $titulo . "%' OR titulo like '%" . $titulo . "%'";
    $results = $conn->query($datos);
    if (!$results) {
        echo "No existe el blog deseado\n";
        echo "<br>";
    } else {
        $row_cnt = $results->num_rows;
        if ($row_cnt > 0){
        //echo "Los datos se seleccionaron correctamente\n";
        // echo "<br>";

//cargamos los resultados
        echo "<table class='table table-bordered table-hover' id='tabla' align='center' border='1' cellspacing='1' cellpadding='2' style='font-size: 8pt'>
    <tr class='warning'>
        <td class='celda'><b>Autor</b></td>
        <td class='celda'><b>Fecha</b></td>
        <td class='celda'><b>Titulo</b></td>
        <td class='celda'><b>Texto</b></td>

    </tr>";
        while ($row = $results->fetch_array()) {
            echo "<tr class='info'><td><input type='text' size=auto id='textoNoBorde' name='Autor' value='" . $row[0] . "' readonly></td>";
            echo "<td id='celda'><input type='text' id='textoNoBorde' name='Fecha' value='" . $row[1] . "' readonly></td>";
            echo "<td id='celda'><input type='text' id='textoNoBorde' name='Titulo' value='" . $row[2] . "' readonly></td>";
            echo "<td id='celda'><textarea  id='textoNoBorde' name='Texto' readonly>$row[3]</textarea></td>";
        }
        echo "</tr>";
        echo "</table>";
        $conn->close();
    } else {echo "<h1>No existe el blog deseado</h1>";}
    }
    // cargamos el formulario de añadir comentarios
} else {
    echo "<h1>No ha insertado ningun contenido para la busqueda</h1>";
}
?>
</body>
</html>
