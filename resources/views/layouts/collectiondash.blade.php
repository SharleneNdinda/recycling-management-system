<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('css/dash.css') }} ">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <style>@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap');</style>
    <title>Dashboard</title>
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
                <a href="#">
                    <i class='bx bxs-dashboard' ></i>
                    <span class="links-name">Dashboard</span>
                </a>
                <!-- <span class="tooltip">Dashboard</span> -->
            </li>

             <li>
                <a href="#">
                   <i class='bx bx-down-arrow-alt'></i>
                    <span class="links-name">Deposit</span>
                </a>
                <!-- <span class="tooltip">Dashboard</span> -->
            </li>
             <li>
                <a href="#">
                    <i class='bx bxs-shopping-bag' ></i>
                    <span class="links-name">MarketPlace</span>
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
             <li>
                <a href="#">
                   <i class='bx bxs-user' ></i>
                    <span class="links-name">Profile</span>
                </a>
                <!-- <span class="tooltip">Dashboard</span> -->
            </li>


        </ul>

        <div class="profile-content">
            <div class="profile">
                <div class="profile-details">
                    <img src="{{url('/images/ill1.png')}}" alt="">
                    <div class="name-job">
                        <div class="name">Mali Shop</div>
                        <div class="job">Collection Center</div>
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
        <div class="text"></div>
    </div>
</body>
</html>