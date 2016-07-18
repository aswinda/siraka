@extends('backend.base.template')
@section('content')

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box box-solid">
                <div class="box-header with-border">
                  
                  <a href="{{ URL::To('admin/user/create') }}">
                    <span class="fa-stack fa-lg pull-right">
                      <i class="fa fa-circle fa-stack-2x text-default"></i>
                      <i class="fa fa-plus fa-stack-1x text-black"></i>
                    </span>
                  </a>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <?php if(session()->has('message')) { ?>
                  <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <i class="icon fa fa-check"></i> <?php echo session('message'); ?>
                      
                  </div>
                  <?php } ?>
                  <table id="example1" class="table table-striped m-b-none display">
                    <thead>
                    <tr>
                      <th>No</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Position</th>
                      <th></th>
                    </tr>
                  </thead>
                  
                   <tbody>
                    <?php $tmp = 0; ?>
                      @foreach($users as $key => $user)      
                      <tr> 
                        <td>
                          <?php echo ++$tmp; ?>
                        </td>
                        <td>
                        <a href="{{ URL::To('admin/user/show/'.$user->user_id) }}">
                          {{ $user->name }} 
                        </a>
                      </td>
                        <td>
                           {{ $user->email }}
                          
                        </td>
                        <td>
                           {{ $user->group_name }}
                          
                        </td>
                        <td class="text-center">

                        <form class="form-horizontal" role="form" method="POST" action="{{ url('admin/user/delete/'.$user->user_id) }}">
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                           <a href="{{ URL::To('admin/user/edit/'.$user->user_id) }}">
                            <span class="fa-stack fa-lg">
                              <i class="fa fa-circle fa-stack-2x text-yellow"></i>
                              <i class="fa fa-pencil fa-stack-1x text-black"></i>
                            </span>
                          </a>
                          <button class="fa-stack fa-lg linkButton" type="submit" name="remove_levels" value="delete">
                            <i class="fa fa-circle fa-stack-2x text-red"></i>
                            <i class="fa fa-trash-o fa-stack-1x text-black"></i>
                          </button>
                          </form>
                        </td>
                      </tr>
                      @endforeach
                  </tbody>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->

    <div id="confirm" class="modal fade">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <h4 class="modal-title">Delete</h4>
          </div>
          <div class="modal-body">
            <p>Are you sure?</p>
          </div>
          <div class="modal-footer">
             <button type="button" data-dismiss="modal" class="btn btn-danger" id="delete">Delete</button>
             <button type="button" data-dismiss="modal" class="btn">Cancel</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->



    <script>

    $(document).ready(function() {
      $('button[name="remove_levels"]').on('click', function(e){
          var $form=$(this).closest('form');
          e.preventDefault();
          $('#confirm').modal({ backdrop: 'static', keyboard: false })
              .one('click', '#delete', function (e) {
                  $form.trigger('submit');
              });
      });
    });

    </script>
     <link rel="stylesheet" href="{{ URL::To('js/datatables/dataTables.css') }}" type="text/css"/>
    <style>
      .linkButton { 
       background: none;
       border: none;
       cursor: pointer; 
       margin-top:-35px;
      }
    </style>

      
          <!-- jQuery 2.1.4 -->
    <script src="{{ URL::to('plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="{{ URL::to('bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <!-- DATA TABES SCRIPT -->
    <script src="{{ URL::to('plugins/datatables/jquery.dataTables.min.js') }}" type="text/javascript"></script>
    <script src="{{ URL::to('plugins/datatables/dataTables.bootstrap.min.js') }}" type="text/javascript"></script>
    <!-- SlimScroll -->
    <script src="{{ URL::to('plugins/slimScroll/jquery.slimscroll.min.js') }}" type="text/javascript"></script>
    <!-- FastClick -->
    <script src="{{ URL::to('plugins/fastclick/fastclick.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ URL::to('dist/js/app.min.js') }}" type="text/javascript"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ URL::to('dist/js/demo.js') }}" type="text/javascript"></script>
    <!-- page script -->
    <script type="text/javascript">
      $(function () {
        $("#example1").dataTable();
        $('#example2').dataTable({
          "bPaginate": true,
          "bLengthChange": false,
          "bFilter": false,
          "bSort": true,
          "bInfo": true,
          "bAutoWidth": false
        });
      });
    </script>

    @endsection