<!DOCTYPE html>
<html>
<head>
	<?php
		//Pagina principal
		require_once './config/conectar.php';
		require './models/categorias.php';
		require './models/postslist.php';
	?>
<link rel="shortcut icon" href="../images/icon.png" />
<link rel="stylesheet" type="text/css" href="../css/index.css" />
<link rel="stylesheet" type="text/css" href="../css/postlist.css" />


	<meta charset="utf-8">
	<title>Bloggs</title>

	<?php
		//carga categorias de db
		$cat = new Categorias;
		$categorias = $cat->getCategorias();
		session_start();
	 ?>
</head>

<body>
<div id=front>
		<?php
		//crea login cabecera
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
		//crea categorias
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
//crea lista de posts mas valorados
$lista = new PostsList();
$lista->topRated();
?>
</div>


<?php include './views/layout/foot_page.php';?>
</body>
</html>
