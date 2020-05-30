@extends('layouts.app', ['activePage' => 'report', 'titlePage' => __('Report')])

@section('content')
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
              <!-- <form>
                <input type="button" value="Print this page" onClick="window.print()">
              </form> -->
            </div>
          </div>
        </div>
        {{-- <div class="col-lg-12 col-md-12">
          <div class="card">
            <div class="card-header card-header-warning">
              <h4 class="card-title">Hasil</h4>
              <p class="card-category"></p>
            </div>
            
            <div class="card-body table-responsive">
              <div class="row">
                <div class="col-12 text-left">
                  <h5>Domain APO</h5>
                </div>
              </div>
              <table class="table table-hover">
                <thead class="text-warning">
                  <th>Domain</th>
                  <th>Skor Maturity</th>
                </thead>
                <tbody>

                </tbody>
              </table>

              <div class="row">
                <div class="col-12 text-left">
                  <h5>Domain BAI</h5>
                </div>
              </div>

              <table class="table table-hover">
                <thead class="text-warning">
                  <th>Domain</th>
                  <th>Skor Maturity</th>
                </thead>
                <tbody>
                  
                </tbody>
              </table>

              <div class="row">
                <div class="col-12 text-left">
                  <h5>Domain MEA</h5>
                </div>
              </div>
              <table class="table table-hover">
                <thead class="text-warning">
                  <th>Domain</th>
                  <th>Skor Maturity</th>
                </thead>
                <tbody>
                  
                </tbody>
              </table>

              <div class="row">
                <div class="col-12 text-left">
                  <h5>Domain DSS</h5>
                </div>
              </div>
              <table class="table table-hover">
                <thead class="text-warning">
                  <th>Domain</th>
                  <th>Skor Maturity</th>
                </thead>
                <tbody>
                  
                </tbody>
              </table>

            </div>
          </div>
        </div> --}}

        <div class="col-lg-12 col-md-12">

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
@endsection

@push('js')
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      md.initDashboardPageCharts();
    });
  </script>
@endpush