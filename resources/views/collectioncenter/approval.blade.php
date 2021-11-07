@extends('layouts.collectiondash')

@section('content')  

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/deposit.css') }} ">
    <title>Rebotto</title>

</head>
<body>
 

<div class="container">
     
    

        <div class="card approval">
            <div class="card-header">
             </div>
            <div class="card-body">
                <h5 class="card-title">Sorry You Need Approval To Access This Page</h5>
            </div>
        </div>

        

</div>
</body>
</html>
<script src="//code.jquery.com/jquery.js"></script> 
@include('flashy::message')


@endsection('content')
  

