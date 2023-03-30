@extends('layouts.backend')
@section('main')


<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">
   Ambulance
      </h1>
      <ol class="breadcrumb bg-light">
        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Ambulance</li>
      </ol>
    </div>

    <div class="row mt-3">
        <div class="col-lg-12">
             <!--toastr-->
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
       
            <button type="button" class="btn btn-sm btn-success mr-2 mb-3"  data-toggle="modal" data-target="#AddModel">
              <i class="fa fa-plus"></i> Add Ambulance
            </button>
    
            <div class="card mb-4">
              <div class="table-responsive p-3">
                <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                  <thead class="bg-success text-light">
                    <tr>
                      <th>Sl</th>
                      <th>Driver Name</th>
                      <th>Number</th>
                      <th>Address</th>
                      <th>Location</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
              
                  @foreach($ambulance as $key=>$ambulances)
                    <tr>
                      <td>{{$key+1}}</td>
                      <td>{{$ambulances->driver_name}}</td>
                      <td>{{$ambulances->personal_number}}</td>
                      <td>{{$ambulances->address}}</td>
                      <td>{{$ambulances->location}}</td>
                     
                      <td>
                        <div class="dropdown">
                          <a class="dropdown-toggle btn btn-info" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                            Action
                          </a>

                          <div class="dropdown-menu">
                            {{-- @if (userHasPermission('setting-update')) --}}
                            <a class="dropdown-item" href="javascript:void(0)" onclick="editbutton({{$ambulances->id}})"><i class="fas fa-edit mr-2"></i> Edit</a>
                            {{-- @endif --}}
                           
                            <a class="dropdown-item text-danger" href="{{route('ambulance.delete',$ambulances->id) }}" onclick="return confirm('Are you sure to delete this data..??')"><i class="fas fa-trash mr-2"></i>Delete</a>
                            
                          </div>
                        </div>
                      </td>
                    </tr>
              @endforeach

                  </tbody>
                </table>
              </div>
            </div>
          </div>
    </div>
</div>


<div class="modal fade" id="AddModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Ambulance</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('ambulance.store')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="name">Driver Name</label>
                <input type="text" name="driver_name" class="form-control" id="name" required>
            </div>
            <div class="form-group">
                <label for="name">Mobile</label>
                <input type="text" name="personal_number" class="form-control" id="name" required>
            </div>
            <div class="form-group">
                <label for="name">Address</label>
                <input type="text" name="address" class="form-control" id="address" required>
            </div>
            <div class="form-group">
                <label for="name">Location</label>
                <input type="text" name="location" class="form-control" id="location" required>
            </div>
            <button type="submit" class="btn btn-success mt-2">Save</button>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Division</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('ambulance.update')}}" method="POST">
          @csrf
          <div class="form-group">
              <input type="hidden" name="update_id" id="update_id" />
              <label for="update_driver_name">Driver Name</label>
              <input type="text" name="driver_name" class="form-control" id="update_name">
          </div>
          <div class="form-group">
            <label for="personal_number">Mobile</label>
            <input type="text" name="personal_number" class="form-control" id="update_mobile" required>
        </div>
        <div class="form-group">
            <label for="personal_address">Address</label>
            <input type="text" name="address" class="form-control" id="update_address" required>
        </div>

        <div class="form-group">
            <label for="location">Location</label>
            <input type="text" name="location" class="form-control" id="update_location" required>
        </div>
          <button class="btn btn-success mt-2" type="submit">Update</button>
        </form>
      </div>
    </div>
  </div>
</div>

<script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
{!! Toastr::message() !!}


@endsection

@push('js')

    <script>

        function editbutton(Id){
            $('#editModal').modal('show');
            var url = '{{ Route("ambulance.edit",":id") }}'
            url = url.replace(':id',Id)
            $.get(url,
              function (data) {
                $('#update_name').val(data.driver_name);
                $('#update_mobile').val(data.personal_number);
                $('#update_address').val(data.address);
                $('#update_location').val(data.location);
                $('#update_id').val(data.id);
              }
            );
        }

        $('.close').click(function()
            {
                $('#editModal').modal('hide');
            }
        )

    </script>
@endpush
