<!DOCTYPE html>
<html>
<head>
	<link rel="shortcut icon" href="../images/icon.png" />
	<link rel="stylesheet" type="text/css" href="/css/head.css" />
	<link rel="stylesheet" type="text/css" href="/css/foot_page.css" />
	<link rel="stylesheet" type="text/css" href="/css/formulario.css" />
	<title>Registro</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>

<body>
	<?php

	/*
		Crea formulario de registro
	*/
			include 'layout/head.php';
			include '../controllers/FormularioRegistro.php';

			$form = new FormularioRegistro();
			$form->gestiona();
			include 'layout/foot_page.php';
	?>
</body>
</html>
