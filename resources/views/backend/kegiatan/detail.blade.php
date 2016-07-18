@extends('backend.base.template')
@section('content')
 <!-- MENU SECTION END-->
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">  Data Output</h1>
                    </div>
                </div>
           
           <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                         <div class="panel-heading">
                      <i class="fa fa-th-large"></i>
                <span>{{ $nama_program }}</span>
                <div class="box-tools pull-right">
  
    
  
   <button class="btn btn-box-tool btn-info" data-toggle="modal" data-target="#tambahmodal" data-whatever="@mdo" title="Tambah Data" >Tambah Output</button>
  
  
    </div><!-- /.box-tools -->
  </div>
  <div class="panel-body">
    <div class="box-body">
      <?php if(!empty($error)) { ?>
      <div class="alert alert-danger" role="alert">
        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
        <span class="sr-only">Error:</span>
        <?php echo $error; ?>
      </div>
      <?php } ?>
       <div class="form-group col-sm-3">
          <label for="exampleInputEmail1">Output Anggaran</label>
          <input type="email" class="form-control" class="col-sm-2" id="exampleInputEmail1" value="IDR <?php echo number_format($kegiatan->alokasi_anggaran,0,",","."); ?>,-" disabled>
       </div>
     
      
      

       <table id="example2" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>Anggaran</th>
              <th>Kinerja</th>
              <th></th>
              <th>Tools</th>
              
            </tr>
          </thead>
          <tbody>
            <?php $index = 1; ?>
           @foreach($output as $out)
            <tr>
              <td>{{ $index++ }}</td>
              <td>{{ $out->nama }}</td>
              <td>IDR <?php echo number_format($out->anggaran,0,",","."); ?></td>
              <td>{{ $out->kinerja }}%</td>
              <td>
                <a class="btn btn-primary" href="{{ URL::to('admin/output/'.$out->id) }}" title="Detail" />Anggaran</a>
                <a class="btn btn-primary" href="{{ URL::to('admin/output/realisasi/'.$out->id) }}" title="Detail" />Realisasi</a>
              </td>
              <td>
                <a data-toggle="modal" data-target="#editoutput{{ $out->id }}" data-whatever="@mdo" title="Tambah Data" ><i class="fa fa-pencil"></i></a> |
                
                <a href="{{ URL::to('admin/output/delete/'.$out->id.'/'.$id) }}" title="Hapus" /><i class="fa fa-trash-o"></i></a>
                
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

<!-- Modal -->
<div class="modal fade" id="tambahmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Tambah Output</h4>
      </div>
      <div class="modal-body">
      <form class="form-horizontal" action="{{ URL::to('admin/output/store/'.$id) }} " method="post">
        
        <div class="box-body">
          <div class="form-group">
              <label for="inputEmail3" class="col-sm-3 control-label">Nama</label>
              <div class="col-sm-9">
                <input type="text" name="nama" class="form-control">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
              </div>
           </div>
           <div class="form-group">
              <label for="inputEmail3" class="col-sm-3 control-label">Anggaran</label>
              <div class="col-sm-9">
                <input type="text" name="anggaran" class="form-control">
              </div>
           </div>
           <div class="form-group">
              <label for="inputEmail3" class="col-sm-3 control-label">Kinerja (%)</label>
              <div class="col-sm-9">
                <input type="text" name="kinerja" class="form-control">
              </div>
           </div>
              
          
          
          <div class="form-group">
            <div class="col-md-12">
              <button type="submit" value="save" class="btn btn-info pull-right" name="bts">Save</button>
            </div>
          </div>
        </div><!-- /.box-body -->
      </form>
      </div>
    </div>
  </div>
</div>

@foreach($output as $out)
<div class="modal fade" id="editoutput{{ $out->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Tambah Output</h4>
      </div>
      <div class="modal-body">
      <form class="form-horizontal" action="{{ URL::to('admin/output/edit/'.$out->id.'/'.$id) }} " method="post">
        
        <div class="box-body">
          <div class="form-group">
              <label for="inputEmail3" class="col-sm-3 control-label">Nama</label>
              <div class="col-sm-9">
                <input value="{{ $out->nama }}" type="text" name="nama" class="form-control">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
              </div>
           </div>
           <div class="form-group">
              <label for="inputEmail3" class="col-sm-3 control-label">Anggaran</label>
              <div class="col-sm-9">
                <input value="{{ $out->anggaran }}"  type="text" name="anggaran" class="form-control">
              </div>
           </div>
           <div class="form-group">
              <label for="inputEmail3" class="col-sm-3 control-label">Kinerja (%)</label>
              <div class="col-sm-9">
                <input value="{{ $out->kinerja }}"  type="text" name="kinerja" class="form-control">
              </div>
           </div>
              
          
          
          <div class="form-group">
            <div class="col-md-12">
              <button type="submit" value="save" class="btn btn-info pull-right" name="bts">Save</button>
            </div>
          </div>
        </div><!-- /.box-body -->
      </form>
      </div>
    </div>
  </div>
</div>
@endforeach




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

