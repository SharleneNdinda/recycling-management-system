@extends('layouts.consumer')

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

          @forelse($deposits as $deposits)
         <div class="card featured">
            <div class="card-header"> You Made A Deposit
             </div>
                <form  method="POST" action="{{ route('dispatch.store') }}">
                    @csrf
                               
                        
                    <div class="card-body">
                        <h5 class="card-title"> You Deposited {{$deposits->amount}} KG's of Plastic at  {{$deposits->name}} Collection Center  </h5>
                        <p> Thank You For Using Our Services And Making The Earth Greener</p>
                        <a href="" class="btn btn-primary">Check Your Points</a>

                    </div>
                    </form>
                </div>
                   @empty
                             <div class="form-row">
                                <div class="form-group col-md-12">
                                    <p class="empty">You Haven't Made Any Deposits</p>
                                </div>
                         </div>

        @endforelse 
         </div>
</body>
</html>

<script src="//code.jquery.com/jquery.js"></script> 
@include('flashy::message')
 

@endsection('content')
  

