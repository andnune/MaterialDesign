<?php
require_once 'model/ModelPost.php';
require_once 'model/ModelComment.php';
class Controller
{
    private $results;
    public function index()
    {
        $post=new Post();
        $results=$post->get_blogs();
        //var_dump($results);
        require("views/index.php");
        //require_once './index.php';
       // $results = seleccTodoBlog();
    }
    public function post()
    {
        if (!isset($_GET['id'])) {
            throw new Exception('Página no encontrada');
        } else {
            $post=new Post();$comment=new Comment();
            $results=$post->seleccTexto($_GET['id']);
            $resultsComments=$comment->seleccComments($_GET['id']);
            require("views/post.php");
        }
    }
    public function insertarComentario()
    {
        if (!isset($_GET['texto']) || !isset($_GET['autor']) || isset($_GET['titulo'])) {
            throw new Exception('Página no encontrada');
        } else {
            $autor = ($_GET['autor']);
        $titulo = ($_GET['titulo']);
        $texto = ($_GET['texto']);
            $comment=new Comment();
            $comment-> insertComment($autor, $titulo, $texto);
            require("views/post.php");
        }
    }
    public function search()
    {
        if ((($_REQUEST['search'] != ""))) {
            $post=new Post();
            $results =$post-> searchBlog($_REQUEST['search']);
            require("views/search.php");
        } else {
            $results = "blanco";
            echo "<div class='container'><h2>No ha insertado ningun contenidoaaaa para la busqueda</h2></div>";
        }
    }

}