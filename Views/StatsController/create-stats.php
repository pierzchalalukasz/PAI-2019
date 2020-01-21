<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
        <span id="sign-header-text">Select a file</span>
        <img id="sign-header-logo" src="Public/img/logo.svg"/>
      </div>
      <div class="file-container">
          <p>Select a file with your bank statements in .csv format.</p>
          <div class="column">
            <label for="file-upload"><img id="folder" src="Public/img/folder.svg"/>Select a file...</label>
            <input id="file-upload" type="file">
            <p class="file-path">(.csv required)</p>
          </div>
          <form action="?page=stats" method="post">
            <button class="btn-stats" type="submit">GENERATE CHART</button>
          </form>
      </div>
    </div>
  </div>
</body>
</html>