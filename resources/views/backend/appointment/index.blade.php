@extends('layouts.backend')
@section('main')
    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">
                Appointment Doctor
            </h1>
            <ol class="breadcrumb bg-light">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Appointment</li>
            </ol>
        </div>

        <div class="row mt-3">
            <div class="col-lg-12">
                <!--toastr-->
                <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">

                {{-- <button type="button" class="btn btn-sm btn-success mr-2 mb-3"  data-toggle="modal" data-target="#AddModel">
              <i class="fa fa-plus"></i> Appointment Doctor
            </button> --}}

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
                                    <th>Type</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($doctor as $key => $doctors)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $doctors->doctor_name }}</td>
                                        <td>{{ $doctors->degree }}</td>
                                        <td>{{ $doctors->mobile }}</td>
                                        <td>{{ $doctors->chamber }}</td>
                                        <td>
                                            <span class="badge bg-warning">{{ $doctors->type}}</span>
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


    <div class="modal fade" id="AddModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Doctor</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="name">Doctor Name</label>
                            <input type="text" name="doctor_name" class="form-control" id="name" required>
                        </div>
                        <div class="form-group">
                            <label for="name">Doctor Type :</label>
                            {{-- <input type="text" name="doctor_name" class="form-control" id="name" required> --}}
                            {{-- <br><br>
            appointment<input type="checkbox" name="type[]" value="appointment">
            best doctor<input type="checkbox" name="type[]" value="best">
            general<input type="checkbox" name="type[]" value="general">
            <br><br> --}}

                            <label>
                                <span>Appointment</span>
                                <input type="checkbox" name="type[]" value="appointment">
                            </label>

                            <label>
                                <span>Best doctor</span>
                                <input type="checkbox" name="type[]" value="best">
                            </label>

                            <label>
                                <span>General</span>
                                <input type="checkbox" name="type[]" value="general">
                            </label>

                        </div>
                        <div class="form-group">
                            <label for="name">Doctor Degree</label>
                            <input type="text" name="degree" class="form-control" id="degree" required>
                        </div>
                        <div class="form-group">
                            <label for="name">Mobile</label>
                            <input type="text" name="mobile" class="form-control" id="mobile" required>
                        </div>
                        <div class="form-group">
                            <label for="name">Chamber Address</label>
                            <input type="text" name="chamber" class="form-control" id="chamber" required>
                        </div>
                        <div class="form-group">
                            <label for="name">Fee</label>
                            <input type="number" name="fee" class="form-control" id="fee" required>
                        </div>
                        <div class="form-group">
                            <label for="address">Visiting Day</label>
                            <input type="date" name="visiting_day" class="form-control" id="visiting_day" required>
                        </div>
                        <div class="form-group">
                            <label for="name">Appointment Qty</label>
                            <input type="number" name="appoinment" class="form-control" id="appoinment" required>
                        </div>
                        <button type="submit" class="btn btn-success mt-2">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Doctor</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST">
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
                                <input type="checkbox" id="update_type" name="type[]" value="appointment">
                            </label>

                            <label>
                                <span>Best doctor</span>
                                <input type="checkbox" id="update_type" name="type[]" value="best">
                            </label>

                            <label>
                                <span>General</span>
                                <input type="checkbox" id="update_type" name="type[]" value="general">
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
                            <input type="date" name="visiting_day" class="form-control" id="update_visiting"
                                required>
                        </div>


                        <div class="form-group">
                            <label for="address">Appointment Qty</label>
                            <input type="number" name="appoinment" class="form-control" id="update_appoinment"
                                required>
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
        function editbutton(Id) {
            $('#editModal').modal('show');
            var url = ''
            url = url.replace(':id', Id)
            $.get(url,
                function(data) {
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

        $('.close').click(function() {
            $('#editModal').modal('hide');
        })
    </script>
@endpush
