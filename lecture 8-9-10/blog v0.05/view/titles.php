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
          <a href="/index.php?r=/getSortedPosts">Sort posts by publish date</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">
          <a href="/index.php?r=/getFiveLastComments">Get 5 last comments</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">
          <a href="/index.php?r=/getSortedComments">Get comments by post realese</a>
        </li>
      </ol>
    </nav>
    <div class="container">
      <div class="row justify-content-md-center">
        <div class="col-md-10">
          <a href="/"><h1>Hello, user!</h1></a>
        </div>
        <?php foreach ($post as $title) { ?>
          <div class="col-md-10">
            <div class="jumbotron jumbotron-fluid">
              <div class="container">
                <a href="/index.php?r=/post&id=<?php echo $index; ?>">
                  <h1 class="display-3">
                    <?php echo $title['title']; ?>
                  </h1>
                </a>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
  </body>
</html>
