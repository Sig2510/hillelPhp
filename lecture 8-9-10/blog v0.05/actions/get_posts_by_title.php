<?php

  class GetPostsByTitle extends BasePage {
    private $postModel;

    public function __construct() {
      $this->postModel = new Post();
    }

    protected function get() {
      $posts = $this->postModel->getPostsByTitle();
      require_once './view/index.php';
    }
  }
