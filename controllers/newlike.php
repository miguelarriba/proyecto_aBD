<?php

require '../models/rating.php';

$like = new Rating();
$like->like($_GET['id'], $_GET['mail']);
header("Location: ../views/viewpost.php?id=".$_GET['id']."");

 ?>
