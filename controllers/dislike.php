<?php

require '../models/rating.php';

$like = new Rating();
$like->dislike($_GET['id'], $_GET['mail']);
header("Location: ../views/viewpost.php?id=".$_GET['id']."");

 ?>
