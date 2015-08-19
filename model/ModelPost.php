<?php
require_once "collection/Collection.php";

class Post
{
    private $conn;
    private $id;
    private $autor;
    private $texto;
    private $fecha;
    private $img;
    private $titulo;

    public function __construct($array)
    {
        $this->conn = conexion();
        $this->id = $array['id'];
        $this->autor = $array['autor'];
        $this->texto = $array['texto'];
        $this->fecha = $array['fecha'];
        $this->img = $array['img'];
        $this->titulo = $array['titulo'];
    }

    public function getAlgo($algo)
    {
        return ($this->$algo);
    }
    public static function getAllPosts()
    {
        $conn = conexion();
        $sentencia = $conn->stmt_init();
        if (!$sentencia->prepare("select * from blog ORDER BY (titulo)")) {
            echo "Falló la preparación: (" . $conn->errno . ") " . $conn->error;
        } else {
            if (!($sentencia->execute()) ) {
                return "0";
            } else {
                $sentencia->bind_result($Autor, $Fecha, $Titulo, $Texto, $Id, $imageLink);
                $c = new Collection();
                while ($sentencia->fetch()) {
                    $post = new Post(array("autor" => $Autor, "fecha" => $Fecha, "titulo" => $Titulo, "texto" => $Texto, "id" => $Id, "img" => $imageLink));
                    $c->addItem($post);
                }

            }
        }
        $conn->close();
        return $c;
    }


    /**
     * funcion para recuperar el texto de un blog
     * User: andrescloudman
     */
    public static function getPost($id)
    {
        $conn = conexion();
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } else {
            $sentencia = $conn->stmt_init();
            if (!$sentencia->prepare("select * from blog where (id=?)")) {
                echo "Falló la preparación: (" . $conn->errno . ") " . $conn->error;
            } else {
                mysqli_stmt_bind_param($sentencia, "i", $id);
                if (!($sentencia->execute())) {
                    return "0";
                } else {
                    $sentencia->bind_result($Autor, $Fecha, $Titulo, $Texto, $Id, $imageLink);
                    while ($row = $sentencia->fetch()) {
                        $post = new Post(array("autor" => $Autor, "fecha" => $Fecha, "titulo" => $Titulo, "texto" => $Texto, "id" => $Id, "img" => $imageLink));
                    }
                    $conn->close();
                    return $post;
                }
            }
        }
    }


    public static function searchPost($search)
    {
        $titulo = $search;
        $conn = conexion();
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } else {
            $sentencia = $conn->stmt_init();
            if (!$sentencia->prepare("select * from blog where texto like '%" . $titulo . "%' OR titulo like '%" . $titulo . "%'")) {
                echo "Falló la preparación: (" . $conn->errno . ") " . $conn->error;
            } else {
                if (!($sentencia->execute())) {
                    return "0";
                } else {
                    $sentencia->bind_result($Autor, $Fecha, $Titulo, $Texto, $id, $img);
                    $c = new Collection();
                    while ($sentencia->fetch()) {
                        $post = new Post(array("autor" => $Autor, "fecha" => $Fecha, "titulo" => $Titulo, "texto" => $Texto, "id" => $id, "img" => $img));
                        $c->addItem($post);
                    }
                    $conn->close();
                    return $c;
                }
            }
        }
    }

    public function save()
    {
        $Autor = $this->getAlgo('autor');
        $Titulo = $this->getAlgo('titulo');
        $Fecha = $this->getAlgo('fecha');
        $Texto = $this->getAlgo('texto');
        $img = $this->getAlgo('img');
        $conn = conexion();
        if ($conn->connect_error) {
            echo "<h2>";
            die("Connection failed: " . $conn->connect_error);
            echo "</h2>";
        } else {
            $sentencia = $conn->stmt_init();
            if (!$sentencia->prepare("INSERT INTO blog (autor, titulo, fecha, texto,imageLink) VALUES (?, ?, ?, ?,?)")) {
                echo "Falló la preparación: (" . $conn->errno . ") " . $conn->error;
            } else {
                mysqli_stmt_bind_param($sentencia, "sssss", $Autor, $Titulo, $Fecha, $Texto, $img);
                if (!($sentencia->execute())) {
                    $conn->close();
                } else {
                    $conn->close();
                }
            }
        }
    }

    public static function insertPost($Autor, $Titulo, $Fecha, $Texto, $img)
    {
        $post = new Post(array("autor" => $Autor, "fecha" => $Fecha, "titulo" => $Titulo, "texto" => $Texto, "img" => $img));
        $post->save();
    }

}
