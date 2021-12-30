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

          @forelse($orders as $orders)
         <div class="card featured">
            <div class="card-header"> New Order
             </div>
                <form  method="POST" action="{{ route('dispatch.store') }}">
                    @csrf
                               
                        
                    <div class="card-body">
                        <h5 class="card-title"> Order Number #{{$orders->order_id}}  Is Good To Go  </h5>
                        <p> Please Proceed To Dispatch The Order Within Three Business Days</p>
                        <a href="{{ route('collection_orders.detail', $orders->order_id) }}" class="btn btn-primary">View Order Details</a>
                        
                        <!-- hidden tracking values -->
                        <input  class="form-control"  name="order_id" hidden value="{{$orders->order_id}} ">
                        <input  class="form-control"  name="status" hidden value="Dispatched">
                        <!-- hidden tracking values -->

                        <button type="submit" class="btn btn-primary">Dispatch Order</button>

                    </div>
                    </form>
                </div>
                   @empty
                             <div class="form-row">
                                <div class="form-group col-md-12">
                                    <p class="empty">You Have No Orders At The Moment</p>
                                </div>
                         </div>

        @endforelse 
         </div>
</body>
</html>

<script src="//code.jquery.com/jquery.js"></script> 
@include('flashy::message')
 

@endsection('content')
  

