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
        if (!$sentencia->prepare("select * from blog ORDER BY (titulo)")/* || (!$sentencia2->prepare("select * from blog ORDER BY (titulo)"))*/) {
            echo "Falló la preparación: (" . $conn->errno . ") " . $conn->error;
        } else {
            if (!($sentencia->execute()) /*|| (!($sentencia2->execute()))*/) {
                return "0";
            } else {
                /* vincular las variables de resultados */
                $sentencia->bind_result($Autor, $Fecha, $Titulo, $Texto, $Id, $imageLink);
                //$sentencia->bind_result($this->Autor, $this->Fecha, $this->Titulo, $this->Texto, $this->Id, $this->Img);
                /* obtener los valores */
                $c = new Collection();
                while ($sentencia->fetch()) {
                    $post = new Post(array("autor" => $Autor, "fecha" => $Fecha, "titulo" => $Titulo, "texto" => $Texto, "id" => $Id, "img" => $imageLink));
                    /*array_push($collection, array(
                        "autor" => $Autor,
                        "fecha" => $Fecha,
                        "titulo" => $Titulo,
                        "texto" => $Texto,
                        "id" => $Id,
                        "img" => $imageLink,
                    ));*/
                    $c->addItem($post);//array("autor" => $Autor,"fecha" => $Fecha,"titulo" => $Titulo,"texto" => $Texto,"id" => $Id,"img" => $imageLink));
                }
                //var_dump($c);
                //var_dump($collection);

            }
        }
        $conn->close();
        //return $collection;
        return $c;
        //return $this->Post;
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
//iniciamos el stmt
            $sentencia = $conn->stmt_init();
            //preparamos el stmt
            if (!$sentencia->prepare("select * from blog where (id=?)")) {
                echo "Falló la preparación: (" . $conn->errno . ") " . $conn->error;
            } else {
                mysqli_stmt_bind_param($sentencia, "i", $id);
                if (!($sentencia->execute())) {
                    return "0";
                } else {
                    /* vincular las variables de resultados */
                    //$arraydePosts = array();
                    $sentencia->bind_result($Autor, $Fecha, $Titulo, $Texto, $Id, $imageLink);
                    //$sentencia->bind_result($this->Autor, $this->Fecha, $this->Titulo, $this->Texto, $this->Id, $this->Img);
                    /* obtener los valores */
                    while ($row = $sentencia->fetch()) {
                        //cargar post en new object y devolver ese object
                        //$post = new Post($row);//
                        $post = new Post(array("autor" => $Autor, "fecha" => $Fecha, "titulo" => $Titulo, "texto" => $Texto, "id" => $Id, "img" => $imageLink));
                        // $this->Post[]=$row;
                    }
                    $conn->close();
                    //return $this->Post;
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
            //iniciamos el stmt
            $sentencia = $conn->stmt_init();
            //preparamos el statement (stmt)
            if (!$sentencia->prepare("select * from blog where texto like '%" . $titulo . "%' OR titulo like '%" . $titulo . "%'")) {
                echo "Falló la preparación: (" . $conn->errno . ") " . $conn->error;
            } else {
                if (!($sentencia->execute())) {
                    return "0";
                } else {
                    /* vincular las variables de resultados */
                    $arraydePosts = array();
                    $sentencia->bind_result($Autor, $Fecha, $Titulo, $Texto, $id, $img);
                    /* obtener los valores */
                    $c = new Collection();
                    while ($sentencia->fetch()) {
                        $post = new Post(array("autor" => $Autor, "fecha" => $Fecha, "titulo" => $Titulo, "texto" => $Texto,/* "id" => $id,*/ "img" => $img));
                        /*array_push($collection, array(
                            "autor" => $Autor,
                            "fecha" => $Fecha,
                            "titulo" => $Titulo,
                            "texto" => $Texto,
                            "id" => $Id,
                            "img" => $imageLink,
                        ));*/
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
        //llamar getter -> $respuesta = getAlgo($algo){
        //respuesta getter -> a insert($respuesta) BD;
        //$Autor, $Titulo, $Fecha, $Texto, $img)
        $Autor = $this->getAlgo('autor');
        $Titulo = $this->getAlgo('titulo');
        $Fecha = $this->getAlgo('fecha');
        $Texto = $this->getAlgo('texto');
        $img = $this->getAlgo('img');
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
            if (!$sentencia->prepare("INSERT INTO blog (autor, titulo, fecha, texto,imageLink) VALUES (?, ?, ?, ?,?)")) {
                echo "Falló la preparación: (" . $conn->errno . ") " . $conn->error;
            } else {
                mysqli_stmt_bind_param($sentencia, "sssss", $Autor, $Titulo, $Fecha, $Texto, $img);
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

    public static function insertPost($Autor, $Titulo, $Fecha, $Texto, $img)
    {
        $post = new Post(array("autor" => $Autor, "fecha" => $Fecha, "titulo" => $Titulo, "texto" => $Texto, "img" => $img));
        $post->save();
    }

}
