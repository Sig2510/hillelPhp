<?php
  class DeletePost extends BasePage {
    private $postModel;

    public function __construct() {
      $this->postModel = new Post();
    }

    protected function post() {
      var_dump($this->postData);
      $this->postModel->deletePost($this->postData['id']);
      require_once './view/deleted_post_page.php';
    }

  }
