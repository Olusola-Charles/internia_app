
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Internia</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <link rel="stylesheet" href="{{ mix('css/app.css') }}">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
</head>

<body class="hold-transition sidebar-mini" style="background-color: #f5f5f7;">
<div class="wrapper" id="app">
                <div class="container">
                    <nav class="navbar navbar-expand-md navbar-light">
                        <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                            <ul class="navbar-nav">
                              <li class="nav-item">
                                <img width="30%" src="https://static.tildacdn.com/tild3664-3039-4039-a238-396632353132/logo_wht_bg.png" alt="logo">
                                </li>
                                <li class="nav-item">
                                  <router-link to="/employees" class="nav-link">
                                    <p>
                                      <h5>Calendar</h5>
                                    </p>
                                  </router-link>
                                </li>
                                <li class="nav-item">
                                  <router-link to="/employees" class="nav-link">
                                    <p>
                                      <h5>Statistics</h5>
                                    </p>
                                  </router-link></a>
                                </li>

                                <li class="nav-item active">
                                  <router-link to="/employees" class="nav-link">
                                    <p><h5>Employees</h5> </p>
                                  </router-link>
                                </li>

                                <li class="nav-item">
                                  <router-link to="/employees" class="nav-link">
                                  <p>
                                  <h5>Client</h5>
                                  </p>
                                </router-link>
                                </li>

                                <li class="nav-item">
                                  <router-link to="/employees" class="nav-link">
                                  <p>
                                  <h5>Equipment</h5>
                                  </p>
                                </router-link></li>


                            </ul>

                            <div class="others-options">
                                <a style="padding-right: 5px; color: grey;"><i class="fa fa-bell fa-lg"></i></a>
                                <a style="padding-right: 5px; color: grey;"><i class="fa fa-envelope fa-lg"></i></a>
                                <a style="padding-right: 5px; color: grey;"><i class="fa fa-user fa-lg"></i></a>
                            </div>
                        </div>
                    </nav>
                </div>

  <div class="content-wrapper">
    <div class="content">
      <div class="container-fluid">
        <h3 style="padding-left: 60px;padding-bottom: 20px;">Employee</h3>
        <div class="row">
    <div class="col-lg-3 col-md-12">
      
      <div class="card">
                                    <h4 class="card-header mt-0" style="background-color: white;">All Employees</h4>
                                    <div class="card-body">
                                      <p style="color: gray;">Projects</p>
                                        <h5 class="card-title mt-0"><img height="22px" width=22px class="rounded-circle header-profile-user" src="https://www.pngitem.com/pimgs/m/79-791899_twitter-round-icon-template-twitter-circle-icon-template.png" alt="Header Avatar">Arena Support</h5>
                                        <h5 class="card-title mt-0"><img height="22px" width=22px class="rounded-circle header-profile-user" src="https://www.pngitem.com/pimgs/m/79-791899_twitter-round-icon-template-twitter-circle-icon-template.png" alt="Header Avatar">DSV</h5>
                                        <h5 class="card-title mt-0"><img height="22px" width=22px class="rounded-circle header-profile-user" src="https://www.pngitem.com/pimgs/m/79-791899_twitter-round-icon-template-twitter-circle-icon-template.png" alt="Header Avatar">Seafood Mall</h5>
                                        <h5 class="card-title mt-0"><img height="22px" width=22px class="rounded-circle header-profile-user" src="https://www.pngitem.com/pimgs/m/79-791899_twitter-round-icon-template-twitter-circle-icon-template.png" alt="Header Avatar">FireStar</h5>
                                        <h5 class="card-title mt-0"><img height="22px" width=22px class="rounded-circle header-profile-user" src="https://www.pngitem.com/pimgs/m/79-791899_twitter-round-icon-template-twitter-circle-icon-template.png" alt="Header Avatar">Zeta Bank</h5>

                                        <p style="color: gray;">Status</p>
                                        <h5 class="card-title mt-0"><img height="22px" width=22px class="rounded-circle header-profile-user" src="https://cdn.iconscout.com/icon/free/png-64/circle-geometric-blue-round-37921.png" alt="Header Avatar">Part Time</h5>
                                        <h5 class="card-title mt-0"><img height="22px" width=22px class="rounded-circle header-profile-user" src="https://cdn.iconscout.com/icon/free/png-64/circle-geometric-blue-round-37921.png" alt="Header Avatar">Full Time</h5>

                                    </div>
                                
    </div>
  </div>
    <div class="col-lg-9 col-md-12">

        <router-view></router-view>
      </div>

        <vue-progress-bar></vue-progress-bar>

      </div>
    </div>
  </div>

</div>

<script src="{{ mix('js/app.js') }}"></script>
</body>
</html> 