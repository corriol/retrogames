<h3>Nou usuari</h3>
<form enctype="multipart/form-data" method="post">
    <input type="hidden" class="form-control" name="id" id="id" >
    <div class="form-group">
        <label for="username">Nom d'usuari</label>
        <input type="text" class="form-control" name="username" id="username"
                 placeholder="Introduix el nom de l'etiqueta:" >
    </div>
        <div class="form-group">
        <label for="password">Contrasenya</label>
        <input type="text" class="form-control" name="password" id="password"
                 placeholder="Introdueix la contrasenya:" >
        </div>
    <div class="form-group">
        <label for="role">Role</label>
        <input type="text" class="form-control" name="role" id="role"
               placeholder="Introdueix el rol:">
    </div>
    <input type="submit" value="Guardar">
    <input type="reset" value="Neteja el formulari">
</form>
