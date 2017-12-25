<?php
  $ar11 = ['a', 'b', 'c', 'd', 'e',];
  $ar22 = [1, 2, 3, 4,];

  $res = [];

  function arrayBonding($ar1, $ar2){
    $result = [];

    foreach ($ar1 as $value) {
      $result[] = $value;
    }

    foreach ($ar2 as $value) {
      $result[] = $value;
    }

    return $result;
  }

  $res[] = arrayBonding($ar11, $ar22);

  var_dump($res);
