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
  //Carga lista de comentarios de un post
  public function load($id){
    $req=$this->db()->query("SELECT * FROM comments WHERE id_post = '".$id."'");
    if($req==false)
      throw new Exception('MySQL: Error al realizar la consulta SQL');
    $filas = $this->showData($req);
    return $filas;
  }
  //crea un cometario
  public function set($id, $mail, $text){
        $query="INSERT INTO comments(id_post, mail, comment)
                VALUES ('".$id."','".$mail."','".$text."')";

        if($this->db()->query($query) == false)
			     throw new Exception('MySQL: Error al realizar la inserción SQL');

  }


}
?>
