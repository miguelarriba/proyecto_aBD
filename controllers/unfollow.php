<?php

require '../models/follow.php';

$fol = new Follow();
$fol->unfollow($_GET['mail1'], $_GET['mail2']);
header("Location: ../views/profile.php?mail=".$_GET['mail2']."");

 ?>
