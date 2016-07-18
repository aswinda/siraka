@extends('backend.base.template')
@section('content')
    <!-- MENU SECTION END-->
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">  Laporan Anggaran Tahun 2016</h1>
                    </div>
                </div>
           
           <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        
                        <div class="panel-body">
                           <div class="col-md-6 col-sm-4">
              
                  <div id="chart-container1">
                            FusionCharts will render here
                        </div>
                
              </div>
              <div class="col-md-6 col-sm-4">
                
                    <div id="chart-container2">
                            FusionCharts will render here
                        </div>
              
                
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
  

<script src="{{ URL::to('js/highcharts.js') }}"></script>
<script src="{{ URL::to('js/highcharts-3d.js') }}"></script>
<script src="{{ URL::to('js/exporting.js') }}"></script>
<script type="text/javascript">
  $("#chart-container1").highcharts({
        chart: {
            type: 'pie',
            options3d: {
                enabled: true,
                alpha: 45,
                beta: 0,
            },
        },
        plotOptions: {
            pie: {
                depth: 45
            }
        },
        series: [{
            data: [
                {
                        name : 'Tercapai',
                        y : {{ $anggaran_tercapai }}
                        },
                {
                        name : 'sisa',
                        y : {{ $anggaran_sisa }}
                }
            ]
        }],
        title: {
            text: 'Anggaran'
        },
    });

    $("#chart-container2").highcharts({
        chart: {
            type: 'pie',
            options3d: {
                enabled: true,
                alpha: 45,
                beta: 0,
            }
        },
        plotOptions: {
            pie: {
                depth: 45
            }
        },
        series: [{
            data: [
                {
                    name : 'Tercapai',
                    y : {{ $kinerja_sisa }}
                },
                {
                    name : 'Sisa',
                    y : {{ $kinerja_total }}
                }
            ]
        }],
        title: {
            text: 'Kinerja'
        },
    });
 </script>
@endsection