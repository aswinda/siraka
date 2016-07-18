@extends('backend.base.template')
@section('content')
 <!-- MENU SECTION END-->
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">  Data Program</h1>
                    </div>
                </div>
           
           <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                         <div class="panel-heading">
                      <i class="fa fa-th-large"></i>
                <span>Data Program</span>
                <div class="box-tools pull-right">
  
    
  
   <button class="btn btn-box-tool btn-info" data-toggle="modal" data-target="#tambahmodal" data-whatever="@mdo" title="Tambah Data" >Tambah Program</button>
  
  
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
          <label for="exampleInputEmail1">Alokasi Anggaran Tahun 2016</label>
          <input type="email" class="form-control" class="col-sm-2" id="exampleInputEmail1" value="IDR <?php echo number_format($anggaran->anggaran,0,",","."); ?>,-" disabled>
       </div>
       <div class="form-group col-sm-3">
          <label for="exampleInputEmail1">Tools</label><br/>
          <a data-toggle="modal" data-target="#editanggaran" data-whatever="@mdo" title="Tambah Data" ><i class="fa fa-pencil"></i></a>
       </div>
      
      

       <table id="example2" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Kode Program</th>
                        <th>Nama Program</th>
                        <th>Alokasi Anggaran</th>
                        <th>Deputi</th>
                        <th>Output</th>
                        <th>Tools</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                     @foreach($program as $prog)
                      <tr>
                        <td>{{ $prog->kode_program }}</td>
                        <td>{{ $prog->nama_program }}</td>
                        <td>IDR <?php echo number_format($prog->alokasi_anggaran,0,",","."); ?></td>
                        <td><?php foreach($groups as $group) { if($group->id == $prog->group_id) echo $group->name; } ?></td>
                        <td>
                          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#outputanggaran{{ $prog->id }}">Anggaran</button>
                          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#outputkinerja{{ $prog->id }}">Kinerja</button>
                        </td>
                        <td>
                          <a href="{{ URL::to('admin/kegiatan/'.$prog->id) }}" title="Detail" /><i class="fa fa-search"></i></a>  |
                          <a data-toggle="modal" data-target="#editprogram{{ $prog->id }}" data-whatever="@mdo" title="Tambah Data" ><i class="fa fa-pencil"></i></a> |
                          
                          <a href="{{ URL::to('admin/program/delete/'.$prog->id) }}" title="Hapus" /><i class="fa fa-trash-o"></i></a>
                          
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
      <form class="form-horizontal" action="{{ URL::to('admin/program/store') }} " method="post">
        
        <div class="box-body">
          <div class="form-group">
              <label for="inputEmail3" class="col-sm-3 control-label">Kode Program</label>
              <div class="col-sm-9">
                <input type="text" name="kode_program" class="form-control">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
              </div>
           </div>
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
              <label for="inputEmail3" class="col-sm-3 control-label">Group</label>
              <div class="col-sm-9">
                <select class="form-control" name="group_id">
                  @foreach($groups as $group)
                  <option value="{{ $group->id }}">{{ $group->name }}</option>
                  @endforeach
                </select>
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

@foreach($program as $prog)
<div class="modal fade" id="editprogram{{ $prog->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Edit Data</h4>
      </div>
      <div class="modal-body">
      <form class="form-horizontal" action="{{ URL::to('admin/program/edit/'.$prog->id) }} " method="post">
        
        <div class="box-body">
          <div class="form-group">
              <label for="inputEmail3" class="col-sm-3 control-label">Kode Program</label>
              <div class="col-sm-9">
                <input value="{{ $prog->kode_program }}" type="text" name="kode_program" class="form-control">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
              </div>
           </div>
           <div class="form-group">
              <label for="inputEmail3" class="col-sm-3 control-label">Nama</label>
              <div class="col-sm-9">
                <input value="{{ $prog->nama_program }}" type="text" name="nama_program" class="form-control">
              </div>
           </div>
           <div class="form-group">
              <label for="inputEmail3" class="col-sm-3 control-label">Alokasi Anggaran</label>
              <div class="col-sm-9">
                <input value="{{ $prog->alokasi_anggaran }}" type="text" name="alokasi_anggaran" class="form-control">
              </div>
           </div>
           <div class="form-group">
              <label for="inputEmail3" class="col-sm-3 control-label">Group</label>
              <div class="col-sm-9">
                <select class="form-control" name="group_id">
                  @foreach($groups as $group)
                  <option value="{{ $group->id }}" <?php if($group->id == $prog->group_id) echo 'selected'; ?>>{{ $group->name }}</option>
                  @endforeach
                </select>
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

