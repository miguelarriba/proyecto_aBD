<!DOCTYPE html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="../css/postlist.css" />
  <link rel="stylesheet" type="text/css" href="../css/profile.css" />
  <title>Mi perfil</title>
</head>
<body>
<?php
      require './layout/head.php';
      require '../models/postslist.php';
      require '../models/usuario.php';
      session_start();
      ?>

<div id=prheader>
  <h1 id=prtitle><?php echo $_SESSION['login'];?></h1>
  <h2 id=prmail><?php echo $_SESSION['mail'];?></h2>
  <a href="./newpost.php" id=prnewpost>CREAR ENTRADA</a>
</div>
<?php

$user=new Usuario();
$user->load($_SESSION['mail']);
$fol = $user->getFollowers();
$followers=count($fol);
$height=60+$followers*28;
echo '<div id=following style="height:'.$height.'px">';
echo  '<h3>Siguiendo</h3>';
echo  '<ul>';

  $i =0;
  while($i<$followers){
    echo '<li class=follower>
      '.$fol[$i]['mail_2'].'
    </li>';
    $i++;
  }
  ?>
</ul>
</div>
<?php
$lista = new PostsList();
$lista->perfil($_SESSION['mail']);
?>
<?php require './layout/foot_page.php';?>
</body>
