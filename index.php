<!DOCTYPE html>
<html>
<head>
	<?php
		require_once './config/conectar.php';
		require './models/categorias.php';
		require './models/postslist.php';
	?>
	<!--Hoja de estilos principal para index -->
<link rel="stylesheet" type="text/css" href="../css/index.css" />
<link rel="stylesheet" type="text/css" href="../css/postlist.css" />


	<meta charset="utf-8">
	<title>Bloggs</title>

	<?php

		$cat = new Categorias;
		$categorias = $cat->getCategorias();
		session_start();
	 ?>
</head>

<body>
<div id=front>
		<?php
		if(!isset($_SESSION['logged']) || !$_SESSION['logged'])
			echo '<a id=login href="./views/login.php">Iniciar Sesion</a>';
		else{
			 echo '<a id=login href="./views/profile.php">'.$_SESSION["login"].'</a>';
			 echo ' / ';
			 echo '<a id=login href="./views/logout.php">Cerrar Sesion</a>';
		}
		?>
		<h1 id=title>BLOGGs</h1>

</div>
<div>
	<ul id=categorias>
		<?php
			$i =0;
			while(isset($categorias[$i])){
				echo '<li><a class=cate href="/views/category.php?cat=';
				echo $categorias[$i];
				echo '">';
				echo $categorias[$i];
				echo '</a></li>';
				$i++;
			}
			?>
	</ul>
<?php
$lista = new PostsList();
$lista->perfil($_SESSION['mail']);
?>
</div>


<?php include './views/layout/foot_page.php';?>
</body>
</html>
