

<?php

//------------Conexion  aplicando el patron DAO Y MVC---------------

class Conexion{

	private $conexion;

	private $configuracion= [
		"driver" => "mysql",//si se usa otro driver configurarlo en el servidor apache en php.ini. 
		"host"  =>  "localhost",
		"database"  =>  "medmask",
		"port"  =>  "3306",
		"username"  =>  "root",
		"password"  =>  "",
		"charset"  =>  "utf8"
	];

	public function __construct(){
	
	}
	
	public function conexionDB(){
	  try{
        $CONTROLADOR= $this->configuracion["driver"];
        $SERVIDOR= $this->configuracion["host"];
        $BASE_DATOS= $this->configuracion["database"];
        $PUERTO= $this->configuracion["port"];
        $USUARIO= $this->configuracion["username"];
        $CLAVE= $this->configuracion["password"];
        $CODIFICACION= $this->configuracion["charset"];

        //Creamos nuestra url
        $url ="{$CONTROLADOR}:host={$SERVIDOR}:{$PUERTO};"
              . "dbname={$BASE_DATOS};charset={$CODIFICACION}";

        //Creamos la Conexion
		$this->conexion= new PDO($url,$USUARIO,$CLAVE);

		//Retornamos la conexion
		return $this->conexion;
	
	  }catch(Exception $exc){
		   //msj test
		    echo "NO SE ESTABLECIO LA CONEXION!!";
	        echo $exc->getTraceAsString();

			}
	}
}
