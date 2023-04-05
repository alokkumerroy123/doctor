@extends('layouts.backend')
@section('main')


<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">
    Doner
      </h1>
      <ol class="breadcrumb bg-light">
        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Doner</li>
      </ol>
    </div>

    <div class="row mt-3">
        <div class="col-lg-12">
             <!--toastr-->
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
       
            <button type="button" class="btn btn-sm btn-success mr-2 mb-3"  data-toggle="modal" data-target="#AddModel">
              <i class="fa fa-plus"></i> Add Doner
            </button>
    
            <div class="card mb-4">
              <div class="table-responsive p-3">
                <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                  <thead class="bg-success text-light">
                    <tr>
                      <th>Sl</th>
                      <th>Doner Name</th>
                      <th>Blood Group</th>
                      <th>Mobile</th>
                       <th>Division</th>
                       <th>District</th>
                       <th>Upzila</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
              
                  @foreach($doner as $key=>$doners)
                    <tr>
                      <td>{{$key+1}}</td>
                      <td>{{$doners->doner_name}}</td>
                      <td>{{$doners->blood_group}}</td>
                      <td>{{$doners->mobile}}</td>
                      <td>{{$doners->division->division_name}}</td>
                      <td>{{$doners->district->district_name}}</td>
                      <td>{{$doners->upzila->upzila_name}}</td>
                      <td>
                        <div class="dropdown">
                          <a class="dropdown-toggle btn btn-info" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                            Action
                          </a>

                          <div class="dropdown-menu">
                            {{-- @if (userHasPermission('setting-update')) --}}
                            <a class="dropdown-item" href="javascript:void(0)" onclick="editbutton({{$doners->id}})"><i class="fas fa-edit mr-2"></i> Edit</a>
                            {{-- @endif --}}
                           
                            <a class="dropdown-item text-danger" href="{{route('doner.delete',$doners->id) }}" onclick="return confirm('Are you sure to delete this data..??')"><i class="fas fa-trash mr-2"></i>Delete</a>
                            
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
        <h5 class="modal-title text-success" id="exampleModalLabel">Add Doner</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('doner.store')}}" method="post">
            @csrf
            <div class="form-group text-success">
                <label for="name">Doner Name</label>
                <input type="text" name="doner_name" class="form-control" id="name" required>
            </div>
            <div class="form-group text-success">
                <label for="name">Blood Group</label>
                <input type="text" name="blood_group" class="form-control" id="name" required>
            </div>
            <div class="form-group text-success">
                <label for="name">Mobile</label>
                <input type="text" name="mobile" class="form-control" id="name" required>
            </div>
            <div class="form-group text-success">
              <label for="division_name">Division</label>
              <select name="division_id" class="form-control selectpicker" title="select division" required
                  id="division_id">
                  <option value="">---Select Division---</option>
                  @foreach ($division as $item)
                      <option value="{{ $item->id }}">{{ $item->division_name }}</option>
                  @endforeach
              </select>
          </div>
          <div class="form-group text-success">
              <label for="district_name">District</label>
              <select name="district_id" class="form-control selectpicker" title="select division" required
                  id="district_id">
                  <option value="">---Select District---</option>
                  @foreach ($district as $item)
                      <option value="{{ $item->id }}">{{ $item->district_name }}</option>
                  @endforeach
              </select>
          </div>

          <div class="form-group text-success">
              <label for="district_name">Upzila</label>
              <select name="upzila_id" class="form-control selectpicker" title="select division" required
                  id="district_id">
                  <option value="">---Select upzila---</option>
                  @foreach ($upzila as $item)
                      <option value="{{ $item->id }}">{{ $item->upzila_name }}</option>
                  @endforeach
              </select>
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
        <h5 class="modal-title text-success" id="exampleModalLabel">Update Doner</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('doner.update')}}" method="POST">
          @csrf
          <div class="form-group text-success">
              <input type="hidden" name="update_id" id="update_id" />
              <label for="doner_name">Doner Name</label>
              <input type="text" name="doner_name" class="form-control" id="update_name">
          </div>
          <div class="form-group text-success">
            <label for="blood_group">Blood Group</label>
            <input type="text" name="blood_group" class="form-control" id="update_group" required>
        </div>
        <div class="form-group text-success">
            <label for="mobile">Mobile</label>
            <input type="text" name="mobile" class="form-control" id="update_mobile" required>
        </div>
        <div class="form-group text-success">
          <label for="division_name">Division</label>
          <select name="division_id" class="form-control selectpicker" title="select division" required
              id="update_division">
              <option value="">---Select Division---</option>
              @foreach ($division as $item)
                  <option value="{{ $item->id }}">{{ $item->division_name }}</option>
              @endforeach
          </select>
      </div>
      <div class="form-group text-success">
          <label for="district_name">District</label>
          <select name="district_id" class="form-control selectpicker" title="select division" required
              id="update_district">
              <option value="">---Select District---</option>
              @foreach ($district as $item)
                  <option value="{{ $item->id }}">{{ $item->district_name }}</option>
              @endforeach
          </select>
      </div>

      <div class="form-group text-success">
          <label for="district_name">Upzila</label>
          <select name="upzila_id" class="form-control selectpicker" title="select division" required
              id="update_upzila">
              <option value="">---Select upzila---</option>
              @foreach ($upzila as $item)
                  <option value="{{ $item->id }}">{{ $item->upzila_name }}</option>
              @endforeach
          </select>
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
            var url = '{{ Route("doner.edit",":id") }}'
            url = url.replace(':id',Id)
            $.get(url,
              function (data) {
                $('#update_name').val(data.doner_name);
                $('#update_group').val(data.blood_group);
                $('#update_mobile').val(data.mobile);
                $('#update_division').val(data.division_name);
                $('#update_district').val(data.district_name);
                $('#update_upzila').val(data.upzila_name);
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
