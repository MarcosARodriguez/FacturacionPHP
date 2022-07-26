<?php
if (isset($_GET["tk"])) {

    $item = "token_usuario";
    $valor = $_GET["tk"];
    $usuario = MvcController::ctrUsuarios($item, $valor);
    #echo "<pre>"; print_r($usuario); echo "</pre>";
}

?>

<div class="d-flex justify-content-center py-3">
    <h1>ACTUALIZAR DATOS</h1>
</div>
<div class="container-fluid py-3">
    <div class="d-flex justify-content-center">
        <form class="p-5 bg-light" method="post">
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                    </div>
                    <input type="hidden" name="tkUser" value="<?php echo $usuario["token_usuario"]; ?>"> <?php #id del usuario guardado en un campo oculto --> 
                                                                                                        ?>
                    <input type="text" class="form-control" value="<?php echo $usuario["name_usuario"]; ?>" placeholder="Enter your name" id="nombre" name="actuName" required>
                </div>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                    </div>
                    <input type="email" class="form-control" value="<?php echo $usuario["mail_usuario"]; ?>" placeholder="Enter email" id="email" name="actuMail" required>
                </div>
            </div>
            <div class="form-group">
                <label for="pwd">Contraseña:</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                    </div>
                    <input type="password" class="form-control" placeholder="Enter password" id="pwd" name="actuPass">
                    <input type="hidden" name="passActual" value="<?php echo $usuario["password_usuario"]; ?>"> <?php #password del usuario guardado en un campo oculto 
                                                                                                                ?>
                </div>
                <label for="pwd">Si no hay contraseña se guardara la anterior</label>
            </div>
            <?php
            $actualizar = MvcController::ctrUpdate();

            ?>

            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>
</div>
<?php
    if ($actualizar == "ok") {

        echo '<script>
            if (window.history.replaceState) {
                window.history.replaceState(null, null, window.location.href);
            }
        </script>';
        echo '<script>
            Swal.fire({
                type: "success",
                title: "El Usuario ha sido Actualizado",
                icon: "success",
                showConfirmButton: false,
                timer: 1500
            })
        </script>';
        echo '<script>
            setTimeout(function(){
                window.location = "index.php?action=usuarios";
            },1500);
        </script>';
    }elseif($actualizar == "error"){
        echo '<script>
            if (window.history.replaceState) {
                window.history.replaceState(null, null, window.location.href);
            }
        </script>';
        echo '<script>
            Swal.fire({
                type: "error",
                title: "El Usuario no se ha podido Actualizar",
                icon: "error",
                showConfirmButton: false,
                timer: 1000
            })
        </script>';
        echo '<script>
            setTimeout(function(){
                window.location = "index.php?action=usuarios";
            },1500);
        </script>';
    }
?>