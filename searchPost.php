<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Blog  php</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="estilos.css">
</head>
<body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="navbar-inner">
            <div class="container-fluid">
                <span class="brand">blog aplicacion</span>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="index.php">Inicio</a></li>
                    <li><a href="newPost.php">nuevoPost</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <br>
    <br>
    <br>
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h2 id="normal"> Introduzca los terminos a buscar </h2>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4 col-md-offset-3">
            <form action="search.php" method="post" class="search-form">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Introduzca su búsqueda" id="search" name="search">
                    <div class="input-group-btn">
                        <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
                    </div>
                </div>
        </form>
    </div>
</div>
</div>
</body>
</html>
