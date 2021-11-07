@extends('layouts.admin')

 
@section('content')  

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/users.css') }} ">
    <title>Rebotto</title>

</head>
<body>
 

<div class="container">

     <div class="form_head">
            <h5>User management</h5>
        </div>

    <table class="table">
  <thead class="table-striped table-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Edit User</th>
      <th scope="col">Delete Users</th>
    </tr>
  </thead>
  <tbody>

 @foreach($users as $user) 
    <tr>
      <th scope="row">{{$user->id}}</th>
      <td>{{$user->name}}</td>
      <td>{{$user->email}}</td>
      <td> <button type="button" class="btn btn-success">Edit User</button></td>
      <td> <button type="button" class="btn btn-danger">Delete User</button></td>

     
    </tr>
@endforeach  
 
  </tbody>
</table>
 
</table>
        
               
</div>
</body>
</html>


<script src="//code.jquery.com/jquery.js"></script> 
@include('flashy::message')


@endsection('content')
  