
<?php if(isset($_SESSION['register']) && $_SESSION['register'] == "complete"):?>
        <strong class="alert_green">Registro Completado correctamente</strong>
<?php elseif(isset($_SESSION['register']) && $_SESSION['register'] == "failed"):?>
        <strong class="alert_red">Registro fallido, intrude los datos correctamente</strong>
<?php endif;?>
<?php Utils::deleteSession('register');?>


<h1>Registrarse</h1>

<form action ="<?=base_url?>Users/save" method ="POST">

    <label for="nombre">Nombres</label>
    <input type="text" name="name" required/>

    <label for="apellidos">Apellidos</label>
    <input type="text" name="ape" required/>

    <label for="email">Email</label>
    <input type="email" name="email" required/>

    <label for="password">Password</label>
    <input type="password" name="password" required/>

    <input type= submit name="enviar" value ="Registrar"/>

</form>