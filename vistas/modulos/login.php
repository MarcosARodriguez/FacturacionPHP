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
            
        </form>
        
    </div>
</div>
</div>