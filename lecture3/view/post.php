<!doctype html>
<html lang="en">
  <head>
    <title><?php echo $post[0]?></title>
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
        <div class="container">
          <div class="text-right">
            <h7>You are reading '<?php echo $post[0]?>'!</h7>
          </div>
        </div>
      </ol>
    </nav>
    <div class="container">
      <div class="row justify-content-md-center">
            <div class="col-md-10">
              <div class="jumbotron jumbotron-fluid">
                <div class="container">
                  <h1 class="display-3"><?php echo $post[0]; ?></h1>
                  <div class="font-italic">
                    <p class="text-justify"; style="text-indent: 25px"><?php echo $post[1]; ?></p>
                  </div>
                  <div class="font-weight-bold">
                    <p class="text-sm-right">author: <?php echo $post[2]; ?></p>
                  </div>
                </div>
              </div>
            </div>
            <div class="container">
              <div class="text-center">
                <h1><a class="btn btn-primary" href="/" role="button">Homepage</a></h1>
              </div>
            </div>
      </div>
    </div>
  </body>
</html>
