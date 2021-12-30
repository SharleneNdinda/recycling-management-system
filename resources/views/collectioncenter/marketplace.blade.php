@extends('layouts.collectiondash')

@section('content')  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">w
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/marketplace.css') }} ">
    <title>Rebotto</title>

</head>
<body>
 

<div class="container">
    
       
     <div class="row">
         </div>
        <div class="form_head">
            <h5>Welcome To The Marketplace</h5>

                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search Bar Here" aria-label="" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn searchbtn" type="button">Search</button>
                    </div>
               </div>


     </div>
     <div class="filters">
            <button type="button" class="btn fiterbtn ">All</button>
            <button type="button" class="btn fiterbtn ">Near Me</button>
            <button type="button" class="btn fiterbtn ">Nairobi</button>
    </div>

       <div class="row card__row">
              @foreach($bids as $bids)
            <div class="col-sm">
                <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="{{url('/images/ill2.png')}}" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">{{$bids->name}}</h5>
                    <p class="card-text">{{$bids->description}}</p>
                    <p class="card-text"> {{$bids->amount_of_plastic}} KG for Ksh. {{$bids->buying_rate}}</p>
                    <a href="{{ route('market.detail', $bids->bidID) }}"" class="btn btn-primary">View Bid</a>
                </div>
                </div>
            </div>
               @endforeach  
  
    
     </div>
            </div>
</div>
</div>
</body>
</html>

<script src="//code.jquery.com/jquery.js"></script> 
@include('flashy::message')


@endsection('content')
   
 