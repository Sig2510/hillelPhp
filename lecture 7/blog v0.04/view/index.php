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
    <div class="container">
      <div class="row justify-content-md-center">
        <div class="col-md-10">
          <a href="/"><h1>Hello, user!</h1></a>
          <a href="/?r=/addPost">add new post</a><br>
          <a href="/?r=/getTitles">Get all titles</a><br>
          <a href="/?r=/getEvenPosts">Get even posts</a><br>
          <a href="/?r=/getSortedPosts">Sort posts by publish date</a><br>
        </div>
        <?php foreach ($posts as $index => $post) { ?>
          <div class="col-md-10">
            <div class="jumbotron jumbotron-fluid">
              <div class="container">
                <a href="/index.php?r=/post&id=<?php echo $post['id']; ?>">
                  <h1 class="display-3">
                    <?php echo $post['title']; ?>
                  </h1>
                </a>
                <p class="lead">
                  <?php echo $post['body']; ?>
                </p>
                <p class="lead">
                  author: <?php echo $post['author']; ?>
                  <form method="POST" action="/index.php?r=/deletePost">
                    <input type="hidden" value="<?php echo $post['id'] ?>" name="id">
                    <input type="submit" value="Destroy!" class="btn btn-default">
                  </form>
                </p>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
  </body>
</html>
