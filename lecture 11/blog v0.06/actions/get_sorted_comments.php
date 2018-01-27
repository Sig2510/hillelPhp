<?php

  class GetSortedComments extends BasePage {
    private $commentsModel;

    public function __construct() {
      $this->commentsModel = new Comment();
    }

    protected function get() {
      $comments = $this->commentsModel->getCommentsByParentRealese();
      require_once './view/comments.php';
    }
  }
