<?php
  require_once "/model/posts.php";

  if(!isset($_GET['id'])) {
    header('location /');
  }

  $post = post(posts());
  if($post != null){
    require_once "/view/post.php";
  } else {
    require('view/404.php');
  }
