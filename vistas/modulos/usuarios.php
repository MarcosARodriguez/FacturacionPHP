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
        <div id="nuevoUsuario" class="modal fade" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form method="post">
                        <!-- MODAL HEADER-->
                        <div class="modal-header">
                            <h4 class="modal-title">
                                <i class="fas fa-edit"></i>
                                Agregar nuevo Usuario
                            </h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <!-- MODAL BODY-->
                        <div class="modal-body">     
                                <div class="form-row" style="margin-bottom: 15px;">
                                    <label for="nombreUsuario" class="col-sm-3 bg-light">Nombres</label>
                                    <div class="col-sm-8 bg-light">
                                        <input type="text" name="regisNameuser" id="nameuser" class="form-control" placeholder="Nombres del Usuario" required>
                                    </div>
                                </div>
                                <div class="form-row" style="margin-bottom: 15px;">
                                    <label for="apellidoUsuario" class="col-sm-3">Apellidos</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="regisLastuser" id="lastuser" class="form-control" placeholder="Apellidos del producto" required>
                                    </div>
                                </div>
                                <div class="form-row" style="margin-bottom: 15px;">
                                    <label for="usuario" class="col-sm-3">Usuario</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="regisUser" id="user" class="form-control" placeholder="Usuario" required>
                                    </div>
                                </div>
                                <div class="form-row" style="margin-bottom: 15px;">
                                    <label for="correo" class="col-sm-3">Correo</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="regisMail" id="mail" class="form-control" placeholder="Correo" required>
                                    </div>
                                </div>
                                <div class="form-row" style="margin-bottom: 15px;">
                                    <label for="contraseña" class="col-sm-3">Contraseña</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="regisPass" id="password" class="form-control" placeholder="Contraseña" required>
                                    </div>
                                </div>
                                <?php
                                $registro = MvcController::ctrRegistro();

                                ?>
                        </div>
                        <!-- MODAL FOOTER-->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary" id="guardar_datos">Guardar datos</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php
            if ($registro == "ok") {
                # linea javascript para vaciar la cache del navegador asi no se envia los datos al actualizar la pagina
                echo '<script>      
                            if (window.history.replaceState) {
                                window.history.replaceState(null, null, window.location.href);
                            }
                        </script>';
                # sweet alert para mensajes o alertas mas vistosas
                echo '<script>
                        Swal.fire({
                            type: "success",
                            title: "Usuario Registrado",
                            icon: "success",
                            showConfirmButton: false
                        })
                    </script>';
                #esto forzara a que se actualice la pagina para ver los cambios
                /**echo '<script>
                    setTimeout(function(){
                        window.location = "index.php?action=usuarios";
                    },1500);
                </script>';*/
            } elseif ($registro == "error") {
                echo '<script>      
                            if (window.history.replaceState) {
                                window.history.replaceState(null, null, window.location.href);
                            }
                        </script>';
                echo '<script>
                        Swal.fire({
                            type: "error",
                            title: "El Usuario no se ha podido Registrar",
                            icon: "error",
                            showConfirmButton: false
                        })
                    </script>';
            }

        ?>
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
                    <th>Fecha Registro</th>
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
                                <a href="index.php?action=editar_user&tk=<?php echo $value["token_usuario"]; ?>" class="btn btn-warning">
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
