<?php
    
    require_once "conection.php";

    class MvcModel{

        public static function enlacePageModel($enlaceModel){

            
            switch($enlaceModel){ 

                case 'login' : $modulo = "vistas/modulos/".$enlaceModel.".php";
                break;
                case 'productos' : $modulo = "vistas/modulos/".$enlaceModel.".php";
                break;
                case 'factura' : $modulo = "vistas/modulos/".$enlaceModel.".php";
                break;
                case 'nueva_factura' : $modulo = "vistas/modulos/".$enlaceModel.".php";
                break;
                case 'clientes' : $modulo = "vistas/modulos/".$enlaceModel.".php";
                break;
                case 'usuarios' : $modulo = "vistas/modulos/".$enlaceModel.".php";
                break;
                case 'editar' : $modulo = "vistas/modulos/".$enlaceModel.".php";
                break;
                case 'salir' : $modulo = "vistas/modulos/".$enlaceModel.".php";
                break;

                default : $modulo = "vistas/modulos/error404.php";
            }

            return $modulo;
        }

        #MODELO PARA FORMULARIO REGISTRO
        #----------------------------------------------------------------------------
        public static function mdlRegistro($tabla, $datos){

            #statement: declaracion de una sentencia sql
            #prepare() prepara una sentencia sql para ser ejecutada por el metodo PDOstatement::execute() 
            #los valores de la consulta se trabajaran con parametros ocultos o secretos, se identifican con : al inicio de la variable
            #esto evita inyecciones sql
            
            $stmt = Connection::conectar()->prepare("INSERT INTO $tabla(name_usuario, apellido_usuario, user_usuario, mail_usuario, password_usuario, token_usuario) VALUES (:nameuser, :lastuser, :user, :email, :password, :token)");

            #bindParam() sirve para vincular una variable php a un parametro de sustitucion de la sentencia sql
            $stmt->bindParam(":nameuser", $datos["nombres"],  PDO::PARAM_STR);
            $stmt->bindParam(":lastuser", $datos["apellidos"],  PDO::PARAM_STR);
            $stmt->bindParam(":user", $datos["usuario"],  PDO::PARAM_STR);
            $stmt->bindParam(":email", $datos["correo"],  PDO::PARAM_STR);
            $stmt->bindParam(":password", $datos["pass"],  PDO::PARAM_STR);
            $stmt->bindParam(":token", $datos["token"],  PDO::PARAM_STR);

            if ($stmt->execute()) {
                
                return "ok";

            }else{
                
                print_r(Connection::conectar()->errorInfo());
            }
            $stmt->dba_close;
            $stmt = null;
        }

        #MODELO PARA FORMULARIO USUARIOS
        #----------------------------------------------------------------------------
        public static function mdlUsuarios($tabla, $item, $valor){
            
            if ($item == null && $valor == null) {
                
                $stmt = Connection::conectar()->prepare("SELECT * FROM $tabla");

                $stmt-> execute();

                #fetchAll devuelve todos los registros
                #fetch devuelve solo un registro
                return $stmt->fetchAll();
                $stmt->dba_close;
                $stmt = null;

            }else{
                
                $stmt = Connection::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
                $stmt->bindParam(":".$item, $valor,  PDO::PARAM_STR);

                $stmt-> execute();

                return $stmt->fetch();
                $stmt->dba_close;
                $stmt = null;
            }
            
        }

        #MODELO PARA FORMULARIO LOGIN
        #----------------------------------------------------------------------------
        public static function mdlLogin($tabla, $item, $valor){
            
            #item guarda el nombre de la columna donde se buscara en este caso sera email la columna
            $stmt = Connection::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
            $stmt->bindParam(":".$item, $valor,  PDO::PARAM_STR); # aca se relaciona la columna con el dato que ingreso el usuario

            $stmt-> execute();

            return $stmt->fetch();

            $stmt->dba_close;
            $stmt = null;
        }

        #MODELO PARA FORMULARIO ACTUALIZAR DATOS
        #----------------------------------------------------------------------------
        public static function mdlUpdate($tabla, $datos){

            $stmt = Connection::conectar()->prepare("UPDATE $tabla SET nombre=:nombre, email=:email,
                                                     password=:password WHERE token=:token");
            $stmt->bindParam(":nombre", $datos["nombre"],  PDO::PARAM_STR);
            $stmt->bindParam(":email", $datos["email"],  PDO::PARAM_STR);
            $stmt->bindParam(":password", $datos["password"],  PDO::PARAM_STR);
            $stmt->bindParam(":token", $datos["token"],  PDO::PARAM_STR);

            if ($stmt->execute()) {
                
                return "ok";

            }else{
                print_r(Connection::conectar()->errorInfo());
            }

            $stmt->dba_close;
            $stmt = null;

        }

        #MODELO PARA FORMULARIO ELIMINAR DATOS
        #----------------------------------------------------------------------------
        public static function mdlDelete($tabla, $valor){
            
            $stmt = Connection::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");
            $stmt->bindParam(":id", $valor,  PDO::PARAM_INT);

            if ($stmt->execute()) {
                
                return "ok";

            }else{
                print_r(Connection::conectar()->errorInfo());
            }

            $stmt->dba_close;
            $stmt = null;
        }
    }
#no cerrar la etiqueta php para que los hackers no puedan usar otro lenguaje u etiqueta java