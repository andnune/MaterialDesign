<? include ("header.html"); ?>
    <div class="demo-container mdl-grid">
     <div class="mdl-cell mdl-cell--2-col mdl-cell--hide-tablet mdl-cell--hide-phone"></div>
    <h4 class="mdl-cell--6-col">Nuevo post: </h4>
    <div class="demo-container mdl-grid">
        <div class="mdl-cell mdl-cell--2-col mdl-cell--hide-tablet mdl-cell--hide-phone"></div>
    <form method="post" id="formInsertarPost" action="insertarPost.php" class="mdl-cell--6-col">
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input class="mdl-textfield__input" type="text" name="Autor" pattern="[a-zA-Z,'.-\s]+" id="inputAutor" />
            <label class="mdl-textfield__label" for="Autor">Autor</label>
            <span class="mdl-textfield__error">Input is not a string!</span>
        </div>
    <!-- Numeric Textfield with Floating Label -->
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
           <!-- <input class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" id="sample4" />-->
            <!--<textarea class="mdl-textfield__input" type="text" rows= "3" pattern="[a-zA-Z0-9áéíóú,#.-\s]+" name="Texto" id="inputTexto"></textarea>
            <label class="mdl-textfield__label" for="Texto">Texto</label>
            <span class="mdl-textfield__error">Input is not a string!</span>-->
            <!-- <div>-->
             <textarea rows= "15" cols="50" name="Texto" id="inputTexto">olaaa</textarea>
             <!--<label for="Texto">Texto</label>-->
         </div>
         <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
             <input class="mdl-textfield__input" type="date"  name="Fecha" id="inputFecha" />
             <!--<label class="mdl-textfield__label" for="Fecha">Fecha</label>//pattern="[0-9,#.-\s]+"-->
             <!--<span class="mdl-textfield__error">Input is not a string!</span>-->
         </div>
         <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
             <input class="mdl-textfield__input" pattern="[a-zA-Z0-9,#.-\s]+" name="Titulo" type="text"  id="inputTitulo" />
             <label class="mdl-textfield__label" for="Titulo">Titulo</label>
             <span class="mdl-textfield__error">Input is not a string!</span>
         </div>
         <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
             <input class="mdl-textfield__input" name="Imagen" type="url" id="inputImagen" />
             <label class="mdl-textfield__label" for="Imagen">Imagen</label>
             <span class="mdl-textfield__error">Input is not a http:// URL!</span>
         </div>
         <div>
          <button type="submit" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored"><i class="material-icons">create</i></button>
         </div>
     </form>
         </div>
  </div>

<? include ("footer.html"); ?>