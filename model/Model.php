<?php

class Post
{
    private $conn;
    private $arraydePosts;
    private $id;
    private $autor;
    private $texto;
    private $fecha;
    private $img;
    private $titulo;

    public function __construct()
    {
        //$this->conn=Model::conexion();
        $this->conn = conexion();
        $this->modelo = array();
    }

    /* public function __construct2($autor,$fecha,$titulo,$text,$id,$imageLink){
         //$this->conn=Model::conexion();
         $this->conn=conexion();
         $this->arraydePosts=array($autor,$fecha,$titulo,$text,$id,$imageLink);
     }*/
    public function get_blogs()
    {
        $modelo = array();
        // $this->conn=Model::conexion();
        $this->conn = conexion();
        $sentencia = $this->conn->stmt_init();
        if (!$sentencia->prepare("select * from blog")) {
            echo "Falló la preparación: (" . $this->conn->errno . ") " . $this->conn->error;
        } else {
            if (!($sentencia->execute())) {
                return "0";
            } else {
                /* vincular las variables de resultados */
                //$sentencia->bind_result($Autor, $Fecha, $Titulo, $Texto, $Id, $Img);
                $sentencia->bind_result($this->Autor, $this->Fecha, $this->Titulo, $this->Texto, $this->Id, $this->Img);
                /* obtener los valores */
                /*while ($sentencia->fetch()) {
                    array_push($modelo, array(
                        "autor" => Autor,
                        "fecha" => Fecha,
                        "titulo" => Titulo,
                        "texto" => Texto,
                        "id" => Id,
                        "img" => Img,
                    ));
                }*/
                while ($row = $sentencia->fetch()) {
                    $this->Post[]=$row;
                    var_dump($this->Post[Fecha]);
                }
               // var_dump($modelo);
               // $this->Post=$modelo;
                //var_dump($this->Post);
                /* obtener los valores */
                /*while ($row = $sentencia->fetch()) {
                    //$this->Post[]=$row;
                    array_push($this,$row);

                }*/
                //while ($filas=$sentencia->fetch()) {
                /* $this->modelo[0]=$Autor;
                 $this->modelo[1]=$Fecha;
                 $this->modelo[2]=$Titulo;
                 $this->modelo[3]=$Texto;
                 $this->modelo[4]=$id;
                 $this->modelo[4]=$img;*/
                //$modelo[]=$filas;
                //}
            }
        }
        //Devolvemos el resultado en forma de array de objetos=> "$modelo"
        $this->conn->close();
        //return $modelo;
        return $this->Post;
    }

    public function seleccComments($tittle)
    {
        $this->conn = conexion();
// Check connection
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        } else {
//iniciamos el stmt
            $sentencia = $this->conn->stmt_init();
            //preparamos el stmt
            if (!$sentencia->prepare("select * from comentarios where (blog_id=?)")) {//'$tittle'
                echo "Falló la preparación: (" . $this->conn->errno . ") " . $this->conn->error;
            } else {
                mysqli_stmt_bind_param($sentencia, "i", $tittle);
                if (!($sentencia->execute())) {
                    return "0";
                } else {
                    /* vincular las variables de resultados */
                    $arraydePosts = array();
                    $sentencia->bind_result($id, $Titulo, $Autor, $Texto, $blog_id, $fecha);
                    /* obtener los valores */
                    while ($sentencia->fetch()) {
                        array_push($arraydePosts, array(
                            "titulo" => $Titulo,
                            "autor" => $Autor,
                            "texto" => $Texto,
                            "blog_id" => $id,
                            "fecha" => $fecha,
                        ));
                    }
                    $this->conn->close();
                    return $arraydePosts;
                }
            }
        }
    }

    /**
     * funcion para recuperar el texto de un blog
     * User: andrescloudman
     */
    public function seleccTexto($tittle)
    {
        $this->conn = conexion();
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        } else {
//iniciamos el stmt
            $sentencia = $this->conn->stmt_init();
            //preparamos el stmt
            if (!$sentencia->prepare("select * from blog where (id=?)")) {
                echo "Falló la preparación: (" . $this->conn->errno . ") " . $this->conn->error;
            } else {
                mysqli_stmt_bind_param($sentencia, "i", $tittle);
                if (!($sentencia->execute())) {
                    return "0";
                } else {
                    /* vincular las variables de resultados */
                    //$arraydePosts = array();
                    $sentencia->bind_result($this->Autor, $this->Fecha, $this->Titulo, $this->Texto, $this->Id, $this->Img);
                    /* obtener los valores */
                   while ($row = $sentencia->fetch()) {
                       $this->Post[]=$row;
                    }
                    $this->conn->close();
                    return $this->Post;
                }
            }
        }
    }

    public function insertComment($autor, $titulo, $texto)
    {
        $Autor = $autor;
        $Titulo = $titulo;
        $Texto = $texto;
        $fecha = date("Y-n-d H:i:s");
        $this->conn = conexion();
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        } else {
            //iniciamos el stmt
            $sentencia = $this->conn->stmt_init();
            //preparamos el statement (stmt)
            if (!$sentencia->prepare("INSERT INTO comentarios (autor, blog_id,texto,fecha ) VALUES(?,?,?,?)")) {
                echo "Falló la preparación: (" . $this->conn->errno . ") " . $this->conn->error;
            } else {
                mysqli_stmt_bind_param($sentencia, "siss", $Autor, $Titulo, $Texto, $fecha);
                if (!($sentencia->execute())) {
                    return "0";
                } else {
                    $this->conn->close();
                    return "1";
                }
            }
        }
        //
    }

    public function searchBlog($search)
    {
        $titulo = $search;
        $this->conn = conexion();
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        } else {
            //iniciamos el stmt
            $sentencia = $this->conn->stmt_init();
            //preparamos el statement (stmt)
            if (!$sentencia->prepare("select * from blog where texto like '%" . $titulo . "%' OR titulo like '%" . $titulo . "%'")) {
                echo "Falló la preparación: (" . $this->conn->errno . ") " . $this->conn->error;
            } else {
                if (!($sentencia->execute())) {
                    return "0";
                } else {
                    /* vincular las variables de resultados */
                    $arraydePosts = array();
                    $sentencia->bind_result($Autor, $Fecha, $Titulo, $Texto, $id, $img);
                    /* obtener los valores */
                    while ($sentencia->fetch()) {
                        array_push($arraydePosts, array(
                            "autor" => $Autor,
                            "fecha" => $Fecha,
                            "titulo" => $Titulo,
                            "texto" => $Texto,
                            "blog_id" => $id,
                        ));
                    }
                    $this->conn->close();
                    return $arraydePosts;
                }
            }
        }
    }

    public function insertBlog($Autor, $Titulo, $Fecha, $Texto, $img)
    {
        $this->conn = conexion();
// Create connection
        if ($this->conn->connect_error) {
            echo "<h2>";
            die("Connection failed: " . $this->conn->connect_error);
            echo "</h2>";
        } else {
            //iniciamos el stmt
            $sentencia = $this->conn->stmt_init();
            //preparamos la sentencia
            if (!$sentencia->prepare("INSERT INTO blog (autor, titulo, fecha, texto,imageLink) VALUES (?, ?, ?, ?,?)")) {
                echo "Falló la preparación: (" . $this->conn->errno . ") " . $this->conn->error;
            } else {
                mysqli_stmt_bind_param($sentencia, "sssss", $Autor, $Titulo, $Fecha, $Texto, $img);
                if (!($sentencia->execute())) {
                    $this->conn->close();
                    return "0";
                } else {
                    $this->conn->close();
                    return '1';
                }
            }
        }
    }

}
