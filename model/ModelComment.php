<?php
class Comment
{
    private $conn;
    private $id;
    private $titulo;
    private $autor;
    private $texto;
    private $blog_id;
    private $fecha;
    private $modelo;
    public function __construct()
    {
        //$this->conn=Model::conexion();
        $this->conn = conexion();
        $this->modelo = array();
    }
    /*public function rellenar($id0,$autor0,$texto0,$fecha0,$blog_id,$titulo0){
        $this->Id=$id0;
        $this->Autor=$autor0;
        $this->Texto=$texto0;
        $this->Fecha=$fecha0;
        $this->Blog_id=$blog_id;
        $this->Titulo=$titulo0;
    }
    public function getAlgo($algo){
        echo "eee: ".($this->Autor)."eee\n";
        return ($this->$algo);
    }
    public function modeloAlert($algo){
        echo "alert: ($algo)";
    }*/
    public function seleccComments($tittle)
    {
        $collection = array();
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
                    $sentencia->bind_result($Id, $Titulo, $Autor, $Texto, $Blog_id, $Fecha);
                    /* obtener los valores */
                    while ($sentencia->fetch()) {
                        array_push($collection, array(
                            "autor" => $Autor,
                            "fecha" => $Fecha,
                            "titulo" => $Titulo,
                            "texto" => $Texto,
                            "id" => $Id,
                            "blog_id" => $Blog_id,
                        ));
                    }
                    $this->conn->close();
                    return $collection;
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
}