<?php

class MensajesEncapsulados{

    public $codigo;
    public $mensaje;
    public $datos;

    function __construct($codigo=null, $mensaje=null, $datos=null){

        //Obtenemos la respuesta por defecto por codigo de los mensajes
        if(isset($codigo) && empty($mensaje)){
            
            $mensajesEncapsulado=Mensajes::tipoDeMensaje($codigo);
            
            $this->codigo=$mensajesEncapsulado->codigo;
            $this->mensaje=$mensajesEncapsulado->mensaje;
            $this->datos=$mensajesEncapsulado->datos;

            return;
        }

        //evaluamos los codigos
        if(is_string($codigo)){

            $mensajesEncapsulado=Mensajes::tipoDeMensaje($codigo);
            $codigo=$mensajesEncapsulado->codigo;
        }

        //atributos/parametros
        $this->codigo=$codigo;
        $this->mensaje=$mensaje;
        $this->datos=$datos;

       
    
    }
    
        public function Json($objeto=null){
            
            header('Content-Type:application/json');

            if(is_array($objeto) || is_object($objeto)){

                return json_encode($objeto);
            }
            return json_encode($this);

        }



         //getters y setters
        /**
         * Get the value of codigo
         */ 
        public function getCodigo()
        {
                return $this->codigo;
        }

        /**
         * Set the value of codigo
         *
         * @return  self
         */ 
        public function setCodigo($codigo)
        {
                $this->codigo = $codigo;

                return $this;
        }

        /**
         * Get the value of mensaje
         */ 
        public function getMensaje()
        {
                return $this->mensaje;
        }

        /**
         * Set the value of mensaje
         *
         * @return  self
         */ 
        public function setMensaje($mensaje)
        {
                $this->mensaje = $mensaje;

                return $this;
        }

        /**
         * Get the value of datos
         */ 
        public function getDatos()
        {
                return $this->datos;
        }

        /**
         * Set the value of datos
         *
         * @return  self
         */ 
        public function setDatos($datos)
        {
                $this->datos = $datos;

                return $this;
        }
}