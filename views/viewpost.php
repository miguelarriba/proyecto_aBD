<!DOCTYPE html>
<head>
  <meta charset="utf-8">
  <link rel="shortcut icon" href="../images/icon.png" />
  <link rel="stylesheet" type="text/css" href="../css/profile.css" />
  <link rel="stylesheet" type="text/css" href="../css/formulario.css" />
  <?php
/*
  Vista que carga un post
*/

    require './layout/head.php';
    require '../models/post.php';
    require '../models/comentarios.php';
    require '../models/rating.php';
    session_start();
    $post = new Post();
    $post->load($_GET['id']);
    $com = new Comentarios();
    $comentarios=$com->load($_GET['id']);
    $rat = new Rating();
    $liked=isset($_SESSION['mail'])?$rat->isLiked($_GET['id'], $_SESSION['mail']):false;
    echo '<title>'.$post->getTitle().'</title>';
  ?>

</head>
<body>
<?php
echo
 '<div id=prheader>'.
 '<h1 id=prtitle>'.$post->getTitle().'</h1>'.
 '<a id=prmail href="../views/profile.php?mail='.$post->getMail().'">'.$post->getBlogname().'</a>'.
 '<h3 id=prcategory>#'.$post->getCat().'</h3></div>'.
 '<div id=postbody>'.
 '<p>'.
    $post->getText().
  '</p><br><br>';

  if($liked){
    echo '<form action="../controllers/dislike.php?id='.$post->getID().'&mail='.$_SESSION['mail'].'" method="post">';
    echo '<input type="submit" value="Liked" class ="boton-formulario" id="liked">';
    echo '</form>';
  }
  else{
    echo isset($_SESSION['mail'])?
    '<form action="../controllers/newlike.php?id='.$post->getID().'&mail='.$_SESSION['mail'].'" method="post">':
    '<form action="../views/login.php" method="post">';
    echo '<input type="submit" value="Like" class ="boton-formulario2" id="like">';
    echo '</form><br><br>';
  }
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
<form class="formulario" action="../controllers/newcomment.php?id=<?php echo $post->getID();?>&mail=<?php echo $_SESSION['mail'];?>" method="post">
  <textarea name="comment" id="comment" placeholder="Introduce un comentario"></textarea>
  <input type="submit" value="COMENTAR" class ="boton-formulario">
</form>
</div>

<?php include './layout/foot_page.php';?>
</body>
