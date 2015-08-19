<?php
require 'funcionIndex.php';
include 'header.html';
require_once 'estilos.css';
require_once 'model/ModelPost.php';
require_once "collection/Collection.php";
require_once ("controller/BlogController.php");
//cargamos los resultados

 $map = array(
     'index' => array(
       'controller' =>'Controller',
       'action' =>'index',
       ),
     'post'=> array(
         'controller' =>'Controller',
         'action' =>'post',
     ),
     'insertarComentario'=> array(
         'controller' =>'Controller',
         'action' =>'insertarComentario',
     ),
     'search'=> array(
         'controller' =>'Controller',
         'action' =>'search',
     ),
 );

 // Parseo de la ruta
 if (isset($_GET['whatever'])) {
     if (isset($map[$_GET['whatever']])) {
         $ruta = $_GET['whatever'];
     } else {
         header('Status: 404 Not Found');
         echo '<html><body><h1>Error 404: No existe la ruta <i>' .
                 $_GET['whatever'] .
                 '</p></body></html>';
         exit;
     }
 } else {
     $ruta = 'index';
 }
 $controlador = $map[$ruta];
 // Ejecución del controlador asociado a la ruta

 if (method_exists($controlador['controller'],$controlador['action'])) {
     call_user_func(array(
       $results1= new $controlador['controller'],
       $controlador['action'])
     );
 } else {

     header('Status: 404 Not Found');
     echo '<html><body><h1>Error 404: El controlador <i>' .
             $controlador['controller'] .
             '->' .
             $controlador['action'] .
             '</i> no existe</h1></body></html>';
 }
 ////////////////////////////////////////////////////////////////////////////////////////////////////////////
/*$post=new Post();
$results=$post->get_blogs();*/
//require("views/index.php");
////////////////////////////////////////////////////////////////////////////////////////////////////////////
//$arrayDch=array();$arrayIzq=array();
//$cuenta=($results->getCount());
/*for ($i = 0; $i < $cuenta; $i++) {
    if ($i%2==0){
        array_push($arrayIzq,$results[$i]);;
    }else{
        array_push($arrayDch,$results[$i]);;
    }
}*/
?>
    <? //$i=0; ?>
    <!--<div class="row row1">
        <div class="col-lg-6 col-xs-12 col-sm-12 col-md-6">
            <? //for($i=0;$i<$cuenta;$i++)://each($results as $blog) :
              //  $blog=$results->getItem($i);
               ?>
                <div class="row">
                    <div class="col-lg-4">
                        <img src="<?// echo $blog['img']/*$blog->Img*/ ?>" class="img-responsive"/>
                    </div>
                    <div class="col-lg-8">
                        <small class="text-muted"><? //echo $blog['fecha']/*$blog->Fecha*/ ?>
                            por <? //echo $blog['autor']/*$blog->Autor*/ ?></small>
                        <h2><a href="post.php?whatever=<? //echo $blog['id']/*$blog->Id*/ ?>"><? //echo $blog['titulo']/*$blog->Titulo*/ ?></a>
                        </h2>
                        <? //$textoCorto = $blog['texto']/*$blog->Texto*/;
                        //$textoFinal = substr($textoCorto, 0, 120); ?>
                        <p><? //echo $textoFinal ?></p>
                    </div>
                </div>
                <hr>
            <? //endfor;//endforeach; ?>
        </div>-->
<? //$er=$post->getAlgo("autor"); echo "$er"; $post->modeloAlert(" <-Autor"); ?>
    <!--<div class="row row1">
    <div class="col-lg-6 col-xs-12 col-sm-12 col-md-6">
        <? //foreach ($arrayDch as $blog): ?>
            <div class="row">
                <div class="col-lg-4">
                    <img src="<?// echo $blog['img']/*$blog->Img*/ ?>" class="img-responsive"/>
                </div>
                <div class="col-lg-8">
                    <small class="text-muted"><?// echo $blog['fecha']/*$blog->Fecha*/ ?>
                        por <?// echo $blog['autor']/*$blog->Autor*/ ?></small>
                    <h2><a href="post.php?whatever=<? //echo $blog['id']/*$blog->Id*/ ?>"><? //echo $blog['titulo']/*$blog->Titulo*/ ?></a>
                    </h2>
                    <? //$textoCorto = $blog['texto']/*$blog->Texto*/;
                   // $textoFinal = substr($textoCorto, 0, 120); ?>
                    <p><? //echo $textoFinal ?></p>
                </div>
            </div>
            <hr>
        <? //endforeach; ?>
    </div>-->
<!--</div>-->
<? include 'footer.html'; ?>