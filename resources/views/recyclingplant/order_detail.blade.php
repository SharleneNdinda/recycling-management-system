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
          @forelse($order as $order)
         <div class="card featured">
            <div class="card-header"> New Order
             </div>
                <form  method="POST" action="{{ route('order.create') }}">
                    @csrf
                               
                        
                    <div class="card-body">
                        <h5 class="card-title"> Order Number #{{$order->order_id}}  Details  </h5>
                        <p> Collection Center {{$order->collectioncenter_id}} offered you  {{$order->quantity}} KG's of plastic  </p>
                        <p> Proceed To Make Payment For Your Order To Be Fulfilled </p>
                         <a href="{{ route('payment.view', $order->order_id) }}" class="btn btn-primary">Make Payment</a>
                    </div>
                    </form>
                </div>
                   @empty
                             <div class="form-row">
                                <div class="form-group col-md-12">
                                    <p class="empty">Theres Nothing Here</p>
                                </div>
                         </div>

        @endforelse 
         </div>
</body>
</html>

<script src="//code.jquery.com/jquery.js"></script> 
@include('flashy::message')
 

@endsection('content')
  

