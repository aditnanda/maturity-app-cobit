<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Report</title>
</head>
<body>
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        
        <div class="col-md-12">
          <div class="card card-chart">
            <div class="card-header card-header">
              <h4 class="card-title">Tingkat Kematangan</h4>
              <canvas id="maturitylevel"></canvas>
            </div>
            <div class="card-body">
              <div class="col-lg-12 col-md-12">
                <img src="{{asset('chart/chart.png')}}" alt="">
              </div>
      
              <div class="col-lg-12 col-md-12">
                <div class="card">
                  <div class="card-header card-header-warning">
                    <h4 class="card-title">Gap</h4>
                    <p class="card-category"></p>
                  </div>
                  
                  <div class="card-body table-responsive">
                    <table class="table table-hover">
                      <thead class="text-warning">
                        <th>Proses</th>
                        <th>Saat ini</th>
                        <th>Harapan</th>
                        <th>Gap</th>
                      </thead>
                      <tbody>
                        @foreach ($maturity as $item)
                           
                            <tr>
                            <td>{{$item['domain']}}</td>
                            <td>{{$item['skor']}}</td>
                            <td>{{$item['target']}}</td>
                            <td>{{$item['gap']}}</td>
                            </tr>
                            
                        @endforeach
                      </tbody>
                    </table>
      
                  </div>
                </div>
              </div>
              
              <div class="col-lg-12 col-md-12">
                <div class="card">
                  <div class="card-header card-header-warning">
                    <h4 class="card-title">Rekomendasi</h4>
                    <p class="card-category"></p>
                  </div>
                  
                  <div class="card-body table-responsive">
                    <table class="table table-hover">
                      <thead class="text-warning">
                        <th>Kode Bukti</th>
                        <th>File</th>
                        <th>Rekomendasi</th>
                      </thead>
                      <tbody>
                        @foreach ($dokumen as $dokumen1)
                           
                            <tr>
                            <td>{{$dokumen1->nama_proses}}{{$dokumen1->sub_domain}}-{{$dokumen1->no_bukti}}-{{$dokumen1->urutan_bukti}}</td>
                            <td>{{$dokumen1->file}}</td>
                            <td>{{$dokumen1->rekom}}</td>
                            </tr>
                            
                        @endforeach
                      </tbody>
                    </table>
      
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
       

        

      </div>

      </div>
    </div>
  </div>
  <script>
		window.print();
	</script>
</body>
</html>