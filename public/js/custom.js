var ctx = document.getElementById("maturitylevel");
var base_url = window.location.origin+'/';

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


$("#viewreport").click(function() {
    // $("#maturitylevel").get(0).toBlob(function(blob) {
    // //   saveAs(blob, "chart_1");
    //   console.log(blob);
    //     var url = base_url + 'home/report';
      
    //   window.open(url,'_blank');
    // });
    var ctx = document.getElementById("maturitylevel");
    var dataURL = ctx.toDataURL();
    console.log(dataURL);

    $.ajax({
        type: "POST",
        url: base_url + 'api/report/chart',
        data: { 
           file: dataURL
        }
      }).done(function(o) {
        console.log('saved',o); 
        var url = base_url + 'home/report';
      
        window.open(url,'_blank');
      });
    
});