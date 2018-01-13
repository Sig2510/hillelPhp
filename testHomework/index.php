<?php
  require_once 'vendor/autoload.php';

  $loader = new Twig_Loader_Filesystem('view');
  $twig = new Twig_Environment($loader);

  //$template = $twig->loadTemplate('index.php');

  require_once './model/post.php';

  require_once './router.php';

  require_once './actions/base_page.php';
  require_once './actions/index_page.php';
  require_once './actions/post_page.php';

  $router = new Router($_GET);

  //$router->attach('indexPage', new IndexPage());
  //$router->attach('postPage', new PostPage());

  $router->serve($twig);

  /*echo $template->render(array(
    'title' => $title,
  ));*/
