<?php

class ModeloGenerico extends Crud{
    private $nombreDeClase;
    private $excluir = ["nombreDeClase","tabla","conexion","wheres","sql","excluir"];

    function __construct($tabla,$nombreDeClase,$propiedades=null)
    {
        parent::__construct($tabla);//constructor padre de la clase 

        $this->nombreDeClase=$nombreDeClase;

        if(empty($propiedades)){
            return;
        }
        foreach($propiedades as $llave => $valor){

            $this->{$llave} = $valor;//seteamos los nuevos atributos al object
        }
    }

    protected function obtenerAtributosModelo(){

        $variables=get_class_vars($this->nombreDeClase);//obtenermos los atributos

        $atributos= [];
        
        $max=count($variables);
        
        foreach($variables as $llave => $valor){
        
            if(!in_array($llave,$this->excluir)){//Validamos si no se encuentra la llave lo agregue al arreglo 

                $atributos[] = $llave;//agregamos la llave recibida
            }

        }
        return $atributos;


    }

    protected function parsearModelo($objeto = null){

        try{
            $atributos = $this->obtenerAtributosModelo();

            $objetoFinal = [];

            //Obtenemos el objeto desde el modelo
            if($objeto == null){
                
                foreach ($atributos as $indice => $llave){

                    //Comprobacion de la llave que estamos recibiendo
                    if(isset($this->{$llave})){

                        //agregamos las llaves que estamos recin¿biendo
                        $objetoFinal[$llave] = $this->{$llave};
                    }
                }
                return $objetoFinal;
            }
            //Corregimos el objeto que recibimos con los atributos del modelo;
            foreach($atributos as $indice => $llave){

                //Comprobamos si se ti4ne algun dato lo agregamos al objetoFinale 
                if(isset($objeto[$llave])){
                    $objetoFinal[$llave] = $objeto[$llave];
                }
            }
            return $objetoFinal;
            
        }catch(Exception $exc){
            //Enlazamos la excepcion
            throw new Exception(
                "ERROR EN " 
                . $this->nombreDeClase
                . ".parsear() => "
                . $exc->getMessage());
        }
    }

    public function llenarModelo($objeto){

        try{
            $atributos=$this->obtenerAtributosModelo();

            foreach($atributos as $indice => $llave){

                //Comprobamos si se ti4ne algun dato lo agregamos al objetoFinale 
                if(isset($objeto[$llave])){
                    $objetoFinal[$llave] = $objeto[$llave];
                }
            }

        }catch(Exception $exc){
             //Enlazamos la excepcion
             throw new Exception(
                "ERROR EN " 
                . $this->nombreDeClase
                . ".parsear() => "
                . $exc->getMessage());
        }

    }

    public function insertarModelo($objeto=null){

        $objeto=$this->parsearModelo($objeto);

        return parent::insertar($objeto);//insertar de la clase crud
    }


    public function actualizarModelo($objeto){

        $objeto=$this->parsearModelo($objeto);

        return parent::actualizar($objeto);//Actualizar de la clase crud

    }

    
    public function __get($nombreAtributo)
    {
        return $this->{$nombreAtributo};
    }

    public function __set($nombreAtributo, $valor)
    {
        $this->{$nombreAtributo}=$valor;
    }


}