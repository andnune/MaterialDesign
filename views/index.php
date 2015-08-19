<?php ob_start()  ?>
<?
include 'header.html';
/*require_once  'model/ModelPost.php';
require_once ("controller/BlogController.php");
require_once ("controller/BlogController.php");*/
/*$arrayIzq = array();
$arrayDch = array();*/
//var_dump($results);
/*for ($i = 0; $i < count($results); $i++) {
    if ($i % 2 != 0) {
        array_push($arrayIzq, $results[$i]);
    } else {
        array_push($arrayDch, $results[$i]);
    }
}*/
?>
<? $cuenta=($results->getCount()); $i=0; ?>
    <div class="row row1">
        <div class="col-lg-6 col-xs-12 col-sm-12 col-md-6">
            <? for($i=0;$i<$cuenta;$i++)://each($results as $blog) :
                $blog=$results->getItem($i);
                ?>
                <div class="row">
                    <div class="col-lg-4">
                        <img src="<? echo $blog['img']/*$blog->Img*/ ?>" class="img-responsive"/>
                    </div>
                    <div class="col-lg-8">
                        <small class="text-muted"><? echo $blog['fecha']/*$blog->Fecha*/ ?>
                            por <? echo $blog['autor']/*$blog->Autor*/ ?></small>
                        <h2><a href="post.php?whatever=<? echo $blog['id']/*$blog->Id*/ ?>"><? echo $blog['titulo']/*$blog->Titulo*/ ?></a>
                        </h2>
                        <? $textoCorto = $blog['texto']/*$blog->Texto*/;
                        $textoFinal = substr($textoCorto, 0, 120); ?>
                        <p><? echo $textoFinal ?></p>
                    </div>
                </div>
                <hr>
            <? endfor;//endforeach; ?>
        </div>
        <!--<div class="col-lg-6 col-xs-12 col-sm-12 col-md-6">
            <? //foreach ($arrayDch as $post): ?>
                <div class="row">
                    <div class="col-lg-4">
                        <img src="<? //echo $post['img'] ?>" class="img-responsive"/>
                    </div>
                    <div class="col-lg-8">
                        <small class="text-muted"><? //echo $post['fecha'] ?>
                            por <? //echo $post['autor'] ?></small>
                        <h2><a href="post.php?whatever=<? //echo $post['id'] ?>"><? //echo $post['titulo'] ?></a>
                        </h2>
                        <? //$textoCorto = $post['texto'];
                        //$textoFinal = substr($textoCorto, 0, 120); ?>
                        <p><? //echo $textoFinal ?></p>
                    </div>
                </div>
                <hr>
            <? //endforeach; ?>
        </div>-->
    </div>

<? include 'footer.html'; ?>