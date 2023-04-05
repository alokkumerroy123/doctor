@extends('layouts.frontend')
@section('main')
<div class="container">
    <h1 class="text-center bg-success">Best Doctor Near You</h1>
<table class="table table-striped table-dark">
    <thead>
      <tr>
        <th scope="col">Serial</th>
        <th scope="col">Photo</th>
        <th scope="col">Doctor Name</th>
        <th scope="col">Speclist</th>
        <th scope="col">Division</th>
        <th scope="col">District</th>
        <th scope="col">Upzila</th>
     
      </tr>
    </thead>
    @foreach($info as $key=>$datas)
    <tbody class="bg-light">
      <tr>
        <th scope="row">{{$key+1}}</th>
        <td>
          <img src="{{ asset('uploads/doctors/' . $datas->photo) }}" width="50px">
        </td>
        <td>{{$datas->doctor_name}}</td>
        <td>{{$datas->specialist_name}}</td>
        <td>{{$datas->division_name}}</td>
        <td>{{$datas->district_name}}</td>
        <td>{{$datas->upzila_name}}</td>
      </tr>
    
    </tbody>
    @endforeach
  </table>
</div>
@endsection