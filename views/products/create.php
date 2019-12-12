<div class="form_container">
    <form action="<?= base_url ?>Products/save" method="POST" enctype="multipart/form-data">
        <label for="name">Nombre</label>
        <input type="text" name="name">
        <label for="cat">Categoria</label>
        <?php $categories = Utils::menuCategories();?>
        <select name="cat">
            <?php foreach ($categories as $key => $value):?>
            <option value="<?= $value['id']?>">
                <?= $value['nombre'] ?>
            </option>
            <?php endforeach;?>
        </select>
        <label for="desc">Descripción</label>
        <textarea name="desc"></textarea>
        <label for="price">Precio</label>
        <input type="number" name="price" min="0">
        <label for="stock">Stock</label>
        <input type="number" name="stock" min="0">
        <label for="image">Imagen</label>
        <input type="file" name="image"/>
        
        <input type="submit" value="Guardar" />

    </form>
</div>