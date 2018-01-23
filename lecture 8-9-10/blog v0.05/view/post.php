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
        <li class="breadcrumb-item active" aria-current="page"><a href="/">Home</a></li>
        <div class="container">
          <div class="text-right">
            <h7>You are reading '<?php echo $post['title']?>'!</h7>
          </div>
        </div>
      </ol>
    </nav>
    <div class="container">
      <div class="row justify-content-md-center">
        <div class="col-md-10">
          <a href="/"><h1>Hello, user!</h1></a>
        </div>
        <div class="col-md-10">
          <div class="jumbotron jumbotron-fluid">
            <div class="container">
              <h1 class="display-3"><?php echo $post['title']; ?></h1>
              <div class="font-italic">
                <p class="text-justify"; style="text-indent: 25px"><?php echo $post['body']; ?></p>
              </div>
              <div class="font-weight-bold">
                <p class="text-sm-right">author: <?php echo $post['author']; ?></p>
              </div>
              <a href="/index.php?r=/updatePost&id=<?php echo $post['id']; ?>" class="btn btn-primary">Update Post</a>
            </div>
          </div>
            <?php if(!empty($comments)) { ?>
              <h3>Comments:</h3>
            <?php } ?>
            <?php foreach ($comments as $comment) { ?>
              <div class="alert alert-secondary" role="alert">
                <h4 class="alert-heading"><?php echo $comment['author']; ?> :</h4> <?php echo $comment['body']; ?><br>
                <a href="/index.php?r=/updateComment&id=<?php echo $comment['id']; ?>" class="btn btn-primary">Update Comment</a>
              </div>
            <?php } ?>
          </div>
      </div>
    </div>
  </body>
</html>
