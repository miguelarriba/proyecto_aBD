<?php
require_once $_SERVER['DOCUMENT_ROOT']."/config/conectar.php";
class EntidadBase{
/*
  Clase padre para objetos que conectan con la db
*/
    private $table;
    private $class;

    private $db;

	private $conectar;
    public function db() {
        return $this->db;
    }

    public function __construct($table, $class) {
        $this->table=(string) $table;
        $this->class=(string) $class;
    		try{
    			$conectar=new Conectar();
    			$this->db=$conectar->getConexion();
    		}catch(Excepcion $e){
    			error_log("MySQL: Code: ".$e->getCode(). " Desc: " .$e->getMessage() ,0);
    			throw new Exception($e);
    		}
    }

	public function closeConnection(){
		$conectar=new Conectar();
		$conectar->closeConexion($this->db);
	}

	protected function showData($resultSet){
		$filas= array();
		while ($fila = $resultSet->fetch_assoc())
			$filas[] = $fila;

    return $filas;
	}

  public function getBy($column, $value){
  	$consulta ="SELECT * FROM $this->table WHERE $column = '$value'";
        $req = $this->db()->query($consulta);
  	if($req==false)
  		throw new Exception('MYSQL: Error al realizar la consulta SQL');

  	 $filas = $this->showData($req);
        return $filas;
  }

}
?>
