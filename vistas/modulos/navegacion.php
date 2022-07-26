<!--AQUI USAREMOS VARIABLES GET LAS CUALES HACEN UN ENVIO A TRAVES DE LAS URL
SE RECONOCEN POR EMPEZAR POR UN ? SEGUIDO DEL NOMBRE DE LA VARIABLE
SE PUEDEN AGREGAR MAS VARIALES A LA URL UTILIZANDO & Y EL NOMBRE DE LA VARIABLE
LA PAGINA WEB SIEMPRE DEBE INICIAR POR EL INDEX.PHP 
-->

<nav class="navbar navbar-expand-sm navbar-light">
    <a class="navbar-brand" href="#">FACTURACION</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="nav justify-content-center nav-pills">

            <?php if (isset($_GET["action"])) : ?>

                <?php switch ($_GET["action"]):
                    case 'factura': ?>
                        <li class="nav-item">
                            <a class="nav-link active" href="index.php?action=factura">FACTURA</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="index.php?action=productos">PRODUCTOS</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="index.php?action=clientes">CLIENTES</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="index.php?action=usuarios">USUARIOS</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="index.php?action=salir">SALIR</a>
                        </li>
                        <?php break; ?>
                    <?php
                    case 'productos': ?>
                        <li class="nav-item">
                            <a class="nav-link " href="index.php?action=factura">FACTURA</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="index.php?action=productos">PRODUCTOS</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="index.php?action=clientes">CLIENTES</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="index.php?action=usuarios">USUARIOS</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="index.php?action=salir">SALIR</a>
                        </li>
                        <?php break; ?>
                    <?php
                    case 'clientes': ?>
                        <li class="nav-item">
                            <a class="nav-link " href="index.php?action=factura">FACTURA</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="index.php?action=productos">PRODUCTOS</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="index.php?action=clientes">CLIENTES</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="index.php?action=usuarios">USUARIOS</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="index.php?action=salir">SALIR</a>
                        </li>
                        <?php break; ?>
                    <?php
                    case 'usuarios': ?>
                        <li class="nav-item">
                            <a class="nav-link " href="index.php?action=factura">FACTURA</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="index.php?action=productos">PRODUCTOS</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="index.php?action=clientes">CLIENTES</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="index.php?action=usuarios">USUARIOS</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="index.php?action=salir">SALIR</a>
                        </li>
                        <?php break; ?>
                    <?php
                    case 'salir': ?>
                        <li class="nav-item">
                            <a class="nav-link " href="index.php?action=factura">FACTURA</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="index.php?action=productos">PRODUCTOS</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="index.php?action=clientes">CLIENTES</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="index.php?action=usuarios">USUARIOS</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="index.php?action=salir">SALIR</a>
                        </li>

                        <?php break; ?>
                    <?php
                    case 'login': ?>
                        <li class="nav-item">
                            <a class="nav-link " href="index.php?action=factura">FACTURA</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="index.php?action=productos">PRODUCTOS</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="index.php?action=clientes">CLIENTES</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="index.php?action=usuarios">USUARIOS</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="index.php?action=salir">SALIR</a>
                        </li>

                        <?php break; ?>
                    <?php
                    case 'editar': ?>
                        <li class="nav-item">
                            <a class="nav-link " href="index.php?action=ingreso">INGRESO</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="index.php?action=factura">FACTURA</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="index.php?action=registro">ACTUALIZAR</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="index.php?action=usuarios">USUARIOS</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="index.php?action=salir">SALIR</a>
                        </li>

                        <?php break; ?>
                    <?php
                    default:  ?>
                        <li class="nav-item">
                            <a class="nav-link active" href="index.php?action=factura">FACTURA</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="index.php?action=productos">PRODUCTOS</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="index.php?action=clientes">CLIENTES</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="index.php?action=usuarios">USUARIOS</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="index.php?action=salir">SALIR</a>
                        </li>
                <?php endswitch; ?>

            <?php else : ?>
                <li class="nav-item">
                    <a class="nav-link " href="index.php?action=factura">FACTURA</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="index.php?action=productos">PRODUCTOS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="index.php?action=clientes">CLIENTES</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="index.php?action=usuarios">USUARIOS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="index.php?action=salir">SALIR</a>
                </li>
            <?php endif; ?>
        </ul>
    </div>
</nav>