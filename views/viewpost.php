<!DOCTYPE html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="../css/profile.css" />
  <link rel="stylesheet" type="text/css" href="../css/formulario.css" />
  <title>Titulo de la entrada</title>
</head>
<body>
<?php include './layout/head.php'; ?>

<div id=prheader>
  <h1 id=prtitle>Titulo de la entrada</h1>
  <h2 id=prmail>Nombre del blog</h2>
  <h3 id=prcategory>#Cine</h3>
</div>
<div id=postbody>
<p>
  El asistente digital de Google será capaz de conversar con personas por teléfono para ahorrar a sus usuarios el esfuerzo de llamar directamente, entre otras novedades presentadas este martes por la firma en su conferencia para desarrolladores.
  El asistente digital de Google será capaz de conversar con personas por teléfono para ahorrar a sus usuarios el esfuerzo de llamar directamente, entre otras novedades presentadas este martes por la firma en su conferencia para desarrolladores.

          El CEO de
          El CEO de Google, Sundar Pichai, ha inaugurado el evento retransmitido por internet desde Mountain View (California, EEUU) y ha puesto el foco en la inteligencia artificial, cada vez más integrada en los productos y servicios de Google, comenzando por su asistente digital.
</p>
<?php
  $liked=false;
  if($liked)
    echo '<input type="submit" onclick="like('.$liked.')" value="Liked" class ="boton-formulario2" id="liked">';
  else
    echo '<input type="submit" onclick="like('.$liked.')" value="Like" class ="boton-formulario2" id="like">';
?>
<script>
function like(liked) {
  if(!liked){
    document.getElementById("like").style.color = "white";
    document.getElementById("like").style.backgroundColor =  "#52a4d8";
    document.getElementById("like").style.borderColor =  "#52a4d8";
    document.getElementById("like").value =  "Liked";
    document.getElementById("like").disabled = "true";
  }
}
</script>
<br>
<textarea id="comment" placeholder="Introduce un comentario"></textarea>
<div class="submit-formulario">
  <input type="submit" value="COMENTAR" class ="boton-formulario">
</div>
</div>
<?php include './layout/foot_page.php';?>
</body>
