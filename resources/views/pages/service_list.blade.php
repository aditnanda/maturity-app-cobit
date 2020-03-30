@extends('layouts.app', ['activePage' => 'service', 'titlePage' => __('Service List')])

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
              <h4 class="card-title ">List of Service</h4>
              <p class="card-category"> Here is a subtitle for this table</p>
            </div>
          </div>
          <!-- <div class="col-6"></div> -->
          <div class="col-6">
              <!-- Button trigger modal -->
              <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">
                Add
              </button>
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
                      <form action="service/create" method="POST">
                        {{csrf_field()}}
                        <div class="form-group">
                          <label for="exampleInputEmail1">Service Name</label>
                          <input name="nama_service" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Servis Name">
                        </div>
                        <div class="form-group">
                          <label for="exampleFormControlSelect1">Status</label>
                          <select name="status" class="form-control" id="exampleFormControlSelect1">
                            <option value="ACTIVE">ACTIVE</option>
                            <option value="MAINTENANCE">MAINTENANCE</option>
                            <option value="DEVELOPMENT">UNDER DEVELOPMENT</option>
                            <option value="NA">NOT ACTIVE</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Servis Owner</label>
                          <input name="service_owner" type="text" class="form-control" id="exampleInputPassword1" placeholder="Servis Owner">
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
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <th>
                    Service Name 
                  </th>
                  <th>
                    Status
                  </th>
                  <th>
                    Service Owner
                  </th>
                  <th>
                    Action
                  </th>
                </thead>
                @foreach($service as $service)
                <thead class=small>
                  <th>{{$service->nama_service}}</th>
                  <th>{{$service->status}}</th>
                  <th>{{$service->service_owner}}</th>
                  <th><a href="/service/{{$service->id}}/edit" class="btn btn-info btn-sm">Edit</a>
                  <a href="/service/{{$service->id}}/delete" class="btn btn-danger btn-sm">Delete</a>
                  </th>
                  
                </thead>
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