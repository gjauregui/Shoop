<?php 
$urlAction = $edit ? base_url."Products/edit&id=" . $datos->id : base_url."Products/save";
$name = $datos->nombre ?? ''; 
$cat = $datos->categorie_id ?? ''; 
$desc = $datos->descripcion ?? ''; 
$precio = $datos->precio ?? ''; 
$stock = $datos->stock ?? '1'; 

?>

<h1><?= $edit ? 'Editar' : 'Crear' ?> Producto</h1>
<div class="form_container">
    <?php ?>
    <form action="<?=$urlAction?>" method="POST" enctype="multipart/form-data">
        <label for="name">Nombre</label>
        <input type="text" name="name" value="<?=$name?>">
        <label for="cat">Categoria</label>
        <?php $categories = Utils::menuCategories();?>
        <select name="cat">
            <?php foreach ($categories as $key => $value):?>
                <option value="<?=$value['id']?>"<?= $value['id'] == $cat ? 'selected' : '';?>>
                    <?=$value['nombre'] ?>
                </option>
            <?php endforeach;?>
        </select>
        <label for="desc">Descripción</label>
        <textarea name="desc"><?=$desc?></textarea>
        <label for="price">Precio</label>
        <input type="number" name="price" min="0"  value = "<?=$precio?>">
        <label for="stock">Stock</label>
        <input type="number" name="stock" min="0" value = "<?=$stock?>">
        <label for="image">Imagen</label>
        <?php if(isset($datos->imagen) && !empty($datos->imagen)):?>
            <img src="<?=base_url?>uploads/images/<?=$datos->imagen?>" class="thumb"/>
        <?php endif;?>
        <input type="file" name="image" value="<?=$datos->imagen?>"/>
        
        <input type="submit" value="Guardar" />

    </form>
</div>