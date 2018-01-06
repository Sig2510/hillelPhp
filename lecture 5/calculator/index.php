<?php
  require_once './model/calculator.php';

  require_once './router.php';

  require_once './actions/page.php';
  require_once './actions/main_page.php';
  require_once './actions/result_page.php';

  $router = new Router($_POST);

  $router->attach('mainPage', new MainPage());
  $router->attach('resultPage', new ResultPage());

  $router->queryProcess();
