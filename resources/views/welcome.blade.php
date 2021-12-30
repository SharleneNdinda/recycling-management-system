
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/home.css') }} ">
     <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <title>Rebotto</title>

</head>
<body>
  <section  style="background-image: url(/images/bg.png);">
    <header>
      <h2><a href="#" class="logo">Rebotto</a></h2>
      <div class="navigation">
        <a href="">Home</a>
        <a href="{{ route('login') }}">Login</a>
        <a href="{{ route('register') }}">Sign Up</a>
        <a href="">Services</a>
      </div>
    </header>
    <div class="content">
      <div class="info">
        <h2>Go Green <br><span>Go Better!</span></h2>
        <p>Sign Up today and make your first deposit. Earn green points for every deposit you make. Find a collection center near you using our integrated map feature and help reduce the rate of plastic pollution in Kenya today</p>
        <a href="" class="info__btn">Get Started</a>
      </div>
    </div>

    <div class="icons">
     <a href=""><i class='bx bxl-facebook'></i> </a> 
       <a href=""><i class='bx bxl-twitter' ></i> </a>
       <a href=""> <i class='bx bxl-instagram' ></i></a> 
    </div>
  </section>

</body>
</html>
