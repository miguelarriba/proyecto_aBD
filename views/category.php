<!DOCTYPE html>
<head>
  <meta charset="utf-8">
  <link rel="shortcut icon" href="../images/icon.png" />
  <link rel="stylesheet" type="text/css" href="../css/postlist.css" />
  <link rel="stylesheet" type="text/css" href="../css/profile.css" />
  <?php
/*
  Muestra todos los post de una determinada categoria
*/

require './layout/head.php';
require '../models/postslist.php';
require '../models/categorias.php';
echo '<title>'.$_GET["cat"].'</title>';
echo '</head><body>';
echo '<div id=prheader>';
echo '<h1 id=prtitle>#'.$_GET["cat"].'</h1>';
echo '</div>';
$cat = new Categorias();
$lista = new PostsList();
$lista->categoria($cat->getPos($_GET["cat"]));
require './layout/foot_page.php';

?>
</body>
