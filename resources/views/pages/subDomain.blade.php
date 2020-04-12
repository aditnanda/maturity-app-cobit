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
            <div class="col-6">
              <h4 class="card-title ">List Domain</h4>
              <p class="card-category"> Here is a subtitle for this table</p>
            </div>
          </div>
          <!-- <div class="col-6"></div> -->
          <div class="col-6">
              <!-- Modal -->
              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form action="domain/create" method="POST">
                        {{csrf_field()}}
                        <div class="form-group">
                          <label for="exampleInputEmail1">Nama Domain</label>
                          <input name="nama_domain" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Keterangan</label>
                          <input name="keterangan" type="text" class="form-control" id="exampleInputPassword1">
                          <!-- <textarea name="keterangan" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea> -->
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="Add" class="btn btn-primary">Add Data</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>

          <div class="card-body">
            <!-- Button trigger modal -->
            <div class="row">
                <div class="col-12 text-right">
                  <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">
                    Tambah Domain
                  </button>
                </div>
              </div>
              
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
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
                @foreach($domain as $domain)
                <tbody>
                  <th>{{$Nomor}}</th>
                  <th>{{$domain->nama_domain}}</th>
                  <th>{{$domain->keterangan}}</th>
                  <th><a href="/domain/{{$domain->id}}/edit" class="btn btn-info btn-sm">Edit</a>
                  <a href="/domain/{{$domain->id}}/delete" class="btn btn-danger btn-sm">Delete</a>
                  </th>
                </tbody>
                <?php $Nomor++?>
                @endforeach
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection