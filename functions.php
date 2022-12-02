<?php
function getRandomPsw($length, $array) {
  $password = '';
  for ($i=0; $i < $length; $i++) {
    $randomIndex = rand(0, (count($array) - 1));
    $password .= $array[$randomIndex];
    header('Location: ./success.php');
  }
  return $password;
}
?>