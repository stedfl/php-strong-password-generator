<?php
require_once  __DIR__ . '/functions.php';

$isCorrectLength = false;


if(isset($_GET['psw_length'])) {
  if($_GET['psw_length'] > 7 && $_GET['psw_length'] < 33 ) {
    $isCorrectLength = true;
    
  } else {
    $isCorrectLength = false;
  }
}



$letters = ["A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z", "a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z"];

$numbers = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
$special_characters = ['!', '?', '&', '%', '$', '<', '>', '^', '+', '-', '*', '/', '(', ')', '[', ']', '{', '}', '@','#', '_', '='];

session_start();
$mergedArray = [];
if($isCorrectLength && isset($_GET['characters'])) {
  if(count($_GET['characters']) === 3 ) {
    $mergedArray = array_merge($letters, $numbers, $special_characters);
  } else if (count($_GET['characters']) === 2 ) {
    if(in_array('0' , $_GET['characters']) && in_array('1' , $_GET['characters']) ) {
      $mergedArray = array_merge($letters, $numbers);
    } else if (in_array('0' , $_GET['characters']) && in_array('2' , $_GET['characters'])) {
      $mergedArray = array_merge($letters, $special_characters);
    } else {
      $mergedArray = array_merge($numbers, $special_characters);
    }
  } else {
    if(in_array('1' , $_GET['characters'])) {
      if ($_GET['psw_length'] > count($numbers)) {
        $_GET['psw_length'] = count($numbers);
      }
      $mergedArray = $numbers;
    } else if (in_array('2' , $_GET['characters'])) {
      if ($_GET['psw_length'] > count($special_characters)) {
        $_GET['psw_length'] = count($special_characters);
      }
      $mergedArray = $special_characters;
    } else {
      $mergedArray = $letters;
    }
  }
  $_SESSION['password'] = getRandomPsw($_GET['psw_length'], $mergedArray );
} else if (($isCorrectLength && !isset($_GET['characters']))) {
  $mergedArray = array_merge($letters, $numbers, $special_characters);
  $_SESSION['password'] = getRandomPsw($_GET['psw_length'], $mergedArray );
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Password Generator</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <div class="main-wrap w-100 d-flex align-items-center justify-content-center">
    <div class="container w-50 p-4 ">
      <h1 class="text-white text-center">Generatore Password Sicure</h1>
      <p class="text-white text-center">Genera una password sicura</p>
      <?php if(!isset($_GET['psw_length'])) : ?>
      <div class="msg info py-3 px-4">
        <p class="info-psw mb-0">Scegliere una password con un minimo di 8 ed un massimo di 32 caratteri</p>
      </div>
      <?php elseif(!$isCorrectLength) :?>
      <div class="msg error py-3 px-4 ">
        <p class="error mb-0">Errore! La lunghezza della password deve essere compresa tra un minimo di 8 ed un massimo di 32 caratteri</p>
      </div>
      <?php endif; ?>
      <div class="settings p-3 mt-3">
        <form action="" method="GET">
          <div class="d-flex align-items-center">
            <label for="exampleFormControlInput1" class="form-label me-2 w-50">Lunghezza password:</label>
            <input type="number" name="psw_length" class="form-control w-25 " id="exampleFormControlInput1" placeholder="numero">
          </div>

          <div class="d-flex align-items-center my-5">
            <label for="exampleFormControlInput1" class="form-label me-2 w-50">Scegli se includere:</label>
            <div class="check">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="0" name="characters[]" id="flexCheckIndeterminateDisabled">
                <label class="form-check-label" for="flexCheckIndeterminateDisabled">
                  Lettere
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="1" name="characters[]" id="flexCheckIndeterminateDisabled">
                <label class="form-check-label" for="flexCheckIndeterminateDisabled">
                  Numeri
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="2" name="characters[]" id="flexCheckIndeterminateDisabled">
                <label class="form-check-label" for="flexCheckIndeterminateDisabled">
                  Caratteri speciali
                </label>
              </div>
            </div>
          </div>
          
          <div class="buttons">
            <button class="btn btn-primary" type="submit">Invia</button>
            <button class="btn btn-secondary" type="reset">Annulla</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
</html>