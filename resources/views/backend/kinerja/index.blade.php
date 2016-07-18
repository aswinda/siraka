@extends('backend.base.template')
@section('content')
<div class="content-wrapper">
        <div class="container">
            <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">  Data Kinerja</h1>
                    </div>
                </div>
           
           <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                         <div class="panel-heading">
                      <i class="fa fa-th-large"></i>
                <span>Data Kinerja</span>
                <div class="box-tools pull-right">
  
    
  
  
    </div><!-- /.box-tools -->
                        </div>
                        <div class="panel-body">
                 <div class="box-body">
        
          
                  <table id="example2" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                       
            
                        <th>Nama Kinerja</th>
            
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($program as $prog)
                      <tr>
            
                        <td>  
                          <a href="{{ URL::to('admin/kegiatan/'.$prog->kode_program) }}">{{ $prog->nama_program }}</a>
                        </td>
                      
           
             
                       
                      </tr>
                   @endforeach
                    </tbody>
                    
                   
                 
                  </table>
             
                
                </div><!-- /.box-body -->
                        </div>
                    </div>
                </div>
            </div>
           
           
           
        </div>
    </div>
    <!-- CONTENT-WRAPPER SECTION END-->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                  <div class="footer-copyright">2016 © Kementrian Koperasi dan UKM. All Right Reserved</div>
                </div>

            </div>
        </div>
    </footer>
    <!-- FOOTER SECTION END-->
    <!-- JAVASCRIPT AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY SCRIPTS -->
    <script src="{{ URL::to('assets/js/jquery-1.11.1.js') }}"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="{{ URL::to('assets/js/bootstrap.js') }}"></script>
    <script src="{{ URL::to('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::to('plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
  <script>
      $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": false,
          "info": true,
          "autoWidth": false
        });
      });
    </script>
    @endsection

