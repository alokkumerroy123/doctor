@extends('layouts.frontend')
@section('main')
<div class="container">
    <h1 class="text-center bg-success">Blood Doner List Near You</h1>
<table class="table table-striped table-dark">
    <thead>
      <tr>
        <th scope="col">Serial</th>
        <th scope="col">Name</th>
        <th scope="col">Mobile</th>
        <th scope="col">Blood Group</th>
        <th scope="col">Division</th>
        <th scope="col">District</th>
        <th scope="col">Upzila</th>
    
      </tr>
    </thead>
    @foreach($blood as $key=>$datas)
    <tbody class="bg-light">
      <tr>
        <th scope="row">{{$key+1}}</th>
        <td>{{$datas->doner_name}}</td>
        <td>{{$datas->mobile}}</td>
        <td>{{$datas->blood_group}}</td>
        <td>{{$datas->division_name}}</td>
        <td>{{$datas->district_name}}</td>
        <td>{{$datas->upzila_name}}</td>
      </tr>
    
    </tbody>
    @endforeach
  </table>
</div>
@endsection