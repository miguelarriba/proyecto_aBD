<?php
require_once 'entidadBase.php';
class Categorias extends EntidadBase {

  private $categorias;

  public function __construct() {

	    $this->table = "categories";
      $class = "Categorias";
      parent::__construct($this->table, $class);
      $this->categorias=array();
      $this->load();
  }

  private function load(){
    $req=$this->db()->query("SELECT value FROM categories");
    if($req==false)
      throw new Exception('MySQL: Error al realizar la consulta SQL');
    $filas = $this->showData($req);
    $i=0;
    while(isset($filas[$i]['value'])){
      $this->categorias[$i] = $filas[$i]['value'];
      $i++;
    }
  }

  public function getValue($id){
    return $this->categorias[($id-1)];
  }

  public function getCategorias(){
    return $this->categorias;
	}


}
?>