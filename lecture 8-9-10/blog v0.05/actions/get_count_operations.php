<?php
  class GetCountOperations extends BasePage{
    private $postModel;

    public function __construct() {
      $this->postModel = new Post();
    }

    protected function post() {
      $author = $this->postData['author'];
      $tResult = $this->getCount($author);
      $postsCount = $tResult[0]['count'];
      $commentsCount = $tResult[1]['count'];
      require_once './view/count_page.php';
    }

    private function getCount($author) {
      return $this->postModel->getCountOperationsByAuthor($author);
    }
  }
