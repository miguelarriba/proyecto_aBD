<?php
require_once 'entidadBase.php';
class Follow extends EntidadBase {

  public function __construct() {

	    $this->table = "following";
      $class = "Follow";
      parent::__construct($this->table, $class);
      $this->comentarios=array();
  }
  //Crea un seguidor
  public function follow($mail1, $mail2){
    $req=$this->db()->query("INSERT INTO following(mail_1, mail_2)
                              VALUES ('".$mail1."','".$mail2."')");
    if($req==false)
      throw new Exception('MySQL: Error al realizar la consulta SQL');
  }
  //elimina un sesguidor
  public function unfollow($mail1, $mail2){
    $req=$this->db()->query("DELETE FROM following WHERE mail_1 = '".$mail1."' AND mail_2 = '".$mail2."'");
    if($req==false)
      throw new Exception('MySQL: Error al realizar la consulta SQL');
  }
  //Boolean: indica si un usuario es seguido
  public function following($mail1, $mail2){
    $req=$this->db()->query("SELECT * FROM following WHERE mail_1 = '".$mail1."' AND mail_2 = '".$mail2."'");
    if($req==false)
      throw new Exception('MySQL: Error al realizar la consulta SQL'.$mail1.$mail2);
    $filas = $this->showData($req);
    return (count($filas)>0);
  }
}
?>
