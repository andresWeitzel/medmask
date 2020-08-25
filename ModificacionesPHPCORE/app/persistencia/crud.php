<?php
class Crud{
    protected $tabla;
    protected $conexion;
    protected $wheres="";//lo usamos para filtros
    protected $sql=null;

    public function __construct($tabla=null){
        $this->conexion=(new Conexion())->conexionDB();
        $this->tabla=$tabla;
    }

    //===================getAll()================================
    //queries para los registros de las tablas
    public function obtenerTodo(){
        try {
            //query
        $this->sql = " SELECT * FROM {$this->tabla} {$this->wheres}";
            
        //prepareStatement, accedemos a los metodos que nos prepara el objeto pdo.
        $consulta_preparada= $this->conexion->prepare($this->sql);

        //ejecutamos la prepare
        $consulta_preparada->execute();

        //obtenemos el array indexado
        return $consulta_preparada->fetchAll(PDO::FETCH_OBJ);
            
        } catch (Exception $ex) {
            echo $ex->getTraceAsString();
        }
    }
    //===================End getAll()================================

    //===================getFirst()=================================
    public function obtenerPrimero(){

        $lista=$this->obtenerTodo();

        if(count($lista) > 0){
            
            return $lista;
        }else{
            return null;
        }

    }
    //===================End getFirst()=================================


    //=================== insert()================================
    public function insertar($objeto){
        try {
            
            //Con el implode unimos el arreglo con las keys del object parametrizado.
            $campos=implode("`, `", array_keys($objeto));

            $valores= ":" . implode(", :" , array_keys($objeto));

            $this->sql = "INSERT INTO {$this->tabla} (`{$campos}`) 
                            VALUES ({$valores})";

            $this->ejecutar($objeto);                

            //Obtenemos el ultimo id insertado
            $id=$this->conexion->lastInsertId();
            
            return $id;

        } catch (Exception $ex) {
            echo $ex->getTraceAsString();
        }
    }
     //===================End insert()================================


     //=================== update()================================
    public function actualizar($objeto){
        try {
            
            $campos="";

            foreach ($objeto as $llave => $valor){
                $campos .= "`$llave`=:$llave,";
            }

            $campos=rtrim($campos, ",");//Limpiamos el final del  string para actualizar los campos
            
            $this->sql="UPDATE {$this->tabla} SET {$campos} {$this->wheres}";

            $filas_afectadas=$this->ejecutar($objeto);

            return $filas_afectadas;

        } catch (Exception $ex) {
            echo $ex->getTraceAsString();
        }

    }
    //===================End update()================================

    //=================== delete()================================
    public function eliminar(){
        try {

        $this->sql=" DELETE FROM {$this->tabla} {$this->wheres}";

        $filas_afectadas=$this->ejecutar();

        return $filas_afectadas;

        } catch (Exception $ex) {
            echo $ex->getTraceAsString();
        }

    }
    //===================End delete()================================

    //=================== filters()================================
    public function condicion($llave, $condicion, $valor){

        $this->wheres .= (strpos($this->wheres, "WHERE")) ? "AND" : "WHERE";//Operador ternario
        $this->wheres .= "`$llave` $condicion " .((is_string($valor)) ? "\"$valor\"" : $valor . " ");

        return $this;//Instancia de nuestro objeto
    }

    public function condicionOr($llave, $condicion, $valor){

        $this->wheres .= (strpos($this->wheres, "WHERE")) ? "OR" : "WHERE";//Operador ternario
        $this->wheres .= "`$llave` $condicion " .((is_string($valor)) ? "\"$valor\"" : $valor . " ");

        return $this;//Instancia de nuestro objeto
    }
    
    //===================End filters()================================


    //=================== execute()================================
    public function ejecutar($objeto=null){
        
            $consulta_preparada= $this->conexion->prepare($this->sql);

            if($objeto !== null ){
                //Recorremos las llaves y los valores del objeto parametrizado

                foreach($objeto as $llave => $valor){
                    //objeto indefinido, lo seteamos a null
                
                    if(empty($valor)){
                        $valor=NULL;
                    }
                    //Lo setamos a su clave valor
                    $consulta_preparada->bindValue(":$llave",$valor);
                }
            }

            //ejecutamos la prepare
            $consulta_preparada->execute();

            //Reiniciamos valores
            $this->resetear();

            //Devuelve el nro de filas afectadas
            return $consulta_preparada->rowCount();

    }
    //===================End execute()================================

    //=================== reset()================================
    public function resetear(){

        $this->wheres="";
        $this->sql=null;

    }
    //===================End reset()================================
} 