@extends('layouts.app', ['activePage' => 'dokumen', 'titlePage' => __('Data Dokumen')])

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
            <div class ="row">
              <div class="col-xs-10 col-md-8">
                  <h4 class="card-title ">Data Dokumen</h4>
                  <p class="card-category"> Upload data dokumen sesuai dengan urutan nomor bukti</p>
                </div>
               
            </div>  
          </div> 
          
          @if (session('status'))
                  <div class="row">
                    <div class="col-sm-10">
                      <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <i class="material-icons">close</i>
                        </button>
                        <span>{{ session('status') }}</span>
                      </div>
                    </div>
                  </div>
                @endif
          <!-- Modal Generate kode -->

          <div class="col-6">
              <!-- Button trigger modal -->

              <!-- Modal -->
              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Tambah Kode Bukti</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form action="kode/kode" method="POST">
                        {{csrf_field()}}
                        <div class="form-group ">
                          <label for="exampleFormControlSelect1">Nama Proses</label>
                          <select class="custom-select"  id="exampleFormControlSelect1" name="nama_proses">
                            <option selected disabled>Pilih Domain...</option>
                            <option value="APO">APO</option>
                            <option value="BAI">BAI</option>
                            <option value="DSS">DSS</option>
                            <option value="MEA">MEA</option>
                            <option value="EDM">EDM</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="exampleFormControlSelect1">Urutan Proses</label>
                          <select class="custom-select" name="sub_domain" id="exampleFormControlSelect1">
                            <option selected disabled>Pilih Nomor Proses...</option>
                            <option value="01">01</option>
                            <option value="02">02</option>
                            <option value="03">03</option>
                            <option value="04">04</option>
                            <option value="05">05</option>
                            <option value="06">06</option>
                            <option value="07">07</option>
                            <option value="08">08</option>
                            <option value="09">09</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="exampleFormControlSelect1">Nomor Bukti</label>
                          <input name="no_bukti" type="text" class="form-control" id="exampleInputPassword1">
                          <!-- <textarea name="keterangan" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea> -->
                        </div>
                        <div class="form-group">
                          <label for="exampleFormControlSelect1">Urutan Bukti</label>
                          <input name="urutan_bukti" type="text" class="form-control" id="exampleInputPassword1">
                          <!-- <textarea name="keterangan" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea> -->
                        </div>

                    </div>
                    <div class="modal-footer">
                       <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="Add" class="btn btn-primary">Buat Kode</button>
                    </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>

          <div class="card-body">
            <div class="row">
              <div class="col-xs-12 col-md-10">
                  <form class="form-inline ml-auto" method="get" action="{{url('/dok')}}/searchdok">
                      <div class="form-group no-border">
                        <input type="text" name="seadok" class="form-control" placeholder="Search">
                      </div>
                      <button type="submit" class="btn btn-just-icon btn-round">
                        <i class="material-icons">search</i>
                      </button>
                  </form>
              </div>
              @if(Auth::user()->role == 'admin' )
              <div class="col-xs-0 col-md-2">
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">
                <i class="material-icons">add</i>Kode Bukti
                </button>
              </div>
              @endif
            @if(Auth::user()->role == 'user' )
              <div class="col-xs-1 col-md-3">
                <a href="dok/upload" class="btn btn-sm btn-primary">
                  <i class="material-icons">add</i>
                  {{ __('Tambah Dokumen Bukti') }}
                </a>
              </div>
            @endif
            </div>
            <!-- @if(Auth::user()->role == 'admin' )
            <div class="row">
              <div class="col-12 text-right">
                <a href="" class="btn btn-sm btn-primary">{{ __('Input Skor') }}</a>
              </div>
            </div>
            @endif -->
            <div class="table-responsive">
                
              <table class="table">
                <thead class=" text-primary text-center">
                  <th rel="tooltip" data-placement="top" title="Nama Sub-proses yang dipilih berdasarkan penilaian yang dilakukan.">
                    Proses
                  </th>
                  <th rel="tooltip" data-placement="top" title="Kode Bukti terbentuk dari gabungan Nama Proses-Nomor Sub Proses-Nomor Bukti-Nomor Urutan Bukti.">
                    Kode Bukti
                  </th>
                  <th rel="tooltip" data-placement="top" title="Layanan (Aplikasi) terkait yang ada pada proses yang dinilai.">
                    Layanan
                  </th>
                  <th rel="tooltip" data-placement="top" title="Target Skor Assessment untuk penilaian proses yang dipilih.">
                    Target Skor
                  </th>
                  <th rel="tooltip" data-placement="top" title="Skor Hasil Assessment penilaian proses yang dipilih.">
                    Skor Assessment
                  </th>
                  <th>
                    Aksi
                  </th>
                </thead>
                @foreach($dokumen as $datadok)
                <tbody class="text-center">
                  <th>{{$datadok->nama_proses}}{{$datadok->sub_domain}}</th>
                  <th><a href="#" rel="tooltip" title="<?php echo $datadok->file;?>">{{$datadok->nama_proses}}{{$datadok->sub_domain}}-{{$datadok->no_bukti}}-{{$datadok->urutan_bukti}}</a></th>
                  <th>{{$datadok->nama_service}}</th>
                  <th>{{$datadok->target_skor}}</th>
                  <th>{{$datadok->skor_maturity}}</th>

                  @if(Auth::user()->role == 'user' )
                  <th><a href="/dok/{{$datadok->id}}/edit" class="btn btn-info btn-sm">Edit</a>
                  <a href="/dok/{{$datadok->id}}/delete" class="btn btn-danger btn-sm">Delete</a>
                  </th>
                  @endif

                  @if(Auth::user()->role == 'admin' )
                  <th>
                  <a href="/dok/{{$datadok->id}}/download" rel="tooltip" data-placement="right" title="Download Dokumen"><i class="material-icons">save_alt</i></a>
                  <a href="/dok/{{$datadok->id}}/addskor"  style="color:#2196f3;" rel="tooltip" data-placement="right" title="Input Skor & Rekomendasi"><i class="material-icons">add_box</i></a>
                  <a href="/dok/{{$datadok->id}}/edskor"  style="color:#4caf50;" rel="tooltip" data-placement="right" title="Edit Data Skor & Rekomendasi"><i class="material-icons">edit</i></a>
                  <a href="/dok/{{$datadok->id}}/delete"  style="color:#ff0000;" rel="tooltip" data-placement="right" title="Hapus Data" data-placement="left"><i class="material-icons">delete</i></a>
                  </th>
                  @endif
                </tbody>
                @endforeach
              </table>
              <div class="text-center">
                {!! $dokumen->links(); !!}
             
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- <script type="text/javascript">
    $(document).ready(function() {
        $("[rel='tooltip']").tooltip();
    });
</script> -->
@endsection