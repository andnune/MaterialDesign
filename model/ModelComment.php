<?php
require_once "collection/Collection.php";
class Comment
{
    private $conn;
    private $id;
    private $autor;
    private $texto;
    private $blog_id;
    private $fecha;

    public function __construct($array)
    {
        //$this->conn=Model::conexion();
        $this->conn = conexion();
        $this->id = $array['id'];
        $this->autor = $array['autor'];
        $this->texto = $array['texto'];
        $this->fecha = $array['fecha'];
        $this->blog_id = $array['blog_id'];
    }
    public function getAlgo($algo)
    {
        return ($this->$algo);
    }
    public static function seleccComments($tittle)
    {
        $c = new Collection();
        $conn = conexion();
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
                mysqli_stmt_bind_param($sentencia, "i", $tittle);
                if (!($sentencia->execute())) {
                    return "0";
                } else {
                    /* vincular las variables de resultados */
                    $sentencia->bind_result($Id, $Titulo, $Autor, $Texto, $Blog_id, $Fecha);
                    /* obtener los valores */
                    while ($sentencia->fetch()) {
                        $comment = new Comment(array("autor" => $Autor, "fecha" => $Fecha, "titulo" => $Titulo, "texto" => $Texto, "id" => $Id, "blog_id" => $Blog_id));
                        /*array_push($collection, array(
                            "autor" => $Autor,
                            "fecha" => $Fecha,
                            "titulo" => $Titulo,
                            "texto" => $Texto,
                            "id" => $Id,
                            "blog_id" => $Blog_id,
                        ));*/
                        $c->addItem($comment);
                    }
                    $conn->close();
                    return $c;
                }
            }
        }
    }
    public function save()
    {
        //llamar getter -> $respuesta = getAlgo($algo){
        //respuesta getter -> a insert($respuesta) BD;
        //$Autor, $Titulo,  $Texto)
        $Autor = $this->getAlgo('autor');
        $blog_id = $this->getAlgo('blog_id');
        $Texto = $this->getAlgo('texto');
        $Fecha = $this->getAlgo('fecha');
        /*llamada a insert*/
        $conn = conexion();
        // Create connection
        if ($conn->connect_error) {
            echo "<h2>";
            die("Connection failed: " . $conn->connect_error);
            echo "</h2>";
        } else {
            //iniciamos el stmt
            $sentencia = $conn->stmt_init();
            //preparamos la sentencia
            if (!$sentencia->prepare("INSERT INTO comentarios (autor, blog_id, texto, fecha) VALUES (?, ?, ?, ?)")) {
                echo "Falló la preparación: (" . $conn->errno . ") " . $conn->error;
            } else {
                mysqli_stmt_bind_param($sentencia, "siss", $Autor, $blog_id, $Texto,$Fecha);
                if (!($sentencia->execute())) {
                    $conn->close();
                    //return "0";
                } else {
                    $conn->close();
                    //return '1';
                }
            }
        }
    }

    public static function insertComment($autor, $blog_id, $texto)
    {
        $fecha = date("Y-n-d H:i:s");
        $comment = new Comment(array("autor" => $autor, "blog_id" => $blog_id, "texto" => $texto, "fecha" => $fecha));
        $comment->save();
    }
}