<?php
  $str = 'qwertyshop';

  function strRevB($str){
    $arr = str_split($str);
    $size = count($arr);
    $result = '';

    for ($i = ($size-1); $i > -1; $i--) {
      $result .= $arr[$i];
    }

    return $result;
  }

  echo strRevB($str);
