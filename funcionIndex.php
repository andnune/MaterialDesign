<?php
/**
 * funcion para index
 * para recuperar todos los blogs
 * User: andrescloudman
 */
function seleccTodoBlog()
{
    $server = "localhost";
    $user = "root";
    $pass = "9psCXanh";
    $db = "blog";
    $conn = new mysqli($server, $user, $pass, $db);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } else {
        $sentencia=  $conn->stmt_init();
        if (!$sentencia->prepare("select * from blog")){
            echo "Falló la preparación: (" . $conn->errno . ") " . $conn->error;
        } else {
            if (!($sentencia->execute())) {
                return "0";
            } else {
                /* vincular las variables de resultados */
                $arraydePosts = array();
                $sentencia->bind_result($Autor, $Fecha,$Titulo,$Texto,$id);
                /* obtener los valores */
                while ($sentencia->fetch()) {
                    array_push($arraydePosts,array(
                        "autor"=>$Autor,
                        "fecha"=>$Fecha,
                        "titulo"=>$Titulo,
                        "texto"=>$Texto,
                        "id" => $id,
                    ));
                }
                $conn->close();
                return $arraydePosts;
            }
        }
    }
};
/**
 * funcion para comments
 * para recuperar todos los comments en un blog
 * User: andrescloudman
 */
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
        if (!$sentencia->prepare("select * from comentarios where (blog_id=?)")) {//'$tittle'
            echo "Falló la preparación: (" . $conn->errno . ") " . $conn->error;
        } else {
            mysqli_stmt_bind_param($sentencia,"i",$tittle);
            if (!($sentencia->execute())) {
                return "0";
            } else {
                /* vincular las variables de resultados */
                $arraydePosts = array();
                $sentencia->bind_result($id,$Titulo,$Autor,$Texto,$blog_id);
                /* obtener los valores */
                while ($sentencia->fetch()) {
                    array_push($arraydePosts,array(
                        "titulo"=>$Titulo,
                        "autor"=>$Autor,
                        "texto"=>$Texto,
                        "blog_id" => $id,
                    ));
                }
                $conn->close();
                return $arraydePosts;
            }
        }
    }

};
/**
 * funcion para recuperar el texto de un blog
 * User: andrescloudman
 */
function seleccTexto($tittle)
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
        if (!$sentencia->prepare("select * from blog where (id=?)")) {//'$tittle'
            echo "Falló la preparación: (" . $conn->errno . ") " . $conn->error;
        } else {
            mysqli_stmt_bind_param($sentencia,"i",$tittle);
            if (!($sentencia->execute())) {
                return "0";
            } else {
                /* vincular las variables de resultados */
                $arraydePosts = array();
                $sentencia->bind_result($Autor, $Fecha,$Titulo,$Texto,$id);
                /* obtener los valores */
                while ($sentencia->fetch()) {
                    /*array_push($arraydePosts,array(
                        "autor"=>$Autor,
                        "fecha"=>$Fecha,
                        "titulo"=>$Titulo,
                        "texto"=>$Texto,
                        "id" => $id,
                    ));*/
                    $arraydePosts= array("autor"=>$Autor,"fecha"=>$Fecha,"titulo"=>$Titulo,"texto"=>$Texto,"id" => $id,);

                }
                $conn->close();
                return $arraydePosts;
            }
        }
    }

};
/**
 * funcion para insertar
 * un nuevo blog
 * User: andrescloudman
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
        //iniciamos el stmt
        $sentencia=  $conn->stmt_init();
        //preparamos la sentencia
        if (!$sentencia->prepare("INSERT INTO blog (autor, titulo, fecha, texto) VALUES (?, ?, ?, ?)")){
            echo "Falló la preparación: (" . $conn->errno . ") " . $conn->error;
        } else {
            mysqli_stmt_bind_param($sentencia,"ssss",$Autor, $Titulo, $Fecha, $Texto);

            if (!($sentencia->execute())) {
                $conn->close();
                return "0";
            } else {
                $conn->close();
                return '1';}
        }
    }
};
/**
 * funcion para buscar comentarios
 * en los blogs
 * User: andrescloudman
 */
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
        //iniciamos el stmt
        $sentencia=  $conn->stmt_init();
        //preparamos el statement (stmt)
        if (!$sentencia->prepare("select * from blog where texto like '%" . $titulo . "%' OR titulo like '%" . $titulo . "%'")){
            echo "Falló la preparación: (" . $conn->errno . ") " . $conn->error;
        } else {
            if (!($sentencia->execute())) {
                return "0";
            } else {
                /* vincular las variables de resultados */
                $arraydePosts = array();
                $sentencia->bind_result($Autor, $Fecha,$Titulo,$Texto, $id);
                /* obtener los valores */
                while ($sentencia->fetch()) {
                    array_push($arraydePosts,array(
                        "autor"=>$Autor,
                        "fecha"=>$Fecha,
                        "titulo"=>$Titulo,
                        "texto"=>$Texto,
                        "blog_id"=>$id,
                    ));
                }
                $conn->close();
                return $arraydePosts;
            }
        }
    }
};
/**
 * funcion para insertar comentarios
 * en los blogs
 * User: andrescloudman
 */
function insertComment($autor,$titulo,$texto){
    $Autor = $autor; $Titulo = $titulo; $Texto=$texto;
    $server = "localhost";
    $user = "root";
    $pass = "9psCXanh";
    $db = "blog";
    $conn = new mysqli($server, $user, $pass, $db);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } else {
        //iniciamos el stmt
        $sentencia=  $conn->stmt_init();
        //preparamos el statement (stmt)
        if (!$sentencia->prepare("INSERT INTO comentarios (autor, blog_id,texto ) VALUES(?,?,?)")){
            echo "Falló la preparación: (" . $conn->errno . ") " . $conn->error;
        } else {
            mysqli_stmt_bind_param($sentencia,"sis",$Autor, $Titulo, $Texto);
            if (!($sentencia->execute())) {
                return "0";
            } else {
                $conn->close();
                return "1";
            }
        }
    }
    //
};
?>