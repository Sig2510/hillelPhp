<?php
  class Page {
    protected $getData;
    protected $postData;

    public function process($postData, $getData) {
      $this->postData = $postData;
      $this->getData = $getData;

      if(empty($this->postData)) {
        $this->get();
      } else {
        $this->post();
      }
    }
  }
