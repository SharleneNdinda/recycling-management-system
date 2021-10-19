 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="{{ asset('css/auth.css') }} ">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}">
    <style>@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap');</style>
    <title>Rebotto: Register</title>
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
        <img src="{{url('/images/ill2.png')}}" alt="">
    </div>
    <div class="login">
       <form  method="POST" action="{{  route('register') }}">
        @csrf

           <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name" placeholder="Enter Your Email">
            <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
        </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" placeholder="Enter Your Email">
            <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
        </div>

        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password">
        </div>
        
         <div class="form-group">
            <label for="exampleInputPassword1">Confirm Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="password_confirmation" placeholder="Password">
        </div>

            <div class="form-group">
            <label for="exampleInputEmail1">Register As </label>
                <select name="role_id" class="form-control">
                  <option value="consumer">Consumer</option>
                  <option value="collectioncenter">Collection Center</option>
                  <option value="recyclingplant">Recycling Plant</option>
                </select>
        
            </div>
     
        <a class="small" href="{{route('login')}}">Already Registered ?</a>
        <button type="submit" class="btn btn-primary">Register</button>
        </form>
    </div>
</div>
    
</body>
</html>
 
