<?php

class Donantes extends ModeloGenerico{
    protected $id;
    protected $idUsuario;

    public function __construct($propiedades = null)
    {
        //Lamado al constructor
        parent::__construct("donantes", Donantes::class, $propiedades);
        
    }

    //=============GETTERS AND SETTERS========================

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

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

    //=============END GETTERS AND SETTERS========================
}