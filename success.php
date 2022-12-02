<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
  <title>Generatore Password</title>
</head>
<body>
<div class="main-wrap w-100 d-flex align-items-center justify-content-center">
    <div class="container w-50 p-4 ">
      <h1 class="text-white text-center mb-4">La password generata è</h1>
      <div class="msg info py-3 px-4">
        <p class="psw text-dark text-center mb-0">
          <?php echo $_SESSION['password'] ?>
        </p>
        <a href="./index.php" class="btn btn-info mt-3">Torna alla homepage</a>
      </div>
      
    </div>
</div>
</body>
</html>