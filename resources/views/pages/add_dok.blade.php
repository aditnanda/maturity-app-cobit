@extends('layouts.app', ['activePage' => 'Adddoc', 'titlePage' => __('Tambah Dokumen Bukti')])

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
              <h4 class="card-title ">Tambah Dokumen Bukti</h4>
            </div>
          </div>
        
        <div class= "col-lg-12">
        <div class="card-body">
            <div class="table-responsive">
                @if(count($errors) > 0)
                  <div class="alert alert-danger">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <i class="material-icons">close</i>
                      </button>
                    @foreach ($errors->all() as $error)
                      {{ $error }} <br/>
                    @endforeach
                  </div>
                @endif

                <form action="{{url('/dok')}}/add" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                      <div class="form-row">
                        <div class= "form-group col-md-6">
                          <div>
                            <label for="exampleInputEmail1">Nama Proses</label>
                            <a href="#" rel="tooltip" data-placement="right" title ="Input Nama Domain(Proses) yang akan diukur menurut COBIT 5. &#13;Domain (Seusaikan Pilihan Anda) : &#13;APO&#13;BAI&#13;DSS&#13;MEA&#13;EDM">
                                <i class="material-icons">contact_support</i>
                            </a>
                          </div>  
                          <input name="nama_proses" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan nama domain..">
                        </div>
                        <div class="form-group col-md-6">
                        <div>
                          <label for="exampleInputEmail1">Nomor Sub Proses</label>
                          <a href="#" rel="tooltip" data-placement="right" title ="Input Nomor Sub-Domain(Proses) yang akan diukur menurut COBIT 5. &#13;Contoh Input : 01, 02, 03, 10, dst. &#13;(Setiap Proses yang akan diukur memiliki jumlah sub-proses yang berbeda)">
                              <i class="material-icons">contact_support</i>
                          </a>
                        </div>
                        <input name="sub_domain" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan nomor sub domain..">
                      </div>
                     </div>
                    </div>
                    
                    <div class="form-group">
                      <div>
                        <label for="exampleInputEmail1">Nomor Bukti</label>
                        <a href="#" rel="tooltip" data-placement="right" title ="Input Nomor Bukti berdasarkan urutan kategori dari pengukuran domain yang dipilih. &#13;Contoh Input : 001, 002, 010, 101, 120, dst. &#13;(Setiap sub-Proses yang akan dikur memiliki jumlah kategori penilaian yang berbeda)">
                            <i class="material-icons">contact_support</i>
                        </a>
                      </div>
                      <input name="no_bukti" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan nomor bukti dokumen..">
                    </div>
                    <div class="form-group">
                      <div>
                        <label for="exampleInputEmail1">Nomor Urutan Bukti</label>
                        <a href="#" rel="tooltip" data-placement="right" title ="Input Urutan Bukti sebagai pemisah ketika kategori penilaian dari sub-proses yang dipilih memiliki lebih dari 1 bukti. &#13;Contoh Input : 01, 02, 10, 11, 20, dst. &#13;">
                            <i class="material-icons">contact_support</i>
                        </a>
                      </div> 
                      <input name="urutan_bukti" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan urutan dari nomor bukti dokumen..">
                    </div>
                    <div class="form-group">
                      <div>
                        <label for="exampleInputEmail1">Target Skor</label>
                        <a href="#" rel="tooltip" data-placement="right" title ="Input Target Skor penilaian untuk kategori penilaian dari sub-proses yang dipilih. &#13;Contoh Input : 0.15, 1.5, 2.3, 3.3, dst. &#13;(Target Skor yang diinput dimulai dari skor 0 sampai dengan 5)">
                            <i class="material-icons">contact_support</i>
                        </a>
                      </div>
                      <input name="target_skor" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Target Skor Asessmen..">
                    </div>
                    <div class="form-group form-file-upload form-file-multiple">
                      <div>
                        <label for="exampleInputEmail1">Bukti Dokumen</label>
                        <a href="#" rel="tooltip" data-placement="right" title ="Input Bukti Dokumen(File) sesuai dengan kategori penilaian dari sub-proses yang dipilih. &#13;Format File : docx, doc, pdf, xls, xlsx, png, jpg &#13;">
                            <i class="material-icons">contact_support</i>
                        </a>
                      </div>
                        <input type="file" name="file" multiple="" class="inputFileHidden">
                        <div class="input-group">
                            <input type="text" class="form-control inputFileVisible" placeholder="Masukkan Bukti Dokumen">
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-fab btn-round btn-primary">
                                    <i class="material-icons">attach_file</i>
                                </button>
                            </span>
                        </div>
                    </div>
                    <div class="form-group">
                      <div>
                        <label for="exampleInputEmail1">Layanan</label> 
                        <a href="#" rel="tooltip" data-placement="right"  title="Input Aplikasi Layanan (jika ada) yang digunakan dalam sub-proses yang dipilih. &#13;Contoh : SIM Persuratan, HR Clinic, dst. &#13;">
                            <i class="material-icons">contact_support</i>
                        </a>
                      </div>
                        <input name="nama_service" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Layanan terkait..">
                    </div>
                    <div class="modal-footer">
                      <a href="/dokumen" type="button" class="btn btn-secondary">Cancel</a>
                      <button type="Add" class="btn btn-primary">Add Data</button>
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