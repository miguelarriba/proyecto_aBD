<!DOCTYPE html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="../css/profile.css" />
  <link rel="stylesheet" type="text/css" href="../css/formulario.css" />
  <title>Titulo de la entrada</title>
</head>
<body>
<?php
  require './layout/head.php';
  require '../models/post.php';
  require '../models/categorias.php';
  require '../models/usuario.php';
  require '../models/comentarios.php';

  $post = new Post();
  $post->load($_GET['id']);
  $cat = new Categorias();
  $user = new Usuario();
  $user->load($post->getMail());
  $comentarios = new Comentarios();

echo
 '<div id=prheader>'.
 '<h1 id=prtitle>'.$post->getTitle().'</h1>'.
 '<h2 id=prmail>'.$user->getNombre().'</h2>'.
 '<h3 id=prcategory>#'.$cat->getValue($post->getIDCat()).'</h3></div>'.
 '<div id=postbody>'.
 '<p>'.
    $post->getText().
  '</p>';

  $liked=false;
  if($liked)
    echo '<input type="submit" onclick="like('.$liked.')" value="Liked" class ="boton-formulario2" id="liked">';
  else
    echo '<input type="submit" onclick="like('.$liked.')" value="Like" class ="boton-formulario2" id="like">';
?>
<br>
<textarea id="comment" placeholder="Introduce un comentario"></textarea>
<div class="submit-formulario">
  <input type="submit" onclick="comenta($comentarios)" value="COMENTAR" class ="boton-formulario">
</div>
</div>

<script>
function comenta(comentarios) {
  comentarios->(document.getElementById("comment").value);
}
function like(liked) {
  if(!liked){
    document.getElementById("like").style.color = "white";
    document.getElementById("like").style.backgroundColor =  "#52a4d8";
    document.getElementById("like").style.borderColor =  "#52a4d8";
    document.getElementById("like").value =  "Liked";
    document.getElementById("like").disabled = "true";
  }
}
</script>

<?php include './layout/foot_page.php';?>
</body>
