<?php

function divideBy15_Or3_Or5($number){
  if($number % 15 == 0){
    return 1;
  } else if($number % 3 == 0){
    return 2;
  } else if($number % 5 == 0){
    return 3;
  } else {
    return 4;
  }
}

  for($i = 1; $i < 101; $i++){

    switch (divideBy15_Or3_Or5($i)) {
      case 1:
        echo 'fizzBazz';
        break;

      case 2:
        echo 'fizz';
        break;

      case 3:
        echo 'bazz';
        break;

      case 4:
        echo $i;
        break;
    }
  }
