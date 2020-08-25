<?php

class Mensajes{
    
    const CONSULTA_CORRECTA="CONSULTA CORRECTA";
    const INSERCION_CORRECTA="INSERCION CORRECTA";
    const ACTUALIZACION_CORRECTA="ACTUALIZACION CORRECTA";
    const ELIMINACION_CORRECTA="ELIMINACION CORRECTA";
    const ERROR="ERROR";

    public static function tipoDeMensaje($codigo){
        
        switch($codigo){
                case Mensajes::CONSULTA_CORRECTA;
                return new mensajesEncapsulados(1,"Se ha realizado de forma correcta la consulta ");

                case Mensajes::INSERCION_CORRECTA;
                return new mensajesEncapsulados(1,"Se ha realizado de forma correcta la insercion");
                
                case Mensajes::ACTUALIZACION_CORRECTA;
                return new mensajesEncapsulados(1,"Se ha realizado de forma correcta la actualizacion ");

                case Mensajes::ELIMINACION_CORRECTA;
                return new mensajesEncapsulados(1,"Se ha realizado de forma correcta la eliminacion");

                case Mensajes::ERROR;
                return new mensajesEncapsulados(-1,"Ha surgido un error");
        }
    }


}

