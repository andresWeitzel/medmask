<?php

class Solicitantes extends ModeloGenerico{

    protected $idUsuario;
    protected $institucion;

    public function __construct($propiedades = null)
    {
        //Lamado al constructor
        parent::__construct("solicitantes", Solicitantes::class, $propiedades);
        
    }



     //=============GETTERS AND SETTERS========================
    /**
     * Get the value of idUsuario
     */ 
    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

    /**
     * Set the value of idUsuario
     *
     * @return  self
     */ 
    public function setIdUsuario($idUsuario)
    {
        $this->idUsuario = $idUsuario;

        return $this;
    }

    /**
     * Get the value of institucion
     */ 
    public function getInstitucion()
    {
        return $this->institucion;
    }

    /**
     * Set the value of institucion
     *
     * @return  self
     */ 
    public function setInstitucion($institucion)
    {
        $this->institucion = $institucion;

        return $this;
    }

     //=============END GETTERS AND SETTERS========================
}