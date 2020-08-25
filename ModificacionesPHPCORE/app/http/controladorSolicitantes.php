<?php

class ControladorSolicitantes{
    
    function __construct(){

    }

    public function insertarSolicitante($solicitante){
        
        $modeloSolicitante= new Solicitantes();

        $solicitanteInsertado = $modeloSolicitante->insertar($solicitante);//El metodo insertar devuelve el id del objeto que se le pase, revisar

        $valor=($solicitanteInsertado  > 0);

        $mensaje=
            new MensajesEncapsulados(
                $valor ? 
                    Mensajes::INSERCION_CORRECTA : Mensajes::ERROR);

        $mensaje->setDatos($solicitanteInsertado );

        return $mensaje;


    }

    public function listarSolitantes(){

        $modeloSolicitantes=new Solicitantes();
        
        $solicitanteListado=$modeloSolicitantes->obtenerTodo();  
        

        $valor=($solicitanteListado > 0);

        $mensaje=
            new MensajesEncapsulados(
                $valor ? 
                    Mensajes::INSERCION_CORRECTA : Mensajes::ERROR);

        $mensaje->setDatos($solicitanteListado );

        return $mensaje;

    }

    public function actualizarSolicitanes($solicitante){
        
        $modeloSolicitantes=new Solicitantes();
        
        $solicitanteActualizado=
            $modeloSolicitantes
            ->condicion("id","=",$solicitante["id"])//No se compara el id en forma directa porque al ser clave primaria no se deberia poder actualizar, entonces los filtros hechos en la clase crud se encargar de sacar lo irrelevante para actualizar..el id
            ->actualizar($solicitante);


            $valor=($solicitanteActualizado > 0);

            $mensaje=
                new MensajesEncapsulados(
                    $valor ? 
                        Mensajes::INSERCION_CORRECTA : Mensajes::ERROR);
    
            $mensaje->setDatos($solicitanteActualizado );
    
            return $mensaje;
  
    }

    public function eliminarSolicitantes($idSolicitante){

        $modeloSolicitantes=new Solicitantes();
        
        $solicitanteEliminado=
            $modeloSolicitantes
            ->condicion("id","=",$idSolicitante)
            ->eliminar();


            
            $valor=($solicitanteEliminado > 0);

            $mensaje=
                new MensajesEncapsulados(
                    $valor ? 
                        Mensajes::INSERCION_CORRECTA : Mensajes::ERROR);
    
            $mensaje->setDatos($solicitanteEliminado );
    
            return $mensaje;

    }

    public function buscarSolicitante($idSolicitante){

        $modeloSolicitantes=new Solicitantes();
        
        $solicitanteBuscado=
            $modeloSolicitantes
            ->condicion("id","=",$idSolicitante)
            ->obtenerPrimero();//Primera posicion de nuestra tabla

            
            $valor=($solicitanteBuscado > 0);

            $mensaje=
                new MensajesEncapsulados(
                    $valor ? 
                        Mensajes::INSERCION_CORRECTA : Mensajes::ERROR);
    
            $mensaje->setDatos($solicitanteBuscado);
    
            return $mensaje;

    }
}