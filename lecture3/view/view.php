<!doctype html>
<html lang="en">
  <head>
    <title>My Blog</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="shortcut icon" href="src\icon\favicon.ico?v=1" type="image/x-icon">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  </head>
  <body>
    <nav aria-label="breadcrumb" role="navigation">
      <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page"><a href="/">Home</a></li>
      </ol>
    </nav>
    <div class="container">
      <div class="row justify-content-md-center">
        <div class="col-md-center">
            <h1>Hello, user! This is my first blog!</h1>
        </div>
          <?php foreach ($posts as $index => $post) { ?>
            <div class="col-md-10">
              <div class="jumbotron jumbotron-fluid">
                <div class="container">

                    <h1 class="display-3"><?php echo $post[0].' '.($index+1); ?></h1>

                  <p class="lead"><?php echo substr($post[1], 0, 97).'...'; ?></p>
                  <p class="lead"><i>author: <?php echo $post[2]; ?></i></p>
                  <a href="/post.php?id=<?php echo $index?>">
                    <p class="text-right">Read more</p>
                  </a>
                </div>
              </div>
            </div>
          <?php } ?>
      </div>
    </div>
  </body>
</html>
