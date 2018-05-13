<!DOCTYPE html>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<head>
  <title>Error</title>
</head>
<body>
  <h1>Error :(</h1>
  <?php
  session_start();
  echo $_SESSION['data_error'];
  ?>

</body>
</html>
