<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
  <script src="Public/js/navbar.js"></script>
  <script src="Public/js/parser.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="Public/css/chart.css">
  <link rel="stylesheet" href="Public/css/navbar.css">
  <title>Wallet Stats | Stats</title>
</head>
<body>
  <?php include(dirname(__DIR__).'/Common/navbar.php'); ?>
  <div class="container">
    <div class="canvas-wrapper">
      <div class="sign-header">
        <span id="sign-header-text">Make a chart</span>
        <img id="sign-header-logo" src="Public/img/logo.svg"/>
      </div>
      <div class="file-container">
          <p>Select a file with your bank statements in .csv format.</p>
          <div class="columns">
            <div class="column-1">
              <form action="?page=create-stats" method="post">
              <label for="file-upload"><img id="folder" src="Public/img/folder.svg"/>Select a file...</label>
              <input id="file-upload" type="file">
              <p class="file-path">(.csv required)</p>
            </div>
            <div class="column-2">
              <div class="file-name">
                <span id="file-path">No file selected</span>
              </div>
            </div>
          </div>
          <div class="canvas-container">
            <canvas id="myChart"></canvas>
          </div>
          <button class="btn-stats" type="submit">CLEAR AND MAKE A NEW ONE</button>
          </form>
      </div>
    </div>
  </div>
</body>
</html>