<?php
  class ErrorPage extends Page {
    public function process($text = 'Please, enter correct numbers'){
      $error = $text;
      require_once './view/error_page.php';
    }
  }
