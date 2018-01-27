<?php

  class GetEvenPosts extends BasePage {
    private $postModel;

    public function __construct() {
      $this->postModel = new Post();
    }

    protected function get() {
      $posts = $this->postModel->getEvenPosts();
      require_once './view/index.php';
    }
  }
