@extends('layouts.nav')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/home.css') }} ">
    <title>Rebotto</title>

</head>
<body>

    <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
      <div class="overlay-image"  style="background-image: url(/images/step1.png);"></div>
        <div class="container">
          <h1>HOW IT WORKS</h1>
          <p>Create an account and proceed to make a deposit at your nearest collection center.</p>
             <a href="#" class="btn btn-primary">Get Started</a>
        </div>
      </div>
      <div class="carousel-item" >
      <div class="overlay-image"  style="background-image: url(/images/step1.png);"></div>
        <div class="container">
          <h1>Example</h1>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. 
            Vitae aliquam alias placeat reiciendis nobis, deleniti distinctio libero eum obcaecati molestias.
             Repudiandae ipsa inventore eius eos quidem a eum illum incidunt.</p>
             <a href="#" class="btn btn-primary">Get Started</a>
        </div>
      </div>
      <div class="carousel-item">
        <div class="overlay-image"  style="background-image: url(/images/step1.png);"></div>
        <div class="container">
          <h1>Example</h1>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. 
            Vitae aliquam alias placeat reiciendis nobis, deleniti distinctio libero eum obcaecati molestias.
             Repudiandae ipsa inventore eius eos quidem a eum illum incidunt.</p>
             <a href="#" class="btn btn-primary">Get Started</a>
        </div>
      </div>
      
    </div>
  </div>
 

</body>
</html>
  <script src="//code.jquery.com/jquery.js"></script>
    @include('flashy::message')
@endsection
