<?php
  $str = 'qwertyuiopxcvbnm';

  function isPangram($str){
    $alphabet = 'qwertyuiopasdfghjklzxcvbnm';
    $alphSize = strlen($alphabet);

    $arr = str_split($str);
    $arrSize = count($arr);

    if($arrSize >= $alphSize){
      foreach ($arr as $value) {
        $temp = strpos($alphabet, $value);
        if($temp === false){
          return "String isn't pangram!";
        }
      }
    } else {
      return "String isn't pangram!";
    }

    return "String is pangram!";
  }

  echo isPangram($str);
