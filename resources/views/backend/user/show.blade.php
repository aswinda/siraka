@extends('backend.base.template')
@section('content')

<section class="content">
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-solid">
                
                <!-- form start -->
               
                   <div class="box-body">
                    <center>
                      <img style="max-width: 300px; margin-top: 50px;" src="{{ URL::to('images/profiles/'.$user->photo) }}" class="img-responsive" alt="blogpost" />
                      <h1>
                          {{ $user->name }}
                      </h1>
                    </center><br>
                    <div class="row m-b">
                      <div class="col-xs-6 text-right">
                        <h4>Name</h4>   
                          <div class="font-bold">
                            <h4 style="color: #9ACD32;">{{ $user->name }}</h4>
                          </div>              
                      </div>
                      <div class="col-xs-6">
                        <h4>Email</h4>
                          <div class="font-bold">
                            <h4 style="color: #9ACD32;">{{ $user->email }}</h4>
                          </div>
                      </div>
                    </div>

                    <div class="row m-b">
                      <div class="col-xs-6 text-right">
                        <h4>Gender</h4>   
                          <div class="font-bold">
                            <h4 style="color: #9ACD32;">{{ $user->gender }}</h4>
                          </div>              
                      </div>
                      <div class="col-xs-6">
                        <h4>Address</h4>
                          <div class="font-bold">
                            <h4 style="color: #9ACD32;">{{ $user->address }}</h4>
                          </div>
                      </div>
                    </div>
                    
                    <br><br><br> <br><br>
                  </div><!-- /.box-body -->

          
              </div><!-- /.box -->


            </div><!--/.col (left) -->

          </div>   <!-- /.row -->
        </section><!-- /.content -->

    <!-- jQuery 2.1.4 -->
    <script src="{{ URL::to('plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="{{ URL::to('bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <!-- AdminLTE App -->
    <script src="{{ URL::to('dist/js/app.min.js') }}" type="text/javascript"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ URL::to('dist/js/demo.js') }}" type="text/javascript"></script>

     <!-- bootstrap wysihtml5 - text editor -->
    <link href="{{ URL::to('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}" rel="stylesheet" type="text/css" />
     <!-- Bootstrap WYSIHTML5 -->
    <script src="{{ URL::to('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}" type="text/javascript"></script>
    <!-- Page Script -->
    <script>
      $(function () {
        //Add text editor
        $("#compose-textarea").wysihtml5();
      });
    </script>

    @endsection