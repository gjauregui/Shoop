<h1><?= $categoryName; ?>
</h1>

<?php if ($prod): ?>

<?php foreach ($prod as $key => $value): ?>
<div class="product">
    <?php if ($value['imagen'] != null): ?>
    <img
        src="<?=base_url?>uploads/images/<?= $value['imagen'] ?>" />
    <?php else:?>
    <img src="<?=base_url?>assets/img/camiseta.png" />
    <?php endif;?>
    <h2><?= $value['nombre']?>
    </h2>
    <p><?= "s/.".$value['precio']?>
    </p>
    <a href="" class="button">Comprar</a>
</div>
<?php endforeach; ?>

<?php else: ?>
<div>
    <h1>No se encontraron resultados</h1>
</div>
<?php endif;
