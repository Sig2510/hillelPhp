<!doctype html>
<html lang="en">
  <head>
    <title>Hello, world!</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  </head>
  <body>
    <nav aria-label="breadcrumb" role="navigation">
      <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">
          <a href="/">Home</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">
          <a href="/index.php?r=/addPost">Add new post</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">
          <a href="/index.php?r=/getTitles">Get all titles</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">
          <a href="/index.php?r=/getEvenPosts">Get even posts</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">
          <a href="/index.php?r=/getFiveLastComments">Get 5 last comments</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">
          <a href="/index.php?r=/getSortedComments">Get comments by post realese</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">
          <a href="/index.php?r=/getStat">Get statistics</a>
        </li>
      </ol>
    </nav>
    </div>
    <div class="container">
      <div class="row justify-content-md-center">
        <div class="col-md-center">
          <div class="btn-group-sm" role="group" aria-label="sort blog">
            <a href="/index.php?r=/getSortedPosts">
              <button type="button" class="btn btn-secondary">Sort by date</button>
            </a>
            <a href="/index.php?r=/getPostsByTitle">
              <button type="button" class="btn btn-secondary">Sort by title</button>
            </a>
            <a href="/index.php?r=/getPostsByAuthor">
              <button type="button" class="btn btn-secondary">Sort by author</button>
            </a>
          </div>
        </div>
      </div>
      <div class="row justify-content-md-center">
        <div class="col-md-center">
            <h1>Hello, user! This is my first blog!</h1><br>
        </div>
        <?php if ($this->isLoggedIn()) { ?>
          <form method="POST" action="/index.php?r=/logout">
            <input type="submit" class="btn btn-danger" name="logout" value="Logout!">
          </form>
        <?php } else { ?>
          <a href="/?r=/register">register</a>
          <a href="/?r=/login">login</a>
        <?php } ?>
        <div class="container" >
          <div class="row justify-content-md-center">
            <form method="POST" action="/index.php?r=/getCountOperations" class="form-inline">
              <div class="form-group mb-2">
                <input type="text" readonly class="form-control-plaintext" value="Enter author name!">
              </div>
              <div class="form-group mx-sm-3 mb-2">
                <input type="text" class="form-control" name="author" placeholder="Author name">
              </div>
              <input type="submit" class="btn btn-primary mb-2" value="Checkout">
            </form>
          </div>
        </div>
        <?php foreach ($posts as $post) { ?>
          <div class="col-md-10">
            <div class="jumbotron jumbotron-fluid">
              <div class="container">
                <h1 class="display-3"><?php echo $post['title']; ?></h1>
                <p class="lead"><?php echo substr($post['body'], 0, 97).'...'; ?></p>
                <p class="text-md-right"><i>author: <?php echo $post['username']; ?></i></p>
                <?php if (isset($post['comments_count'])) { ?>
                  <p class="lead">Comments count: <?php echo $post['comments_count']; ?></p>
                  <?php if(isset($comments)) { ?>
                      <?php foreach ($comments as $comment) { ?>
                      <?php if($comment['post_id'] == $post['id']) { ?>
                        <p class="lead"><b>Last comment:</b>
                          <?php echo substr($comment['body'], 0, 40).'...'; ?>
                        </p>
                        <?php break; ?>
                      <?php } ?>
                    <?php } ?>
                  <?php } ?>
                <?php } ?>
                <a href="/index.php?r=/post&id=<?php echo $post['id']?>">
                  <p class="text-right">Read more</p>
                </a>
                <form method="POST" action="/index.php?r=/deletePost">
                  <input type="hidden" value="<?php echo $post['id'] ?>" name="id">
                  <input type="submit" value="Destroy!" class="btn btn-default">
                </form>
              </div>
            </div>
          </div>
        <?php } ?>
        <?php if(isset($pageNumber)) { ?>
        <nav>
          <ul class="pagination">
            <li class="page-item <?php if ($currentPage == 1) { echo 'active'; } ?>">
              <a class="page-link" href="/index.php?r=/&page=1">First page</a>
            </li>
            <?php
                $start = ($currentPage < 4) ? 1 : $currentPage - 3;
                $stop = ($currentPage > $pageNumber - 3) ? $pageNumber : $currentPage + 3;

                for($i = $start; $i <= $stop; $i++) { ?>
                <li class="page-item <?php if ($i == $currentPage) { echo 'active'; } ?>">
                  <a class="page-link" href="/index.php?r=/&page=<?php echo $i; ?>"><?php echo $i; ?></a>
                </li>
            <?php } ?>
            <li class="page-item <?php if ($currentPage == $pageNumber) { echo 'active'; } ?>">
              <a class="page-link" href="/index.php?r=/&page=<?php echo $pageNumber; ?>">Last page</a>
            </li>
          </ul>
        </nav>
        <?php } ?>
      </div>
    </div>
  </body>
</html>
