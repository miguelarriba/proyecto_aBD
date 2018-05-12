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
require '../models/categorias.php';
echo '<div id=prheader>';
echo '<h1 id=prtitle>#'.$_GET["cat"].'</h1>';
echo '</div>';
$cat = new Categorias();
$lista = new PostsList();
$lista->categoria($cat->getPos($_GET["cat"]));
require './layout/foot_page.php';

?>
</body>
