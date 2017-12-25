<?php
  $ar11 = ['a', 'b', 'c', 'd', 'e',];
  $ar22 = [1, 2, 3, 4,];

  $res = [];

  function arrayCompound($ar1, $ar2){
    $result = [];

    $sizeAr1 = count($ar1);
    $sizeAr2 = count($ar2);

    $whoIsBigger = $sizeAr1 > $sizeAr2;

    if($whoIsBigger){
      for($i = 0; $i < $sizeAr1; $i++){
        $result[] = $ar1[$i];
        if($i < $sizeAr2){
          $result[] = $ar2[$i];
        }
      }
    } else {
      for($i = 0; $i < $sizeAr2; $i++){
        $result[] = $ar2[$i];
        if($i < $sizeAr1){
          $result[] = $ar1[$i];
        }
      }
    }
    return $result;
  }

  $res = arrayCompound($ar11, $ar22);

  var_dump($res);
