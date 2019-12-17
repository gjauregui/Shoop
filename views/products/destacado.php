<h1>Productos Destacados</h1>

<?php foreach ($objprod as $key => $prod): ?>

<div class="product">
<?php if($prod['imagen'] != null): ?>
    <img src="<?=base_url?>uploads/images/<?= $prod['imagen'] ?>"/>
<?php else:?>
    <img src="<?=base_url?>assets/img/camiseta.png" />
<?php endif;?>   
    <h2><?= $prod['nombre']?></h2>
    <p><?= "s/.".$prod['precio']?></p>
    <a href="" class="button">Comprar</a>
</div>

<?php endforeach; ?>

