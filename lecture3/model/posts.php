<?php

  function posts(){
    $posts = file('db/db.txt');

    foreach ($posts as &$value) {
      $value = explode('|', $value);
    }
      return $posts;
  }

  function post($post){
    $id = $_GET['id']+0;

    if(!isset($post[$id])){
      return null;
    } else{
      $post[$id][0] = $post[$id][0].' '.($id+1);
      return $post[$id];
    }
  }
