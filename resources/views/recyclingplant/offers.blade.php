@extends('layouts.recyclingdash')

@section('content')  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/offers.css') }} ">
    <title>Rebotto</title>

</head>
<body>
 <div class="container">
          @forelse($offers as $offers)
         <div class="card featured">
            <div class="card-header"> NEW OFFER
             </div>
                <form  method="POST" action="{{ route('order.create') }}">
                    @csrf
                                <div class="form-group">
                                    <input  class="form-control" aria-describedby="emailHelp" name="recyclingplant_id" hidden  value="{{ Auth::user()->id }}">
                                </div>
                                <div class="form-group">
                                    <input  class="form-control" aria-describedby="emailHelp" name="offer_id" hidden  value=" {{$offers->offer_id}} ">
                                </div>
                                <div class="form-group">
                                    <input  class="form-control" aria-describedby="emailHelp" name="collectioncenter_id"  hidden value=" {{$offers->collectioncenter_id}} ">
                                </div>
                        
                    <div class="card-body">
                        <h5 class="card-title"> You got an offer for {{$offers->quantity}} Kgs  </h5>
                        <p> {{$offers->offer_description}}</p>
                        <a href="#" class="btn btn-primary">View More</a>
                        <button type="submit" class="btn btn-primary">Accept</button>
                        <a href="#" class="btn btn-primary">Decline</a> 
                    </div>
                    </form>
                </div>
                   @empty
                             <div class="form-row">
                                <div class="form-group col-md-12">
                                    <p class="empty">You Have No Offers At The Moment</p>
                                </div>
                         </div>

        @endforelse 
         </div>
</body>
</html>

<script src="//code.jquery.com/jquery.js"></script> 
@include('flashy::message')
 

@endsection('content')
  

