<!doctype html>
<html lang="en">
  <head>
    <title>Oops, 404!</title>
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
          <div class="jumbotron jumbotron-fluid">
            <div class="container">
              <h1 class="display-3">Statistics</h1>
              <div>
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Author name</th>
                      <th scope="col">Posts count</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($stat as $index => $data) { ?>
                    <tr>
                      <th scope="row"><?php echo ($index+1); ?></th>
                      <td><?php echo $data['author']; ?></td>
                      <td><?php echo $data['posts_count']; ?></td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
                <div class="class=col-md-3 text-center">
                  <h1 class="display-3">Average posts: <?php echo $avg[0]['a_vg']; ?></h1>
                </div>
              </div>
              <div class="class=col-md-3 text-center">
                <h1><a class="btn btn-primary" href="/index.php?r=/" role="button">Homepage</a></h1>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </body>
</html>
