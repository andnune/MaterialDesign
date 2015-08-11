<html>
<meta charset="utf-8">
<head>
</head>
<script>
    function myFunction() {
        location.replace("http://localhost/primeroPhpStorm/index.php");
    }
</script>
<?php
if ((($_REQUEST['Autor'] != "")) && (($_REQUEST['Titulo'] != "")) && (($_REQUEST['Fecha'] != "")) && (($_REQUEST['Texto'] != ""))) {
    $autor = $_REQUEST['Autor'];
    $titulo = $_REQUEST['Titulo'];
    $fecha = $_REQUEST['Fecha'];
    $texto = $_REQUEST['Texto'];
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
        $datos = 'INSERT into blog (autor, titulo,fecha, texto) values ("' . $autor . '","' . $titulo . '","' . $fecha . '","' . $texto . '");';
       /* $sentencia = $mbd->prepare("INSERT INTO blog (autor, titulo, fecha, texto) VALUES (?, ?, ?, ?)");
        $sentencia->bindParam(1, $autor);
        $sentencia->bindParam(2, $titulo);
        $sentencia->bindParam(3, $fecha);
        $sentencia->bindParam(4, $texto);*/
        //$sentencia->execute();
        $consulta = $conn->query($datos);
        if (!$consulta) {
            echo "Error al insertar los datos\n";
        } else {
            echo '<script type="text/javascript">'
            , 'myFunction();'
            , '</script>';
        }
        $conn->close();

    }
} else {
    echo "fallo al recibir";
}
?>
</body>
</html>
