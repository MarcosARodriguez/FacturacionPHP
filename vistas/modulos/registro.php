<div class="container-fluid py-5">
    <div class="d-flex justify-content-center">
        <form class="p-5 bg-light" method="post">
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                    </div>
                    <input type="text" class="form-control" placeholder="Enter your name" id="nombre" name="regisName" required>
                </div>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                    </div>
                    <input type="email" class="form-control" placeholder="Enter email" id="email" name="regisMail" required>
                </div>
            </div>
            <div class="form-group">
                <label for="pwd">Contraseña:</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                    </div>
                    <input type="password" class="form-control" placeholder="Enter password" id="pwd" name="regisPass" required>
                </div>
            </div>
            <?php
                #FORMA EN QUE SE INSTANCIA UN METODO NO ESTATICO
                #$registro = new MvcController();
                #$registro ->ctrRegistro();

                #FORMA EN QUE SE INSTANCIA UN METODO ESTATICO
                $registro = MvcController::ctrRegistro();
                
                if ($registro == "ok") {
                    # linea javascript para vaciar la cache del navegador asi no se envia los datos al actualizar la pagina
                    echo '<script>      
                        if (window.history.replaceState) {
                            window.history.replaceState(null, null, window.location.href);
                        }
                    </script>';
                    echo '<div class="alert alert-success">Usuario Registrado</div>';
                }elseif($registro == "error"){
                    echo '<script>      
                        if (window.history.replaceState) {
                            window.history.replaceState(null, null, window.location.href);
                        }
                    </script>';
                    echo '<div class="alert alert-danger">Error, no se permiten caracteres especiales</div>';
                }

            ?>
            
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </div>
</div>