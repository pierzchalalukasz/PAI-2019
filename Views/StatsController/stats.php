<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>
  <script src="Public/js/main.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="Public/css/chart.css">
  <link rel="stylesheet" href="Public/css/navbar.css">
  <title>Wallet Stats | My Stats</title>
</head>
<body>
<?php include(dirname(__DIR__).'/Common/navbar.php'); ?>
  <div class="container">
    <div class="canvas-wrapper">
      <div class="sign-header">
        <span id="sign-header-text">My Stats</span>
        <img id="sign-header-logo" src="Public/img/logo.svg"/>
      </div>
      <div class="month-wrapper">
        <div class="column">
            <h3>December 2019</h3>
        </div>
        <div class="pie-chart">
          <canvas style="height:40vh; width:50vw" id="myChart"></canvas>
        </div>
      </div>
      <div class="buttons">
        <button class="btn-chart" type="button" onclick="createPie()">pie</button>
        <button class="btn-chart" type="button" onclick="createDoughnut()">doughnut</button>
        <button class="btn-chart" type="button" onclick="clearCanv()">clear</button>
      </div>
    </div>  
  </div>


  <script>
    let myChart = document.getElementById('myChart').getContext('2d');

    // Global Options
    Chart.defaults.global.defaultFontFamily = 'Lato';
    Chart.defaults.global.defaultFontSize = 16;
    Chart.defaults.global.defaultFontColor = '#1E0476';

    let massPopChart = new Chart(myChart, {
      type:'pie', // bar, horizontalBar, pie, line, doughnut, radar, polarArea
      data:{
        labels:[' bills', ' food', ' entertainment'],
        datasets:[{
          label:'Ammount of money',
          data:[
            45,
            35,
            20,
          ],
          backgroundColor:[
            '#1E0476',
            '#CCCCCC',
            '#8978BF',
          ],
          borderWidth:1,
          borderColor:'#fff',
          hoverBorderWidth:3,
          hoverBorderColor:'#fff'
        }]
      },
      options:{
        title:{
          display: true,
          position: 'top',
          text: 'pie chart',
        },
        legend:{
          display: true,
          position: 'bottom',
          labels:{
            fontColor:'#1E0476',
          },
        },
        layout:{
          padding:{
            left:0,
            right:0,
            bottom:0,
            top:0
          }
        },
        tooltips:{
          enabled:true
        }
      }
    });
  </script>
</body>
</html>
