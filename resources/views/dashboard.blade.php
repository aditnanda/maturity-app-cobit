@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('Dashboard')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6">
          <div class="card card-chart">
            <div class="card-header card-header-success">
              <div class="ct-chart" id="dailySalesChart"></div>
            </div>
            <div class="card-body">
              <h4 class="card-title">Gap Analysis</h4>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card card-chart">
            <div class="card-header card-header-warning">
              <div class="ct-chart" id="websiteViewsChart"></div>
            </div>
            <div class="card-body">
              <h4 class="card-title">Skor Maturity</h4>
            </div>
          </div>
        </div>
      </div>
        <div class="col-lg-12 col-md-12">
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
                  <th>Kode Bukti</th>
                  <th>Target</th>
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
                  <th>Kode Bukti</th>
                  <th>Target</th>
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
                  <th>Kode Bukti</th>
                  <th>Target</th>
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
                  <th>Kode Bukti</th>
                  <th>Target</th>
                  <th>Skor Maturity</th>
                </thead>
                <tbody>
                  
                </tbody>
              </table>

            </div>
          </div>
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
                  <th>Domain</th>
                  <th>Target</th>
                  <th>Skor Maturity</th>
                  <th>Gap</th>
                </thead>
                <tbody>
                  
                </tbody>
              </table>

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