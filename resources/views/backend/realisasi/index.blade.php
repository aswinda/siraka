@extends('backend.base.template')
@section('content')
 <!-- MENU SECTION END-->
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">  Data Sub Output</h1>
                    </div>
                </div>
           
           <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                         <div class="panel-heading">
                      <i class="fa fa-th-large"></i>
                <span>{{ $output->nama }}</span>
                <div class="box-tools pull-right">
  
  
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
      <div class="col-lg-12">
       <div class="form-group col-sm-3">
          <label for="exampleInputEmail1">Output Anggaran</label>
          <input type="email" class="form-control" class="col-sm-2 col-lg-2" id="exampleInputEmail1" value="IDR <?php echo number_format($output->anggaran,0,",","."); ?>,-" disabled>
       </div>     
      </div>

      <div class="col-lg-12">
      <button class="btn btn-box-tool btn-info" data-toggle="modal" data-target="#tambahmodal" data-whatever="@mdo" title="Tambah Data" >Tambah Sub Output</button>
      </div>
       <div class="table-responsive col-lg-12">
        <table class="table table-bordered table-striped table-hover">
            <tbody>
                <tr>
                  <th rowspan="2">Output</th>
                  <th colspan="2"><center>Realisasi</center></th>
                  <th colspan="12"><center>Capaian Anggaran (ribu)</center></th>
                    <th rowspan="2">Capaian Output</th>
                    <th rowspan="2">Satuan Unit</th>
                    <th rowspan="2">Tools</th>
                  </tr>
                  <tr>
                    <th>Anggaran</th>
                    <th>Kinerja (%)</th>
                    <th>Jan</th>
                    <th>Feb</th>
                    <th>Mar</th>
                    <th>Apr</th>
                    <th>Mei</th>
                    <th>Jun</th>
                    <th>Jul</th>
                    <th>Agu</th>
                    <th>Sep</th>
                    <th>Okt</th>
                    <th>Nop</th>
                    <th>Des</th>
                  </tr>
                  @foreach($sub_output AS $sub)
                  <tr>
                    <th>{{ $sub->nama }}</th>
                    <th><?php echo number_format($sub->anggaran,0,",","."); ?></th>
                    <th>{{ $sub->kinerja }}</th>
                    <th>{{ $sub->januari }}</th>
                    <th>{{ $sub->februari }}</th>
                    <th>{{ $sub->maret }}</th>
                    <th>{{ $sub->april }}</th>
                    <th>{{ $sub->mei }}</th>
                    <th>{{ $sub->juni }}</th>
                    <th>{{ $sub->juli }}</th>
                    <th>{{ $sub->agustus }}</th>
                    <th>{{ $sub->september }}</th>
                    <th>{{ $sub->oktober }}</th>
                    <th>{{ $sub->november }}</th>
                    <th>{{ $sub->desember }}</th>
                    <th>{{ $sub->capaian }}</th>
                    <th>{{ $sub->unit }}</th>
                    <th>
                      <a data-toggle="modal" data-target="#editsuboutput{{ $sub->id }}" data-whatever="@mdo" title="Tambah Data" ><i class="fa fa-pencil"></i></a> |               
                      <a href="{{ URL::to('admin/output/deletesub/'.$sub->id.'/'.$id) }}" title="Hapus" /><i class="fa fa-trash-o"></i></a>
                      
                    </th>
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
        <h4 class="modal-title" id="exampleModalLabel">Tambah Sub Output</h4>
      </div>
      <div class="modal-body">
      <form class="form-horizontal" action="{{ URL::to('admin/output/realisasi/storesub/'.$id) }} " method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="box-body">
           <div class="form-group">
              <label for="inputEmail3" class="col-sm-3 control-label">Nama</label>
              <div class="col-sm-9">
                <input type="text" name="nama" class="form-control">
              </div>
           </div>
           <div class="form-group">
              <label for="inputEmail3" class="col-sm-3 control-label">Anggaran</label>
              <div class="col-sm-9">
                <input type="text" name="anggaran" class="form-control">
              </div>
           </div>
           <div class="form-group">
              <label for="inputEmail3" class="col-sm-3 control-label">Kinerja</label>
              <div class="col-sm-9">
                <input type="text" name="kinerja" class="form-control">
              </div>
           </div>
           <div class="form-group">
              <label for="inputEmail3" class="col-sm-3 control-label">Januari</label>
              <div class="col-sm-9">
                <input type="text" name="januari" class="form-control">
              </div>
           </div>
           <div class="form-group">
              <label for="inputEmail3" class="col-sm-3 control-label">Februari</label>
              <div class="col-sm-9">
                <input type="text" name="februari" class="form-control">
              </div>
           </div>
           <div class="form-group">
              <label for="inputEmail3" class="col-sm-3 control-label">Maret</label>
              <div class="col-sm-9">
                <input type="text" name="maret" class="form-control">
              </div>
           </div>
          <div class="form-group">
              <label for="inputEmail3" class="col-sm-3 control-label">April</label>
              <div class="col-sm-9">
                <input type="text" name="april" class="form-control">
              </div>
           </div>
           <div class="form-group">
              <label for="inputEmail3" class="col-sm-3 control-label">Mei</label>
              <div class="col-sm-9">
                <input type="text" name="mei" class="form-control">
              </div>
           </div>
          <div class="form-group">
              <label for="inputEmail3" class="col-sm-3 control-label">Juni</label>
              <div class="col-sm-9">
                <input type="text" name="juni" class="form-control">
              </div>
           </div>
           <div class="form-group">
              <label for="inputEmail3" class="col-sm-3 control-label">Juli</label>
              <div class="col-sm-9">
                <input type="text" name="juli" class="form-control">
              </div>
           </div>
           <div class="form-group">
              <label for="inputEmail3" class="col-sm-3 control-label">Agustus</label>
              <div class="col-sm-9">
                <input type="text" name="agustus" class="form-control">
              </div>
           </div>
           <div class="form-group">
              <label for="inputEmail3" class="col-sm-3 control-label">September</label>
              <div class="col-sm-9">
                <input type="text" name="september" class="form-control">
              </div>
           </div>
           <div class="form-group">
              <label for="inputEmail3" class="col-sm-3 control-label">Oktober</label>
              <div class="col-sm-9">
                <input type="text" name="oktober" class="form-control">
              </div>
           </div>
           <div class="form-group">
              <label for="inputEmail3" class="col-sm-3 control-label">November</label>
              <div class="col-sm-9">
                <input type="text" name="november" class="form-control">
              </div>
           </div>
           <div class="form-group">
              <label for="inputEmail3" class="col-sm-3 control-label">Desember</label>
              <div class="col-sm-9">
                <input type="text" name="desember" class="form-control">
              </div>
           </div>
           <div class="form-group">
              <label for="inputEmail3" class="col-sm-3 control-label">Capaian</label>
              <div class="col-sm-9">
                <input type="text" name="capaian" class="form-control">
              </div>
           </div>
           <div class="form-group">
              <label for="inputEmail3" class="col-sm-3 control-label">Unit</label>
              <div class="col-sm-9">
                <input type="text" name="unit" class="form-control">
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

