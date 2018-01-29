<!doctype html>
<html lang="en">
  <head>
    <title>Taxi manager!</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </head>
  <body>
    <div class="container">
      <div class="row justify-content-md-center">
        <div class="col-md-center">
          <a href="/"><h1>Welcome to Taxi Manager Simulator!</h1></a><br>
        </div>
        <div class="container">
          <div class="text-md-center">
            <p class="lead">Please, select driver for all cars</p><br>
          </div>
        </div>
        <?php if(!empty($confirmed_errors)) { ?>
          <?php foreach ($confirmed_errors as $error): ?>
            <div class="alert alert-warning" role="alert">
              <?php echo $error; ?>
            </div>
          <?php endforeach; ?>
        <?php } ?>
        <?php foreach ($cars as $car) { ?>
          <div class="container">
            <form method="POST" action="/index.php?r=/">
              <div class="form-row">
                <div class="col-4">
                  <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">
                      <?php echo $car['model']; ?>:
                    </label>
                    <input type="hidden" name="car_id" value="<?php echo $car['car_id']; ?>">
                  </div>
                </div>
                <?php if (!is_null($car['driver'])) { ?>
                  <div class="col-3">
                    <div class="input-group-prepend">
                      <label class="input-group-text" for="inputGroupSelect01">
                        already driven by <?php echo $car['driver']; ?>
                      </label>
                    </div>
                  </div>
                  <div class="input-group-append">
                    <button class="btn btn-outline-primary" type="submit">Remove driver</button>
                  </div>
                <?php } else { ?>
                  <div class="col-2">
                    <select class="custom-select" id="inputGroupSelect01" name="driver_id" >
                      <option selected>Choose driver...</option>
                      <?php foreach ($drivers as $driver) { ?>
                        <option value="<?php echo $driver['driver_id']; ?>">
                          <?php echo $driver['name']; ?>
                        </option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="input-group-append">
                    <button class="btn btn-outline-primary" type="submit">SET driver</button>
                  </div>
                <?php } ?>
              </div>
            </form>
          </div>
        <?php } ?>
      </div>
    </div>
  </body>
</html>
