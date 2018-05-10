<!DOCTYPE html>

<?php
	//session_start();
	//if(!isset($_SESSION['logged']) || !$_SESSION['logged'])	header("Location:/views/login.php");
?>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/formulario.css" />
	<link rel="stylesheet" type="text/css" href="../css/newpost.css" />
	<title>Crear Idea</title>
</head>
<body>
	<?php
			include 'layout/head.php';
			include '../controllers/FormularioPost.php';

			$form = new FormularioIdea();
			$form->gestiona();

			include 'layout/foot_page.php';
	?>
</body>
</html>
