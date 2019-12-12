<?php if(isset($_SESSION['add']) && $_SESSION['add'] == "complete"):?>
    <strong class="alert_green">El Producto ha sido creado</strong>
<?php elseif(isset($_SESSION['add']) && $_SESSION['add'] == "failed"):?>
    <strong class="alert_red">El Producto no se ha creado, Verifique los datos ingresados</strong>
<?php endif;?>    
<?php Utils::deleteSession('add');?>  

<h1> Gestión  de Productos</h1>

<a href="<?=base_url?>Products/create" class='button' button-small>Crear productos</a>

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
    <tr>
    <?php foreach ($objprod as $key => $value):?>
    <tr>
        <td><?= $value['nombre']?></td>
        <td><?= $value['categorie_id']?></td>
        <td><?= $value['descripcion']?></td>
        <td><?= $value['precio']?></td>
        <td><?= $value['stock']?></td>
        <td><?= $value['oferta']?></td>
        <td><?= $value['fecha']?></td>
        <td><?= $value['imagen']?></td>
    </tr>
    <?php endforeach;?>
</table>