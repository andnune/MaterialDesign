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
        h2{
            color:red;
        }
    </style>
</head>
<body>
<?php
/**
 * Created by PhpStorm.
 * User: andrescloudman
 * Date: 12/08/15
 * Time: 8:35
 */
function insertBlog($Autor,$Titulo,$Fecha,$Texto){
        $server = "localhost";
        $user = "root";
        $pass = "9psCXanh";
        $db = "blog";
// Create connection
        $conn = new mysqli($server, $user, $pass, $db);
        if ($conn->connect_error) {
            echo "<h2>";
            die("Connection failed: " . $conn->connect_error);
            echo "</h2>";
        } else {
            $sentencia=  $conn->stmt_init();
            if (!$sentencia->prepare("INSERT INTO blog (autor, titulo, fecha, texto) VALUES (?, ?, ?, ?)")){
                echo "Falló la preparación: (" . $conn->errno . ") " . $conn->error;
            } else {
             mysqli_stmt_bind_param($sentencia,"ssss",$Autor, $Titulo, $Fecha, $Texto);

            if (!($sentencia->execute())) {
                $conn->close();
                return "0";
            } else {
                $conn->close();
                return 1;}
            }
        }


};
?>
</body>
</html>
