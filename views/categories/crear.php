<h1>Crear nueva Categoria</h1>

<form action="<?=base_url?>Categories/save" method="POST">
    <label for="nombre">Nombre</label>
    <input type="text" name="name" required>

    <input type="submit" value="Crear">
</form>
