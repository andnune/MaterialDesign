<?php
require 'funcionIndex.php';
include 'header.html';
//cargamos los resultados
$results = seleccTodoBlog();
$arrayIzq = array();
$arrayDch = array();
for ($i = 0; $i < count($results); $i++) {
    if ($i % 2 != 0) {
        array_push($arrayIzq, $results[$i]);
    } else {
        array_push($arrayDch, $results[$i]);
    }
}
/*var_dump($arrayIzq);
echo "\n";
var_dump($arrayDch);*/
?>
    <div class="row row1">
        <div class="col-lg-6 col-xs-12 col-sm-12 col-md-6">
            <? foreach ($arrayIzq as $post): ?>
                <div class="row">
                    <div class="col-lg-4">
                        <img src="<? echo $post['img'] ?>" class="img-responsive"/>
                    </div>
                    <div class="col-lg-8">
                        <small class="text-muted"><? echo $post['fecha'] ?>
                            por <? echo $post['autor'] ?></small>
                        <h2><a href="post.php?whatever=<? echo $post['id'] ?>"><? echo $post['titulo'] ?></a>
                        </h2>
                        <? $textoCorto = $post['texto'];
                        $textoFinal = substr($textoCorto, 0, 120); ?>
                        <p><? echo $textoFinal ?></p>
                    </div>
                </div>
                <hr>
            <? endforeach; ?>
        </div>
        <div class="col-lg-6 col-xs-12 col-sm-12 col-md-6">
            <? foreach ($arrayDch as $post): ?>
                <div class="row">
                    <div class="col-lg-4">
                        <img src="<? echo $post['img'] ?>" class="img-responsive"/>
                    </div>
                    <div class="col-lg-8">
                        <small class="text-muted"><? echo $post['fecha'] ?>
                            por <? echo $post['autor'] ?></small>
                        <h2><a href="post.php?whatever=<? echo $post['id'] ?>"><? echo $post['titulo'] ?></a>
                        </h2>
                        <? $textoCorto = $post['texto'];
                        $textoFinal = substr($textoCorto, 0, 120); ?>
                        <p><? echo $textoFinal ?></p>
                    </div>
                </div>
                <hr>
            <? endforeach; ?>
        </div>
    </div>

<? include 'footer.html'; ?>