<?php
function seleccComments($tittle)
{
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
//iniciamos el stmt
        $sentencia = $conn->stmt_init();
        //preparamos el stmt
        if (!$sentencia->prepare("select * from comentarios where (titulo=?)")) {
            echo "Falló la preparación: (" . $conn->errno . ") " . $conn->error;
        } else {
            mysqli_stmt_bind_param($sentencia,"s",$tittle);
            if (!($sentencia->execute())) {
                return "0";
            } else {
                /* vincular las variables de resultados */
                $arraydePosts = array();
                $sentencia->bind_result($Autor,$Titulo,$Texto);
                /* obtener los valores */
                while ($sentencia->fetch()) {
                    array_push($arraydePosts,array(
                        "autor"=>$Autor,
                        "titulo"=>$Titulo,
                        "texto"=>$Texto,
                    ));
                }
                $conn->close();
                return $arraydePosts;
            }
        }
    }

}
?>