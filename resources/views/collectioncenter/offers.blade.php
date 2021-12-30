@extends('layouts.collectiondash')

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
      <div class="form_head">
            <h5>Unapproved Offers</h5>
        </div>
          @forelse($offers as $offers)
         <div class="card featured">
            <div class="card-header">  YOUR OFFER IS PENDING APPROVAL
             </div>
                <!-- <form  method="POST" action="{{ route('order.create') }}">
                    @csrf
                                <div class="form-group">
                                    <input  class="form-control" aria-describedby="emailHelp" name="recyclingplant_id" hidden  value="{{ Auth::user()->id }}">
                                </div>
                                <div class="form-group">
                                    <input  class="form-control" aria-describedby="emailHelp" name="offer_id" hidden  value=" {{$offers->offer_id}} ">
                                </div>
                                <div class="form-group">
                                    <input  class="form-control" aria-describedby="emailHelp" name="collectioncenter_id"  hidden value=" {{$offers->collectioncenter_id}} ">
                                </div> -->
                        
                    <div class="card-body">
                        <h5 class="card-title"> You Offered {{$offers->quantity}} Kgs of Plastic to {{$offers->plant_name}}  Recycling Plant </h5>
                        <p> Description : {{$offers->offer_description}}</p>
                        <a href="#" class="btn btn-primary">View More</a>
                        <button type="submit" class="btn btn-primary">Delete Offer</button>
                    </div>

                    <!-- </form> -->
                </div>
                   @empty
                             <div class="form-row">
                                <div class="form-group col-md-12">
                                    <p class="empty">You Have No Offers At The Moment</p>
                                </div>
                         </div>
                    @endforelse 

                        <a href="#" class="btn btn-primary view-more">View More</a>


                      <div class="form_head">
                             <h5>Approved Offers</h5>
                      </div>

                       @forelse($accepted_offers as $offers)
         <div class="card featured">
            <div class="card-header">  YOUR OFFER WAS APPROVED
             </div>
                <!-- <form  method="POST" action="{{ route('order.create') }}">
                    @csrf
                                <div class="form-group">
                                    <input  class="form-control" aria-describedby="emailHelp" name="recyclingplant_id" hidden  value="{{ Auth::user()->id }}">
                                </div>
                                <div class="form-group">
                                    <input  class="form-control" aria-describedby="emailHelp" name="offer_id" hidden  value=" {{$offers->offer_id}} ">
                                </div>
                                <div class="form-group">
                                    <input  class="form-control" aria-describedby="emailHelp" name="collectioncenter_id"  hidden value=" {{$offers->collectioncenter_id}} ">
                                </div> -->
                        
                    <div class="card-body">
                        <h5 class="card-title"> You Offered {{$offers->quantity}} Kgs of Plastic to {{$offers->plant_name}} Recycling Plant </h5>
                        <p> Description : {{$offers->offer_description}}</p>
                        <a href="#" class="btn btn-primary">View More</a>
                    </div>
                    <!-- </form> -->
                </div>
                   @empty
                             <div class="form-row">
                                <div class="form-group col-md-12">
                                    <p class="empty">You Have No Offers At The Moment</p>
                                </div>
                         </div>
                    @endforelse 
                        <a href="#" class="btn btn-primary view-more">View More</a>
                             
         </div>
</body>
</html>

<script src="//code.jquery.com/jquery.js"></script> 
@include('flashy::message')
 

@endsection('content')
  

