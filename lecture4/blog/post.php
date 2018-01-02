<?php
  require_once '/model/posts.php';
  require_once '/model/getId.php';

  $postObj = new Post();
  $postsCount = count($postObj->getPosts());

  $idCheck= new IdChecker();
  $id = $idCheck->getId();


  if($id > $postsCount-1){
    require_once '/view/404.php';
  } else {
    $post = $postObj->getPost($id);

    require_once '/view/post.php';
  }
