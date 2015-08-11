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
        /*.jumbotron{
            position:relative;
            left:150px;
        }*/
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

<?php
if ((($_REQUEST['Autor'] != " ")) && (($_REQUEST['Titulo'] != " ")) && (($_REQUEST['Fecha'] != " ")) && (($_REQUEST['Texto'] != " "))) {
$autor = $_REQUEST['Autor'];
$titulo = $_REQUEST['Titulo'];
$fecha = $_REQUEST['Fecha'];
$texto = $_REQUEST['Texto'];
$server = "localhost";
$user = "root";
$pass="9psCXanh";
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
$datos="select texto from blog where (titulo='".$titulo."')";
$results = $conn->query($datos);
if(!$results){
    echo "Error al seleccionar los datos\n";
    echo "<br>";
}else{
    //echo "Los datos se seleccionaron correctamente\n";
    // echo "<br>";
}
//cargamos los resultados
while ($row = $results->fetch_array()) {
    $texto = $row[0];
}
        echo "<tr class='info'><td><input type='text' align='center' size=auto id='textoNoBorde' name='Autor' value='" .$autor . "' readonly></td>";
        echo "<td id='celda'><input type='text' align='center' id='textoNoBorde' name='Fecha' value='".$fecha."' readonly></td>";
        echo "<td id='celda'><input type='text' align='center' id='textoNoBorde' name='Titulo' value='" .$titulo . "' readonly></td>";
        echo "<td id='celda'><textarea  align='center' id='textoNoBorde' name='Texto' readonly>$texto</textarea></td>";
    } else {
        echo 'algo falló\n';
        echo '<br>';
}
echo "</tr>";
echo "</table>";
 $conn->close();
// cargamos el formulario de añadir comentarios
echo "<hr>";
echo "
<form action='insertarComentario.php' method='post'>
    <h4>Nuevo comentario</h4>
    <input type='text' placeholder='Introduce Autor' size='100px' id='textoBorde' name='Autor'><br>
    <input type='text' placeholder='Introduce titulo' size='100px' id='textoBorde' value='$titulo' name='Titulo'><br>
    <input type='text' placeholder='Introduce Texto' size='100px' id='textoBorde' name='Texto'><br>
   <button class='btn btn-default' id='boton'><i class='glyphicon glyphicon-send'></i>Enviar</button>
   </form>";
echo "<hr>";
// Create connection para tabla comentarios y les mostramos
$conn = new mysqli($server, $user, $pass, $db);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    // echo "no error\n";
    // echo "<br>";
}
$datos="select * from comentarios where (titulo='".$titulo."')";
$results = $conn->query($datos);
if(!$results){
    echo "Error al seleccionar los datos\n";
    echo "<br>";
}else{
    //echo "Los datos se seleccionaron correctamente\n";
    // echo "<br>";
    $row_cnt = $results->num_rows;
if ($row_cnt > 0){
    echo "<h4>Comentarios:</h4>";
    echo "<div class='container'>";
} else {echo "<h4>No hay comentarios almacenados:</h4>";}
//cargamos los resultados
while ($row = $results->fetch_array()) {
    echo "<div class='jumbotron'><p><b>$row[1]</b><br>";
    echo "<b>$row[2]</b></p><br></div>";

}
    echo "</div>";
}
 $conn->close();
?>
</body>
</html>
