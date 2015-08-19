<?php
/**
 * funcion para index/ ahora tendra que ir hacia class modelo
 * para recuperar todos los blogs
 * User: andrescloudman
 */
function conexion(){
    $server = "localhost";
    $user = "root";
    $pass = "9psCXanh";
    $db = "blog";
    $conn = new mysqli($server, $user, $pass, $db);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } else {
        return $conn;
    }
};
?>