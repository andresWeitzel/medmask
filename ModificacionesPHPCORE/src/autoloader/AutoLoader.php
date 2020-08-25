<?php


class AutoLoader{
    public static function registrar(){

        if(function_exists('__autoload')){
            //Si el autoload esta registrado lo confirmamos
            spl_autoload_register('__autoload');
            return;
        }

        if(version_compare(PHP_VERSION, '5.3.0') >= 0){
            //Si la version de php es mayor registramos nuestro autolaoder
            spl_autoload_register(array('AutoLoader','cargar'),true,true);
            
        }else{
            spl_autoload_register(array('AutoLoader','cargar'));
        }
    }

    public static function cargar($clase){

        $nombreArchivo=$clase . '.php';

        $carpetas=require PATH_CONFIG .'autoloader.php';

        //Recorremos los archivos de las carpetas
        foreach($carpetas as $carpeta){

            //Si el metodo buscarArchivo nos encuentra nuestro archivo..
            if(self::buscarArchivo($carpeta, $nombreArchivo)){

                return true;
            }          
        }
        return false;
    }


    private static function buscarArchivo($carpeta,$nombreArchivo){
        
        //Con la funcion scandir obtenemos la lista de archivos que contiene la carpeta
        $archivos=scandir($carpeta);

        foreach($archivos as $archivo){

            //Con esta funcion le pasamos el archivo
            $rutaArchivo= realpath($carpeta.DIRECTORY_SEPARATOR.$archivo);
            
            //cOMPROBAMOS SI LA RUTA OBTENIDA ES UN ARCHIVO
            if(is_file($rutaArchivo)){
                //Si el nombre del sarchivo es igual al nombre del archivo
                if($nombreArchivo == $archivo){
                    //Colocamos la ruta
                    require_once $rutaArchivo;
                    //Salimos
                    return true;
                }
            }else if($archivo != '.' && $archivo != '..'){
                //Invocamos al metodo buscarArchivo
                return self::buscarArchivo($rutaArchivo, $nombreArchivo);
            }
        }
        return false;
    }
}