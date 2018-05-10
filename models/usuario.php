<?php
include 'entidadBase.php';
class Usuario extends EntidadBase {
    private $mail;
	  private $password;
    private $nombre;


    public function __construct(){
		    $this->table = "user";
        $class = "Usuario";
        parent::__construct($this->table, $class);
    }

    public function getMail() {
        return $this->mail;
    }

    public function setMail($mail) {
        $this->mail = $mail;
    }

	   public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = SHA1($password);
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

  /*
    Guarda el usuario en la base de datos
  */
	public function signupUser(){
        $query="INSERT INTO user (mail, password, blogname)
                VALUES ('HOla','aaaa','asdfasdf')";

        if($this->db()->query($query) == false)
			     throw new Exception('MySQL: Error al realizar la inserción SQL');

    }
}
?>
