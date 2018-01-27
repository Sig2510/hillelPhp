<?php

  class IndexPage extends BasePage {
    private $postModel;
    private $commentModel;

    public function __construct() {
      $this->postModel = new Post();
      $this->commentModel = new Comment();
    }

    protected function get() {
      if (isset($this->getData['page'])) {
        $currentPage = $this->getData['page'];
      } else {
        $currentPage = 1;
      }

      if (isset($this->session['username'])) {
        echo 'Hello, ' . $this->session['username'] . '!';
      } 

      $posts = $this->postModel->getPosts($currentPage);
      $pageNumber = $this->postModel->pageNumber();
      $comments = $this->commentModel->getAllComments();
      require_once './view/index.php';
    }
  }
