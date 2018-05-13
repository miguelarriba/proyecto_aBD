<?php

require '../models/follow.php';

$fol = new Follow();
$fol->follow($_GET['mail1'], $_GET['mail2']);
header("Location: ../views/profile.php?mail=".$_GET['mail2']."");

 ?>
