var ctx = document.getElementById("maturitylevel");
var base_url = window.location.origin+'/';
console.log(base_url);

$.ajax({
  url      : base_url+'api/chart/maturity',
  datatype : 'JSON',
  success  : function(data)
  {
    console.log(data['saatini']);
    var myChart = new Chart(ctx, {
      type: 'radar',
      data: {
          labels: data['domain'],
          datasets: [
              {
                  label: 'Saat ini',
                  data: data['saatini'],
                  
                  borderColor: [
                      '#0000FF'
                  ],
                  borderWidth: 2
              },
              {
                label: 'Harapan',
                data: data['harapan'],
                
                borderColor: [
                    '#FF8000'
                ],
                borderWidth: 2
              }
            ]
      },
      options: {
          scales: {
              yAxes: [{
                      ticks: {
                          beginAtZero: true
                      }
                  }]
          }
      }
  });
  }
});

