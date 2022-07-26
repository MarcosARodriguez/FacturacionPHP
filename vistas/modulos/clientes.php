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
                    BUSCAR CLIENTES
                </h4>
            </div>
            <div class="btn-group col-sm-3 pull-right">
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#nuevoProducto">
                    <span class="fas fa-plus"></span>
                    NUEVO CLIENTE
                </button>
            </div>
        </div>
    </div>
    <div id="nuevoProducto" class="modal fade" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">
                        <i class="fas fa-edit"></i>
                        Agregar nuevo cliente
                    </h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form method="post" id="guardarProducto">
                        <div class="form-row" style="margin-bottom: 15px;">
                            <label for="codigo" class="col-sm-3 bg-light">Código</label>
                            <div class="col-sm-8 bg-light">
                                <input type="text" name="codigo" id="codigo" class="form-control" placeholder="Código del producto" required>
                            </div>
                        </div>
                        <div class="form-row" style="margin-bottom: 15px;">
                            <label for="nombreProducto" class="col-sm-3">Nombres</label>
                            <div class="col-sm-8">
                                <input type="text" name="nombreProducto" id="nombreProducto" class="form-control" placeholder="Nombre del producto" required>
                            </div>
                        </div>
                        <div class="form-row" style="margin-bottom: 15px;">
                            <label for="precioProducto" class="col-sm-3">Apellidos</label>
                            <div class="col-sm-3">
                                <input type="text" name="precioProducto" id="precioProducto" class="form-control" placeholder="Precio Unitario del producto" required>
                            </div>
                        </div>
                        <div class="form-row" style="margin-bottom: 15px;">
                            <label for="estadoProducto" class="col-sm-3">Estado</label>
                            <div class="col-sm-8">
                                <input type="text" name="estadoProducto" id="estadoProducto" class="form-control" placeholder="Aqui va un combobox" required>
                            </div>
                        </div>
                        <div class="form-row" style="margin-bottom: 15px;">
                            <label for="categoriaProducto" class="col-sm-3">Categoria</label>
                            <div class="col-sm-8">
                                <input type="text" name="categoriaProducto" id="categoriaProducto" class="form-control" placeholder="Aqui va un combobox" required>
                            </div>
                        </div>
                        <div class="form-row" style="margin-bottom: 15px;">
                            <label for="descriptProducto" class="col-sm-3">Descripcion</label>
                            <div class="col-sm-8">
                                <input type="text" name="descriptProducto" id="descripProducto" class="form-control" placeholder="Descripcion breve del producto">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary" id="guardar_datos">Guardar datos</button>
                </div>
            </div>
        </div>
    </div>
</div>