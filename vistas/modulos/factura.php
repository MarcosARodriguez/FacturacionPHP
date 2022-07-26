<?php 
    
    #valida --> si no existe variable de ingreso te redirige hacia la pagina de ingreso
    if (!isset($_SESSION["validarLogin"])) {
        
        echo '<script>window.location = "index.php?action=login"</script>';
        return;
    }else{
        #caso contrario si existe pero no es ok de igual manera se redirigira hacia la pagina de ingreso
        if ($_SESSION["validarLogin"] != "ok") {
            
            echo '<script>window.location = "index.php?action=login"</script>';
            return;
        }
    }

?>

<div class="container pt-5 border">
    <div class="encabezado">
        <div class="row">
            <div class="col">
                <h4>
                    <i class="fas fa-search"></i>
                    BUSCAR FACTURAS
                </h4>    
            </div>
            <div class="btn-group col-sm-3 pull-right">
                <a href="index.php?action=nueva_factura" class="btn btn-info">
                    <span class="fas fa-plus"></span>
                    NUEVA FACTURA
                </a>
            </div>
        </div>
    </div>
</div>
