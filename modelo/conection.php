<?php

    class Connection
    {
        public static function conectar(){
            
            # FORMATO DE CONSTRUCCION PARA LA CLASE PDO PARA CONEXIONES A BASE DE DATOS
            #PDO("nombre del servidor; nombre de la base de datos", "usuario","contraseña")
            $link = new PDO("mysql:host=127.0.0.1;dbname=facturacion", "root", "");


            #configuracion para que trabaje con caracteres latinos utf8
            $link ->exec("set names utf8");

            return $link;
        }
    }
    
?>