<!-- Modal -->
<div class="modal fade" id="editanggaran" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Edit Anggaran</h4>
      </div>
      <div class="modal-body">
      <form class="form-horizontal" action="{{ URL::to('admin/program/updateanggaran/'.$anggaran->id) }} " method="post">
        
        <div class="box-body">
          
           <div class="form-group">
              <label for="inputEmail3" class="col-sm-3 control-label">Alokasi Anggaran</label>
              <div class="col-sm-9">
                <input type="text" name="anggaran" value="{{ $anggaran->anggaran }}" class="form-control">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
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

<!-- Modal detailAnggaranProgra -->
@foreach($detailProgramAnggaran as $detail)
 <div id="outputanggaran{{ $detail->program_id }}" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
       <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="exampleModalLabel">Output Anggaran</h4>
        </div>
        <div class="modal-body">
          <b>Kode Program</b><br>
          {{ $detail->kode_program }}<br>
          <b>Nama</b><br>
          {{ $detail->nama_program }}<br>
          <table class="table table-responsive">
            <thead>
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
              <th>Nov</th>
              <th>Des</th>
              <th>Jumlah Anggaran</th>
            </thead>
            <tbody>
              <tr>
                <td><?php echo number_format($detail->jan/1000,0,",","."); ?></td>
                <td><?php echo number_format($detail->feb/1000,0,",","."); ?></td>
                <td><?php echo number_format($detail->mar/1000,0,",","."); ?></td>
                <td><?php echo number_format($detail->apr/1000,0,",","."); ?></td>
                <td><?php echo number_format($detail->mei/1000,0,",","."); ?></td>
                <td><?php echo number_format($detail->jun/1000,0,",","."); ?></td>
                <td><?php echo number_format($detail->jul/1000,0,",","."); ?></td>
                <td><?php echo number_format($detail->agu/1000,0,",","."); ?></td>
                <td><?php echo number_format($detail->sep/1000,0,",","."); ?></td>
                <td><?php echo number_format($detail->okt/1000,0,",","."); ?></td>
                <td><?php echo number_format($detail->nov/1000,0,",","."); ?></td>
                <td><?php echo number_format($detail->des/1000,0,",","."); ?></td>
                <td><?php echo number_format(($detail->jan + $detail->feb + $detail->mar + $detail->apr + $detail->mei + $detail->jun + $detail->jul + $detail->agu + $detail->sep + $detail->okt + $detail->nov + $detail->des)/1000,0,",","."); ?></td>
              </tr>
            </tbody>
          </table>
        </div>
    </div>
  </div>
</div>
@endforeach

@foreach($detailProgramRealisasi as $detail)
 <div id="outputkinerja{{ $detail->program_id }}" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
       <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="exampleModalLabel">Output Anggaran</h4>
        </div>
        <div class="modal-body">
          <b>Kode Program</b><br>
          {{ $detail->kode_program }}<br>
          <b>Nama</b><br>
          {{ $detail->nama_program }}<br>
          <table class="table table-responsive">
            <thead>
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
              <th>Nov</th>
              <th>Des</th>
            </thead>
            <tbody>
              <tr>
                <td><?php echo number_format($detail->jan,2); ?>%</td>
                <td><?php echo number_format($detail->feb,2); ?>%</td>
                <td><?php echo number_format($detail->mar,2); ?>%</td>
                <td><?php echo number_format($detail->apr,2); ?>%</td>
                <td><?php echo number_format($detail->mei,2); ?>%</td>
                <td><?php echo number_format($detail->jun,2); ?>%</td>
                <td><?php echo number_format($detail->jul,2); ?>%</td>
                <td><?php echo number_format($detail->agu,2); ?>%</td>
                <td><?php echo number_format($detail->sep,2); ?>%</td>
                <td><?php echo number_format($detail->okt,2); ?>%</td>
                <td><?php echo number_format($detail->nov,2); ?>%</td>
                <td><?php echo number_format($detail->des,2); ?>%</td>
              </tr>
            </tbody>
          </table>
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

