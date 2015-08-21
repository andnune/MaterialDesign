<? include ("header.html"); ?>
    <div class="demo-container mdl-grid">
     <div class="mdl-cell mdl-cell--2-col mdl-cell--hide-tablet mdl-cell--hide-phone"></div>
    <h4 class="mdl-cell--6-col">Nuevo post: </h4>
    <div class="demo-container mdl-grid">
        <div class="mdl-cell mdl-cell--2-col mdl-cell--hide-tablet mdl-cell--hide-phone"></div>
    <form method="post" id="formInsertarPost" action="insertarPost.php" class="mdl-cell--6-col">
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input class="mdl-textfield__input" type="text" name="Autor" pattern="-?[a-z]*(\.[a-z]+)?" id="inputAutor" />
            <label class="mdl-textfield__label" for="Autor">Autor</label>
            <span class="mdl-textfield__error">Input is not a string!</span>
        </div><br>
    <!-- Numeric Textfield with Floating Label -->
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
           <!-- <input class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" id="sample4" />-->
            <input class="mdl-textfield__input" type="text" name="Texto" id="inputTexto" />
            <label class="mdl-textfield__label" for="Texto">Texto</label>
        </div>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input class="mdl-textfield__input" type="text" name="Fecha" id="inputFecha" />
            <label class="mdl-textfield__label" for="Fecha">Fecha</label>
        </div>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input class="mdl-textfield__input" name="Titulo" type="text"  id="inputTitulo" />
            <label class="mdl-textfield__label" for="Titulo">Titulo</label>
        </div>
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input class="mdl-textfield__input" name="Imagen" type="text" id="inputImagen" />
            <label class="mdl-textfield__label" for="Imagen">Imagen</label>
        </div>
        <div>
         <button type="submit" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored"><i class="material-icons">create</i></button>
        </div>
    </form>
        </div>
 </div>


    <!--<form class="form-horizontal" id="formInsertarPost" action="insertarPost.php" method="post">
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
            <div class="col-sm-offset-1 col-sm-11">
                <button type="submit" class="btn btn-success"><i class="glyphicon glyphicon-send"></i> Enviar</button>
            </div>
        </div>
    </form>-->
<? include ("footer.html"); ?>