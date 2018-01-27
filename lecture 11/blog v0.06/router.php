<?php

class Router {
  const ROUTE_KEY = 'r';

  private $getArray;
  private $postArray;
  private $session;
  private $actionArray = [];

  public function __construct($getArray, $postArray, &$session, $server) {
    $this->getArray = $getArray;
    $this->postArray = $postArray;
    $this->session =& $session;
    $this->server = $server;
  }

  public function attach($actionName, $action) {
    $this->actionArray[$actionName] = $action;
  }

  public function serve() {
    switch ($this->getArray[self::ROUTE_KEY]) {
      case '/':
        $this->actionArray['indexPage']->process($this->server['REQUEST_METHOD'], $this->getArray, $this->postArray, $this->session);
        break;
      case '/post':
        $this->actionArray['postPage']->process($this->server['REQUEST_METHOD'], $this->getArray, $this->postArray, $this->session);
        break;
      case '/addPost':
        $this->actionArray['addPostPage']->process($this->server['REQUEST_METHOD'], $this->getArray, $this->postArray, $this->session);
        break;
      case '/deletePost':
        $this->actionArray['deletePostPage']->process($this->server['REQUEST_METHOD'], $this->getArray, $this->postArray, $this->session);
        break;
      case '/getTitles':
        $this->actionArray['getTitles']->process($this->server['REQUEST_METHOD'], $this->getArray, $this->postArray, $this->session);
        break;
      case '/getEvenPosts':
        $this->actionArray['getEvenPosts']->process($this->server['REQUEST_METHOD'], $this->getArray, $this->postArray, $this->session);
        break;
      case '/getSortedPosts':
        $this->actionArray['getSortedPosts']->process($this->server['REQUEST_METHOD'], $this->getArray, $this->postArray, $this->session);
        break;
      case '/getFiveLastComments':
        $this->actionArray['getFiveLastComments']->process($this->server['REQUEST_METHOD'], $this->getArray, $this->postArray, $this->session);
        break;
      case '/updatePost':
        $this->actionArray['updatePostPage']->process($this->server['REQUEST_METHOD'], $this->getArray, $this->postArray, $this->session);
        break;
      case '/getSortedComments':
        $this->actionArray['getSortedComments']->process($this->server['REQUEST_METHOD'], $this->getArray, $this->postArray, $this->session);
        break;
      case '/getCountOperations':
        $this->actionArray['getCountOperations']->process($this->server['REQUEST_METHOD'], $this->getArray, $this->postArray, $this->session);
        break;
      case '/updateComment':
        $this->actionArray['updateComment']->process($this->server['REQUEST_METHOD'], $this->getArray, $this->postArray, $this->session);
        break;
      case '/getPostsByTitle':
        $this->actionArray['getPostsByTitle']->process($this->server['REQUEST_METHOD'], $this->getArray, $this->postArray, $this->session);
        break;
      case '/getPostsByAuthor':
        $this->actionArray['getPostsByAuthor']->process($this->server['REQUEST_METHOD'], $this->getArray, $this->postArray, $this->session);
        break;
      case '/getStat':
        $this->actionArray['getStat']->process($this->server['REQUEST_METHOD'], $this->getArray, $this->postArray, $this->session);
        break;
      case '/register':
        $this->actionArray['registerPage']->process($this->server['REQUEST_METHOD'], $this->getArray, $this->postArray, $this->session);
        break;
      case '/login':
        $this->actionArray['loginPage']->process($this->server['REQUEST_METHOD'], $this->getArray, $this->postArray, $this->session);
        break;
      case '/logout':
        $this->actionArray['logoutPage']->process($this->server['REQUEST_METHOD'], $this->getArray, $this->postArray, $this->session);
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
