$(document).ready(function () {
  $('[type=file]').change(function () {
      if (!("files" in this)) {
          alert("File reading not supported in this browser");
      }
      const file = this.files && this.files[0];
      if (!file) {
          return;
      }
      
      const filePath = document.getElementById('file-path');
      filePath.innerHTML = `Selected file: ${file.name}`;
      filePath.style.fontWeight = 700;
      
      console.log(file.name);

      const fileReader = new FileReader();

      fileReader.onload = function (e) {
          var text = e.target.result;
          let data = text.split('\n');
          console.log(data);
          let values = [];
          for(i = 1, j = 0; i < data.length; i++, j++)  {
            values[j] = data[i].split(',');
          }
          console.log(values);
          const foodShops = ['Biedronka','Lidl', 'Carrefour'];
          const billsTypes = ['Prad','Czynsz'];
          const entertainmentTypes = ['Kino','Teatr'];

          let food = 0;
          let bills = 0;
          let entertainment = 0;
          let others = 0;

          for(let i = 0; i < values.length - 1; i++)  {
            if(foodShops.includes(values[i][0])) {
              food += parseFloat(values[i][1]);
            } else if(billsTypes.includes(values[i][0]))  {
              bills += parseFloat(values[i][1]);
            } else if(entertainmentTypes.includes(values[i][0])) {
              entertainment += parseFloat(values[i][1]);
            } else  {
              others += parseFloat(values[i][1]);
            }
          }

          console.log(`${food}, ${bills}, ${entertainment}, ${others}`);

          let myChart = document.getElementById('myChart').getContext('2d');
      
          Chart.defaults.global.defaultFontFamily = 'Lato';
          Chart.defaults.global.defaultFontSize = 16;
          Chart.defaults.global.defaultFontColor = '#1E0476';

          let massPopChart = new Chart(myChart, {
            type:'pie', // bar, horizontalBar, pie, line, doughnut, radar, polarArea
            data:{
              labels: ['food', 'bills', 'entertainment', 'others'],
              datasets:[{
                label:'Ammount of money',
                data:[
                  food,
                  bills,
                  entertainment,
                  others,
                ],
                backgroundColor:[
                  '#1E0476',
                  '#CCCCCC',
                  '#8978BF',
                  '#707070',
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
      };

      fileReader.readAsText(this.files[0]);
  });
});