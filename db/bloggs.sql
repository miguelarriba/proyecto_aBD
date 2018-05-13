-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 13-05-2018 a las 13:08:40
-- Versión del servidor: 10.1.30-MariaDB
-- Versión de PHP: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bloggs`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `id_category` tinyint(4) NOT NULL,
  `value` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`id_category`, `value`) VALUES
(1, 'Cine'),
(2, 'Tecnologia'),
(3, 'Deportes'),
(4, 'Alimentacion'),
(5, 'Musica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comments`
--

CREATE TABLE `comments` (
  `id_com` int(11) NOT NULL,
  `id_post` int(11) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `comment` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `comments`
--

INSERT INTO `comments` (`id_com`, `id_post`, `mail`, `comment`) VALUES
(2, 28, 'music@ucm.es', 'Muy buena canciÃ³n!'),
(5, 21, 'compu@ucm.es', 'Buen post!!'),
(6, 25, 'music@ucm.es', 'Muy interesante!'),
(7, 27, 'compu@ucm.es', 'Muy buena receta');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `following`
--

CREATE TABLE `following` (
  `id_follow` int(11) NOT NULL,
  `mail_1` varchar(100) NOT NULL,
  `mail_2` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `following`
--

INSERT INTO `following` (`id_follow`, `mail_1`, `mail_2`) VALUES
(4, 'cine@ucm.es', 'run@ucm.es'),
(5, 'coc@ucm.es', 'cine@ucm.es'),
(7, 'coc@ucm.es', 'music@ucm.es'),
(8, 'coc@ucm.es', 'run@ucm.es'),
(9, 'compu@ucm.es', 'music@ucm.es'),
(3, 'music@ucm.es', 'cine@ucm.es'),
(1, 'music@ucm.es', 'coc@ucm.es');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `likes`
--

CREATE TABLE `likes` (
  `id_like` int(11) NOT NULL,
  `id_post` int(11) NOT NULL,
  `mail` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `likes`
--

INSERT INTO `likes` (`id_like`, `id_post`, `mail`) VALUES
(1, 28, 'cine@ucm.es'),
(3, 27, 'cine@ucm.es'),
(4, 26, 'cine@ucm.es'),
(5, 27, 'music@ucm.es'),
(6, 30, 'music@ucm.es'),
(7, 28, 'coc@ucm.es'),
(8, 26, 'coc@ucm.es'),
(10, 20, 'compu@ucm.es'),
(14, 26, 'compu@ucm.es'),
(15, 22, 'compu@ucm.es');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `post`
--

CREATE TABLE `post` (
  `id_post` int(11) NOT NULL,
  `title` varchar(500) NOT NULL,
  `mail` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `id_category` tinyint(4) NOT NULL,
  `ptext` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `post`
--

INSERT INTO `post` (`id_post`, `title`, `mail`, `id_category`, `ptext`) VALUES
(20, 'Diez televisores de tubo conectados entre ellos hacen que jugar al Pong sea pura nostalgia ochentera', 'compu@ucm.es', 2, 'Los televisores de tubo, las cintas VHS, los gamepad de NES y el Pong son elementos de la dÃ©cada de los 80. Ryan Mason, desarrollador y artista de videojuegos, los resucitÃ³ para un experimento de la universidad y el resultado es un videojuego retro futrista que no deja de sorprender y apelar a la nostalgia.\r\n\r\nRyan Mason tiene ya varios videojuegos que se ejecutan en televisores de tubo apilados. La idea no es simplemente que los televisores conectados simulen una pantalla mÃ¡s grande, sino que cada pantalla pueda representar un espacio fÃ­sico separado. Cuando el elemento principal del juego se desplaza, cada pantalla se enciende para mostrarlo en su nueva ubicaciÃ³n.'),
(21, 'AsÃ­ funciona Google Duplex, el sistema que se pone al telÃ©fono por ti y que da un poquito de miedo', 'compu@ucm.es', 2, 'Que una mÃ¡quina te llame no es nada nuevo, pero que lo haga para conversar contigo de formaf natural es algo muy distinto. Es lo que ofrece Google Duplex, el sistema de inteligencia artificial aplicado a la automatizaciÃ³n de las conversaciones telefÃ³nicas.\r\n\r\nLa demostraciÃ³n que Sundar Pichai hizo durante la conferencia Google I/O 2018 nos dejÃ³ a todos asombrados, y aunque ciertamente la tecnologÃ­a dejÃ³ patente su capacidad, el debate sobre privacidad, transparencia y malos usos es inevitable.\r\n\r\nUna voz robÃ³tica que parece totalmente humana\r\nLlevÃ¡bamos apenas 35 minutos de conferencia cuando Sundar Pichai comenzÃ³ a hablar de Google Assistant. El sistema, nos decÃ­a, querÃ­a resolver un problema comÃºn: el de los pequeÃ±os negocios que no tienen sistemas automatizados de reserva online.\r\n\r\nEsa llamada en la que una mÃ¡quina hablaba con una persona y lo hacÃ­a de forma totalmente natural marca un punto de inflexiÃ³n. Uno en el que la comprensiÃ³n del lenguaje natural, el aprendizaje profundo y el dictado de textos demuestra por primera vez que puede engaÃ±arnos y hacernos pensar que estamos hablando con una persona real.\r\n\r\nLa encargada de la peluquerÃ­a en ningÃºn momento sospechÃ³ que quien la llamaba era una voz sintetizada â€”esas pausas, esos \"ahmmm...\" y esos \"mm-hmm...\" ayudaban a que la voz robÃ³tica se convirtiera en una voz humana, con entonaciÃ³n humana y con esas mismas pausas y dudas que habitualmente hacemos al hablar los seres humanos.'),
(22, 'El \"mejor\" pendrive del mundo tiene una Raspberry Pi Zero por cerebro', 'compu@ucm.es', 2, 'Con conectividad total prÃ¡cticamente en cualquier lugar, optar por el almancenamiento en la nube para llevar archivos de un lado a otro parece lo mÃ¡s cÃ³modo. Pero si hay pendrives como la que propone pISO, sus extras respecto a una memoria USB clÃ¡sica merecen mucho la pena.\r\n\r\nUna Raspberry Pi a los mandos de una memoria USB\r\npISO es un proyecto ya en marcha que une la capacidad de procesamiento de una Raspberry Pi Zero con un sistema operativo completamente centrado en la gestiÃ³n de archivos y que nuestra memoria sea compatible con el sistema operativo que usemos en cada momento, sin conflictos. Para ello pISO crea tantos pendrives virtuales como necesitemos segÃºn los sistemas operativos en que queramos usar esta memoria. Y podemos mover archivos entre ellos y luego a los diferentes equipos donde los conectemos.\r\n\r\nCon un tamaÃ±o que apenas supera el de una memoria USB clÃ¡sica, la pISO no tiene problemas en la capacidad de almacenamiento: solo depende de la tarjeta microSD que usemos en la Raspberry Pi Zero. Si necesitamos mÃ¡s espacio basta con cambiar esa tarjeta.'),
(23, 'En forma esta primavera practicando deporte al aire libre', 'run@ucm.es', 3, 'Con la llegada del buen tiempo cada vez son mÃ¡s las horas que pasamos en la calle. Los parques, jardines y zonas naturales son los escenarios mÃ¡s habituales de nuestro tiempo de ocio. Por ello en este post queremos detenernos en algunas de las actividades mÃ¡s importantes que podemos llevar a cabo al aire libre en esta Ã©poca del aÃ±o.\r\n\r\nExisten infinidad de actividades que son muy propicias para esta Ã©poca del aÃ±o. No solo por el buen tiempo, sino porque tener mÃ¡s horas de luz nos mantendrÃ¡ mÃ¡s activos y con otra predisposiciÃ³n para hacer actividades al aire libre. Nosotros nos vamos a detener en algunas de las mÃ¡s habituales. Para ello las vamos a organizar por grupos.\r\nPara practicar deporte al aire libre tenemos infinidad de opciones que debemos considerar en primavera\r\nAntes de nada es necesario tener presente que para practicar deporte al aire libre contamos con numerosos lugares. Los parques de las ciudades, las canchas pÃºblicas, las pistas de atletismo o incluso el bosque o campo abierto pueden ser los escenarios con los que podemos contar para el desempeÃ±o de cualquier actividad.\r\n\r\nUna vez visto esto, nosotros nos vamos a detener en diferentes grupos de actividades a tener en cuenta y que pueden ser las que vayamos a llevar a cabo en esta Ã©poca. Vamos a centrarnos en las actividades grupales, el entrenamiento aerÃ³bico, el entrenamiento anaerÃ³bico propiamente dichos. De este modo lo que haremos serÃ¡ diferenciar entre los objetivos o el tipo de actividad que mÃ¡s nos va a interesar.\r\n\r\nEn estos parques y espacios habilitados para el desarrollo de actividades deportivas solemos encontrar lo necesario para llevar a cabo cualquier ejercicio que nos propongamos. De todos modos, si no lo tenemos podemos utilizar algunos equipamientos propios que nos ayudarÃ¡n a desarrollar la actividad de manera mÃ¡s completa y efectiva.\r\n\r\n'),
(24, 'La \"Daily Mile\" o cÃ³mo mejorar la salud de nuestros niÃ±os caminando 15 minutos en horario escolar', 'run@ucm.es', 3, 'La denominada Daily Mile surgiÃ³ en Escocia y consiste en que, en horario lectivo, los niÃ±os de primaria salgan 15 minutos de clase y los dediquen a caminar, trotar o correr -son ellos los que eligen el ritmo que quieren seguir - dentro de los terrenos de la escuela. Esta actividad es aparte de cualquier otra actividad fÃ­sica que se realice en el colegio como la asignatura de EducaciÃ³n FÃ­sica.\r\nLa creadora de esta idea es Elaine Wyllie. Ella asegura en su pÃ¡gina web que, cuando puso en marcha esta actividad, encontrÃ³ que los padres de dichos niÃ±os le indicaban que sus hijos estaban mÃ¡s en forma, mÃ¡s activos y mÃ¡s despiertos. Sin embargo no existÃ­a ninguna prueba empÃ­rica que demostrara dichos resultados.\r\n\r\nAhora, un estudio realizado por Chesman y su equipo, le dan la razÃ³n. Estos investigadores encuentran que la implementaciÃ³n de la Daily Mile aumenta la cantidad de actividad fÃ­sica, desde modera a intensa, que los niÃ±os realizan, reduce la sedentariedad, mejora su estado fÃ­sico y la composiciÃ³n corporal.\r\n\r\nEste estudio se llevÃ³ a cabo en dos colegios, con un total de 391 niÃ±os, de entre cuatro y 12 aÃ±os. Uno de los colegios seguÃ­a el mÃ©todo de Daily Mile y el otro no. La evoluciÃ³n de los niÃ±os fue estudiada durante un aÃ±o. Los niÃ±os llevaban acelerÃ³metros para poder medir la intensidad de la actividad fÃ­sica que realizaban y el tiempo de comportamiento sedentario durante el dÃ­a.\r\n\r\nLos investigadores controlaron las variables de edad y gÃ©nero y encontraron mejoras significativas en los alumnos del colegio que seguÃ­a la Daily Mile en comparaciÃ³n con el colegio control.\r\n\r\nHay que tener en cuenta, sin embargo, que durante este estudio no controlaron otras variables como estatus socioeconÃ³mico, ademÃ¡s, el momento del aÃ±o en el que se evaluÃ³ a un colegio y el otro fue diferente - octubre y marzo respectivamente -, y no se tuvieron en cuenta las polÃ­ticas en salud y bienestar de las escuelas, asÃ­ como tampoco los estilos de alimentaciÃ³n de los menores. AdemÃ¡s, la muestra es relativamente pequeÃ±a, por lo que los mismos autores indican que deberÃ­a replicarse en un mayor nÃºmero de colegios, corrigiendo tambiÃ©n asÃ­ variables como el nivel socioeconÃ³mico.\r\n\r\nEn cualquier caso, parece que cada vez mÃ¡s colegios y paÃ­ses -entre ellos Inglaterra, BÃ©lgica, Irlanda e incluso EspaÃ±a - 9 colegios han implementado ya el sistema, segÃºn su pÃ¡gina web - estÃ¡n implementando y poniendo a prueba este programa.\r\n\r\nSe deben llevar a cabo mÃ¡s investigaciones al respecto, pero de ser realmente efectivo, podrÃ­a ayudar a solventar un problema grave como el de la obesidad infantil que se ha multiplicado por 10 en los Ãºltimos 40 aÃ±os.'),
(25, 'AsÃ­ es como la psicologÃ­a puede ayudarte a recuperarte de una lesiÃ³n deportiva', 'run@ucm.es', 3, 'La incidencia de lesiones deportivas es algo comÃºn en todos los deportes y en todos los niveles, no importa si eres profesional o aficionado. AsÃ­ como tampoco importa si llevas mucho o poco tiempo realizando ejercicio: la posibilidad de tener una lesiÃ³n estÃ¡ ahÃ­. Y en la recuperaciÃ³n de la lesiÃ³n no solo influye el aspecto fÃ­sico, sino tambiÃ©n el psicolÃ³gico. Volver a sentirse preparado para retomar el deporte, sintiÃ©ndonos seguros depende tanto de cÃ³mo nos sintamos fÃ­sicamente, como de cÃ³mo nos sintamos mentalmente. Es por esto que la psicologÃ­a tiene un importante papel en la recuperaciÃ³n de una lesiÃ³n.\r\nPero no solo en la recuperaciÃ³n, sino tambiÃ©n en la prevenciÃ³n de las lesiones. En lo que a los factores psicolÃ³gicos se refiere, uno de los mayores predictores de lesiÃ³n es el estrÃ©s. Los deportistas con un historial de factores estresantes y con menos recursos para superar estos estresores tienen riesgo de sufrir mÃ¡s lesiones. Es por esto que los programas psicolÃ³gicos de prevenciÃ³n parecen tener un importante efecto en la prevenciÃ³n de lesiones, especialmente el entrenamiento en herramientas psicolÃ³gicas, como el manejo adecuado del estrÃ©s.\r\n\r\nEn lo que a la rehabilitaciÃ³n se refiere, una vez que ya ha ocurrido la lesiÃ³n y que estamos intentando recuperarnos, estudios como los de Armatas y su equipo, en otros, encuentran que la intervenciÃ³n psicolÃ³gica ayuda a recuperarse mÃ¡s y mejor. Pero dentro de este tipo de intervenciones es importante saber quÃ© tÃ©cnicas vamos a utilizar, quÃ© tipo de programa de intervenciÃ³n queremos implementar, cuÃ¡les son las tÃ©cnicas mÃ¡s efectivas o cuÃ¡les pueden ayudar mÃ¡s a la persona concreta que sufre la lesiÃ³n.'),
(26, 'Estas son mis siete apps favoritas para entrenar en el gimnasio', 'run@ucm.es', 3, 'Puede que seas de la vieja escuela y te guste apuntar todo lo que haces en el gimnasio en una libreta o, peor aÃºn no apuntarlo, pero estas aplicaciones te pueden ayudar a registrar tu entrenamiento y a conocer variables tan importantes como el volumen o la frecuencia por grupo muscular.\r\nSimplemente dedicÃ¡ndole un par de minutos durante el entrenamiento puedes conocer estas variable y asÃ­ corregir problemas y mejorar los resultados. Sin duda, merece la pena.\r\n<br>\r\nJEFIT (Android - iOs)\r\n<br>\r\nFitNotes (Android)\r\n<br>\r\nStrong (Android - iOs)\r\n<br>\r\nHeavySet (iOs)\r\n<br>\r\nFitbod (iOs)\r\n<br>\r\nGymBook (iOs)\r\n<br>\r\nStrongly (iOs)'),
(27, 'Empanadillas hojaldradas de plÃ¡tano, queso y naranja. Receta de postre', 'coc@ucm.es', 4, 'A veces estas haciendo tu trabajo y te acercas a por algo de beber o a picar algo. En uno de esos viajes, vi unos plÃ¡tanos en el frutero y un poco de queso y se me ocurriÃ³ esta receta de empanadillas hojaldradas de plÃ¡tano, queso y naranja, un postre de aprovechamiento que tenÃ©is que probar sÃ­ o sÃ­.\r\n<br>\r\nEs un plato que queda muy delicado, al usar masa de hojaldre en lugar de obleas de empanadilla y que se funde en la boca dejando notar el salado del queso, el dulce del plÃ¡tano y los aromas esenciales de la ralladura de naranja. EstÃ¡n tan ricas que me parece que las volverÃ© a hacer muy pronto. Y vosotros, Â¿os animÃ¡is a probarlas?\r\n<br>\r\nIngredientes<br>\r\nPara 4 personas<br>\r\nHojaldre refrigerado, una plancha<br>\r\nPlÃ¡tano<br>\r\n2<br>\r\nQueso manchego<br>\r\n200 g<br>\r\nRalladura de naranja<br>\r\nHuevo<br>\r\n1 Canela molida al gusto<br>\r\nAzÃºcar glasÃ© al gusto<br>\r\nCÃ³mo hacer empanadillas hojaldradas de plÃ¡tano queso y naranja<br>\r\nDificultad: FÃ¡cil<br>\r\nTiempo total: 30 m<br>\r\nElaboraciÃ³n: 10 m<br>\r\nCocciÃ³n: 20 m<br>\r\nLa primera parte es confeccionar las obleas de empanadilla con la plancha de hojaldre. Basta con extenderla y cortar las obleas con un molde de emplatar. Una vez cortadas, juntamos los excedentes de hojaldre, los estiramos de nuevo y seguimos cortando hasta acabar la masa.<br>\r\n\r\nSobre cada empanadilla colocamos dos o tres rodajas de plÃ¡tano, un triÃ¡ngulito de queso manchego y un pegote de queso crema, procurando no llegar al borde para poder cerrar las empanadillas. Sobre el queso crema rallamos la cÃ¡scara de naranja.\r\n<br>\r\nCerramos las empanadillas y las barnizamos con huevo batido. Las horneamos a 200Âº durante unos diez minutos hasta que suben y toman un bonito color dorado. Sacamos del horno y espolvoreamos con azÃºcar glass y canela.\r\n<br>\r\nEstÃ¡n tan buenas en caliente como en frÃ­o por lo que si sobran, pueden servir como un excelente tentempiÃ© para la merienda.'),
(28, 'CHILDISH GAMBINO, Â¿QUÃ‰ HAY DETRÃS DEL FENÃ“MENO DEL MOMENTO?', 'music@ucm.es', 5, 'Childish Gambino publicÃ³ el pasado el domingo de su nuevo sencillo, This is America. A partir de ese dÃ­a, tanto el tema como el videoclip se ha convertido en un autÃ©ntico fenÃ³meno.\r\n<br>\r\nDonald Glover, su nombre real, se ha situado como el centro de atenciÃ³n mediÃ¡tico mundial con un videoclip que critica directamente la brutalidad policial de los Estados Unidos. Sin embargo, su carrera musical se remonta varios aÃ±os atrÃ¡s.\r\n<br>\r\nDebutÃ³ en 2011 y desde ese aÃ±o cuenta con tres Ã¡lbumes y varias mixtapes a sus espaldas. Y sÃ­, ha sido el videoclip realizado por Hiro Murai y la contundente sacudida moral que ha supuesto para la sociedad estadounidense y la del resto del mundo lo que ha provocado que su nombre suene allÃ¡ por donde vayas.\r\n<br>\r\nDe hecho, artistas como Adele, Bruno Mars y Kanye West, entre otros, han compartido el clip y mostrado su admiraciÃ³n. Sin embargo, la admiraciÃ³n de Kanye West nos resulta un tanto rara si tenemos en cuenta que Childish Gambino ataca todo aquello que defiende el rapero (apoyar pÃºblicamente a Donald Trump, por ejemplo).\r\n<br>\r\nDetrÃ¡s del nombre artÃ­sitco Childish Gambino se esconde uno de los artistas mÃ¡s crÃ­ticos del momento. En muy pocos dÃ­as suma mÃ¡s de 50 millones de reproducciones, visualizaciones que han despertado mucha concienciaciÃ³n social acerca de los problemas en Estados Unidos.\r\n<br>\r\nEl artista, en el vÃ­deo, baila en una nave industrial con una cadena dorada al cuello y sin camiseta. Mientras, en el fondo, se sucede una especie de pelea, una matanza. Al final, el propio protagonista huye de un montÃ³n de hombres y mujeres blancos (primera vez que aparecen) que lo persiguen.\r\n<br>\r\nEn realidad, todo es una crÃ­tica al horror y la brutalidad policial en Estados Unidos con la raza negra. Es una denuncia social llevada al espectÃ¡culo, una denuncia que esconde una cifra escalofriante: el 39% de personas muertas a manos de la policÃ­a son negros.'),
(29, 'LABRINTH, SIA Y DIPLO SE ALÃAN PARA FORMAR LSD Y LANZAR â€˜GENIUSâ€™', 'music@ucm.es', 5, 'Las dudas han quedado resueltas. PensÃ¡bamos que Sia iba a sacar un nuevo single en colaboraciÃ³n con Diplo y Labrinth, pero no ha sido del todo asÃ­.\r\n<br><br>\r\nEl tema se aleja del estilo que particularmente define a Sia, a Diplo o a Labrinth por separado, pero el resultado es muy pegadizo. Genius tiene influencias de hip-hop, una base muy rÃ­tmica y una melodÃ­a vocal en la que Sia es la absoluta protagonista. \r\n<br><br>\r\nAdemÃ¡s, conforme va sonando la canciÃ³n, tambiÃ©n podemos notar el sonido de castaÃ±uelas, bombos, percusiÃ³n en general e incluso ciertas melodÃ­as reggae en la voz de Labrinth. Eso sÃ­, el resultado del tema podrÃ­amos definirlo como pop contemporÃ¡neo.\r\n<br><br>\r\nA todo esto, hay que aÃ±adir que el vÃ­deo es una explosiÃ³n de color, una especie de euforia ilustrada por Gabriel Alcala, animada por Bento Box Entertainment y dirigida por Ben Jones.'),
(30, 'Cannes 2018', 'cine@ucm.es', 1, 'Cannes, volvemos a encontrarnos. En 2018 tambiÃ©n pasearemos por la Croisette durante las casi dos semanas que dura el festival para poder traeros de primera mano las opiniones sobre las pelÃ­culas mÃ¡s importantes que se estrenan en el certamen francÃ©s. Tanto las que concurran a concurso como las que estÃ©n fuera de la secciÃ³n principal.\r\n<br><br>\r\nA lo largo de los prÃ³ximos dÃ­as este post irÃ¡ creciendo con nuestras impresiones de la gran prueba anual del cine de autor, si es que esa etiqueta significa algo en el septuagÃ©simo primer aniversario de la cita. Un aÃ±o de renovaciÃ³n, dicen desde la organizaciÃ³n. Toca comprobarlo.\r\n'),
(31, 'Rick y Morty ha sido renovada por 70 episodios', 'cine@ucm.es', 1, 'Y nosotros temiendo por su cancelaciÃ³n al llevar un tiempo sin saber si iba a haber cuarta temporada. Pero parece que nuestras plegarias han sido respondidas y Adult Swim acaba de confirmar la renovaciÃ³n de Rick y Morty por un total de 70 episodios mÃ¡s.\r\n<br><br>\r\nNo, no es una errata, es mÃ¡s, lo pondrÃ© tambiÃ©n en letra: SETENTA episodios son los que han encargado en la cadena especializada en la comedia y la animaciÃ³n mÃ¡s adulta. La noticia de que iban a volver al trabajo la han dado Dan Harmon y Justin Roiland, cocreadores de Rick y Morty mientras se estaban dando una ducha.\r\n<br><br>\r\nLo que no sabemos es si esos 70 episodios forman parte de una temporada Ãºnica (como cuando renovaron Anger Management por un centenar de episodios en su segunda temporada) o si se verÃ¡n divididos en varias temporadas. O incluso si harÃ¡n como en Steven Universe y lo lanzarÃ¡n en plan StevenBombs con muchos capÃ­tulos en una semana y hasta la prÃ³xima tanda.\r\n<br><br>\r\nEn cualquier caso parece claro que tendremos Rick y Morty por lo menos hasta bien entrada la dÃ©cada que viene (Â¡los 2020s!), lo cual siempre es una gran alegrÃ­a. La tercera temporada es magnÃ­fica y funcionÃ³ muy bien en EEUU, por lo que hubiera sido raro que no tuviese continuidad.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `mail` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `blogname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`mail`, `password`, `blogname`) VALUES
('cine@ucm.es', '7e240de74fb1ed08fa08d38063f6a6a91462a815', 'Cinefilos'),
('coc@ucm.es', '7e240de74fb1ed08fa08d38063f6a6a91462a815', 'Cocina casera'),
('compu@ucm.es', '7e240de74fb1ed08fa08d38063f6a6a91462a815', 'El computador'),
('music@ucm.es', '7e240de74fb1ed08fa08d38063f6a6a91462a815', 'In-ear'),
('run@ucm.es', '7e240de74fb1ed08fa08d38063f6a6a91462a815', 'Runnerss');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_category`);

--
-- Indices de la tabla `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id_com`),
  ADD KEY `id_post` (`id_post`),
  ADD KEY `mail` (`mail`);

--
-- Indices de la tabla `following`
--
ALTER TABLE `following`
  ADD PRIMARY KEY (`id_follow`),
  ADD KEY `mail_1` (`mail_1`,`mail_2`),
  ADD KEY `mail_2` (`mail_2`);

--
-- Indices de la tabla `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id_like`),
  ADD KEY `id_post` (`id_post`),
  ADD KEY `mail` (`mail`);

--
-- Indices de la tabla `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id_post`),
  ADD KEY `id_category` (`id_category`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`mail`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comments`
--
ALTER TABLE `comments`
  MODIFY `id_com` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `following`
--
ALTER TABLE `following`
  MODIFY `id_follow` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `likes`
--
ALTER TABLE `likes`
  MODIFY `id_like` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `post`
--
ALTER TABLE `post`
  MODIFY `id_post` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`mail`) REFERENCES `user` (`mail`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`id_post`) REFERENCES `post` (`id_post`);

--
-- Filtros para la tabla `following`
--
ALTER TABLE `following`
  ADD CONSTRAINT `following_ibfk_1` FOREIGN KEY (`mail_1`) REFERENCES `user` (`mail`),
  ADD CONSTRAINT `following_ibfk_2` FOREIGN KEY (`mail_2`) REFERENCES `user` (`mail`);

--
-- Filtros para la tabla `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_ibfk_1` FOREIGN KEY (`id_post`) REFERENCES `post` (`id_post`),
  ADD CONSTRAINT `likes_ibfk_2` FOREIGN KEY (`mail`) REFERENCES `user` (`mail`);

--
-- Filtros para la tabla `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id_category`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
