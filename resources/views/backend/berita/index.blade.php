@extends('backend.base.template')
@section('content')
<div class="content-wrapper">
        <div class="container">
            <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">  Data Berita</h1>
                    </div>
                </div>
           
           <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                         <div class="panel-heading">
                      <i class="fa fa-th-large"></i>
                <span>Data Berita</span>
                <div class="box-tools pull-right">
  
    
  
   <button class="btn btn-box-tool btn-info" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" title="Tambah Data" >Tambah Berita</button>
  
    </div><!-- /.box-tools -->
                        </div>
                        <div class="panel-body">
                <div class="box-body">
                          <form method="post">
          <div class="form-group col-sm-3">
                      <label for="exampleInputEmail1">Judul</label>
                      <input type="email" class="form-control" class="col-sm-2" id="exampleInputEmail1" placeholder="Nama">
                    </div>
           <div class="form-group col-sm-2">
                      <label for="exampleInputEmail1">Dari Tanggal</label>
                      <input type="email" class="form-control" class="col-sm-2" id="exampleInputEmail1" value="2016-01-01">
                    </div>
           <div class="form-group col-sm-2">
                      <label for="exampleInputEmail1">Sampe Tanggal</label>
                      <input type="email" class="form-control" class="col-sm-2" id="exampleInputEmail1" value="2016-01-05">
                   
          
             </div>
             
              <div class="form-group col-sm-2">
                      <label><font color="white">Sampe Tanggal</font></label><br/>
                   <button class="btn btn-info">Cari</i></button>
                   
          
             </div>
              <div class="form-group col-sm-2">
            
             </div>
         </form>
          
                  <table id="example2" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Tanggal</th>
             <th>Judul</th>
                        <th>Penulis</th>
             <th>Status</th>
                        <th>Tools</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                                             <tr>
              <td>01-January-2016</td>
                        <td>Judul Berita 1</td>
                        <td>Deputi 1</td>
              <td>Aktif</td>
                         <td>
       
  
  <a href="edit trayek.php?id=1" title="Edit" /><i class="fa fa-pencil"></i></a> |
    
     
  
      <a href="delete trayek.php?id=1" title="Hapus" /><i class="fa fa-trash-o"></i></a> 
   
  
  
  

    
    
     
  
  </td>
                      </tr>
                                          <tr>
              <td>02-January-2016</td>
                        <td>Judul Berita 2</td>
                        <td>Deputi 1</td>
              <td>Aktif</td>
                         <td>
       
  
  <a href="edit trayek.php?id=2" title="Edit" /><i class="fa fa-pencil"></i></a> |
    
     
  
      <a href="delete trayek.php?id=2" title="Hapus" /><i class="fa fa-trash-o"></i></a> 
   
  
  
  

    
    
     
  
  </td>
                      </tr>
                                          <tr>
              <td>03-January-2016</td>
                        <td>Judul Berita 3</td>
                        <td>Deputi 1</td>
              <td>Aktif</td>
                         <td>
       
  
  <a href="edit trayek.php?id=3" title="Edit" /><i class="fa fa-pencil"></i></a> |
    
     
  
      <a href="delete trayek.php?id=3" title="Hapus" /><i class="fa fa-trash-o"></i></a> 
   
  
  
  

    
    
     
  
  </td>
                      </tr>
                                          <tr>
              <td>04-January-2016</td>
                        <td>Judul Berita 4</td>
                        <td>Deputi 1</td>
              <td>Aktif</td>
                         <td>
       
  
  <a href="edit trayek.php?id=4" title="Edit" /><i class="fa fa-pencil"></i></a> |
    
     
  
      <a href="delete trayek.php?id=4" title="Hapus" /><i class="fa fa-trash-o"></i></a> 
   
  
  
  

    
    
     
  
  </td>
                      </tr>
                                          <tr>
              <td>05-January-2016</td>
                        <td>Judul Berita 5</td>
                        <td>Deputi 1</td>
              <td>Aktif</td>
                         <td>
       
  
  <a href="edit trayek.php?id=5" title="Edit" /><i class="fa fa-pencil"></i></a> |
    
     
  
      <a href="delete trayek.php?id=5" title="Hapus" /><i class="fa fa-trash-o"></i></a> 
   
  
  
  

    
    
     
  
  </td>
                      </tr>
                                          <tr>
              <td>06-January-2016</td>
                        <td>Judul Berita 6</td>
                        <td>Deputi 1</td>
              <td>Aktif</td>
                         <td>
       
  
  <a href="edit trayek.php?id=6" title="Edit" /><i class="fa fa-pencil"></i></a> |
    
     
  
      <a href="delete trayek.php?id=6" title="Hapus" /><i class="fa fa-trash-o"></i></a> 
   
  
  
  

    
    
     
  
  </td>
                      </tr>
                                          <tr>
              <td>07-January-2016</td>
                        <td>Judul Berita 7</td>
                        <td>Deputi 1</td>
              <td>Aktif</td>
                         <td>
       
  
  <a href="edit trayek.php?id=7" title="Edit" /><i class="fa fa-pencil"></i></a> |
    
     
  
      <a href="delete trayek.php?id=7" title="Hapus" /><i class="fa fa-trash-o"></i></a> 
   
  
  
  

    
    
     
  
  </td>
                      </tr>
                                          <tr>
              <td>08-January-2016</td>
                        <td>Judul Berita 8</td>
                        <td>Deputi 1</td>
              <td>Aktif</td>
                         <td>
       
  
  <a href="edit trayek.php?id=8" title="Edit" /><i class="fa fa-pencil"></i></a> |
    
     
  
      <a href="delete trayek.php?id=8" title="Hapus" /><i class="fa fa-trash-o"></i></a> 
   
  
  
  

    
    
     
  
  </td>
                      </tr>
                                          <tr>
              <td>09-January-2016</td>
                        <td>Judul Berita 9</td>
                        <td>Deputi 1</td>
              <td>Aktif</td>
                         <td>
       
  
  <a href="edit trayek.php?id=9" title="Edit" /><i class="fa fa-pencil"></i></a> |
    
     
  
      <a href="delete trayek.php?id=9" title="Hapus" /><i class="fa fa-trash-o"></i></a> 
   
  
  
  

    
    
     
  
  </td>
                      </tr>
                                          <tr>
              <td>10-January-2016</td>
                        <td>Judul Berita 10</td>
                        <td>Deputi 1</td>
              <td>Aktif</td>
                         <td>
       
  
  <a href="edit trayek.php?id=10" title="Edit" /><i class="fa fa-pencil"></i></a> |
    
     
  
      <a href="delete trayek.php?id=10" title="Hapus" /><i class="fa fa-trash-o"></i></a> 
   
  
  
  

    
    
     
  
  </td>
                      </tr>
                                        </tbody>
                    
                   
                 
                  </table>
          </div>
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
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });
    </script>
    @endsection

