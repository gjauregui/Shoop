<?php if(isset($cat)  && is_object($cat)):?>
    <h1><?=  $cat->nombre ?></h1>
<?php else:?>
    <h1>No existe la Categoria</h1>
<?php endif;?>


<?php foreach ($prod as $key => $value): ?>

<div class="product">
<?php if($value['imagen'] != null): ?>
    <img src="<?=base_url?>uploads/images/<?= $value['imagen'] ?>"/>
<?php else:?>
    <img src="<?=base_url?>assets/img/camiseta.png" />
<?php endif;?>   
    <h2><?= $value['nombre']?></h2>
    <p><?= "s/.".$value['precio']?></p>
    <a href="" class="button">Comprar</a>
</div>

<?php endforeach; ?>