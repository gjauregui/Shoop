<div id="content">
<!-- BARRA LATERAL LOGIN-->
<aside id="lateral">

<div id="login" class="block_aside">

<?php if(!isset($_SESSION['identity'])):?>
    <h3>Entrar a la Web</h3>
    <form action="<?=base_url?>Users/login" method="POST">

        <label for="email"> EMAIL </label>
        <input type="email" name="email" />
        <label for="password"> PASSWORD </label>
        <input type="password" name="password" />
        <input type="submit" name="Enviar">

    </form>
<?php else:?>
    <h3><?=$_SESSION['identity']->nombre?> <?=$_SESSION['identity']->apellidos?></h3>
<?php endif;?>    

    <ul>
    <li><a href="#">Mis pedidos</a></li>
    <li><a href="#">Gestionar pedidos</a></li>
    <li><a href="#">Gestionar categorias</a></li>
    <li><a href="<?= base_url?>Users/logout">Cerrar Sesion</a></li>
    </ul>   

</div>

</aside>
<!-- Contenido Central -->
<div id="central">