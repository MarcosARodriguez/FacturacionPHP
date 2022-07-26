<?php
    
    class MvcController{

        #LLAMADA A LA PLANTILLA
        #----------------------------------------------------
        public function plantilla(){
            
            include "vistas/template.php"; #include sirve para mostar e incluir el archivo de php en esta clase
        }

        #INTERACCION CON EL USUARIO 
        #----------------------------------------------------

        public function enlacePageController(){

            #validacion para cuando inicie la pagina en index.php no arroje un error ya que no existe la variable action al momento de inicar la pagina
            #isset es una funcion que valida si la variable trae informacion
            if(isset($_GET["action"])){

                $enlaceController = $_GET["action"]; # $_GET es una llamada al metodo get para que reciba todo lo que le envian
            }else{
                $enlaceController = "login";
            }

            #echo $enlaceController;
            $respuesta = MvcModel::enlacePageModel($enlaceController);
            
            include $respuesta;
        }

        #METODO ESTATICO
        #---------------------------------------------------------
        /* se utilizan cuando se necesita que se ejecute de manera automatica sin filtro una tarea que hace el metodo,
        cuando se necesite almacenar informacion para ser reutilizada la informacion se utiliza metodos staticos*/
        
        #CONTROLADOR PARA FORMULARIO REGISTRO
        #----------------------------------------------------------------------------
        static public function ctrRegistro(){
            
            if(isset($_POST["regisUser"])){
                
                #echo $_POST["regisName"];
                #return $_POST["regisName"]."<br>".$_POST["regisMail"]."<br>".$_POST["regisPass"]."<br>";
                
                #seguridad informatica con php preg_match permite validar los caracteres que tiene una variable 
                #evita ataques de cross-site scripting
                #en este caso se validara la variable regisname para que solo acepte caracteres minuscula mayuscula espacio y tildes
                #con expresiones regulares
                if(preg_match('/^[a-zA-ZñÑáéíóú ]+$/', $_POST["regisUser"]) && 
                   preg_match('/^[0-9a-zA-Z]+$/', $_POST["regisPass"]) &&
                   preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["regisMail"])){

                    #$tabla guarda el nombre de la tabla en la base de datos
                    $tabla = "usuarios";
                    #$token variable que encriptara los datos del registro usando la funcion de php md5
                    $token = md5($_POST["regisUser"]."+".$_POST["regisPass"]);
                    #$datos obtiene los datos de la tabla 
                    $datos = array(
                                "nombres" =>  $_POST["regisNameuser"],
                                "apellidos" => $_POST["regisLastuser"],
                                "usuario" =>  $_POST["regisUser"],
                                "correo" => $_POST["regisMail"],
                                "pass" => $_POST["regisPass"],
                                "token" => $token
                            );
                
                    $resp = MvcModel::mdlRegistro($tabla, $datos);
                
                    return $resp;
                }else{
                    
                    $resp = "error";
                    return $resp;
                }
                
            }
        }

        #CONTROLADOR PARA MOSTRAR USUARIOS
        #----------------------------------------------------------------------------
        static public function ctrUsuarios($item, $valor){
            
            $tabla = "usuarios";

            $respuesta = MvcModel::mdlUsuarios($tabla, $item, $valor);

            return $respuesta;
        }

        #CONTROLADOR PARA EL LOGIN 
        #----------------------------------------------------------------------------
        public function ctrLogin(){

            if(isset($_POST["loginUser"])){  # se pregunta si vienen variables post

                $tabla = "usuarios";
                $item = "user_usuario"; # columna de la base de datos donde buscara la coincidencia para el login
                $valor = $_POST["loginUser"]; #dato que el usuario escribio para el ingreso del login

                $respuesta = MvcModel::mdlLogin($tabla, $item, $valor);

                #VALIDACION del login una vez se haya buscando la coincidencia en el modelo 
                if ($respuesta["user_usuario"] == $_POST["loginUser"] && $respuesta["password_usuario"] == $_POST["loginPass"]) {
                    
                    #variable de session
                    $_SESSION["validarLogin"] = "ok";

                    echo '<script>      
                        if (window.history.replaceState) {
                            window.history.replaceState(null, null, window.location.href);
                        }
                        window.location = "index.php?action=factura";
                    </script>';
                }else{

                    echo '<script>      
                        if (window.history.replaceState) {
                            window.history.replaceState(null, null, window.location.href);
                        }
                    </script>';
                    echo '<script>
                        Swal.fire({
                            type: "error",
                            title: "Usuario no encontrado",
                            text: "El usuario o la contraseña no coinciden",
                            icon: "error",
                            showConfirmButton: false
                        })
                    </script>';
                }
                #echo "<pre>"; print_r($respuesta); echo "</pre>";
            }
        }

        #CONTROLADOR PARA ACTUALIZAR DATOS 
        #----------------------------------------------------------------------------
        public static function ctrUpdate(){

            if(isset($_POST["actuName"])){

                
                #COMPARAR LOS TOKENS
                $usuario = MvcModel::mdlUsuarios("usuarios","token", $_POST["tkUser"]);
                $compara = md5($usuario["nombre"]."+".$usuario["email"]);

                if ($compara == $_POST["tkUser"]) {

                    if ($_POST["actuPass"] !="" ) {
                    
                        $password = $_POST["actuPass"];
                    }else{
    
                        $password = $_POST["passActual"];
                    }

                    $tabla = "usuarios";
                    $datos = array( "token" => $_POST["tkUser"],
                                    "nombre" =>  $_POST["actuName"],
                                    "email" => $_POST["actuMail"],
                                    "password" => $password);
                    
                    $resp = MvcModel::mdlUpdate($tabla, $datos);

                    return $resp;
                }else{
                    $resp = "error";
                    return $resp;
                }

            }
        }

        #CONTROLADOR PARA ELIMINAR DATOS 
        #----------------------------------------------------------------------------
        public function ctrDelete(){

            if(isset($_POST["deleteUser"])){

                $tabla= "usuarios";
                $valor= $_POST["deleteUser"];

                $respuesta= MvcModel::mdlDelete($tabla, $valor);

                if ($respuesta == "ok") {
                    
                    echo '<script>      
                        if (window.history.replaceState) {
                            window.history.replaceState(null, null, window.location.href);
                        }
                        window.location = "index.php?action=usuarios";
                    </script>';
                }

            }
        }
    }

#no cerrar la etiqueta php para que los hackers no puedan usar otro lenguaje u etiqueta java