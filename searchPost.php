<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Blog  php</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <script>
        function myFunction() {
            $server = "localhost";

            $user = "root";
            $pass = "9psCXanh";
            $db = "blog";
            // Create connection
            $conn = new mysqli($server, $user, $pass, $db);
            // Check connection
            if ($conn - > connect_error) {
                die("Connection failed: ".$conn - > connect_error);
            } else {
                // echo "no error\n";
                // echo "<br>";
            }
            //consultamos
            $datos = "select * from blog ";
            $results = $conn - > query($datos);
            if (!$results) {
                echo
                "Error al seleccionar los datos\n";
                echo
                "<br>";
            } else {
                //echo "Los datos se seleccionaron correctamente\n";
                // echo "<br>";
            }
            if (mysqli_num_rows($results) == 0) {
                echo
                "FALLOOOOO\n";
            }
            //cargamos los resultados
            $contResults = 0;
            while ($row = $results - > fetch_array()) {
//}
//mostramos los datos
                echo
                "<form action='post.php' method='post'>";
                echo
                "<tr><td><input type='text' size=auto id='textoNoBorde' name='Autor' value='".$row[0].
                "' readonly></td>";
                echo
                "<td id='celda'><input type='text' id='textoNoBorde' name='Fecha' value='".$row[1].
                "' readonly></td>";
                echo
                "<td id='celda'><input type='text' id='textoNoBorde' name='Titulo' value='".$row[2].
                "' readonly></td>";
                $textoCorto = $row[3];
                $textoFinal = substr($textoCorto, 0, 20);
                echo
                "<td id='celda'><input type='text' id='textoNoBorde' name='Texto' value='".$textoFinal.
                "' readonly></td>";
                echo
                "<td id='celda'><button class='btn btn-default' id='boton' name='Acceder' readonly><i class='glyphicon glyphicon-eye-open'></i>Acceder</td>";
                echo
                "</form>";
            }
            echo
            "</table";
            mysql_close($conn);
        }
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <style>
        span{
            background-color: white;
        }
        .celda{
            text-align: center;
            height: auto;
            width: auto;
        }
    </style>
</head>
<body>
<!--<table id="tabla" align="center" border="1" cellspacing="1" cellpadding="2" style="font-size: 8pt">
    <tr>
        <td class="celda"><b>Autor</b></td>
        <td class="celda"><b>Fecha</b></td>
        <td class="celda"><b>Titulo</b></td>
        <td class="celda"><b>Texto</b></td>

    </tr>-->
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
            <h2> Introduzca los terminos a buscar </h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 col-md-offset-3">
            <form action="search.php" method="post" class="search-form">
                <div class="form-group has-feedback">
                    <label for="search" class="sr-only">Search</label>
                    <input type="text" class="form-control" name="search" id="search" placeholder="introduzca su búsqueda y presione 'Buscar'">
                    <span class="glyphicon glyphicon-search form-control-feedback"></span>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
