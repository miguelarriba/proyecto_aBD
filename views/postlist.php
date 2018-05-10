<link rel="stylesheet" type="text/css" href="../css/postlist.css" />
<?php
$posts=10;
$height=450+(floor(($posts-1)/3))*450;
echo '<div id=topentradas style="height:'.$height.'px">';
echo '<ul>';

      $i =0;
      while($i<$posts){
        echo '<a href="../views/viewpost.php" style="text-decoration:none;color:black;"><li class=ipost style="float: left;">';
        echo '<h2 class=ptitle>Cosas de cine</h2>';
        echo '<p class=psubtitle>El blog de lo que sea</p>';
        echo '<p class=ptext>El asistente digital de Google será capaz de conversar con personas por teléfono para ahorrar a sus usuarios el esfuerzo de llamar directamente, entre otras novedades presentadas este martes por la firma en su conferencia para desarrolladores.
        El asistente digital de Google será capaz de conversar con personas por teléfono para ahorrar a sus usuarios el esfuerzo de llamar directamente, entre otras novedades presentadas este martes por la firma en su conferencia para desarrolladores.

                El CEO de
                El CEO de Google, Sundar Pichai, ha inaugurado el evento retransmitido por internet desde Mountain View (California, EEUU) y ha puesto el foco en la inteligencia artificial, cada vez más integrada en los productos y servicios de Google, comenzando por su asistente digital.</p>';
        echo '<a href"" class=postcat>#Cine</a>';
        echo '</li></a>';
        $i++;
      }
      ?>
  </ul>
</div>
