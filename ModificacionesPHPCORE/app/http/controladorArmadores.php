<?php

class ControladorArmadores{
    
    function __construct(){

    }

    public function insertarArmador($armador){
        
        $modeloArmadores= new Armadores();

        $armadorInsertado = $modeloArmadores->insertar($armador);//El metodo insertar devuelve el id del objeto que se le pase, revisar

        $valor=($armadorInsertado > 0);

        $mensaje=
            new MensajesEncapsulados(
                $valor ? 
                    Mensajes::INSERCION_CORRECTA : Mensajes::ERROR);

        $mensaje->setDatos($armadorInsertado);

        return $mensaje;

        
    }

    public function listarArmadores(){

        $modeloArmadores=new Armadores();
        
        $armadorListado=$modeloArmadores->obtenerTodo();  

        
        $valor=($armadorListado > 0);

        $mensaje=
            new MensajesEncapsulados(
                $valor ? 
                    Mensajes::INSERCION_CORRECTA : Mensajes::ERROR);

        $mensaje->setDatos($armadorListado);

        return $mensaje;

    }

    public function actualizarArmador($armador){
        
        $modeloArmadores=new Armadores();
        
        $armadorActualizado=
            $modeloArmadores
            ->condicion("id","=",$armador["id"])//No se compara el id en forma directa porque al ser clave primaria no se deberia poder actualizar, entonces los filtros hechos en la clase crud se encargar de sacar lo irrelevante para actualizar..el id
            
            ->actualizar($armador);

            $valor=($armadorActualizado > 0);
            
            $mensaje=
            new MensajesEncapsulados(
                $valor ? 
                    Mensajes::INSERCION_CORRECTA : Mensajes::ERROR);

        $mensaje->setDatos($armadorActualizado);

        return $mensaje;
  
    }

    public function eliminarArmador($idArmador){

        $modeloArmadores=new Armadores();
        
        $armadorEliminado=
            $modeloArmadores
            ->condicion("id","=",$idArmador)
            ->eliminar();

        
            $valor=($armadorEliminado > 0);
            
            $mensaje=
            new MensajesEncapsulados(
                $valor ? 
                    Mensajes::INSERCION_CORRECTA : Mensajes::ERROR);

        $mensaje->setDatos($armadorEliminado);

        return $mensaje;
  
    }

    public function buscarArmador($idArmador){

        $modeloArmadores=new Armadores();
        
        $armadorBuscado=
            $modeloArmadores
            ->condicion("id","=",$idArmador)
            ->obtenerPrimero();//Primera posicion de nuestra tabla


             $valor=($armadorBuscado > 0);
            
            $mensaje=
            new MensajesEncapsulados(
                $valor ? 
                    Mensajes::INSERCION_CORRECTA : Mensajes::ERROR);

        $mensaje->setDatos($armadorBuscado);

        return $mensaje;
  
    }
}