<?php
function getRandomPsw($length, $array) {
  $password = '';
  if(!empty($array)) {
    for ($i=0; $i < $length; $i++) {
      $randomIndex = rand(0, (count($array) - 1));
      $password .= $array[$randomIndex];
    }
    header('Location: ./success.php');
    return $password;
  }
}

function getUniqueRandowPsw($length, $array) {
  $password = '';
  while((strlen($password) !== $length)) {
    $randomIndex = rand(0, (count($array) - 1));
    if(!str_contains($array[$randomIndex], $password)) {
      $password .= $array[$randomIndex];
    }
  }
  header('Location: ./success.php');
  return $password;
}

?>