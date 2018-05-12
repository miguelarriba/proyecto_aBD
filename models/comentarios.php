<?php
require_once 'entidadBase.php';
class Comentarios extends EntidadBase {

  private $comentarios;

  public function __construct() {

	    $this->table = "comments";
      $class = "Comentarios";
      parent::__construct($this->table, $class);
      $this->comentarios=array();
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

  public function set($id, $mail, $text){
        $query="INSERT INTO comments(id_post, mail, comment)
                VALUES (".$id.",".$mail.",".$text.")";

        if($this->db()->query($query) == false)
			     throw new Exception('MySQL: Error al realizar la inserción SQL');

  }


}
?>
