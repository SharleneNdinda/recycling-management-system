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
    <div class="row">
        <div class="col-sm-3 ">
            <div class="card  h-100" style="width: 18rem;">
                <div class="card-body">
                <h5 class="card-title">Your Total Deposits </h5>
                <p class="deposits"> {{$deposits_count}}</p>
            </div>
            </div>
        </div>
    
          
  @foreach($stocks as $stocks)
 <div class="row">
        <div class="col-sm-3 ">
            <div class="card  h-100" style="width: 18rem;">
                <div class="card-body">
                <h5 class="card-title"> Your Inventory Stock </h5>
                <p class="deposits"> {{$stocks->in_stock}} KG</p>
            </div>
            </div>
        </div>
</div>
@endforeach  

       
         
    </div>
        <div class="form_head">
            <h5>Add New Deposit</h5>
        </div>
        <!-- deposit form  -->      
                <form class="depo_form" method="POST" action="{{ route('deposit.create') }}">
                      @csrf 
                    <div class="form-row">
                        <div class="form-group col-md-6">
                        <label for="inputPassword4">Find Depositer</label>
                              <select class="form-control" name="consumer">
                                   <option>Choose Depositer From List</option>

                                 @foreach($users as $user)
                                   <option value="{{$user->id}}">{{$user->email}}</option>
                                 @endforeach  
                                 
    	                      </select>
                        </div>
                        
                        <div class="form-group col-md-6">
                        <label for="inputPassword4">Amount</label>
                        <input type="number" class="form-control" id="inputPassword4" name="amount" placeholder="Enter Amount in KGs">
                        </div>

                          <div class="form-group">
                            <input  class="form-control" aria-describedby="emailHelp" name="collectioncenter_id" hidden value="{{ Auth::user()->id }}">
                        </div>
                    </div>
                
                <button type="submit" class="btn btn-primary my_btn">Create Deposit</button>
                </form>    
        <!-- deposit form  -->

                                 @foreach($deposits as $deposits)
                                
        <div class="card featured">
            <div class="card-header">
             </div>
            <div class="card-body">
                <h5 class="card-title">{{$deposits->name}}</h5>
                <p class="card-text"> {{$deposits->name}} made a deposit of {{$deposits->amount}} KG on {{$deposits->created_at}}. View more to see more details about your deposit. Thank you for choosing us. </p>
                <a href="#" class="btn btn-primary">View More</a>
            </div>
        </div>
 @endforeach  
         

</div>
</body>
</html>

<script src="//code.jquery.com/jquery.js"></script> 
@include('flashy::message')


@endsection('content')
  
