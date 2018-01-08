<?php
  class MyValidator {

    public function checkData($num1, $num2){
      $numb1 = $num1;
      $numb2 = $num2;
      
      if(!is_numeric($numb1) || !is_numeric($numb2)) {
        return false;
      } else {
        return true;
      }
    }

  }
