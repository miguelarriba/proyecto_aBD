<!DOCTYPE html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="../css/profile.css" />
  <link rel="stylesheet" type="text/css" href="../css/formulario.css" />
  <?php
    require './layout/head.php';
    require '../models/post.php';
    require '../models/comentarios.php';

    $post = new Post();
    $post->load($_GET['id']);
    $com = new Comentarios();
    $comentarios=$com->load($_GET['id']);
    echo '<title>'.$post->getTitle().'</title>';
  ?>

</head>
<body>
<?php
echo
 '<div id=prheader>'.
 '<h1 id=prtitle>'.$post->getTitle().'</h1>'.
 '<h2 id=prmail>'.$post->getBlogname().'</h2>'.
 '<h3 id=prcategory>#'.$post->getCat().'</h3></div>'.
 '<div id=postbody>'.
 '<p>'.
    $post->getText().
  '</p><br><br>';


  $liked=false;
  if($liked)
    echo '<input type="submit" onclick="like('.$liked.')" value="Liked" class ="boton-formulario2" id="liked">';
  else
    echo '<input type="submit" onclick="like('.$liked.')" value="Like" class ="boton-formulario2" id="like">';
    echo '<br><br>';
  $i=0;
  while(isset($comentarios[$i])){
    echo "- ";
    echo $comentarios[$i]['mail'];
    echo " comentó : ";
    echo $comentarios[$i]['comment'];
    echo "<br><br>";
    $i++;
  }

?>
<br>
<form action="../controllers/newcomment.php?id=<?php echo $post->getID();?>&mail=<?php echo $post->getMail();?>" method="post" class="submit-formulario">
  <textarea name="comment" id="comment" placeholder="Introduce un comentario"></textarea>
  <input type="submit" value="COMENTAR" class ="boton-formulario">
</form>
</div>

<script>
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
