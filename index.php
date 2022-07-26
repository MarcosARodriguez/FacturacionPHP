<?php

/*INDEX: EN ESTE MOSTRAMOS LA SALIDA DE LAS VISTAS AL USUARIO 
Y A TRAVES DEL MISMO ENVIAREMOS LAS ACCIONES QUE ENVIE EL USUAIOR AL CONTROLADOR*/
    
    require_once "modelo/model.php";
    require_once "controlador/controller.php";
     
    
    /*require :  establece que el codigo del archivo invocado es requerido obligatoriamente, si no existe saltara un error
    "PHP FATAL ERROR" y se detendra la ejecuccion del programa php.
    require_once:  funciona del mismo modo salvo que once impide la carga de un mismo archivo mas de una vez esto evita el riesgo 
    de redeclaraciones de variables, funciones o clases
    de esta manera la pagina esta construida en la plantilla template quye es llamada por el controlador que a su
    vez es llamada por el index atraves del objeto mvcControler*/

    $mvc = new MvcController();
    $mvc -> plantilla();

#no cerrar la etiqueta php para que los hackers no puedan usar otro lenguaje u etiqueta java o html