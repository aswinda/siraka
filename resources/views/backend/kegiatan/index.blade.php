@extends('backend.base.template')
@section('content')
<div class="content-wrapper">
        <div class="container">
            <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">  {{ $anggaran->nama_program }}</h1>
                    </div>
                </div>
           
           <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                         <div class="panel-heading">
                      <i class="fa fa-th-large"></i>
                <span>Data Kegiatan</span>
                <div class="box-tools pull-right">
  
                   <button class="btn btn-box-tool btn-info" data-toggle="modal" data-target="#tambahmodal" data-whatever="@mdo" title="Tambah Data" >Tambah Kegiatan</button>
  
  
    </div><!-- /.box-tools -->
                        </div>
                        <div class="panel-body">
                 <div class="box-body">
                    <div class="form-group col-sm-3">
                        <label for="exampleInputEmail1">Alokasi Anggaran {{ $anggaran->nama_program }}</label>
                        <input type="email" class="form-control" class="col-sm-2" id="exampleInputEmail1" value="IDR <?php echo number_format($anggaran->alokasi_anggaran,0,",","."); ?>,-" disabled>
                     </div>
          
                  <table id="example2" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Nama Kegiatan</th>
                        <th>Alokasi Anggaran</th>
                        <th>Alokasi Kinerja</th>
                        <th>Tools</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($kegiatan as $keg)
                      <tr>
                        <td>  
                          <a href="{{ URL::to('admin/kegiatan/detail/'.$keg->id) }}">{{ $keg->nama }}</a>
                        </td>
                        <td>  
                          <a href="{{ URL::to('admin/kegiatan/detail/'.$keg->id) }}">IDR <?php echo number_format($keg->alokasi_anggaran,0,",","."); ?>,-</a>
                        </td>
                        <td>  
                          <a href="{{ URL::to('admin/kegiatan/detail/'.$keg->id) }}">{{ $keg->alokasi_kinerja }}</a>%
                        </td>
                        <td>
                          <a href="{{ URL::to('admin/kegiatan/detail/'.$keg->id) }}" title="Detail" /><i class="fa fa-search"></i></a>  |
                          <a data-toggle="modal" data-target="#editkegiatan{{ $keg->id }}" data-whatever="@mdo" title="Tambah Data" ><i class="fa fa-pencil"></i></a> |
                          
                          <a href="{{ URL::to('admin/kegiatan/delete/'.$keg->id.'/'.$id) }}" title="Hapus" /><i class="fa fa-trash-o"></i></a>
                          
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
        <h4 class="modal-title" id="exampleModalLabel">Tambah Data</h4>
      </div>
      <div class="modal-body">
      <form class="form-horizontal" action="{{ URL::to('admin/kegiatan/store/'.$id) }} " method="post">
        
        <div class="box-body">

                <input type="hidden" name="_token" value="{{ csrf_token() }}">
           <div class="form-group">
              <label for="inputEmail3" class="col-sm-3 control-label">Nama</label>
              <div class="col-sm-9">
                <input type="text" name="nama_program" class="form-control">
              </div>
           </div>
           <div class="form-group">
              <label for="inputEmail3" class="col-sm-3 control-label">Alokasi Anggaran</label>
              <div class="col-sm-9">
                <input type="text" name="alokasi_anggaran" class="form-control">
              </div>
           </div>
           <div class="form-group">
              <label for="inputEmail3" class="col-sm-3 control-label">Alokasi Kinerja</label>
              <div class="col-sm-9">
                <input type="text" name="alokasi_kinerja" class="form-control">
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

@foreach($kegiatan as $keg)
<div class="modal fade" id="editkegiatan{{ $keg->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Edit Kegiatan</h4>
      </div>
      <div class="modal-body">
      <form class="form-horizontal" action="{{ URL::to('admin/kegiatan/edit/'.$keg->id.'/'.$id) }} " method="post">
        
        <div class="box-body">

           <input type="hidden" name="_token" value="{{ csrf_token() }}">
           <div class="form-group">
              <label for="inputEmail3" class="col-sm-3 control-label">Nama</label>
              <div class="col-sm-9">
                <input value="{{ $keg->nama }}" type="text" name="nama_program" class="form-control">
              </div>
           </div>
           <div class="form-group">
              <label for="inputEmail3" class="col-sm-3 control-label">Alokasi Anggaran</label>
              <div class="col-sm-9">
                <input value="{{ $keg->alokasi_anggaran }}" type="text" name="alokasi_anggaran" class="form-control">
              </div>
           </div>
           <div class="form-group">
              <label for="inputEmail3" class="col-sm-3 control-label">Alokasi Kinerja</label>
              <div class="col-sm-9">
                <input value="{{ $keg->alokasi_kinerja }}" type="text" name="alokasi_kinerja" class="form-control">
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
          "ordering": false,
          "info": true,
          "autoWidth": false
        });
      });
    </script>
    @endsection

