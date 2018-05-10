<!DOCTYPE html>
<?php
	//session_start();
	//if(!isset($_SESSION['logged']) || !$_SESSION['logged'])	header("Location:/views/login.php");
?>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="../css/profile.css" />
  <title>Mi perfil</title>
</head>
<body>
<?php include './layout/head.php'; ?>

<div id=prheader>
  <h1 id=prtitle>Este es el nombre</h1>
  <h2 id=prmail>mail@ucm.es</h2>
  <a href="./newpost.php" id=prnewpost>CREAR ENTRADA</a>
</div>
<?php
$followers=10;
$height=60+$followers*28;
echo '<div id=following style="height:'.$height.'px">';
echo  '<h3>Siguiendo</h3>';
echo  '<ul>';

  $i =0;
  while($i<$followers){
    echo '<li class=follower>
      Usuario X
    </li>';
    $i++;
  }
  ?>
</ul>
</div>
<?php
include './postlist.php';
?>
<?php include './layout/foot_page.php';?>
</body>
