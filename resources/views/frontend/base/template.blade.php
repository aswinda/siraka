<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
 <link rel="shortcut icon" href="img/fav.ico" type="image/x-icon"/>
    <title>Kementerian Republik Indonesia </title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/main.css">
    <link href="{{ URL::to('css/custom.css') }}" rel="stylesheet">
      <link href="{{ URL::to('css/style-header.css') }}" rel="stylesheet">
     <link href="{{ URL::to('css/style.css') }}" rel="stylesheet">
    <script src="//use.edgefonts.net/bebas-neue.js"></script>

    <!-- Custom Fonts & Icons -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,600,800' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{ URL::to('css/icomoon-social.css') }}">
    <link rel="stylesheet" href="{{ URL::to('css/font-awesome.min.css') }}">
    
    <script src="{{ URL::to('js/modernizr-2.6.2-respond-1.1.0.min.js') }}"></script>
    

</head>

<body>
       <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->   
    
        <!-- Call to Action Bar -->
       <header>
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                   <img src="img/header-black.png" />
                </div>

            </div>
        </div>
    </header>
    <!-- HEADER END-->
   
    <!-- LOGO HEADER END-->
    <section class="menu-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="navbar-collapse collapse ">
                        <ul id="menu-top" class="nav navbar-nav navbar-right">
                            <li><a class="menu-top-active" href="home.php">Home</a></li>
                             <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Kementerian <b class="caret"></b></a>
                                   <ul class="dropdown-menu">
                                    <li><a href="#">Deputi Bidang Pembiayaan</a></li>
                                    <li><a href="#">Deputi Bidang Pemasaran dan Jaringan Usaha</a></li>
                                    <li><a href="#">Deputi Bidang Pengembangan Sumber Daya Manusia</a></li>
                                       <li><a href="#">Deputi Bidang Pengembangan dan Restrukturisasi Usaha</a></li>
                                          <li><a href="#">Deputi Bidang Pengkajian Sumber Daya UKMK</a></li>
                                   
                                </ul>
                            </li>
                               <li><a href="data info.html">Data Informasi</a></li> 
                             <li><a href="#">Contact</a></li>
                      <li><a href="{{ URL::to('login') }}">Login</a></li>
                          

                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- MENU SECTION END-->
        <!-- End Call to Action Bar -->


	@yield('content')

    </body>
</html>