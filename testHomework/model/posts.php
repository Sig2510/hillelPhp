<?php
  $posts = [];
  function posts($numbers = 5){
    /*
      for($i = 0; $i < $number; $i++){
        $posts[] = [
          'title' => 'title '. ($i+1),
          'body' => 'body',
          'author' => 'admin',
        ];
      } */
      $posts = file('db/db.txt');

      foreach ($posts as &$value) {
        $value = explode('|', $value);
      }

      return $posts;
  }

  function post($id){
      /*return [
      'title' => 'title '. ($id+1),
      'body' => 'body',
      'author' => 'admin',
    ];*/
    
      return $posts[$id];

  }
