<?php

  class GetFiveLastComments extends BasePage {
    private $commentsModel;

    public function __construct() {
      $this->commentsModel = new Comment();
    }

    protected function get() {
      $comments = $this->commentsModel->getFiveLastComments();
      require_once './view/comments.php';
    }
  }
