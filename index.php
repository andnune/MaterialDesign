<?php
require 'funcionIndex.php';
include 'header.html';
require_once  'model/Model.php';
//require_once ("controller/BlogController.php");
//cargamos los resultados

 /*$map = array(
     'index' => array(
       'controller' =>'Controller',
       'action' =>'index',
       ),
     'algo'=> array(
         'controller' =>'Controller',
         'action' =>'index',
     )
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
 }*/
 ////////////////////////////////////////////////////////////////////////////////////////////////////////////

$blog=new Post();
$results=$blog->get_blogs();
//require("views/index.php");
////////////////////////////////////////////////////////////////////////////////////////////////////////////
$arrayDch=array();$arrayIzq=array();
/*var_dump($results);
var_dump($results[0]);print_r($results[1]);*/
//$results = seleccTodoBlog();
//for ($i = 0; $i < count($results); $i++) {
//while ($row = $results->fetch()) {
    //array_push($arrayIzq,$row);

     //foreach($blog as $row){
        // $blog->next();
    //if ($i % 2 != 0) {
        //array_push($arrayIzq,array($row->Img,$row->Fecha,$row->Autor,$row->Id,$row->Titulo));
       // array_push($arrayIzq,$row);
       // array_push($arrayIzq, $results[$i]);
   /* } else {
        //array_push($arrayDch, $blog[$i]);
        array_push($arrayDch,$row);
    }*/
//}
?>
    <!--<div class="row row1">
        <div class="col-lg-6 col-xs-12 col-sm-12 col-md-6">
            <? //foreach (/*$arrayIzq*/$results as $blog): ?>
                <div class="row">
                    <div class="col-lg-4">
                        <img src="<? //echo /*$post['img']*/$blog->Img ?>" class="img-responsive"/>
                    </div>
                    <div class="col-lg-8">
                        <small class="text-muted"><? //echo /*$post['fecha']*/$blog->Fecha ?>
                            por <?// echo /*$post['autor']*/$blog->Autor ?></small>
                        <h2><a href="post.php?whatever=<? //echo /*$post['id']*/$blog->Id ?>"><? //echo /*$post['titulo']*/$blog->Titulo ?></a>
                        </h2>
                        <? //$textoCorto = /*$post['texto']*/$blog->Texto;
                       // $textoFinal = substr($textoCorto, 0, 120); ?>
                        <p><? //echo $textoFinal ?></p>
                    </div>
                </div>
                <hr>
            <? //endforeach; ?>
        </div>
        <div class="col-lg-6 col-xs-12 col-sm-12 col-md-6">
            <? //foreach ($arrayDch as $post): ?>
                <div class="row">
                    <div class="col-lg-4">
                        <img src="<? //echo /*$post['img']*/$blog->Img ?>" class="img-responsive"/>
                    </div>
                    <div class="col-lg-8">
                        <small class="text-muted"><?// echo /*$post['fecha']*/$blog->Fecha ?>
                            por <?// echo /*$post['autor']*/$blog->Autor ?></small>
                        <h2><a href="post.php?whatever=<?// echo /*$post['id']*/$blog->Id ?>"><?// echo /*$post['titulo']*/$blog->Id ?></a>
                        </h2>
                        <? //$textoCorto = /*$post['texto']*/$blog->Texto;
                        //$textoFinal = substr($textoCorto, 0, 120); ?>
                        <p><? //echo $textoFinal ?></p>
                    </div>
                </div>
                <hr>
            <?// endforeach; ?>
        </div>
    </div>

<? include 'footer.html'; ?>