<?php
  class DeletePost extends BasePage {
    private $postModel;

    public function __construct() {
      $this->postModel = new Post();
    }

    protected function post() {
      $this->postModel->deletePost($this->postData['id']);
      require_once './view/deleted_post_page.php';
    }

  }
