<?php
  session_start();

  require_once './model/base_model.php';
  require_once './model/post.php';
  require_once './model/comment.php';
  require_once './model/user.php';

  require_once './router.php';

  require_once './actions/base_page.php';
  require_once './actions/index_page.php';
  require_once './actions/post_page.php';
  require_once './actions/add_post_page.php';
  require_once './actions/delete_page.php';
  require_once './actions/get_titles.php';
  require_once './actions/get_even_posts.php';
  require_once './actions/get_sorted_posts.php';
  require_once './actions/get_five_last_comments.php';
  require_once './actions/update_post_page.php';
  require_once './actions/get_sorted_comments.php';
  require_once './actions/get_count_operations.php';
  require_once './actions/update_comment_page.php';
  require_once './actions/get_posts_by_title.php';
  require_once './actions/get_posts_by_author.php';
  require_once './actions/get_stat.php';
  require_once './actions/register_user_page.php';
  require_once './actions/login_user_page.php';
  require_once './actions/logout_user_page.php';

  $router = new Router($_GET, $_POST, $_SESSION, $_SERVER);

  $router->attach('indexPage', new IndexPage());
  $router->attach('postPage', new PostPage());
  $router->attach('addPostPage', new AddPostPage());
  $router->attach('deletePostPage', new DeletePostPage());
  $router->attach('getTitles', new GetTitles());
  $router->attach('getEvenPosts', new GetEvenPosts());
  $router->attach('getSortedPosts', new GetSortedPosts());
  $router->attach('getFiveLastComments', new GetFiveLastComments());
  $router->attach('updatePostPage', new UpdatePostPage());
  $router->attach('getSortedComments', new GetSortedComments());
  $router->attach('getCountOperations', new GetCountOperations());
  $router->attach('updateComment', new UpdateCommentPage());
  $router->attach('getPostsByTitle', new GetPostsByTitle());
  $router->attach('getPostsByAuthor', new GetPostsByAuthor());
  $router->attach('getStat', new GetStat());
  $router->attach('registerPage', new RegisterUserPage());
  $router->attach('loginPage', new LoginUserPage());
  $router->attach('logoutPage', new LogoutUserPage());

  $router->serve();
