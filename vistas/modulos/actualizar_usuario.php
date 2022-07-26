<?php 
    if (isset($_GET["tk"])) {
        
        $item = "token";
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
                    <input type="hidden" name="tkUser" value="<?php echo $usuario["token"];?>"> <?php #id del usuario guardado en un campo oculto --> ?>
                    <input type="text" class="form-control" value="<?php echo $usuario["nombre"]; ?>" placeholder="Enter your name" id="nombre" name="actuName" required>
                </div>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                    </div>
                    <input type="email" class="form-control" value="<?php echo $usuario["email"]; ?>" placeholder="Enter email" id="email" name="actuMail" required>
                </div>
            </div>
            <div class="form-group">
                <label for="pwd">Contraseña:</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                    </div>
                    <input type="password" class="form-control" placeholder="Enter password" id="pwd" name="actuPass">
                    <input type="hidden" name="passActual" value="<?php echo $usuario["password"];?>"> <?php #password del usuario guardado en un campo oculto ?>
                </div>
                <label for="pwd">Si no hay contraseña se guardara la anterior</label>
            </div>
            <?php
                $actualizar = MvcController::ctrUpdate();
                
                if ($actualizar == "ok") {
                    
                    echo '<script>      
                        if (window.history.replaceState) {
                            window.history.replaceState(null, null, window.location.href);
                        }
                    </script>';
                    echo '<div class="alert alert-success">Usuario Actualizado</div>
                        <script>
                            setTimeout(function(){
                                window.location = "index.php?action=usuarios";
                            },1000);
                        </script>
                    ';
                }elseif($actualizar == "error"){
                    echo '<script>      
                        if (window.history.replaceState) {
                            window.history.replaceState(null, null, window.location.href);
                        }
                    </script>';
                    echo '<div class="alert alert-danger">Error, no ha podido actualizar el registro</div>';
                }
            
            ?>
            
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>
</div>