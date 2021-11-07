<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('css/dash.css') }} ">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <style>@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap');</style>
    <title>Rebotto</title>
</head>
<body>
    <div class="sidebar">
        <div class="logo-content">
            <div class="logo">
                <i class='bx bx-home-heart'></i>
                <div class="logo-name">
                    Rebotto
                </div>
            </div>
                <i class='bx bx-menu'  id="btn"></i>
        </div>
        <ul class="nav-list">
            <li>
                <a href="{{route('dashboard')}}">
                    <i class='bx bxs-dashboard' ></i>
                    <span class="links-name">Dashboard</span>
                </a>
                <!-- <span class="tooltip">Dashboard</span> -->
            </li>

             <li>
                <a href="{{route('users.view')}}">
                   <i class='bx  bxs-user'></i>
                    <span class="links-name">Users</span>
                </a>
                <!-- <span class="tooltip">Dashboard</span> -->
            </li>

              <li>
                <a href="{{route('admin.approve')}}">
                    <i class='bx bxs-time' ></i>
                    <span class="links-name">Approve</span>
                    
                </a>
                 
                <!-- <span class="tooltip">Dashboard</span> -->
            </li>
             <li>
                <a href="{{route('reports.view')}}">
                    <i class='bx bxs-book' ></i>
                    <span class="links-name">Reports</span>
                </a>
                <!-- <span class="tooltip">Dashboard</span> -->
            </li>
             <li>
                <a href="#">
                   <i class='bx bx-pie-chart' ></i>
                    <span class="links-name">Analytics</span>
                </a>
                <!-- <span class="tooltip">Dashboard</span> -->
            </li>
             <li>
                <a href="#">
                    <i class='bx bxs-cog' ></i>
                    <span class="links-name">Settings</span>
                    
                </a>
                 
                <!-- <span class="tooltip">Dashboard</span> -->
            </li>
        </ul>

        <div class="profile-content">
            <div class="profile">
                <div class="profile-details">
                    <img src="{{url('/images/ill1.png')}}" alt="">
                    <div class="name-job">
                        <div class="name">{{ Auth::user()->name }}</div>
                        <div class="job">Admin</div>
                    </div>
                </div>                
                              <form id="log_out" method="POST" action="{{ route('logout') }}">
                                @csrf
                                     <button type="submit">
                                      {{ __('Logout') }}
                                    </button>
                               
                                  </form>
            </div>
        </div>
    </div>
<!-- Home Content -->
    <div class="home-content">
        @yield('content')
    </div>
    <!-- <script src="//code.jquery.com/jquery.js"></script>
    @include('flashy::message') -->
</body>
</html>