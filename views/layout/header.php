<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tienda de camisetas</title>
    <link rel="stylesheet" href="<?=base_url?>assets/css/styles.css">
</head>

<body>
    <div id="container"> 

    <!-- CABECERA -->
    <header id="header">
        <div id="logo">
            <img src="<?=base_url?>assets/img/camiseta.png" alt="Camiseta Logo" />
            <a href="index.php">Tienda de Camisetas</a>
        </div>
    </header>

    <?php $objcat = Utils::menuCategories();?>
    <!-- MENU -->
    <nav id="menu">
        <ul>
            <li>
                <a href="<?=base_url?>">Inicio</a>
            </li>
        <?php foreach ($objcat as $key => $value):?>
            <li>
                <a href=""><?=$value['nombre'] ?></a>
            </li>
        <?php endforeach;?>    
        </ul>
    </nav>

