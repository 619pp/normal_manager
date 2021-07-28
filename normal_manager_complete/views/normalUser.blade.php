@extends('layout')
@section('content')
<link rel="stylesheet" href="css/main.css" >
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
      <h3 class="navbar-brand">MindTree</h3>
      <a href={{"/login"}}><button class="btn btn-secondary my-2 my-sm-0">Logout</button></a>

    </div>
</nav>
<br>
<div class="container">
  <h4 class=" bg-info text-center" >Your details </h4>
  <div class="table-responsive">
     <table class="table align-middle table-hover">
       <thead class="thead-dark">
        <tr>
      <td scope="col">emp_id</td>
      <td scope="col">emp_firstname</td>
      <td scope="col">emp_lastname</td>
      <td scope="col">mobile_num</td>
      <td scope="col">date_of_birth</td>
      <td scope="col">gender</td>
      <td scope="col">comm_address</td>
      <td scope="col">city</td>
      <td scope="col">user_type</td>
      <td scope="col">userName</td>
      <td scope="col">Operation</td>
    </tr>
  </thead>

    @foreach ($employee as $emp)
    <tr>
      <td>{{$emp->emp_id}}</td>
      <td>{{$emp->emp_firstname}}</td>
      <td>{{$emp->emp_lastname}}</td>
      <td>{{$emp->mobile_num}}</td>
      <td>{{$emp->date_of_birth}}</td>
      <td>{{$emp->gender}}</td>
      <td>{{$emp->comm_address}}</td>
      <td>{{$emp->city}}</td>
      <td>{{$emp->user_type}}</td>
      <td>{{$emp->userName}}</td>
      <td>
        <a href={{"editMobileNormalUser/".$emp->emp_id}} class="btn btn-success"><i class="fa fa-pencil" aria-hidden="true"></i> Edit </a>
      </td>
    </tr>
   @endforeach
</table>
  </div>
</div>
<br>

<div class="container ">
  <div class="row ">
      <div style="height: 200px ;" class="col-md-6 offset-md-3 ">
        <h3 class="feature-title">Raise a issue</h3>
        <form action="/createIssueNormal" method="POST" >
   @csrf
  <div class="form-group">
  <lable>Employee ID :</lable>
  <input type="text" class="form-control" name="emp_id" value = "{{$emp->emp_id}}" disabled><br>
  </div>

  <div class="form-group">
  <lable>Issue Type :</lable>
  <input type="text" class="form-control" name="issue_type" placeholder="Enter issue type"><br>
  </div>

  <div class="form-group">
  <lable>Issue Description :</lable>
  <input type="text" class="form-control" name="issue_desc" placeholder="Enter issue description"><br>
  </div>


  <button type="submit" class="btn btn-success">Submit issue </button>
 </form>
        </div>
  </div>
</div>






@stop
