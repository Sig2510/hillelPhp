<?php

  class GetPostsByAuthor extends BasePage {
    private $postModel;

    public function __construct() {
      $this->postModel = new Post();
    }

    protected function get() {
      $posts = $this->postModel->getPostsByAuthor();
      require_once './view/index.php';
    }
  }
