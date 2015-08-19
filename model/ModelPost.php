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

    public function __construct()
    {
        //$this->conn=Model::conexion();
        $this->conn = conexion();
        $this->modelo = array();
    }

public function rellenar($id0,$autor0,$texto0,$fecha0,$img0,$titulo0){
    $this->id=$id0;
    $this->autor=$autor0;
    $this->texto=$texto0;
    $this->fecha=$fecha0;
    $this->img=$img0;
    $this->titulo=$titulo0;
}
public function getAlgo($algo){
    echo "eee: ".($this->autor)."eee\n";
    return ($this->$algo);
}
public function modeloAlert($algo){
    echo "alert: ($algo)";

}
    public function get_blogs()
    {
        $collection = array();
        // $this->conn=Model::conexion();
        $this->conn = conexion();
        $sentencia = $this->conn->stmt_init();
       // $sentencia2 = $this->conn->stmt_init();
        if (!$sentencia->prepare("select * from blog ORDER BY (titulo)")/* || (!$sentencia2->prepare("select * from blog ORDER BY (titulo)"))*/) {
            echo "Falló la preparación: (" . $this->conn->errno . ") " . $this->conn->error;
        } else {
            if (!($sentencia->execute()) /*|| (!($sentencia2->execute()))*/) {
                return "0";
            } else {
                /* vincular las variables de resultados */
                $sentencia->bind_result($Autor, $Fecha, $Titulo, $Texto, $Id, $imageLink);
               // $sentencia2->bind_result($Autor, $Fecha, $Titulo, $Texto, $Id, $imageLink);
                //$sentencia->bind_result($this->Autor, $this->Fecha, $this->Titulo, $this->Texto, $this->Id, $this->Img);
                /* obtener los valores */
                $c = new Collection();
                while ($sentencia->fetch()) {
                    array_push($collection, array(
                        "autor" => $Autor,
                        "fecha" => $Fecha,
                        "titulo" => $Titulo,
                        "texto" => $Texto,
                        "id" => $Id,
                        "img" => $imageLink,
                    ));
                    $c->addItem(array("autor" => $Autor,"fecha" => $Fecha,"titulo" => $Titulo,"texto" => $Texto,"id" => $Id,"img" => $imageLink));
                }
                //var_dump($c);
                //var_dump($collection);

            }
        }
        //Devolvemos el resultado en forma de array de objetos=> "$modelo"
        $this->conn->close();
        //return $collection;
        return $c;
        //return $this->Post;
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


    public function searchBlog($search)
    {
        $titulo = $search;
        $collection = array();
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
                        array_push($collection, array(
                            "autor" => $Autor,
                            "fecha" => $Fecha,
                            "titulo" => $Titulo,
                            "texto" => $Texto,
                            "blog_id" => $id,
                        ));
                    }
                    $this->conn->close();
                    return $collection;
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
