 @extends('layouts.admin')

 
@section('content')  

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/reports.css') }} ">
    <title>Rebotto</title>

</head>
<body>
 

<div class="container">
    <div class="row">
        <div class="col-sm-3 ">
            <div class="card  h-100" style="width: 18rem;">
                <div class="card-body">
                <h5 class="card-title"> Total Deposits </h5>
                       <p class="deposits"> {{$deposits}}</p>  
            </div>
            </div>
        </div>

        <div class="col-sm-3 ">
            <div class="card  h-100" style="width: 18rem;">
                <div class="card-body">
                <h5 class="card-title">Collection Centers</h5>
                  <p class="deposits"> {{$collectioncenters}}</p>  
            </div>
            </div>
        </div>
 
         
    </div> 
        
               
</div>
</body>
</html>

<script src="//code.jquery.com/jquery.js"></script> 
@include('flashy::message')


@endsection('content')
  

