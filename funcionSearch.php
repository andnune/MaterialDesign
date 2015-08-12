<?php
function searchBlog($search){
        $titulo = $search;
        $server = "localhost";
        $user = "root";
        $pass = "9psCXanh";
        $db = "blog";
        $conn = new mysqli($server, $user, $pass, $db);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } else {
            $sentencia=  $conn->stmt_init();
            if (!$sentencia->prepare("select * from blog where texto like '%" . $titulo . "%' OR titulo like '%" . $titulo . "%'")){
                echo "Falló la preparación: (" . $conn->errno . ") " . $conn->error;
            } else {
                if (!($sentencia->execute())) {
                    return "0";
                } else {
                    /* vincular las variables de resultados */
                    $arraydePosts = array();
                    $sentencia->bind_result($Autor, $Fecha,$Titulo,$Texto);
                    /* obtener los valores */
                    while ($sentencia->fetch()) {
                        array_push($arraydePosts,array(
                            "autor"=>$Autor,
                            "fecha"=>$Fecha,
                            "titulo"=>$Titulo,
                            "texto"=>$Texto,
                        ));
                    }
                    $conn->close();
                    return $arraydePosts;
                }
            }
        }
        //
};

?>