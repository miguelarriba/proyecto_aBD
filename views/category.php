<!DOCTYPE html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="../css/profile.css" />
  <title>Mi perfil</title>
</head>
<body>
<?php
require './layout/head.php';

echo '<div id=prheader>';
echo '<h1 id=prtitle>#'.$_GET["cat"].'</h1>';
echo '</div>';


require './postlist.php';
require './layout/foot_page.php';?>
</body>
