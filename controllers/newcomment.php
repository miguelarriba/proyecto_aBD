<?php

require '../models/comentarios.php';

$comentarios = new Comentarios();
$comentarios->set($_GET['id'], $_GET['mail'], htmlspecialchars(trim(strip_tags($_REQUEST["comment"]))));
header("Location: ../views/viewpost.php?id=".$_GET['id']."");

 ?>
