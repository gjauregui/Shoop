<?php
$add = isset($_SESSION['add']) && $_SESSION['add'] == "complete" ? 'El Producto se agregó' : '';  //si la session complete en el metodo save() existe, creo una variable con un mensaje
$not_add = isset($_SESSION['add']) && $_SESSION['add'] == "failed" ? 'El Producto no se agregó, Verifique los datos ingresados' : ''; //si la session failed en el metodo save() existe, creo una variable con un mensaje

$delete = isset($_SESSION['delete']) && $_SESSION['delete'] == "complete" ? 'El Producto se eliminó' : ''; //si la session complete en el metodo delete() existe, creo una variable con un mensaje
$not_delete = isset($_SESSION['delete']) && $_SESSION['delete'] == "failed" ? 'El Producto no se ha elimnado, Intente nuevamente' : ''; //si la session failed en el metodo delete() existe, creo una variable con un mensaje

Utils::deleteSession('add'); //elimino las sesion
Utils::deleteSession('delete'); //elimino las sesion
?>

<strong class="alert_green"><?= $add , $delete ?></strong>
<strong class="alert_red"> <?= $not_add, $not_delete ?></strong>

<h1> Gestión de Productos</h1>

<a href="<?=base_url?>Products/create" class='button button-small'>Crear productos</a>

<table>
    <tr>
        <th>Nombre</th>
        <th>Categoria</th>
        <th>Descripcion</th>
        <th>Precio</th>
        <th>Stock</th>
        <th>Oferta</th>
        <th>Fecha</th>
        <th>Imagen</th>
        <th>Acciones</th>
    <tr>
        <?php foreach ($objprod as $key => $value):?>
    <tr>
        <td><?= $value['nombre']?>
        </td>
        <td><?= $value['categorie_id']?>
        </td>
        <td><?= $value['descripcion']?>
        </td>
        <td><?= $value['precio']?>
        </td>
        <td><?= $value['stock']?>
        </td>
        <td><?= $value['oferta']?>
        </td>
        <td><?= $value['fecha']?>
        </td>
        <td><img src="<?=base_url?>uploads/images/<?=$value['imagen']?> " class="thumb"/>
        </td>
        <td>
            <a href="<?=base_url?>Products/viewedit&id=<?=$value['id']?>" class="button button-gestion">Editar</a>
            <a href="<?=base_url?>Products/delete&id=<?=$value['id']?>" class="button button-gestion button-red">Eliminar</a>
        </td>
    </tr>
    <?php endforeach;?>
</table>