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
          @forelse($orders as $orders)
         <div class="card featured">
            <div class="card-header"> Order Processing
             </div>
                <form  method="POST" action="{{ route('order.create') }}">
                    @csrf
                               
                        
                    <div class="card-body">
                        <h5 class="card-title"> Order Number #{{$orders->order_id}}  Is Awaiting Payment</h5>
                        <p> </p>
                        <a href="{{ route('order.detail', $orders->order_id) }}" class="btn btn-primary">View More</a>
                         <a href="{{ route('payment.view', $orders->order_id) }}" class="btn btn-primary">Make Payment</a>

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
  

