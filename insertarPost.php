<html>
<meta charset="utf-8">
<head>
</head>
<script>
function myFunction() {
    location.replace("http://localhost/primeroPhpStorm/index.php");
};
</script>
<?php
if ((($_REQUEST['Autor'] != "")) && (($_REQUEST['Titulo'] != "")) && (($_REQUEST['Fecha'] != "")) && (($_REQUEST['Texto'] != ""))) {
    $autor = $_REQUEST['Autor'];
    $titulo = $_REQUEST['Titulo'];
    $fecha = $_REQUEST['Fecha'];
    $texto = $_REQUEST['Texto'];
echo"oo\n";
echo $texto;echo ";".$autor;echo ";".$titulo;echo ";".$fecha;
    $server = "localhost";
    $user = "root";
    $pass = "9psCXanh";
    $db = "blog";
// Create connection
    $conn = new mysqli($server, $user, $pass, $db);
// Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } else {
        // echo "no error\n";
        // echo "<br>";
        $datos='INSERT into blog (autor, titulo,fecha, texto) values ("'.$autor.'","'.$titulo.'","'.$fecha.'","'.$texto.'");';
  //$datos='INSERT into blog (autor, titulo,fecha, texto) values ("and","ahora2","88-55-99 88:55:19","prueba para ver");';
        $consulta= $conn->query($datos);
        if(!$consulta){
            echo "Error al insertar los datos\n";
        }else{
            echo '<script type="text/javascript">'
            , 'myFunction();'
            , '</script>'
            ;
        }
        $conn->close();

    }
} else {
    echo "fallo al recibir";
}
?>
</body>
</html>
