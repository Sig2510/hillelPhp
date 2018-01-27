<?php

class UpdateCommentPage extends BasePage {
  protected $commentModel;

  public function __construct() {
    $this->commentModel = new Comment();
  }

  public function get() {
    $comment = $this->commentModel->getCommentById($this->getData['id']);
    require_once './view/update_comment.php';
  }

  public function post() {
    $this->commentModel->updateComment($this->postData['id'],
                                       $this->postData['body'],
                                       $this->postData['author']);

    $this->redirect('/post&id=' . $this->postData['post_id']);
  }
}
