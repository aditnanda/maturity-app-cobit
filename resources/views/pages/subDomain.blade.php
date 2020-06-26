@extends('layouts.app', ['activePage' => 'Domain', 'titlePage' => __('Domain')])

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
            <div class="row">
              <div class="col-xs-10 col-md-8">
                <h4 class="card-title ">List Domain</h4>
                <p class="card-category"> Here is a subtitle for this table</p>
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

          <!-- <div class="col-6"></div> -->
          <div class="col-6">
              <!-- Modal -->
              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Input Domain</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form action="domain/create" method="POST">
                        {{csrf_field()}}
                        <!-- <div class="form-group">
                          <label for="exampleInputEmail1">Nama Domain</label>
                          <input name="nama_domain" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div> -->
                        <div class="form-group ">
                          <label for="exampleFormControlSelect1">Nama Domain</label>
                          <a href="#" rel="tooltip" title ="Input Nama Domain(Proses) yang akan diukur menurut COBIT 5 &#13;Domain : &#13;APO&#13;BAI&#13;DSS&#13;MEA&#13;EDM">
                            <i class="material-icons">contact_support</i>
                          </a>
                          <select class="custom-select"  id="exampleFormControlSelect1" name="nama_domain">
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
                          <a href="#" data-toggle="tooltip" title ="Pilih Urutan Proses yang ada pada COBIT 5">
                            <i class="material-icons">contact_support</i>
                          </a>
                          <select class="custom-select" name="nomor_proses" id="exampleFormControlSelect1">
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
                          <div>
                            <label for="exampleFormControlSelect1">Keterangan</label>
                            <a href="#" data-toggle="tooltip" title ="Pokok Pembahasan dari Proses yang dipilih">
                              <i class="material-icons">contact_support</i>
                            </a>  
                          </div>
                          <input name="keterangan" type="text" class="form-control" id="exampleInputPassword1">
                          <!-- <textarea name="keterangan" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea> -->
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="Add" class="btn btn-primary">Add Data</button>
                        <!-- <button type="button" class="btn btn-lg btn-danger" data-placement="right" data-toggle="popover" title="Popover title" data-content="And here's some amazing content. It's very engaging. Right?" data-html="true">Click to toggle popover</button> -->
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>

          <div class="card-body">

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
            <!-- Button trigger modal -->
            <div class="row">
            <div class="col-xs-12 col-md-10">
                  <form class="form-inline ml-auto" method="get" action="{{url('/domain')}}/searchdom">
                      <div class="form-group no-border">
                        <input type="text" name="seadom" class="form-control" placeholder="Search">
                      </div>
                      <button type="submit" class="btn btn-just-icon btn-round">
                        <i class="material-icons">search</i>
                      </button>
                  </form>
                </div>
                <div class="col-xs-0 col-md-2">
                  <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">
                    Tambah Domain
                  </button>
                </div>
              </div>
              
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary text-center">
                  <th>
                    No.
                  </th>
                  <th>
                    Domain
                  </th>
                  <th>
                    Keterangan
                  </th>
                  <th>
                    Aksi
                  </th>
                </thead>
                <?php $Nomor=1?>
                @foreach($domain as $data)
                <tbody  class="text-center">
                  <th>{{$Nomor}}</th>
                  <th>{{$data->nama_domain}}{{$data->nomor_proses}}</th>
                  <th>{{$data->keterangan}}</th>
                  <th><a href="/domain/{{$data->id}}/edit" class="btn btn-info btn-sm">Edit</a>
                  <a href="/domain/{{$data->id}}/delete" class="btn btn-danger btn-sm">Delete</a>
                  </th>
                </tbody>
                <?php $Nomor++?>
                @endforeach
              </table>

              {!! $domain->links() !!}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
  <script type="text/javascript">
    $(document).ready(function() {
        $('[data-toggle="tooltip"]').tooltip();
        $(".selectpicker").selectpicker();
    });
  </script>
@endsection

