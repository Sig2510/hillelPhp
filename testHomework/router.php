<?php

class Router {
  const ROUTE_KEY = 'r';

  private $getArray;
  private $actionArray = [];
  private $postModel;

  public function __construct($getArray) {
    $this->getArray = $getArray;
    $this->postModel = new Post();
  }

  public function attach($actionName, $action) {
    $this->actionArray[$actionName] = $action;
  }

  public function serve($twig) {
    $posts = $this->postModel->getPosts();
    switch ($this->getArray[self::ROUTE_KEY]) {
      case '/':
        //$template = $twig->loadTemplate('index.php');
        echo $twig->render('index.php', array('posts' => $posts,));
        break;

      case '/post':
        $template = $twig->loadTemplate('post.php');
        echo $template->render(array());
        break;

      default:
        header('location: /index.php?r=/');
        break;
    }
  }

  public function dump() {
    var_dump($this);
  }

}
