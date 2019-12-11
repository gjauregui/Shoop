<div id="content">
    <!-- BARRA LATERAL LOGIN-->
    <aside id="lateral">

        <div id="login" class="block_aside">
            <?php if(isset($_SESSION['error_login'])):?>
            <strong class="alert_red">Usuario y Contraseña son incorrectas</strong>
            <?php endif; ?>
            <?php unset($_SESSION['error_login']);?>
            <?php if (!isset($_SESSION['identity'])):?>
            <h3>Entrar a la Web</h3>
            <form action="<?=base_url?>Users/login" method="POST">

                <label for="email"> EMAIL </label>
                <input type="email" name="email" required/>
                <label for="password"> PASSWORD </label>
                <input type="password" name="password" required/>
                <input type="submit" name="Enviar">

            </form>         
            <?php else:?>
            <h3><?=$_SESSION['identity']->nombre?>
                <?=$_SESSION['identity']->apellidos?>
            </h3>
            <?php endif;?>

            <ul>
                <?php if (isset($_SESSION['admin'])):?>
                <li><a href="<?=base_url?>Categories/index">Gestionar categorias</a></li>
                <li><a href="#">Gestionar productos</a></li>
                <li><a href="#">Gestionar pedidos</a></li>
                <?php endif;?>
                <?php if(isset($_SESSION['identity'])):?>
                <li><a href="#">Mis pedidos</a></li>
                <li><a href="<?= base_url?>Users/logout">Cerrar Sesion</a></li>
                <?php else:?>
                    <li><a href="<?=base_url?>Users/register">Registrarse</a></li>
                <?php endif;?>
            </ul>

        </div>

    </aside>
    <!-- Contenido Central -->
    <div id="central">