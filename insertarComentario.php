<?php
require ('funcionIndex.php');
include ("header.html");
require_once 'model/ModelPost.php';
require_once 'model/ModelComment.php';
if ((($_REQUEST['Autor'] != "")) && (($_REQUEST['Texto'] != ""))  && (($_REQUEST['id_blog'] != ""))) {
    $seguir = 1;
    $autor = $_REQUEST['Autor'];
    $texto = $_REQUEST['Texto'];
    $id_blog = $_REQUEST['id_blog'];
   // $comment=new Comment();
    /*$consulta =*/ Comment::insertComment($autor,$id_blog,$texto);
} else {
    $seguir = 0;
    echo "<div class='container'><h2> Los datos no pueden  quedar sin rellenar </h2></div>";
}
?>
<? if ($seguir == 1) : ?>
        <? header('Location: http://localhost/primeroPhpStorm/post.php?whatever='.$id_blog); ?>
<? endif; ?>
<? include ("footer.html"); ?>