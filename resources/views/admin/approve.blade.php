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
            <h5>Manage Collection Centers Here</h5>
      </div>

    <table class="table">
  <thead class="table-striped table-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Email</th>
      <th scope="col">Location</th>
      <th scope="col">Business Number</th>
      <th scope="col">Edit User</th>
      <th scope="col">Delete Users</th>
    </tr>
  </thead>
  <tbody>

  @foreach($approvees as $approvees) 
    <tr>
      <th scope="row">{{$approvees->id}}</th>
      <td>{{$approvees->email}}</td>
      <td>{{$approvees->location}}</td>
      <td>{{$approvees->business_number}}</td>
      <td><a href="{{ route('admin.approve.center', $approvees->id)}}" class="approve__btn">Approve</a></td>
      <td><a href="{{ route('admin.approve.center', $approvees->id)}}" class="dissaprove__btn">Dissaprove</a></td>
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
  

