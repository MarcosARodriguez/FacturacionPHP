<div class="container-fluid py-5">
    <div class="d-flex justify-content-center">
        <form class="p-5 bg-light" method="post">
            <div class="form-group">
                <label for="usuario">Usuario:</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                    </div>
                    <input type="text" class="form-control" placeholder="Ingresa el usuario" id="user" name="loginUser" required>
                </div>
            </div>
            <div class="form-group">
                <label for="pwd">Contraseña:</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                    </div>
                    <input type="password" class="form-control" placeholder="Ingresa tu contraseña" id="pwd" name="loginPass" required>
                </div>
            </div>
            <div class="form-group form-check">
                <label class="form-check-label">
                    <input class="form-check-input" type="checkbox"> Recordar credenciales
                </label>
            </div>
            <?php
            #FORMA EN QUE SE INSTANCIA UN METODO NO ESTATICO
            #el metodo ctrLogin hara que el ingreso exitoso envie a la pagina usuarios todas las opreciones se haran desde 
            #el controlador por eso se declara como no estatico
            $login = new MvcController();
            $login->ctrLogin();

            ?>

            <button type="submit" class="btn btn-primary">Ingresar</button>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#nuevoUsuario" data-keyboard="true">Registrar</button>
        </form>
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
</div>
</div>