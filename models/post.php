<?php
require_once 'entidadBase.php';
class Post extends EntidadBase {

  private $id;
  private $title;
  private $mail;
  private $id_category;
  private $text;

  public function __construct() {
	    $this->table = "post";
      $class = "Post";
      parent::__construct($this->table, $class);
  }

  public function getID(){
    return $this->id;
  }

  public function setID($id){
    $this->id = $id;
  }

  public function getTitle(){
    return $this->title;
  }

  public function setTitle($title){
    $this->title = $title;
  }

  public function getMail(){
    return $this->mail;
  }

  public function setMail($mail){
    $this->mail = $mail;
  }

  public function getIDCat(){
    return $this->id_category;
  }

  public function setIDCat($id_category){
    $this->id_category = $id_category;
  }

  public function getText(){
    return $this->text;
  }

  public function setText($text){
    $this->text = $text;
  }

  public function load($id){
    $req=$this->db()->query("SELECT * FROM post WHERE id_post = ".$id);
    if($req==false)
      throw new Exception('MySQL: Error al realizar la consulta SQL');
    $filas = $this->showData($req);

    $this->setID($filas[0]['id_post']);
    $this->setTitle($filas[0]['title']);
    $this->setMail($filas[0]['mail']);
    $this->setIDCat($filas[0]['id_category']);
    $this->setText($filas[0]['ptext']);

	}

  public function setPost(){
        $query="INSERT INTO post (title, mail, id_category, ptext)
               VALUES('".$this->getTitle()."','".$this->getMail()."','".$this->getIDCat()."','".$this->getText()."')";
        if($this->db()->query($query) == false)
			      throw new Exception('MySQL: Error al realizar la inserción SQL');
          //Consigue el ID de la BBDD
         $query = $this->getBy('title', $this->getTitle());

         $this->id =$query[0]['id_post'];
	}


}
?>
