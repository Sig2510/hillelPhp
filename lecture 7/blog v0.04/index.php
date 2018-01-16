<?php
  require_once './model/base_model.php';
  require_once './model/post.php';

  require_once './router.php';

  require_once './actions/base_page.php';
  require_once './actions/index_page.php';
  require_once './actions/post_page.php';
  require_once './actions/add_post_page.php';
  require_once './actions/delete_page.php';
  require_once './actions/get_titles.php';
  require_once './actions/get_even_posts.php';
  require_once './actions/get_sorted_posts.php';

  $router = new Router($_GET, $_POST);

  $router->attach('indexPage', new IndexPage());
  $router->attach('postPage', new PostPage());
  $router->attach('addPostPage', new AddPostPage());
  $router->attach('deletePostPage', new DeletePostPage());
  $router->attach('getTitles', new GetTitles());
  $router->attach('getEvenPosts', new GetEvenPosts());
  $router->attach('getSortedPosts', new GetSortedPosts());

  $router->serve();
