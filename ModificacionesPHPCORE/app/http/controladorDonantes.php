<?php

class ControladorDonantes{
    
    function __construct(){

    }

    public function insertarDonante($donante){
        
        $modeloDonantes= new Donantes();

        $donanteInsertado = $modeloDonantes->insertar($donante);//El metodo insertar devuelve el id del objeto que se le pase, revisar

        $valor=($donanteInsertado > 0);

        $mensaje=
            new MensajesEncapsulados(
                $valor ? 
                    Mensajes::INSERCION_CORRECTA : Mensajes::ERROR);

        $mensaje->setDatos($donanteInsertado);

        return $mensaje;


    }

    public function listarDonantes(){

        $modeloDonantes=new Donantes();
        
        $donanteListado=$modeloDonantes->obtenerTodo();  
        

        $valor=($donanteListado > 0);

        $mensaje=
            new MensajesEncapsulados(
                $valor ? 
                    Mensajes::INSERCION_CORRECTA : Mensajes::ERROR);

        $mensaje->setDatos($donanteListado);

        return $mensaje;

    
    }

    public function actualizarDonante($donante){
        
        $modeloDonantes=new Donantes();
        
        $donanteActualizado=
            $modeloDonantes
            ->condicion("id","=",$donante["id"])//No se compara el id en forma directa porque al ser clave primaria no se deberia poder actualizar, entonces los filtros hechos en la clase crud se encargar de sacar lo irrelevante para actualizar..el id
            //No se compara el id en forma directa porque al ser clave primaria no se deberia poder actualizar, entonces los filtros hechos en la clase crud se encargar de sacar lo irrelevante para actualizar..el id
            
            ->actualizar($donante);

            $valor=($donanteActualizado > 0);

            $mensaje=
                new MensajesEncapsulados(
                    $valor ? 
                        Mensajes::INSERCION_CORRECTA : Mensajes::ERROR);
    
            $mensaje->setDatos($donanteActualizado);
    
            return $mensaje;
  
    }

    public function eliminarDonante($idDonante){

        $modeloDonantes=new Donantes();
        
        $donanteEliminado=
            $modeloDonantes
            ->condicion("id","=",$idDonante)
            ->eliminar();


            $valor=($donanteEliminado > 0);

            $mensaje=
                new MensajesEncapsulados(
                    $valor ? 
                        Mensajes::INSERCION_CORRECTA : Mensajes::ERROR);
    
            $mensaje->setDatos($donanteEliminado);
    
            return $mensaje;
        
    }

    public function buscarDonante($idDonante){

        $modeloDonantes=new Donantes();
        
        $donanteBuscado=
            $modeloDonantes
            ->condicion("id","=",$idDonante)
            ->obtenerPrimero();//Primera posicion de nuestra tabla

            $valor=($donanteBuscado > 0);

            $mensaje=
                new MensajesEncapsulados(
                    $valor ? 
                        Mensajes::INSERCION_CORRECTA : Mensajes::ERROR);
    
            $mensaje->setDatos($donanteBuscado);
    
            return $mensaje;

           
    }
}