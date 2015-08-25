<? include ("header.html"); ?>
    <div class="demo-container mdl-grid">
        <div class="mdl-cell mdl-cell--1-col mdl-cell--hide-phone"></div>
        <div class="mdl-cell mdl-cell--1-col mdl-cell--hide-tablet mdl-cell--hide-phone"></div>
        <h4 class="mdl-cell--6-col">Nuevo post: </h4>
        <div class="demo-container mdl-grid">
            <div class="mdl-cell mdl-cell--1-col mdl-cell--hide-phone"></div>
            <div class="mdl-cell mdl-cell--1-col mdl-cell--hide-tablet mdl-cell--hide-phone"></div>
            <form method="post" id="formInsertarPost" action="insertarPost.php" class="mdl-cell--6-col">
                <div class="mdl-cell mdl-cell--12-col mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input class="mdl-textfield__input" type="text" name="Autor" pattern="[a-zA-Z,'.-\s]+" id="inputAutor" />
                    <label class="mdl-textfield__label" for="Autor">Autor</label>
                    <span class="mdl-textfield__error">Input is not a string!</span>
                </div>
                <!-- Numeric Textfield with Floating Label -->
                <!--        <br>-->
                <!--        Texto:<br>-->
                <div style="padding-top:51px" class="mdl-cell mdl-cell--12-col mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <!-- <input class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" id="sample4" />-->
                    <!--<textarea class="mdl-textfield__input" type="text" rows= "3" pattern="[a-zA-Z0-9áéíóú,#.-\s]+" name="Texto" id="inputTexto"></textarea>
                    <label class="mdl-textfield__label" for="Texto">Texto</label>
                    <span class="mdl-textfield__error">Input is not a string!</span>-->
                    <!-- <div>-->
                    <!--<textarea rows= "15" cols="50" name="Texto" id="inputTexto">olaaa</textarea>-->
                    <section id="editor">
                        <textarea id="edit" name="Texto" id="inputTexto"></textarea>
                    </section>
                    <label class="mdl-textfield__label" for="Texto ">Texto</label>
                </div>
                <div class="mdl-cell mdl-cell--12-col mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input class="mdl-textfield__input" type="date"  name="Fecha" id="inputFecha" />
                    <!--<label class="mdl-textfield__label" for="Fecha">Fecha</label>//pattern="[0-9,#.-\s]+"-->
                    <!--<span class="mdl-textfield__error">Input is not a string!</span>-->
                </div>
                <div class="mdl-cell mdl-cell--12-col mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input class="mdl-textfield__input" pattern="[a-zA-Z0-9,#.-\s]+" name="Titulo" type="text"  id="inputTitulo" />
                    <label class="mdl-textfield__label" for="Titulo">Titulo</label>
                    <span class="mdl-textfield__error">Input is not a string!</span>
                </div><!--  style="width:1450px" -->
                <div class="mdl-cell mdl-cell--12-col mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <input class="mdl-textfield__input" name="Imagen" type="url" id="inputImagen" />
                    <label class="mdl-textfield__label" for="Imagen">Imagen</label>
                    <span class="mdl-textfield__error">Input is not a http:// URL!</span>
                </div>
                <div>
                    <button type="submit" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored"><i class="material-icons">create</i></button>
                </div>
            </form>
        </div>
        <!--</div>-->
        <!--
        When you scroll, the rich text editor's toolbar will remain visible at the top of the page.

        Dummy text so you can scroll

        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
        Aenean ornare lorem ut pellentesque tempor.
        Vivamus ut ex vestibulum velit rich text editor eleifend fringilla.
        Sed non metus dictum, elementum mauris wysiwyg html editor non, sagittis odio.
        Nullam pellentesque leo sit amet ante suscipit wysiwyg html editor sagittis.
        Donec tempus vulputate suscipit. Ut non felis rich text editor ac dolor pulvinar lacinia eu eget urna.
        Sed tincidunt sapien vulputate tellus fringilla sodales.
        Morbi accumsan dui wysiwyg html editor sed massa pellentesque, quis vestibulum lectus scelerisque.
        Nulla ultrices mi id felis luctus aliquet. Donec nec ligula wysiwyg html editor pretium sapien semper
        dictum eu id quam. Etiam ut sollicitudin nibh. Quisque eu ultrices dui. Nunc rich text editor congue, enim vitae dictum dignissim, libero nisl s
        agittis augue, non aliquet nibh tortor sit amet ex. Aliquam cursus maximus rich text editor mi eu consequat.
        Nullam tincidunt erat et placerat mattis. Nunc rich text editor congue, enim vitae dictum dignissim,
        libero nisl sagittis augue, non aliquet nibh tortor sit amet ex. Aliquam cursus maximus mi eu consequat.
        Nullam tincidunt erat et placerat mattis.

        When you scroll, the rich text editor's toolbar will remain visible at the top of the page.

        Dummy text so you can scroll

        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
        Aenean ornare lorem ut pellentesque tempor.
        Vivamus ut ex vestibulum velit rich text editor eleifend fringilla.
        Sed non metus dictum, elementum mauris wysiwyg html editor non, sagittis odio.
        Nullam pellentesque leo sit amet ante suscipit wysiwyg html editor sagittis.
        Donec tempus vulputate suscipit. Ut non felis rich text editor ac dolor pulvinar lacinia eu eget urna.
        Sed tincidunt sapien vulputate tellus fringilla sodales.
        Morbi accumsan dui wysiwyg html editor sed massa pellentesque, quis vestibulum lectus scelerisque.
        Nulla ultrices mi id felis luctus aliquet. Donec nec ligula wysiwyg html editor pretium sapien semper
        dictum eu id quam. Etiam ut sollicitudin nibh. Quisque eu ultrices dui. Nunc rich text editor congue, enim vitae dictum dignissim, libero nisl s
        agittis augue, non aliquet nibh tortor sit amet ex. Aliquam cursus maximus rich text editor mi eu consequat.
        Nullam tincidunt erat et placerat mattis. Nunc rich text editor congue, enim vitae dictum dignissim,
        libero nisl sagittis augue, non aliquet nibh tortor sit amet ex. Aliquam cursus maximus mi eu consequat.
        Nullam tincidunt erat et placerat mattis.
        When you scroll, the rich text editor's toolbar will remain visible at the top of the page.

        Dummy text so you can scroll

        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
        Aenean ornare lorem ut pellentesque tempor.
        Vivamus ut ex vestibulum velit rich text editor eleifend fringilla.
        Sed non metus dictum, elementum mauris wysiwyg html editor non, sagittis odio.
        Nullam pellentesque leo sit amet ante suscipit wysiwyg html editor sagittis.
        Donec tempus vulputate suscipit. Ut non felis rich text editor ac dolor pulvinar lacinia eu eget urna.
        Sed tincidunt sapien vulputate tellus fringilla sodales.
        Morbi accumsan dui wysiwyg html editor sed massa pellentesque, quis vestibulum lectus scelerisque.
        Nulla ultrices mi id felis luctus aliquet. Donec nec ligula wysiwyg html editor pretium sapien semper
        dictum eu id quam. Etiam ut sollicitudin nibh. Quisque eu ultrices dui. Nunc rich text editor congue, enim vitae dictum dignissim, libero nisl s
        agittis augue, non aliquet nibh tortor sit amet ex. Aliquam cursus maximus rich text editor mi eu consequat.
        Nullam tincidunt erat et placerat mattis. Nunc rich text editor congue, enim vitae dictum dignissim,
        libero nisl sagittis augue, non aliquet nibh tortor sit amet ex. Aliquam cursus maximus mi eu consequat.
        Nullam tincidunt erat et placerat mattis.
        When you scroll, the rich text editor's toolbar will remain visible at the top of the page.

        Dummy text so you can scroll

        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
        Aenean ornare lorem ut pellentesque tempor.
        Vivamus ut ex vestibulum velit rich text editor eleifend fringilla.
        Sed non metus dictum, elementum mauris wysiwyg html editor non, sagittis odio.
        Nullam pellentesque leo sit amet ante suscipit wysiwyg html editor sagittis.
        Donec tempus vulputate suscipit. Ut non felis rich text editor ac dolor pulvinar lacinia eu eget urna.
        Sed tincidunt sapien vulputate tellus fringilla sodales.
        Morbi accumsan dui wysiwyg html editor sed massa pellentesque, quis vestibulum lectus scelerisque.
        Nulla ultrices mi id felis luctus aliquet. Donec nec ligula wysiwyg html editor pretium sapien semper
        dictum eu id quam. Etiam ut sollicitudin nibh. Quisque eu ultrices dui. Nunc rich text editor congue, enim vitae dictum dignissim, libero nisl s
        agittis augue, non aliquet nibh tortor sit amet ex. Aliquam cursus maximus rich text editor mi eu consequat.
        Nullam tincidunt erat et placerat mattis. Nunc rich text editor congue, enim vitae dictum dignissim,
        libero nisl sagittis augue, non aliquet nibh tortor sit amet ex. Aliquam cursus maximus mi eu consequat.
        Nullam tincidunt erat et placerat mattis.
        When you scroll, the rich text editor's toolbar will remain visible at the top of the page.

        Dummy text so you can scroll

        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
        Aenean ornare lorem ut pellentesque tempor.
        Vivamus ut ex vestibulum velit rich text editor eleifend fringilla.
        Sed non metus dictum, elementum mauris wysiwyg html editor non, sagittis odio.
        Nullam pellentesque leo sit amet ante suscipit wysiwyg html editor sagittis.
        Donec tempus vulputate suscipit. Ut non felis rich text editor ac dolor pulvinar lacinia eu eget urna.
        Sed tincidunt sapien vulputate tellus fringilla sodales.
        Morbi accumsan dui wysiwyg html editor sed massa pellentesque, quis vestibulum lectus scelerisque.
        Nulla ultrices mi id felis luctus aliquet. Donec nec ligula wysiwyg html editor pretium sapien semper
        dictum eu id quam. Etiam ut sollicitudin nibh. Quisque eu ultrices dui. Nunc rich text editor congue, enim vitae dictum dignissim, libero nisl s
        agittis augue, non aliquet nibh tortor sit amet ex. Aliquam cursus maximus rich text editor mi eu consequat.
        Nullam tincidunt erat et placerat mattis. Nunc rich text editor congue, enim vitae dictum dignissim,
        libero nisl sagittis augue, non aliquet nibh tortor sit amet ex. Aliquam cursus maximus mi eu consequat.
        Nullam tincidunt erat et placerat mattis.
        -->
<? include ("footer.html"); ?>