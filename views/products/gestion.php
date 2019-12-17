<?php
$add = isset($_SESSION['add']) && $_SESSION['add'] == "complete" ? 'El Producto se agregó' : '';  //si la session complete en el metodo save() existe, creo una variable con un mensaje
$not_add = isset($_SESSION['add']) && $_SESSION['add'] == "failed" ? 'El Producto no se agregó, Verifique los datos ingresados' : ''; //si la session failed en el metodo save() existe, creo una variable con un mensaje

$delete = isset($_SESSION['delete']) && $_SESSION['delete'] == "complete" ? 'El Producto se eliminó' : ''; //si la session complete en el metodo delete() existe, creo una variable con un mensaje
$not_delete = isset($_SESSION['delete']) && $_SESSION['delete'] == "failed" ? 'El Producto no se ha elimnado, Intente nuevamente' : ''; //si la session failed en el metodo delete() existe, creo una variable con un mensaje

$edit = isset($_SESSION['edit']) && $_SESSION['edit'] == 'complete' ? "El Producto se editó" : '';
$not_edit = isset($_SESSION['edit']) && $_SESSION['edit'] == 'failed' ? "El Producto no se editó" : '';

//elimino las sesion
Utils::deleteSession('add'); 
Utils::deleteSession('delete');
Utils::deleteSession('edit');
?>

<strong class="alert_green"><?= $add , $delete,$edit ?></strong>
<strong class="alert_red"> <?= $not_add, $not_delete,$not_edit ?></strong>

<h1> Gestión de Productos</h1>

<a href="<?=base_url?>Products/create" class='button button-small'>Crear productos</a>

<table>
    <tr>
        <th>Nombre</th>
        <th>Categoria</th>
        <th>Descripcion</th>
        <th>Precio</th>
        <th>Stock</th>
        <th>Fecha</th>
        <th>Imagen</th>
        <th>Acciones</th>
    </tr>
        <?php foreach ($objprod as $key => $prod):?>
    <tr>
        <td><?= $prod['nombre']?></td>
<?php $categories = Utils::menuCategories();?>
<?php foreach ($categories as $key => $value):?>
    <?php if($prod['categorie_id'] == $value['id'] ):?>
        <td><?=$value['nombre']?></td>
    <?php endif;?>    
<?php endforeach; ?>
        <td><?= $prod['descripcion']?></td>
        <td><?= $prod['precio']?></td>
        <td><?= $prod['stock']?></td>
        <td><?= $prod['fecha']?></td>
        <td><img src="<?=base_url?>uploads/images/<?=$prod['imagen']?> " class="thumb"/></td>
        <td>
            <a href="<?=base_url?>Products/viewedit&id=<?=$prod['id']?>" class="button button-gestion">Editar</a>
            <a href="<?=base_url?>Products/delete&id=<?=$prod['id']?>" class="button button-gestion button-red">Eliminar</a>
        </td>
    </tr>
    <?php endforeach;?>
</table>