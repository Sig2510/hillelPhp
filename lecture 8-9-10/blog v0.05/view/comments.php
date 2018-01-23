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
        </div>
          <div class="col-md-10">
            <?php if(!empty($res)) { ?>
              <h3>Comments:</h3>
            <?php } ?>
            <?php foreach ($comments as $comment) { ?>
              <div class="alert alert-secondary" role="alert">
                <h4 class="alert-heading"><?php echo $comment['author']; ?> :</h4> <?php echo $comment['body']; ?>
              </div>
            <?php } ?>
          </div>
      </div>
    </div>
  </body>
</html>
