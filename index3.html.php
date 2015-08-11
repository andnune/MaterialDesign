<!DOCTYPE html PUBLIC>
<html lang="es">
<meta charset="utf-8">
    <head>
<!--<link rel="stylesheet" href="./librerias/bootstrap.min.js"/>
    <link rel="stylesheet" href="./librerias/bootstrap.css" media="screen" />
<script src="./librerias/jquery-2.1.4.min.js"></script>
    <script rel="stylesheet" src="./librerias/bootstrap.js"></script>-->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<style>
/*.pull-left {
  float: left;
}
.pull-right {
  float: right;
}*/
.pull-left{
position: relative;
height: 100%;
width: 10%;
left: 0;
bottom: 0;
float: left;
background-color: #909090;
}
.pull-right{
position: relative;
height: 100%;
width: 10%;
left: 0;
bottom: 0;
float: right;
background-color: #909090;
}
.table{
position: center;
width:100%;
height:50%;
}
</style>
</head>
 <body>
<br>
<br>
<nav class="navbar navbar-inverse navbar-fixed-top">
<div class="navbar-inner">
<div class="container-fluid">
<span class="brand">APP aplicacion</span>

<div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">App Symfony</a>
        </div>
<!--<div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Dashboard</a></li>
            <li><a href="#">Settings</a></li>
            <li><a href="#">Profile</a></li>
            <li><a href="#">Help</a></li>
          </ul>
          <form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search...">
          </form>
        </div>-->


<ul class="nav navbar-nav navbar-right">
<li><a>Ayuda</a></li>
<li><a>Ayuda</a></li>
<li><a>Ayuda</a></li>
<li><a>Ayuda</a></li>
<li><a>Opciones</a></li>
</ul>
<form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search...">
</form>
</div>
</div>
</div>
</nav>
<!--<div class="pull-left">left</div>
<div class="pull-right">right</div>-->
<script>
function myFunction() {
alert("ola");
var elDiv = document.getElementById("ir")
elDiv.value = "CAMBIADO";
alert(elDiv.value);
var elDiv = document.getElementById("irDiv")
elDiv.innerHTML='<table class="table table-bordered table-hover "><thead ><tr><th>Fila</th><th>Tema</th><th>Fecha</th><th>Estado</th></tr>    </thead><tbody><tr class="active"><td>1</td><td>Pagar tarjeta</td><td>04/04/2014</td><td>en proceso</td></tr><tr class="danger">            <td>4</td><td>Telefono</td><td>06/04/2014</td><td>No se ha pagado</td></tr></tbody></table>'
var elDiv = document.getElementById("iframeDiv");
//elDiv.src="www.marca.com"; //<-- no funciona
elDiv.innerHTML='<table class="table table-bordered table-hover "><thead ><tr><th>Fila</th><th>Tema</th><th>Fecha</th><th>Estado</th></tr>    </thead><tbody><tr class="active"><td>1</td><td>Pagar tarjeta2</td><td>04/04/2014</td><td>en proceso</td></tr><tr class="danger">            <td>4</td><td>Telefono</td><td>06/04/2014</td><td>No se ha pagado2</td></tr></tbody></table>' /*Así cambiamos el frame por otro elemento*/
//elDiv.style.display = "none"; //ocultamos el botón
//location.replace("http://"+valor); //cambiamos la url, con esto podríamos redireccionar al router
}
</script>
<?php
//require_once __DIR__ . '/Model.php';
?>
<table class="table table-bordered table-hover ">
    <thead >
        <tr>
            <th>Fila</th>
            <th>Tema</th>
            <th>Fecha</th>
            <th>Estado</th>
        </tr>
    </thead>
    <tbody>
        <tr class="active">
            <td>1</td>
            <td>Pagar tarjeta</td>
            <td>04/04/2014</td>
            <td>en proceso</td>
        </tr>
        <tr class="info">
            <td>1</td>
            <td>Pagar renta</td>
            <td>04/04/2014</td>
            <td>por confirmar</td>
        </tr>
        <tr class="success">
            <td>2</td>
            <td>Agua</td>
            <td>01/04/2014</td>
            <td>Pagado</td>
        </tr>
        <tr class="warning">
            <td>3</td>
            <td>Electricidad</td>
            <td>03/04/2014</td>
            <td>Pendiente</td>
        </tr>
        <tr class="danger">
            <td>4</td>
            <td>Telefono</td>
            <td>06/04/2014</td>
            <td>No se ha pagado</td>
        </tr>
    </tbody>
</table>
... 
<hr>

<div class="container">
	<div class="jumbotron">
		<h1>Learn to Create Websites</h1>
		<p>In today's world internet is the most popular way of connecting with the people. At <a href="http://www.tutorialrepublic.com" target="_blank">tutorialrepublic.com</a> you will learn the essential of web development technologies along with real life practice example, so that you can create your own website to connect with the people around the world.</p>
		<p><a href="http://www.tutorialrepublic.com" target="_blank" class="btn btn-success btn-lg">Get started today</a></p>
	</div>
<div class="row">
		<div class="col-xs-4">
			<h2>body1</h2>
			<p>HTML is a markup language that is used for creating web pages. The HTML tutorial section will help you understand the basics of HTML, so that you can create your own web pages or website.</p>
			<p><a href="http://www.tutorialrepublic.com/html-tutorial/" target="_blank" class="btn btn-success">Learn More &raquo;</a></p>
		</div>
		<div class="col-xs-4">
			<h2>index2aparte</h2>
			<p>CSS is used for describing the presentation of web pages. The CSS tutorial section will help you learn the essentials of CSS, so that you can fine control the style and layout of your HTML document.</p>
			<p><a href="http://localhost/mio/index2aparte.html" target="_blank" class="btn btn-success">Learn More &raquo;</a></p>
		<!--"http://www.tutorialrepublic.com/css-tutorial/"-->
		</div>
		<div class="col-xs-4">
			<h2>as.com</h2>
			<p>Bootstrap is a powerful front-end framework for faster and easier web development. The Bootstrap tutorial section will help you learn the techniques of Bootstrap so that you can quickly create your own website.</p>
<p><a href="http://www.as.com" target="_blank" class="btn btn-success">Learn More &raquo;</a></p>
		</div>
	</div>
<!-- </div> -->
<br>
    ... 
<hr>   
<button class="btn submit" type="button"><i class="icon-pencil"></i>Editar</button> 
<br>
<br>
    ... End of Body
<div id="menu">
             <hr/>
             <a href="/php/php">inicioPHP</a> |
             <a href="/php/listar">/php/listar</a> |
             <a href="/php/insertar">/php/insertar 'modelo'</a> |
             <a href="/buscar">buscar por nombre</a> |
             <a href="/alimentos">php/ alimentos</a> |
             <a href="/buscarAlimentosCombinada">búsqueda combinada</a>
             <hr/>
         </div>
<div>
<p><a class="btn btn-default" href="/php/listar" onclick="myFunction();"><i class="glyphicon glyphicon-pencil"></i>Editar1</a></p>
<form  onclick="myFunction();" method="post"><button id="bt" type="submit">Editar2</button></form>
</div>
<div id="irDiv">
<input type="button" class="btn btn-large btn-warning" id="ir" value="Cambiar" onclick="myFunction();"></input>
</div>
<div id="iframeDiv">
<iframe id="iframeid" width="1000px" src="http://www.as.com"></iframe></div>
   </div>
   </body>
</html>
