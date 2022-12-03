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
  while(strlen($password) < $length) {
    $randomIndex = rand(0, (count($array) - 1));
    if(!str_contains($password, $array[$randomIndex])) {
      $password .= $array[$randomIndex];
      //Splice to remove character just selected, this to avoid
      //too many iterations for random reselection of the same element
      array_splice($array, $randomIndex, 1); 
    }
  }

  header('Location: ./success.php');
  return $password;
}

?>