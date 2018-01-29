<?php
  require_once './model/connect.php';
  require_once './model/taxi.php';
  require_once './model/validator.php';

  require_once './actions/page.php';
  require_once './actions/main_page.php';

  require_once 'router.php';

  $router = new Router($_POST, $_GET);

  $router->attach('mainPage', new MainPage());

  $router->serve();
