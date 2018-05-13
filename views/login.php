<!DOCTYPE html>
<html>
<head>
	<link rel="shortcut icon" href="../images/icon.png" />
	<link rel="stylesheet" type="text/css" href="../css/head.css" />
	<link rel="stylesheet" type="text/css" href="../css/foot_page.css" />
	<link rel="stylesheet" type="text/css" href="../css/formulario.css" />
	<title>Iniciar Sesion</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>

<body>
	<?php
		/*
			Muestra el formulario de inicio de sesion
		*/
			include 'layout/head.php';
			include '../controllers/FormularioLogin.php';
			$form = new FormularioLogin();
			$form->gestiona();
			include 'layout/foot_page.php';
	?>

</body>
</html>
