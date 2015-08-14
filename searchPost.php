<? include ("header.html"); ?>
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
<? include ("footer.html"); ?>