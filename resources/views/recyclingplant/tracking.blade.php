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
          @forelse($tracked as $tracked)    
         <div class="card featured">
            <div class="card-header"> Order Tracking
             </div>
                <form  method="POST" action="{{ route('order.create') }}">
                    @csrf
                               
                        
                    <div class="card-body">
                        <h5 class="card-title"> Your Order Has Been dispatched And Will Be Delivered Soon   </h5>
                        <p> Please make sure you are available to receive the package</p>
                        <p> Tracking Number {{$tracked->tracking_id}}</p>
                        <p> Status : {{$tracked->status}}</p>

                        <a href="{{ route('collection_orders.detail', $tracked->tracking_id) }}" class="btn btn-primary">View Tracking Details</a>

                    </div>
                    </form>
                </div>
                   @empty
                             <div class="form-row">
                                <div class="form-group col-md-12">
                                    <p class="empty">You Have No Orders Dispatched At The Moment</p>
                                </div>
                         </div>
        @endforelse 
         </div>
</body>
</html>

<script src="//code.jquery.com/jquery.js"></script> 
@include('flashy::message')
 

@endsection('content')
  

