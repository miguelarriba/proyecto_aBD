<?php
require_once 'entidadBase.php';
class PostsList extends EntidadBase {

  public function __construct() {

	    $this->table = "post";
      $class = "PostsList";
      parent::__construct($this->table, $class);
  }

  public function categoria($cat){
    $req=$this->db()->query("SELECT * FROM post JOIN categories on(post.id_category = categories.id_category)
                                JOIN user on(user.mail = post.mail) WHERE post.id_category= '".$cat."'");
    if($req==false)
      throw new Exception('MySQL: Error al realizar la consulta SQL');
    $filas = $this->showData($req);
    $this->showAllList($filas);
  }

  public function perfil($mail){
    $req=$this->db()->query("SELECT * FROM post JOIN categories on(post.id_category = categories.id_category)
                                JOIN user on(user.mail = post.mail) WHERE post.mail= '".$mail."'");
    if($req==false)
      throw new Exception('MySQL: Error al realizar la consulta SQL');
    $filas = $this->showData($req);
    $this->showAllList($filas);
  }

  private function showAllList($filas){
    $posts=count($filas);
    $height=600+(floor(($posts-1)/3))*450;
    if(!$posts)$height=580;
    echo '<div id=topentradas style="height:'.$height.'px">';
    echo '<ul>';
          $i =0;
          while($i<$posts){
            echo '<a href="../views/viewpost.php?id='.$filas[$i]['id_post'].'" style="text-decoration:none;color:black;"><li class=ipost style="float: left;">';
            echo '<h2 class=ptitle>'.$filas[$i]['title'].'</h2>';
            echo '<p class=psubtitle>'.$filas[$i]['blogname'].'</p>';
            echo '<p class=ptext>'.$filas[$i]['ptext'].'</p>';
            echo '<a href"" class=postcat>#'.$filas[$i]['value'].'</a>';
            echo '</li></a>';
            $i++;
          }
    echo '</ul></div>';
  }
}
?>
