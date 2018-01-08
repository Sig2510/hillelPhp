<?php
  require_once './model/calculator.php';
  require_once './model/validator.php';

  require_once './router.php';

  require_once './actions/page.php';
  require_once './actions/main_page.php';
  require_once './actions/result_page.php';
  require_once './actions/error_page.php';

  $router = new Router($_POST, $_GET);

  $router->attach('mainPage', new MainPage());
  $router->attach('resultPage', new ResultPage());
  $router->attach('errorPage', new ErrorPage());

  $router->queryProcess();
