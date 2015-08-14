<? include ("header.html"); ?>
    <form action='insertarPost.php' method='post'>
        <input type='text' placeholder="Autor" size="100px" id='textoNoBorde' name='Autor'><br>
        <input type='text' placeholder="Fecha" size="100px" id='textoNoBorde' name='Fecha'><br>
        <input type='text' placeholder="Introduce titulo" size="100px" id='textoNoBorde' name='Titulo'><br>
        <input type='text' placeholder="Texto" size="100px" id='textoNoBorde' name='Texto'><br>
        <button class="btn btn-default" id='botonNewPost'><i class="glyphicon glyphicon-eye-open"></i>Enviar
    </form>
<? include ("footer.html"); ?>