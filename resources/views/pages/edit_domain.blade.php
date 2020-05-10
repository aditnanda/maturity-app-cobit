@extends('layouts.app', ['activePage' => 'editdomain', 'titlePage' => __('Edit Domain')])

@section('content')

<!-- <div class="alert alert-info" role="alert">
  Sucess!
</div> -->
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <div class="col-6">
              <h4 class="card-title ">Edit Data</h4>
              <p class="card-category"> Here is a subtitle for this table</p>
            </div>
          </div>
        
        <div class= "col-lg-12">
        <div class="card-body">
            <div class="table-responsive">
                <form action="{{url('/domain')}}/{{$domain->id}}/update" method="POST">
                    {{csrf_field()}}
                    @method('post')
                    <!-- <div class="form-group">
                        <label for="exampleInputEmail1">Nama Domain</label>
                        <input name="nama_domain" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Servis Name" value="{{$domain->nama_domain}}">
                    </div> -->
                    <div class="form-group">
                          <label for="exampleFormControlSelect1">Nama Domain</label>
                          <select name="nama_domain" class="form-control" id="exampleFormControlSelect1">
                            <option value="APO" @if($domain->nama_domain == 'APO') selected='selected' @endif>APO</option>
                            <option value="BAI" @if($domain->nama_domain == 'BAI') selected='selected' @endif>BAI</option>
                            <option value="DSS" @if($domain->nama_domain == 'DSS') selected='selected' @endif>DSS</option>
                            <option value="MEA" @if($domain->nama_domain == 'MEA') selected='selected' @endif>MEA</option>
                            <option value="EDM" @if($domain->nama_domain == 'EDM') selected='selected' @endif>EDM</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="exampleFormControlSelect1">Urutan Proses</label>
                          <select name="nomor_proses" class="form-control" id="exampleFormControlSelect1">
                            <option value="01" @if($domain->nomor_proses == '01') selected='selected' @endif>01</option>
                            <option value="02" @if($domain->nomor_proses == '02') selected='selected' @endif>02</option>
                            <option value="03" @if($domain->nomor_proses == '03') selected='selected' @endif>03</option>
                            <option value="04" @if($domain->nomor_proses == '04') selected='selected' @endif>04</option>
                            <option value="05" @if($domain->nomor_proses == '05') selected='selected' @endif>05</option>
                            <option value="06" @if($domain->nomor_proses == '06') selected='selected' @endif>06</option>
                            <option value="07" @if($domain->nomor_proses == '07') selected='selected' @endif>07</option>
                            <option value="08" @if($domain->nomor_proses == '08') selected='selected' @endif>08</option>
                            <option value="09" @if($domain->nomor_proses == '09') selected='selected' @endif>09</option>
                            <option value="10" @if($domain->nomor_proses == '10') selected='selected' @endif>10</option>
                            <option value="11" @if($domain->nomor_proses == '11') selected='selected' @endif>11</option>
                            <option value="12" @if($domain->nomor_proses == '12') selected='selected' @endif>12</option>
                            <option value="13" @if($domain->nomor_proses == '13') selected='selected' @endif>13</option>
                            <option value="14" @if($domain->nomor_proses == '14') selected='selected' @endif>14</option>
                          </select>
                        </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Keterangan</label>
                        <input name="keterangan" type="text" class="form-control" id="exampleInputPassword1" placeholder="Servis Owner" value="{{$domain->keterangan}}">
                        <!-- <textarea name="keterangan" class="form-control" id="exampleFormControlTextarea1" rows="3" ></textarea> -->
                    </div>
                    <div class="modal-footer">
                        <a href="/domain" type="button" class="btn btn-secondary">Cancel</a>
                        <button type="Add" class="btn btn-primary">Update Data</button>
                    </div>
                </form>   
            </div>
          </div>
        </div>
        </div>
        
      </div>
    </div>
  </div>
</div>
@endsection