<?php

class ControladorUsuarios{
    
    function __construct(){

    }

    public function insertarUsuario($usuario){
        
        $modeloUsuarios= new Usuarios();

        $usuarioInsertado = $modeloUsuarios->insertar($usuario);//El metodo insertar devuelve el id del objeto que se le pase, revisar

        $valor=($usuarioInsertado > 0);

        $mensaje=
            new MensajesEncapsulados(
                $valor ? 
                    Mensajes::INSERCION_CORRECTA : Mensajes::ERROR);

        $mensaje->setDatos($usuarioInsertado);

        return $mensaje;

    }

    public function listarUsuarios(){

        $modeloUsuarios=new Usuarios();
        
        $usuarioListado=$modeloUsuarios->obtenerTodo();  

        $valor=($usuarioListado > 0);

        $mensaje=
            new MensajesEncapsulados(
                $valor ? 
                    Mensajes::CONSULTA_CORRECTA : Mensajes::ERROR);

        $mensaje->setDatos($usuarioListado);

        return $mensaje;

    }

    public function actualizarUsuario($usuario){
        
        $modeloUsuarios=new Usuarios();
        
        $usuarioActualizado=
            $modeloUsuarios
            ->condicion("id","=",$usuario["id"])//No se compara el id en forma directa porque al ser clave primaria no se deberia poder actualizar, entonces los filtros hechos en la clase crud se encargar de sacar lo irrelevante para actualizar..el id
            ->actualizar($usuario);

            $valor=($usuarioActualizado > 0);

            $mensaje=
                new MensajesEncapsulados(
                    $valor ? 
                        Mensajes::ACTUALIZACION_CORRECTA : Mensajes::ERROR);
    
            $mensaje->setDatos($usuarioActualizado);
    
            return $mensaje;
  
    }

    public function eliminarUsuario($idUsuario){

        $modeloUsuarios=new Usuarios();
        
        $usuarioEliminado=
            $modeloUsuarios
            ->condicion("id","=",$idUsuario)
            ->eliminar();

            $valor=($usuarioEliminado > 0);

            $mensaje=
                new MensajesEncapsulados(
                    $valor ? 
                        Mensajes::ELIMINACION_CORRECTA : Mensajes::ERROR);
    
            $mensaje->setDatos($usuarioEliminado);
    
            return $mensaje;
   
    }

    public function buscarUsuario($idUsuario){

        $modeloUsuarios=new Usuarios();
        
        $usuarioBuscado=
            $modeloUsuarios
            ->condicion("id","=",$idUsuario)
            ->obtenerPrimero();//Primera posicion de nuestra tabla

            $valor=($usuarioBuscado > 0);

            $mensaje=
                new MensajesEncapsulados(
                    $valor ? 
                        Mensajes::CONSULTA_CORRECTA : Mensajes::ERROR);
    
            $mensaje->setDatos($usuarioBuscado);
    
            return $mensaje;

    
    }
}