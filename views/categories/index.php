<?php if (isset($_SESSION['add']) && $_SESSION['add'] == 'complete'):?>
    <strong class="alert_green"> Categoria Creada </strong>
<?php elseif (isset($_SESSION['add']) && $_SESSION['add'] == 'failed') :?>   
    <strong class="alert_red">No se creó la Categoria</strong>
<?php endif;?>
<?php Utils::deleteSession('add');?>

<h1>Gestionar Categorias</h1>

<a href="<?=base_url?>Categories/create" class='button' button-small>Crear Categoria</a>

<table>
    <tr>
        <th>Id</th>
        <th>Nombre</th>
    </tr>
<?php foreach ($categorias as $key => $value):?>
    <tr>
        <td> <?=$value['id']?> </td>
        <td> <?=$value['nombre']?> </td>
    </tr>
<?php endforeach;?>
</table>