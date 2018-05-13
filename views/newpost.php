<!DOCTYPE html>

<?php
	session_start();
	if(!isset($_SESSION['logged']) || !$_SESSION['logged'])	header("Location:./login.php");
?>
<html>
<head>
	<meta charset="utf-8">
	<link rel="shortcut icon" href="../images/icon.png" />
	<link rel="stylesheet" type="text/css" href="../css/formulario.css" />
	<link rel="stylesheet" type="text/css" href="../css/newpost.css" />
	<title>Crear Post</title>
</head>
<body>
	<?php

	/*
		Crea formulario de creacion de post
	*/
			include './layout/head.php';
			include '../controllers/FormularioPost.php';

			$form = new FormularioPost();
			$form->gestiona();

			include './layout/foot_page.php';
	?>
</body>
</html>
