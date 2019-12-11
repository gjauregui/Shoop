
        <!-- BARRA LATERAL LOGIN-->
        <aside id="lateral">

            <div id="login" class="block_aside">
                <h3>Entrar a la Web</h3>
                <form action="" method="POST">

                    <label for="email"> EMAIL </label>
                    <input type="email" name="email" />
                    <label for="password"> PASSWORD </label>
                    <input type="password" name="password" />
                    <input type="submit" name="Enviar">

                </form>

                <ul>
                <li><a href="#">Mis pedidos</a></li>
                <li><a href="#">Gestionar pedidos</a></li>
                <li><a href="#">Gestionar categorias</a></li>
                </ul>   

            </div>

        </aside>
        <!-- Contenido Principal -->
        <div id="central">
            <h1>Productos Destacados</h1>

            <div class="product">
                <img src="assets/img/camiseta.png" />
                <h2>Camiseta Azul Small</h2>
                <p>20 dolares</p>
                <a href="" class="button">Comprar</a>
            </div>

            <div class="product">
                <img src="assets/img/camiseta.png" />
                <h2>Camiseta Azul Small</h2>
                <p>20 dolares</p>
                <a href="" class="button">Comprar</a>
            </div>

            <div class="product">
                <img src="assets/img/camiseta.png" />
                <h2>Camiseta Azul Small</h2>
                <p>20 dolares</p>
                <a href="" class="button">Comprar</a>
            </div>

            <div class="product">
                <img src="assets/img/camiseta.png" />
                <h2>Camiseta Azul Small</h2>
                <p>20 dolares</p>
                <a href="" class="button">Comprar</a>
            </div>

        </div>

    </div>

    <!-- Pie de página -->
    <footer id="footer">
        <p>Desarrollado por Gabriel &copy; <?= date('Y') ?></p>
    </footer>
    </div>
</body>

</html>