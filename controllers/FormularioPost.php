<?php
include 'Form.php';
include '../models/Post.php';
include '../models/categorias.php';
class FormularioPost extends Form
{

    private $categorias;
    public function __construct() {
        parent::__construct('formIdea');
        $cat = new Categorias;
    		$this->categorias = $cat->getCategorias();
    }

    protected function generaCamposFormulario($datos)
    {
      $cat="";
      $i = 0;
      while(isset($this->categorias[$i])){
        $cat .= '<option value="';
        $cat .= $this->categorias[$i];
        $cat .= '">';
        $cat .= $this->categorias[$i];
        $cat .= '</option>';
        $i++;
    }
        $html = <<<EOF
        <legend>Crear Entrada</legend>
  			<h4>Título</h4><input type="text" name="nombre" required class ="input-box">

  			<h4>Categoría</h4>
  			<p>Elige a qué categoría de tu entrada</p>
  			<select name="categoria" class ="input-box">
  				$cat
  			</select>

  			<h4>Texto</h4>
  			<textarea class="input-text" name="descripcion" rows="12" cols="140"></textarea>

  			<div class="submit-formulario">
  				<input type="submit" value="ACEPTAR" class ="boton-formulario">
  			</div>
EOF;
        return $html;
    }


    protected function procesaFormulario($datos)
    {
        $result = array();
        $cat=1+array_search($datos['categoria'], $this->categorias);
        //Crea objeto post y atributos
      	$post = new Post;
        $post->setTitle($datos['nombre']);
        $post->setMail($_SESSION['mail']);
        $post->setIDCat($cat);
        $post->setText($datos['descripcion']);

      	try{
      		$post->setPost();
      	  $post->closeConnection();
          $result = "../index.php?id_post=".$post->getID();
      	}catch(Exception $e){
      		error_log("MySQL: Code: ".$e->getCode(). " Desc: " .$e->getMessage() ,0);
      		$_SESSION['data_error']=$e->getMessage();
      		$result = '../errorpage.php';
      	}
        return $result;
    }
}
?>
