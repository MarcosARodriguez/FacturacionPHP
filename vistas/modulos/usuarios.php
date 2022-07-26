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

<div class="container pt-5 border">
    <div class="encabezado">
        <div class="row">
            <div class="col">
                <h4>
                    <i class="fas fa-search"></i>
                    BUSCAR USUARIO
                </h4>
            </div>
            <div class="btn-group col-sm-3 pull-right">
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#nuevoUsuario">
                    <span class="fas fa-plus"></span>
                    NUEVO USUARIO
                </button>
            </div>
        </div>
    </div>

<div class="container-fluid py-5">
    <div class="container">
        
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Usuario</th>
                    <th>Email</th>
                    <th>Fecha Rgistro</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($usuarios as $key  => $value) : ?>
                    <tr>
                        <td><?php echo $value["name_usuario"]; ?></td>
                        <td><?php echo $value["apellido_usuario"]; ?></td>
                        <td><?php echo $value["user_usuario"]; ?></td>
                        <td><?php echo $value["mail_usuario"]; ?></td>
                        <td><?php echo $value["date_create_usuario"]; ?></td>
                        <td>
                            <div class="btn-group">
                                <!-- boton para editar envia a otra pagina y envia el id a traves de la url-->
                                <a href="index.php?action=editar&tk=<?php echo $value["token_usuario"]; ?>" class="btn btn-warning">
                                    <i class="fas fa-pencil-alt"></i>
                                    Editar
                                </a>

                                <form method="POST">
                                    <input type="hidden" name="deleteUser" value="<?php echo $value["id_usuario"]; ?>"> <!-- id del usuario guardado en un campo oculto -->
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