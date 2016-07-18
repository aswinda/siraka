<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <link rel="shortcut icon" href="{{ URL::to('img/fav.ico') }}" type="image/x-icon"/>
    <title>Kementerian Republik Indonesia </title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="{{ URL::to('assets/css/bootstrap.css') }}" rel="stylesheet" />
    <!-- FONT AWESOME ICONS  -->
    <link href="{{ URL::to('assets/css/font-awesome.css') }}" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="{{ URL::to('assets/css/style.css') }}" rel="stylesheet" />
     <!-- HTML5 Shiv and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <header>
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                   <img src="{{ URL::to('assets/img/header-black.png') }}" />
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
                            <li><a class="menu-top-active" href="{{ URL::to('admin') }}">Home</a></li>
                             <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Data <b class="caret"></b></a>
                                   <ul class="dropdown-menu">
                                     <li><a href="{{ URL::to('admin/program') }}">Pemantauan Data Program/Kegiatan/Output</a></li>
                                    <li><a href="{{ URL::to('admin/kinerja') }}">Pemantauan Data Kinerja dan Anggaran</a></li>
                                   
                                    <li><a href="{{ URL::to('admin/berita') }}">Pemantauan Data Berita</a></li>
                                   
                                </ul>
                            </li>
                            <li><a href="table.html">Admin</a></li>
               <li><a href="{{ URL::to('logout') }}">Logout</a></li>
                          

                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>

      @yield('content') 
        
</body>
</html>
