<?php
  class GetStat extends BasePage {
    private $postModel;

    public function __construct() {
      $this->postModel = new Post();
    }

    protected function get() {
      $stat = $this->postModel->getStat();
      $avg = $this->postModel->getAvgStat();
      if (isset($stat)) {
        require_once './view/stat.php';
      } else {
        $this->notFound();
      }
    }
  }
