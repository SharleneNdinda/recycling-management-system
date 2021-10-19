
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="{{ asset('css/login.css') }} ">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}">
    <style>@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap');</style>
    <title>Rebotto: Login</title>
</head>
<body>
    
<div class="container">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

</div>

<div class="wrapper">
    <div class="pic">
        <img src="{{url('/images/ill1.png')}}" alt="">
    </div>
    <div class="login">
       <form  method="POST" action="{{  route('login') }}">
        @csrf
 
          <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" placeholder="Enter Your Email">
            <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
        </div>

        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password">
        </div>
        
 
     
        <a class="small" href="{{route('register')}}">Not Registered?</a>
        <button type="submit" class="btn btn-primary">Log In </button>
        </form>
    </div>
</div>
    
</body>
</html>
 

