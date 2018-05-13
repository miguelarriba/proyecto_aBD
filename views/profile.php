<!DOCTYPE html>
<head>
  <meta charset="utf-8">
  <link rel="shortcut icon" href="../images/icon.png" />
  <link rel="stylesheet" type="text/css" href="../css/postlist.css" />
  <link rel="stylesheet" type="text/css" href="../css/profile.css" />
<?php

      /*
        Vista que carga perfil de cualquier usuario.
      */

      require './layout/head.php';
      require '../models/postslist.php';
      require '../models/usuario.php';
      require '../models/follow.php';

      session_start();
      if(!isset($_SESSION['mail']) && !isset($_GET['mail'])){
        header("Location: ../views/login.php");
      }
      else if(!isset($_SESSION['mail']) && isset($_GET['mail'])){
        $usermail = $_GET['mail'];
        $boton = '<a href="../views/login.php" id=prnewpost>SEGUIR</a>';
      }
      else if(isset($_SESSION['mail']) && !isset($_GET['mail'])){
        $usermail = $_SESSION['mail'];
        $boton = '<a href="./newpost.php" id=prnewpost>CREAR ENTRADA</a>';
      }
      else{
        if($_GET['mail']==$_SESSION['mail'])header("Location:../views/profile.php");
        $usermail = $_GET['mail'];
        $foll = new Follow();
        if(!$foll->following($_SESSION['mail'], $_GET['mail']))
          $boton = '<a href="../controllers/newfollow.php?mail1='.$_SESSION['mail'].'&mail2='.$_GET['mail'].'" id=prnewpost>SEGUIR</a>';
        else
          $boton = '<a href="../controllers/unfollow.php?mail1='.$_SESSION['mail'].'&mail2='.$_GET['mail'].'" id=prnewpost>SIGUIENDO</a>';
      }

      $user=new Usuario();
      $user->load($usermail);
      $fol = $user->getFollowers();
      $followers=count($fol);
      $height=80+$followers*28;



echo '<title>'.$user->getNombre().'</title>'.
'</head><body>'.
'<div id=prheader>'.
  '<h1 id=prtitle>'.$user->getNombre().'</h1>'.
  '<h2 id=prmail>'.$user->getMail().'</h2>'.
  $boton.
'</div>';

echo '<div id=following style="height:'.$height.'px">';
echo  '<h3>Siguiendo a:</h3>';
echo  '<ul>';
if(!$followers) echo '<p class=follower> ... </p>';
  $i =0;
  while($i<$followers){
    echo '<a class=follower href="../views/profile.php?mail='.$fol[$i]['mail_2'].'
    "><li>'
    .$fol[$i]['blogname'].
    '</li></a>';
    $i++;
  }
  ?>
</ul>
</div>
<?php
$lista = new PostsList();
$lista->perfil($user->getMail());
?>
<?php require './layout/foot_page.php';?>
</body>
