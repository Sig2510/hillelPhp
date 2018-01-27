<?php

  class GetSortedPosts extends BasePage {
    private $postModel;

    public function __construct() {
      $this->postModel = new Post();
    }

    protected function get() {
      $posts = $this->postModel->getSortedPosts();
      require_once './view/index.php';
    }
  }
