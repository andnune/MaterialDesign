<?php
$Autor= "yo";$Titulo= "localhost2";$Fecha= "2015-02-10";$Texto= "prueba";
        $server = "localhost";
        $user = "root";
        $pass = "9psCXanh";
        $db = "blog";
// Create connection
        $conn = new mysqli($server, $user, $pass, $db);
//conectamos
        if ($conn->connect_error) {
            echo "<h2>";
            die("Connection failed: " . $conn->connect_error);
            echo "</h2>";
        } else {
//preparamos sentencia
            if (!$sentencia = mysqli_prepare($conn,("INSERT INTO blog (autor, titulo, fecha, texto) VALUES (?, ?, ?, ?)"))) {
                echo "Falló la preparación: (" . $conn->errno . ") " . $conn        ->error;
            } else {echo "bien1\n";}
//vinculamos sentencia
if (!(mysqli_stmt_bind_param($sentencia,"ssss",$Autor, $Titulo, $Fecha, $Texto))){
echo "fallo al vincular\n";} else {echo "no fallo al vincular\n";}
if (!(mysqli_stmt_execute($sentencia))){echo "fallo al ejecutar\n";} else {echo "no fallo al ejecutar\n";}
if (!(mysqli_stmt_close($sentencia))){echo "fallo al cerrar\n";} else {echo "no fallo al cerrar\n";}
        }
$conn->close();

?>
