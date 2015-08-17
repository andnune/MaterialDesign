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
?>
    <div class="row row1">
        <div class="col-lg-6 col-xs-12 col-sm-12 col-md-6">
            <? foreach ($results as $post): ?>
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
                <div class="row row2">
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

    /////////////////////// 2 columnas repetidas //////////////////////

    <div class="row row2">
        <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12">
            <div class="row row2">
                <div class="col-lg-6 col-xs-12 col-sm-12 col-md-6">
                    <? foreach ($results as $post): ?>
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
                    <? foreach ($results as $post): ?>
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
        </div>
    </div>

    /////////////////////////// filas de dos columnas /////////////////////////////////
    <div class="row row2">
        <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12">
            fila global
            <div class="row row1">
                <div class="col-lg-1">
                    <p class="text-muted"><? echo 'f1c1' ?></p>
                </div>
                <div class="col-lg-5">
                    <a href="post.php?whatever=<? echo $post['id'] ?>"><? echo 'f1c2' ?></a>
                </div>
            </div>
            <div class="row row1">
                <div class="col-lg-1">
                    <div class="row row2">
                        <div class="col-lg-12">
                            <p class="text-muted"><? echo 'f2 c1.1' ?></p><hr>
                            <a href="post.php?whatever=<? echo $post['id'] ?>"><? echo 'f2 c1.2' ?></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <a href="post.php?whatever=<? echo $post['id'] ?>"><? echo 'f2c2.1' ?></a>
                    <p class="text-muted"><? echo 'f2c2.1' ?></p>
                </div>
            </div>
            <hr>
        </div>
    </div>
<? include 'footer.html'; ?>