<?php
    #se inicia con variables de session, estas variables son ocultas y no aparecen por ningun lado y solamente el navegador sabe que existe
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MVC FACTURACION</title>
    
    <!-- Latest compiled and minified CSS BOOSTRARP 4--> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

    <!--BOOSTRAP 3 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">-->

    <!-- jQuery library -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <!--BOOSTRAP 3 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->

    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <!--BOOSTRAP 3 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>-->

    <!-- Latest compiled Font Awesome -->
    <script src="https://kit.fontawesome.com/e632f1f723.js" crossorigin="anonymous"></script>

    <!-- Sweet Alerts -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <!-- CSS -->
    <link rel="stylesheet" href="./vistas/css/custom.css">
    <!-- JS -->
    <script src="./vistas/js/events.js"></script>


</head>
<body>
    
    <!-- LOGOTIPO -->
    <div class="jumbotron text-center" style="margin-bottom:0">
        <h1>SISTEMA DE FACTURACION</h1>
        <p>Ejercicio con Boostrap 4, html, php</p> 
    </div>

    <!-- BOTONES -->
    
            <?php 
                include "modulos/navegacion.php";
            ?>
    

    <!-- CONTENIDO -->
 
</body>
    <section>
        <?php
            $mvc = new MvcController();
            $mvc ->enlacePageController();
        ?>
    </section>
</html>