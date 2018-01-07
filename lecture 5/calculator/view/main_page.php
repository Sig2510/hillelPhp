<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
    <title>MyCalc</title>
  </head>
  <body>
      <div class="text-center">
        <div class="pt-5">
         <div class="container">
          <a href="/">
            <h1 class="display-3">Welcome!It's my "Calculator"!</h1>
          </a>
            <p class="lead">
              Please, enter numbers, wich you want to calculate!
            </p>
            <p class="lead">
              Then choose necesary operation and push "CALCULATE"!
            </p>
          </div>
        </div>
      </div>
        <div class="container">
          <form action="" method="post">
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputNum1">Input first number in field below!</label>
                <input type="number" class="form-control" name="num1" id="inputNum1" placeholder="First number...">
              </div>
              <div class="form-group col-md-6">
                <label for="inputNum2">Input second number in field below!</label>
                <input type="number" class="form-control" name="num2" id="inputNum2" placeholder="Second number...">
              </div>
            </div>
            <div class="text-center">
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="operations" id="sum" value="add" checked>
                <label class="form-check-label" for="sum">Add</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="operations" id="sub" value="subtract">
                <label class="form-check-label" for="sub">Subtract</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="operations" id="multi" value="multiply">
                <label class="form-check-label" for="milti">Multiply</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="operations" id="divide" value="divide">
                <label class="form-check-label" for="divide">Divide</label>
              </div>
            </div>
            <div class="text-center">
              <a href="/index.php?o=result">
                <button type="submit" class="btn btn-primary">CALCULATE</button>
              </a>
            </div>
          </form>
        </div>
  </body>
</html>
