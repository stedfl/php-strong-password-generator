<?php
require_once  __DIR__ . '/functions.php';

$is_correct_length = false;
$min_psw_len = 8;
$max_psw_len = 32;

if(isset($_GET['psw_length'])) {
  if($_GET['psw_length'] >= $min_psw_len && $_GET['psw_length'] <= $max_psw_len) {
    $is_correct_length = true;
  } else {
    $is_correct_length = false;
  }
}

$charsets = [
  "letters" => ["A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z", "a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z"],
  "numbers" => ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'],
  "specials" => ['!', '?', '&', '%', '$', '<', '>', '^', '+', '-', '*', '/', '(', ')', '[', ']', '{', '}', '@','#', '_', '=']
];

session_start();
$merged_array = [];

if($is_correct_length) {
  if(isset($_GET['characters'])) {
    foreach($_GET['characters'] as $charset_key) {
      $merged_array = array_merge($merged_array, $charsets[$charset_key]);
    }
  } else {
    $merged_array = array_merge($charsets['letters'], $charsets['numbers'], $charsets['specials']);
  }

  if($_GET['psw_length'] > count($merged_array)) {
    $new_length = count($merged_array);
  } else {
    $new_length = $_GET['psw_length'];
  }

  if(isset($_GET['ripetition']) && $_GET['ripetition'] === 'false') {
    $_SESSION['password'] = getUniqueRandowPsw($new_length, $merged_array);
  } else {
    $_SESSION['password'] = getRandomPsw($new_length, $merged_array);
  }
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
      <?php elseif(!$is_correct_length) :?>
      <div class="msg error py-3 px-4 ">
        <p class="error mb-0">Errore! La lunghezza della password deve essere compresa tra un minimo di <?php echo $min_psw_len ?> ed un massimo di <?php echo $max_psw_len ?> caratteri</p>
      </div>
      <?php endif; ?>
      <div class="settings p-3 mt-3">
        <form action="" method="GET">
          <div class="d-flex align-items-center">
            <label for="exampleFormControlInput1" class="form-label me-2 w-50">Lunghezza password:</label>
            <input type="number" name="psw_length" class="form-control w-25 " id="exampleFormControlInput1" placeholder="numero">
          </div>

          <div class="d-flex align-items-center mt-5">
            <label for="exampleFormControlInput1" class="form-label me-2 w-50">Scegli se includere:</label>
            <div class="check">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="letters" name="characters[]" id="flexCheckIndeterminateDisabled">
                <label class="form-check-label" for="flexCheckIndeterminateDisabled">
                  Lettere
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="numbers" name="characters[]" id="flexCheckIndeterminateDisabled">
                <label class="form-check-label" for="flexCheckIndeterminateDisabled">
                  Numeri
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="specials" name="characters[]" id="flexCheckIndeterminateDisabled">
                <label class="form-check-label" for="flexCheckIndeterminateDisabled">
                  Caratteri speciali
                </label>
              </div>
            </div>
          </div>
          <div class="d-flex align-items-center mt-5">
            <label for="exampleFormControlInput1" class="form-label me-2 w-50">Consenti o no ripetizione dei caratteri:</label>
            <div class="radio">
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="ripetition" value="true" id="flexRadioDefault1">
                <label class="form-check-label" for="flexRadioDefault1" >
                  Si
                </label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="ripetition" value="false" id="flexRadioDefault2" >
                <label class="form-check-label" for="flexRadioDefault2">
                  No
                </label>
              </div>
            </div>
          </div>
          
          <div class="buttons mt-5">
            <button class="btn btn-primary" type="submit">Invia</button>
            <button class="btn btn-secondary" type="reset">Annulla</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
</html>