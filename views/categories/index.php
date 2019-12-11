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