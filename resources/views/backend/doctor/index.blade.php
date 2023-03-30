@extends('layouts.backend')
@section('main')


<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">
     Doctor
      </h1>
      <ol class="breadcrumb bg-light">
        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Doctor</li>
      </ol>
    </div>

    <div class="row mt-3">
        <div class="col-lg-12">
             <!--toastr-->
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
       
            <button type="button" class="btn btn-sm btn-success mr-2 mb-3"  data-toggle="modal" data-target="#AddModel">
              <i class="fa fa-plus"></i> Add Doctor
            </button>
    
            <div class="card mb-4">
              <div class="table-responsive p-3">
                <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                  <thead class="bg-success text-light">
                    <tr>
                      <th>Sl</th>
                      <th>Doctor Name</th>
                      <th>Degree</th>
                      <th>Mobile</th>
                      <th>Chamber Address</th>
                      <th>Fee</th>
                      <th>Visiting Day</th>
                      <th>Appointment Qty</th>
                      <th>Type</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
              
                  @foreach($doctor as $key=>$doctors)
                    <tr>
                      <td>{{$key+1}}</td>
                      <td>{{$doctors->doctor_name}}</td>
                      <td>{{$doctors->degree}}</td>
                      <td>{{$doctors->mobile}}</td>
                      <td>{{$doctors->chamber}}</td>
                      <td>{{$doctors->fee}}</td>
                      <td>{{$doctors->visiting_day}}</td>
                      <td>{{$doctors->appoinment}}</td>
                      <td>{{$doctors->type}}</td>
                      {{-- <td>
                        @php
                        $doctors->json_decode($doctors->type)
                        @endphp
                      @foreach($type as $types)
                      {{$types}}
                      @endforeach
                      </td> --}}
                   
                      <td>
                        <div class="dropdown">
                          <a class="dropdown-toggle btn btn-info" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                            Action
                          </a>

                          <div class="dropdown-menu">
                            {{-- @if (userHasPermission('setting-update')) --}}
                            <a class="dropdown-item" href="javascript:void(0)" onclick="editbutton({{ $doctors->id }})"><i class="fas fa-edit mr-2"></i> Edit</a>
                            {{-- @endif --}}
                           
                            <a class="dropdown-item text-danger" href="{{route('doctor.delete',$doctors->id) }}" onclick="return confirm('Are you sure to delete this data..??')"><i class="fas fa-trash mr-2"></i>Delete</a>
                            
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
        <h5 class="modal-title" id="exampleModalLabel">Add Doctor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('doctor.store')}}" method="post">
            @csrf
            <div class="form-group text-success">
                <label for="name">Doctor Name</label>
                <input type="text" name="doctor_name" class="form-control" id="name" required>
            </div>
            <div class="form-group text-success">
              <label for="name">Doctor Type :</label><br>
            <label>
              <span>Appointment</span>
              <input type="checkbox" name="type[appointment]" value="0">
            </label>
            
            <label>
              <span>Best doctor</span>
              <input type="checkbox" name="type[best]" value="1">
            </label>
            
            <label>
              <span>General</span>
              <input type="checkbox" name="type[general]" value="2">
            </label>

          </div>
            <div class="form-group text-success">
              <label for="name">Doctor Degree</label>
              <input type="text" name="degree" class="form-control" id="degree" required>
          </div>
            <div class="form-group text-success">
                <label for="name">Mobile</label>
                <input type="text" name="mobile" class="form-control" id="mobile" required>
            </div>
            <div class="form-group text-success">
              <label for="name">Chamber Address</label>
              <input type="text" name="chamber" class="form-control" id="chamber" required>
          </div>
          <div class="form-group text-success">
            <label for="name">Fee</label>
            <input type="number" name="fee" class="form-control" id="fee" required>
        </div>
            <div class="form-group text-success">
                <label for="visiting_day">Visiting Day:</label><br>
                {{-- <input type="date" name="visiting_day" class="form-control" id="visiting_day" required> --}}
                <label>
                  <span>Saturday</span>
                  <input type="checkbox" name="visiting_day[saturday]" value="0">
                </label>
                
                <label>
                  <span>Sunday</span>
                  <input type="checkbox" name="visiting_day[sunday]" value="1">
                </label>
                
                <label>
                  <span>Monday</span>
                  <input type="checkbox" name="visiting_day[monday]" value="2">
                </label>
                <label>
                  <span>Tuesday</span>
                  <input type="checkbox" name="visiting_day[tuesday]" value="3">
                </label>
                <label>
                  <span>Wednesday</span>
                  <input type="checkbox" name="visiting_day[wednesday]" value="4">
                </label>
                <label>
                  <span>Thursday</span>
                  <input type="checkbox" name="visiting_day[thursday]" value="5">
                </label>
                <label>
                  <span>Friday</span>
                  <input type="checkbox" name="visiting_day[friday]" value="6">
                </label>

            </div>
            <div class="form-group text-success">
              <label for="name">Appointment Qty</label>
              <input type="number" name="appoinment" class="form-control" id="appoinment">
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
        <h5 class="modal-title" id="exampleModalLabel">Update Doctor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('doctor.update') }}" method="POST">
          @csrf
          <div class="form-group">
              <input type="hidden" name="update_id" id="update_id" />
              <label for="update_name">Doctor Name</label>
              <input type="text" name="doctor_name" class="form-control" id="update_name">
          </div>
          
          <div class="form-group">
            <label for="name">Doctor Type :</label>
          <label>
            <span>Appointment</span>
            <input type="checkbox" id="update_type" name="type[]" value="0">
          </label>
          
          <label>
            <span>Best doctor</span>
            <input type="checkbox"  id="update_type" name="type[]" value="1">
          </label>
          
          <label>
            <span>General</span>
            <input type="checkbox"  id="update_type" name="type[]" value="2">
          </label>

        </div>




          <div class="form-group">
            <label for="name">Doctor Degree</label>
            <input type="text" name="degree" class="form-control" id="update_degree" required>
        </div>
          <div class="form-group">
            <label for="name">Mobile</label>
            <input type="text" name="mobile" class="form-control" id="update_mobile" required>
        </div>
        <div class="form-group">
          <label for="name">Chamber Address</label>
          <input type="text" name="chamber" class="form-control" id="update_chamber" required>
      </div>
      <div class="form-group">
        <label for="name">Fee</label>
        <input type="number" name="fee" class="form-control" id="update_fee" required>
    </div>

        <div class="form-group">
            <label for="address">Visiting Day</label>
            <input type="date" name="visiting_day" class="form-control" id="update_visiting" required>
        </div>

        
        <div class="form-group">
          <label for="address">Appointment Qty</label>
          <input type="number" name="appoinment" class="form-control" id="update_appoinment" required>
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
            var url = '{{ Route("doctor.edit",":id") }}'
            url = url.replace(':id',Id)
            $.get(url,
              function (data) {
                $('#update_name').val(data.doctor_name);
                $('#update_type').val(data.type);
                $('#update_id').val(data.id);
                $('#update_degree').val(data.degree)
                $('#update_mobile').val(data.mobile);
                $('#update_chamber').val(data.chamber);
                $('#update_fee').val(data.fee);
                $('#update_visiting').val(data.visiting_day);
                $('#update_appoinment').val(data.appoinment);
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
