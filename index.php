<!DOCTYPE html>
<html>
<head>

	<!--Hoja de estilos principal para index -->
<link rel="stylesheet" type="text/css" href="../css/index.css" />


	<meta charset="utf-8">
	<title>Bloggs</title>

	<?php
		//Carga categorias de entorno.ini
		$categorias = parse_ini_file("./config/entorno.ini", true);
		if($categorias==null)
			throw new Exception('MySQL: Error al cargar las categorias');
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
			while(isset($categorias['CATEGORIAS']['categoria'][$i])){
				echo '<li><a class=cate href="/views/category.php?cat=';
				echo $categorias['CATEGORIAS']['categoria'][$i];
				echo '">';
				echo $categorias['CATEGORIAS']['categoria'][$i];
				echo '</a></li>';
				$i++;
			}
			?>
	</ul>
<?php
include './views/postlist.php';
?>
</div>


<?php include './views/layout/foot_page.php';?>
</body>
</html>
