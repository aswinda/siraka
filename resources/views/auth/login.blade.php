<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Kementrian ">
   
 <link rel="shortcut icon" href="dist/img/fav.ico" type="image/x-icon"/>
    <title>Kementerian Republik Indonesia </title>


    <link href="{{ URL::to('css/custom.css') }}" rel="stylesheet">
    <link href="{{ URL::to('css/color.css') }}" rel="stylesheet">
    <link href="{{ URL::to('css/mega-menu.css') }}" rel="stylesheet">
    <link href="{{ URL::to('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ URL::to('css/bootstrap-theme.min.css') }}" rel="stylesheet">
    <link href="{{ URL::to('css/materialize.css') }}" rel="stylesheet">
    <link href="{{ URL::to('css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ URL::to('css/owl.slider.css') }}" rel="stylesheet">
    <!--<link href="css/prettyPhoto.css" rel="stylesheet">-->

    <!--[if lt IE 9]>
    <!--BISA DIHAPUS KAYAKNYA-->
    <!--<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>-->
    <!--<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>-->

    <!--<![endif]&ndash;&gt;-->
</head>
<body style="margin: auto;">
<div id="wrapper" class="wrapper" >
    <div class="main-content" style="padding: 10px 0;">
        <div class="container">
            <h3 align="center">KEMENTERIAN NEGARA<br> KOPERASI DAN USAHA KECIL DAN<br> MENENGAH <br>REPUBLIK INDONESIA</h3>
            <div class="row">
                <div class="col-md-12">
                    <div class="cp-login-box">
                        <div class="user-pic"><img src="{{ URL::to('assets/img/logo.png') }}" alt=""></div>
                        <div class="cp-login-form">
						 <form action="{{ URL::to('post-login') }} " method="post">
						 <input type="hidden" name="_token" value="{{ csrf_token() }}">

          <div class="form-group has-feedback">
            <input type="text" name="email" class="form-control" placeholder="Username">
             
          </div>
          <div class="form-group has-feedback">
            <input type="password" name="password"class="form-control" placeholder="Password">
           
          </div>
          <div class="row">
          
            <div class="col-md-12">
              <button type="submit" class="btn btn-primary pull-right">Log In</button>
            </div><!-- /.col -->
          </div>
        </form>
                           
                        </div>
                        <br>
                        <br>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--<footer id="footer" class="footer">-->

        <!--<div class="footer-four">-->
            <!--<div class="container">-->
                <!--<div class="row">-->
                    <!--<div class="col-md-12">-->
                        <!--<p>All Rights Reserved 2015  <a-->
                                <!--href="http://barung-project.com" target="_blank"></a></p>-->
                    <!--</div>-->
                <!--</div>-->
            <!--</div>-->
        <!--</div>-->
    <!--</footer>-->
</div>
<script src="{{ URL::to('js/jquery-1.11.2.min.js') }}"></script>
<script src="{{ URL::to('js/jquery-migrate-1.2.1.min.js') }}"></script>
<script src="{{ URL::to('js/bootstrap.min.js') }}"></script>
<script src="{{ URL::to('js/materialize.min.js') }}"></script>
<script src="{{ URL::to('js/owl.carousel.min.js') }}"></script>
<!--<script src="js/jquery.prettyPhoto.js"></script>-->
<script src="{{ URL::to('js/custom.js') }}"></script>

</body>
</html>