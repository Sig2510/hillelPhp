<?php
  class MyCalculator {
    private $number_one;
    private $number_two;

    public function __construct ($num1 = 0, $num2 = 0){
      $this->number_one = $num1;
      $this->number_two = $num2;
    }

    public function checkData(){
      if(!is_numeric($this->number_one) || !is_numeric($this->number_two)) {
        return "Please, enter correct Numbers!";
      } else {
        return true;
      }
    }

    public function myAdd() {
        return $this->number_one + $this->number_two;
    }

    public function mySub() {
      return $this->number_one - $this->number_two;
    }

    public function myMulti() {
      return $this->number_one * $this->number_two;
    }

    public function myDiv() {
      if($this->number_two == 0){
        $exep = new Exception("Can't divide by 0!");
        return $exep;
      } else {
        return $this->number_one / $this->number_two;
      }
    }
  }
