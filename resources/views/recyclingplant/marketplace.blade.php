 @extends('layouts.recyclingdash')
@section('content')  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/recyclingmarketplace.css') }} ">
    <style>@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap');</style>
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>

    <title>Rebotto</title>

</head>
<body>
 
 <div class="container">

     
    
       
     <div class="row">
         </div>
        <div class="form_head">
            <h5>Welcome To The Marketplace</h5>

                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search Bar Here" aria-label="" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn searchbtn" type="button">Search</button>
                    </div>
               </div>


     </div>
     <div class="filters">
            <button type="button" class="btn fiterbtn ">All</button>
            <button type="button" class="btn fiterbtn ">Near Me</button>
            <button type="button" class="btn fiterbtn ">Nairobi</button>
    </div>

       <div class="row card__row">
            <div class="col-sm">
                <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="{{url('/images/ill1.png')}}" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
                </div>
            </div>
            <div class="col-sm">
                    <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="{{url('/images/ill2.png')}}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                    </div>
            </div>
                 <div class="col-sm">
                    <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="{{url('/images/ill1.png')}}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                    </div>
            </div>
            <div class="col-sm">
                    <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="{{url('/images/ill2.png')}}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                    </div>
        </div>
         <div class="col-sm">
                    <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="{{url('/images/ill2.png')}}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                    </div>
        </div>

          <div class="col-sm">
                    <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="{{url('/images/ill2.png')}}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                    </div>
        </div>
          <div class="col-sm">
                    <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="{{url('/images/ill2.png')}}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                    </div>
        </div>
          <div class="col-sm">
                    <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="{{url('/images/ill2.png')}}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                    </div>
        </div>
     </div>
            </div>

 </div>
</body>
</html>

<script src="//code.jquery.com/jquery.js"></script> 
@include('flashy::message')


   @endsection('content')


