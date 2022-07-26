<?php
    #valida --> si no existe variable de ingreso te redirige hacia la pagina de ingreso
    if (!isset($_SESSION["validarLogin"])) {

        
        echo '<script>window.location = "index.php?action=login"</script>';
        return;
    } else {
        #caso contrario si existe pero no es ok de igual manera se redirigira hacia la pagina de ingreso
        if ($_SESSION["validarLogin"] != "ok") {

            echo '<script>window.location = "index.php?action=login"</script>';
            return;
        }
        else{
            session_destroy();
        }
    }

    
?>
<div class="container-fluid py-5">
        <div class="container">
            <h1>¡HAS SALIDO DEL SISTEMA!</h1>
            <a href="index.php?action=login" class="btn btn-primary">Volver</a>
        </div>
</div>