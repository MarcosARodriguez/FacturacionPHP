<?php

#valida --> si no existe variable de ingreso te redirige hacia la pagina de ingreso
if (!isset($_SESSION["validarLogin"])) {

    echo '<script>window.location = "index.php?action=factura"</script>';
    return;
} else {
    #caso contrario si existe pero no es ok de igual manera se redirigira hacia la pagina de ingreso
    if ($_SESSION["validarLogin"] != "ok") {

        echo '<script>window.location = "index.php?action=factura"</script>';
        return;
    }
}
$usuarios = MvcController::ctrUsuarios(null, null);

#echo "<pre>"; print_r($usuarios); echo "</pre>";
?>

<div class="container-fluid py-5">
    <div class="container">
        
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Fecha Rgistro</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($usuarios as $key  => $value) : ?>
                    <tr>
                        <td><?php echo $value["nombre"]; ?></td>
                        <td><?php echo $value["email"]; ?></td>
                        <td><?php echo $value["fecha_register"]; ?></td>
                        <td>
                            <div class="btn-group">
                                <!-- boton para editar envia a otra pagina y envia el id a traves de la url-->
                                <a href="index.php?action=editar&tk=<?php echo $value["token"]; ?>" class="btn btn-warning">
                                    <i class="fas fa-pencil-alt"></i>
                                    Editar
                                </a>

                                <form method="POST">
                                    <input type="hidden" name="deleteUser" value="<?php echo $value["id"]; ?>"> <!-- id del usuario guardado en un campo oculto -->
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fas fa-trash-alt"></i>
                                        Eliminar
                                    </button>
                                    <?php
                                    $eliminar = new MvcController();
                                    $eliminar->ctrDelete();
                                    ?>
                                </form>
                            </div>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>