<!-- Modal Edit Sub Output -->
@foreach($sub_output AS $sub)
<div class="modal fade" id="editsuboutput{{ $sub->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Edit Sub Output</h4>
      </div>
      <div class="modal-body">
      <form class="form-horizontal" action="{{ URL::to('admin/output/realisasi/updatesub/'.$sub->sub_id.'/'.$id) }} " method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="box-body">
           <div class="form-group">
              <label for="inputEmail3" class="col-sm-3 control-label">Nama</label>
              <div class="col-sm-9">
                <input type="text" name="nama" value="{{ $sub->nama }}" class="form-control">
              </div>
           </div>
           <div class="form-group">
              <label for="inputEmail3" class="col-sm-3 control-label">Anggaran</label>
              <div class="col-sm-9">
                <input type="text" name="anggaran" value="{{ $sub->anggaran }}" class="form-control">
              </div>
           </div>
           <div class="form-group">
              <label for="inputEmail3" class="col-sm-3 control-label">Kinerja</label>
              <div class="col-sm-9">
                <input type="text" name="kinerja" value="{{ $sub->kinerja }}" class="form-control">
              </div>
           </div>
           <div class="form-group">
              <label for="inputEmail3" class="col-sm-3 control-label">Januari</label>
              <div class="col-sm-9">
                <input type="text" name="januari" value="{{ $sub->januari }}" class="form-control">
              </div>
           </div>
           <div class="form-group">
              <label for="inputEmail3" class="col-sm-3 control-label">Februari</label>
              <div class="col-sm-9">
                <input type="text" name="februari" value="{{ $sub->februari }}" class="form-control">
              </div>
           </div>
           <div class="form-group">
              <label for="inputEmail3" class="col-sm-3 control-label">Maret</label>
              <div class="col-sm-9">
                <input type="text" name="maret" value="{{ $sub->maret }}" class="form-control">
              </div>
           </div>
          <div class="form-group">
              <label for="inputEmail3" class="col-sm-3 control-label">April</label>
              <div class="col-sm-9">
                <input type="text" name="april" value="{{ $sub->april }}" class="form-control">
              </div>
           </div>
           <div class="form-group">
              <label for="inputEmail3" class="col-sm-3 control-label">Mei</label>
              <div class="col-sm-9">
                <input type="text" name="mei" value="{{ $sub->mei }}" class="form-control">
              </div>
           </div>
          <div class="form-group">
              <label for="inputEmail3" class="col-sm-3 control-label">Juni</label>
              <div class="col-sm-9">
                <input type="text" name="juni" value="{{ $sub->juni }}" class="form-control">
              </div>
           </div>
           <div class="form-group">
              <label for="inputEmail3" class="col-sm-3 control-label">Juli</label>
              <div class="col-sm-9">
                <input type="text" name="juli" value="{{ $sub->juli }}" class="form-control">
              </div>
           </div>
           <div class="form-group">
              <label for="inputEmail3" class="col-sm-3 control-label">Agustus</label>
              <div class="col-sm-9">
                <input type="text" name="agustus" value="{{ $sub->agustus }}" class="form-control">
              </div>
           </div>
           <div class="form-group">
              <label for="inputEmail3" class="col-sm-3 control-label">September</label>
              <div class="col-sm-9">
                <input type="text" name="september" value="{{ $sub->september }}" class="form-control">
              </div>
           </div>
           <div class="form-group">
              <label for="inputEmail3" class="col-sm-3 control-label">Oktober</label>
              <div class="col-sm-9">
                <input type="text" name="oktober" value="{{ $sub->oktober }}" class="form-control">
              </div>
           </div>
           <div class="form-group">
              <label for="inputEmail3" class="col-sm-3 control-label">November</label>
              <div class="col-sm-9">
                <input type="text" name="november" value="{{ $sub->november }}" class="form-control">
              </div>
           </div>
           <div class="form-group">
              <label for="inputEmail3" class="col-sm-3 control-label">Desember</label>
              <div class="col-sm-9">
                <input type="text" name="desember" value="{{ $sub->desember }}" class="form-control">
              </div>
           </div>
           <div class="form-group">
              <label for="inputEmail3" class="col-sm-3 control-label">Capaian</label>
              <div class="col-sm-9">
                <input type="text" name="capaian" value="{{ $sub->capaian }}" class="form-control">
              </div>
           </div>
           <div class="form-group">
              <label for="inputEmail3" class="col-sm-3 control-label">Unit</label>
              <div class="col-sm-9">
                <input type="text" name="unit" value="{{ $sub->unit }}" class="form-control">
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

