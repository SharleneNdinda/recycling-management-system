@extends('layouts.recyclingdash')

@section('content')  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/rate.css') }} ">
    <title>Rebotto</title>

</head>
<body>
    <div class="container">
           
 @if($errors->any())
    @foreach ($errors->all() as $error)
        <div>{{ $error }}</div>
    @endforeach
@endif
         <div class="row">
            <div class="col">
                <div class="form_head">
            <h5>Create Your Bid Here</h5>
       </div>
                <form  method="POST" action="{{ route('bid.store') }}">
                      @csrf 
                    <div class="form-row">
                        <div class="form-group col-md-12">
                        <label for="input   Email4">Description</label>
                        <input type="text" class="form-control"  placeholder="Give a Description" name="description">
                        </div>
                        
                    </div>
                    
                    <div class="form-group">
                        <label for="inputAddress2">Your Rate</label> 
                         <select class="form-control" name="rate">
                                   <option value="" disabled selected>Select Your Rate</option>

                                 @foreach($rate as $rate)
                                   <option value="{{$rate->rateID}}">{{$rate->rate_name}}</option>
                                 
    	                      </select>
                    </div>

                      <div class="form-group">
                            <input  class="form-control" aria-describedby="emailHelp" name="recyclingplant_id" hidden value="{{ Auth::user()->id }}">
                        </div>
                          <div class="form-group">
                            <input  class="form-control" aria-describedby="emailHelp" name="plant_name" hidden value="{{ Auth::user()->name }}">
                        </div>
<!--                    
                    <div class="form-group">
                        <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="gridCheck">
                        <label class="form-check-label" for="gridCheck">
                            I agree to the terms and conditions of trading using this platform. 
                        </label>
                        </div>
                    </div> -->
                    <button type="submit" class="btn btn-primary">Submit</button>

            </form>
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
            
            </div>
            <div class="col">
                  <div class="form_head">
            <h5>Current Active Bid</h5>
       </div>
       
                          @forelse($bid as $bid)
                                     
               <form class="display__form">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                           <h5 class="rate_text">Description</h5>

                            <p class="description"> {{$bid->description}}</p>
                        </div>
                        
                    </div>
                    
                    <div class="form-group">
                           <h5 class="rate_text">Buying Rate</h5>
                      
                            <p class="deposits">{{$rate->buying_rate}} KSH</p>
                    </div>
                   
                    
            </form>

                <div class="col">
                  <div class="form_head">
            <h5>Edit Your Rate Here</h5>
       </div>
                
               <form  method="POST" action="{{ route('bid.update') }}">
                      @csrf 
                    <div class="form-row">
                        <div class="form-group col-md-12">
                        <label for="input   Email4">Your Description</label>
                        <input type="text" class="form-control"  name="description" value="{{$bid->description}}">
                        </div>
                        
                    </div>
                      <div class="form-group">
                            <input  class="form-control" aria-describedby="emailHelp" name="recyclingplant_id" hidden value="{{ Auth::user()->id }}">
                        </div>
                    <button type="submit" class="btn btn-primary">Update</button>

            </form>
              @empty
                         <form class="display__form">
                    <div class="form-row">
                        <div class="form-group col-md-12">

                            <p class="empty">You have no active rate</p>
                        </div>
                        
                    </div>

               @endforelse  
               @endforeach    


            </div>
  </div>

    </div>
 
</body>
</html>

<script src="//code.jquery.com/jquery.js"></script> 
@include('flashy::message')


@endsection('content')
  

