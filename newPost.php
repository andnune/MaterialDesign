<? include ("header.html"); ?>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
<h4>Nuevo post:</h4>
    <form class="form-horizontal" id="formInsertarPost" action="insertarPost.php" method="post">
        <div class="form-group">
            <label for="inputAutor" class="col-sm-1 control-label">Autor</label>
            <div class="col-sm-11">
                <input type="text" class="form-control" id="inputAutor" placeholder="Autor" name="Autor">
            </div>
        </div>
        <div class="form-group">
            <label for="inputFecha" class="col-sm-1 control-label">Fecha</label>
            <div class="col-sm-11">
                <input type="text" class="form-control" id="inputFecha" placeholder="Fecha" name="Fecha">
            </div>
        </div>
        <div class="form-group">
            <label for="inputTitulo" class="col-sm-1 control-label">Titulo</label>
            <div class="col-sm-11">
                <input type="text" class="form-control" id="inputTitulo" placeholder="Titulo" name="Titulo">
            </div>
        </div>
        <div class="form-group">
            <label for="inputTexto" class="col-sm-1 control-label">Texto</label>
            <div class="col-sm-11">
                <input type="text" class="form-control" id="inputTexto" placeholder="Texto" name="Texto">
            </div>
        </div>
        <div class="form-group">
            <label for="inputImagen" class="col-sm-1 control-label">Imagen</label>
            <div class="col-sm-11">
                <input type="text" class="form-control" id="inputImagen" placeholder="URL de la imagen" name="Imagen">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-1 col-sm-11"> <!-- offset para dejar en blanco-->
                <button type="submit" class="btn btn-success"><i class="glyphicon glyphicon-send"></i> Enviar</button>
            </div>
        </div>
       <!-- <input type="hidden" name="id_blog" value="1">-->
    </form>
            </div>
        </div>
<? include ("footer.html"); ?>