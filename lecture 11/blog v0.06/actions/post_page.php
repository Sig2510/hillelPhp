<?php

  class PostPage extends BasePage {
    private $postModel;
    private $commentModel;

    public function __construct() {
      $this->postModel = new Post();
      $this->commentModel = new Comment();
    }

    protected function get() {
      $post = $this->postModel->getPost($this->getData['id']);
      if ($post == false) {
        $this->notFound();
      } else {
        $comments = $this->commentModel->getCommentByPostId($this->getData['id']);
        require_once './view/post.php';
      }
    }


  }
