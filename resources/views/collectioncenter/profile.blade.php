@extends('layouts.collectiondash')

@section('content')  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/marketplace.css') }} ">
    <title>Rebotto</title>

</head>
<body>
 

<div class="container">
@if(session()->has('message'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <ul class="p-0 m-0" style="list-style: none;">
        
        <li> {{ session()->get('message') }}</li>
       
    </ul>
</div>
@endif
  <form  method="POST" action="{{ route('details.create') }}">
    @csrf 

    <div class="form-group">
      <label for="exampleInputEmail1">Please Provide Your Business Identification Number</label>
      <input type="number" class="form-control" name="business_number" placeholder="Enter Business Number">
      <small id="emailHelp" class="form-text text-muted">We'll never share your details with anyone else.</small>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Please Provide Your Current Location</label>
      <input type="text" class="form-control" name="location"  placeholder="Choose Current Location">
    </div>
       <div class="form-group">
         <input  class="form-control" aria-describedby="emailHelp" name="collectioncenter_id" hidden value="{{ Auth::user()->id }}">
      </div>

    
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
  
</div>

</body>
</html>

<script src="//code.jquery.com/jquery.js"></script> 
@include('flashy::message')


@endsection('content')
   
 