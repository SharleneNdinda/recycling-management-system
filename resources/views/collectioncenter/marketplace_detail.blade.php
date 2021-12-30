@extends('layouts.collectiondash')

@section('content')  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">w
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/marketplace_detail.css') }} ">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
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

   @if(count($errors) > 0 )
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <ul class="p-0 m-0" style="list-style: none;">
                                @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
    <div class="row">
        <div class="col-2">
            <img src="{{url('/images/ill2.png')}}" alt="" class="profile_img">

        </div>
     @foreach($bids as $bids)
        <div class="col-6">
            <h1>{{$bids->name}} </h1>
            <h4> {{$bids->description}}</h4>
            <p class="rate"> {{$bids->amount_of_plastic}} KG for Ksh. {{$bids->buying_rate}}</p>
            <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Make Offer
</button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Make Your Offer</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                   
                                                <form  method="POST" action="{{ route('offer.create') }}">
                            @csrf 
                            <div class="form-row">
                                    @foreach($stocks as $stocks)
                                <div class="form-group col-md-12">
                                <label for="input   Email4">Amount of Plastic In Current Inventory</label>
                                <input type="number" class="form-control"  readonly value="{{$stocks->in_stock}}" placeholder="{{$stocks->in_stock}} Kgs" name="stock">
                                </div>
                                 @endforeach 

                                <div class="form-group col-md-12">
                                <label for="input   Email4">Amount of Plastic Offering In KGs</label>
                                <input type="number" class="form-control"  placeholder="Number of kgs" name="quantity">
                                </div>
                                    
                                </div>
                                
                                <div class="form-group">
                                    <label for="inputAddress2">Description</label>
                                    <input type="text" class="form-control"  placeholder="A short description" name="description">
                                </div>

                                <div class="form-group">
                                        <input  class="form-control" aria-describedby="emailHelp" name="collectioncenter_id" hidden value="{{ Auth::user()->id }}">
                                </div>

                                 <div class="form-group">
                                        <input  class="form-control" aria-describedby="emailHelp" name="bid_id" hidden value="{{$bids->bidID}}">
                                </div>
                              <button type="submit" class="btn btn-primary modalsubmit">Submit</button>
                     </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                </div>
                </div>
            </div>
            </div>
            <!-- Modal -->

                    </div>
      
               @endforeach  

    </div>
       
    
   
</div>
</body>
</html>

<script src="//code.jquery.com/jquery.js"></script> 
@include('flashy::message')

@endsection('content')
   
 