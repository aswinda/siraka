@extends('frontend.base.template')
@section('content')

<!-- Services -->
  <div class="section section-white">
	  <div class="container">
	   	<div class="row">
				
	   		<div class="col-md-12 col-sm-4">
	 		    <div class="panel panel-default">
                     
            <div class="panel-body">
              <ul class="nav nav-tabs">
                <li class="active">
                  <a href="#home" data-toggle="tab">Home</a>
                </li>
                @foreach($deputi as $dep)
                <li class="">
                  <a href="#dep{{ $dep->id }}" data-toggle="tab">{{ $dep->name }}</a>
                </li>
                @endforeach
              </ul>

              <div class="tab-content">
                <div class="tab-pane fade active in" id="home" style="margin-bottom: 15px;">
							    <div class="col-md-6 col-sm-4">
                    <div class="team-member">
		        	        <div id="container2" style="min-width: 500px; height: 250px; margin: 0 auto"></div>
		        	      </div>
					        </div>
      						<div class="col-md-6 col-sm-4">
    	        			<div class="team-member">
    		        			<div id="container3" style="min-width: 500px; height: 250px; margin: 0 auto"></div>
    							
    		        		</div>
    	        		</div>
				        </div>
                 
                @foreach($deputi as $dep)              
                <div class="tab-pane fade" id="dep{{ $dep->id }}" style="padding: 10px;">
                    <h4>{{ $dep->name }}</h4>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <tbody>
                                <tr>
                                    <th>Pagu Anggaran</th>
                                    <th>:</th>
                                    <th>Rp.<?php echo number_format($dep->anggaran,0,",","."); ?>,-</th> 
                                </tr>
                    			  <tr>
                                    <th>Realisasi Anggaran</th>
                                    <th>:</th>
                                    <th>{{ $dep->realisasiAnggaran }} %	</th>
                                </tr>
                    			 <tr>
                                    <th>Realisasi Kinerja</th>
                                    <th>:</th>
                                    <th>{{ number_format($dep->realisasiKinerja,3) }} %	</th>
                                  
                                </tr>
                    			 <tr>
                                    <th>Capaian Output</th>
                                    <th>:</th>
                                    <th>
                                      <ul>
                                        @foreach($dep->capaian AS $capaian)
                                        <li>
                                          {{ $capaian->capaian }}
                                        </li> 	
                                        @endforeach
                                      </ul>
                                    </th>
                                  
                                </tr>
                    			<tr>
                                    <th>
                                    <?php if($dep->realisasiAnggaran >= 70 && $dep->realisasiKinerja >= 70) 
                                            echo '<label class="label label-success"><i class="fa-circle-thin"></i></label> Baik';
                                          else if($dep->realisasiAnggaran >= 50 && $dep->realisasiKinerja >= 50)
                                            echo '<label class="label label-warning"><i class="fa-circle-thin"></i></label> Sedang';
                                          else echo '<label class="label label-danger"><i class="fa-circle-thin"></i></label> Buruk';
                                    ?>
                                    </th>
                                    <th></th>
                                    <th> 	</th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                @endforeach                
              </div>
            </div>
          </div>
    			
    		
    	
    	   </div>
      </div>
    </div>
    <!-- End Services -->


    <hr>

    <div class="section section-white">
	    <div class="container">
	        	<div class="row">
				
	        		<div class="col-md-6 col-sm-4">
	        			<div class="team-member">
		        		<div id="container" style="min-width: 310px; height: 600px; max-width: 800px; margin: 0 auto"></div>
		        		</div>
	        		</div>
	        		<div class="col-md-6 col-sm-4">
	        			<div class="team-member">
		        		<div id="pie1" style="height: 300px"></div>
							<div id="pie2" style="height: 300px"></div>
							
							
		        		</div>
	        		</div>
	        	</div>
	        </div>
	    </div>
<hr>
		<!-- Our Portfolio -->	

        <div class="section section-white">
	        <div class="container">
	        	<div class="row">
	
				<div class="section-title">
				<h3>Berita</h3>
				</div>
		
		
			<ul class="grid cs-style-3">
	        	
				
				
				<div class="col-md-4 col-sm-6">
					<figure>
						<img src="img/koperasi.jpeg">
						<figcaption>
							<h3>Judul Berita</h3>
							
								<a href="#" class="btn">Read more</a>
						</figcaption>
					</figure>
				</div>
				<div class="col-md-4 col-sm-6">
					<figure>
						<img src="img/koperasi.jpeg">
						<figcaption>
							<h3>Judul Berita</h3>
							
								<a href="#" class="btn">Read more</a>
						</figcaption>
					</figure>
				</div>
				<div class="col-md-4 col-sm-6">
					<figure>
						<img src="img/koperasi.jpeg">
						<figcaption>
							<h3>Judul Berita</h3>
							
								<a href="#" class="btn">Read more</a>
						</figcaption>
					</figure>
				</div>
				
			</ul>
	        	</div>
	        </div>
	    </div>
		<!-- Our Portfolio -->
			
<hr>

		<!-- Our Clients -->
	  

	    <!-- Footer -->
	    <div class="footer">
	    	<div class="container">
			
		    	

		    	<div class="row">
		    		<div class="col-md-12">
		    			<div class="footer-copyright">2016 © Kementrian Koperasi dan UKM. All Right Reserved</div>
		    		</div>
		    	</div>
		    </div>
	    </div>

        <!-- Javascripts -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/jquery-1.9.1.min.js"><\/script>')</script>
        <script src="{{ URL::to('js/bootstrap.min.js') }}"></script>
		
		<!-- Scrolling Nav JavaScript -->
		<script src="{{ URL::to('js/jquery.easing.min.js') }}"></script>
		<script src="{{ URL::to('js/scrolling-nav.js') }}"></script>		
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-3d.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script type="text/javascript">
$(function () {
    $('#container').highcharts({
        chart: {
            type: 'scatter',
            zoomType: 'xy'
        },
        title: {
            text: ''
        },
       
        xAxis: {
            title: {
                enabled: true,
                text: 'Anggaran'
            },
            startOnTick: true,
            endOnTick: true,
            showLastLabel: true
        },
        yAxis: {
            title: {
                text: 'Kinerja (%)'
            }
        },
        legend: {
            enabled: false
        },
        plotOptions: {
            scatter: {
                marker: {
                    radius: 5,
                    states: {
                        hover: {
                            enabled: true,
                            lineColor: 'rgb(100,100,100)'
                        }
                    }
                },
                states: {
                    hover: {
                        marker: {
                            enabled: false
                        }
                    }
                },
                tooltip: {
                    headerFormat: '<b>{series.name}</b><br>',
                    pointFormat: 'Kegiatan : {point.x} , {point.y} %'
                }
            }
        },
        series: [{
            name: 'Deputi 1',
            color: 'rgba(223, 83, 83, .5)',
            data: [[550, 0], [700, 30]]

        }, {
            name: 'Deputi 2',
            color: 'rgba(119, 152, 191, .5)',
            data: [[500, 85], [1500, 71.8]]
        }, {
            name: 'Deputi 3',
            color: 'rgba(250, 152, 191, .5)',
            data: [[1000, 90], [1100, 80]]
        }, {
            name: 'Deputi 4',
            color: 'rgba(100, 152, 191, .5)',
            data: [[2000, 50], [2500, 70]]
        }, {
            name: 'Deputi 5',
            color: 'rgba(70, 152, 191, .5)',
            data: [[2200, 60], [1300, 65]]
        }, {
            name: 'Deputi 6',
            color: 'rgba(90, 152, 191, .5)',
            data: [[2250, 63], [900, 65]]
        }, {
            name: 'Deputi 7',
            color: 'rgba(50, 152, 191, .5)',
            data: [[850, 90], [1500, 88]]
        }]
    });
});



$(function () {
    $('#container2').highcharts({
        title: {
            text: 'Target dan Realisasi Anggaran',
            x: -20 //center
        },
       
        xAxis: {
            categories: ['Januari', 'Februari', 'Maret', 'April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember']
        },
        yAxis: {
            min: 0, max: {{ $total_anggaran }},
            title: {
                text: 'Jumlah'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        tooltip: {
            valueSuffix: ''
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },
        series: [{
            name: 'Target',
            data: [{{ ($total_anggaran / 12) * 1 }}, {{ ($total_anggaran / 12) * 2 }}, {{ ($total_anggaran / 12) * 3 }},{{ ($total_anggaran / 12) * 4 }},{{ ($total_anggaran / 12) * 5 }},{{ ($total_anggaran / 12) * 6 }},{{ ($total_anggaran / 12) * 7 }},{{ ($total_anggaran / 12) * 8 }},{{ ($total_anggaran / 12) * 9 }},{{ ($total_anggaran / 12) * 10 }},{{ ($total_anggaran / 12) * 11 }}, {{ ($total_anggaran / 12) * 12 }}]
        }, {
            name: 'Realisasi',
            data: [{{ $anggaran_tercapai_bulan->jan }}, {{ $anggaran_tercapai_bulan->feb }}, {{ $anggaran_tercapai_bulan->mar }},{{ $anggaran_tercapai_bulan->apr }},{{ $anggaran_tercapai_bulan->mei }},{{ $anggaran_tercapai_bulan->jun }},{{ $anggaran_tercapai_bulan->jul }},{{ $anggaran_tercapai_bulan->agu }},{{ $anggaran_tercapai_bulan->sep }},{{ $anggaran_tercapai_bulan->okt }},{{ $anggaran_tercapai_bulan->nov }}, {{ $anggaran_tercapai_bulan->des }}]
        }]
    });
});


$(function () {
    $('#container3').highcharts({
        title: {
            text: 'Target dan Realisasi Kinerja',
            x: -20 //center
        },
       
        xAxis: {
            categories: ['Januari', 'Februari', 'Maret', 'April','Mei','Juni','Juli','Agustus','September','Oktober','Nopember','Desember']
        },
        yAxis: {
            min: 0, max: 100,
            title: {
                text: 'Jumlah (%)'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        tooltip: {
            valueSuffix: '%'
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },
       series: [{
            name: 'Target',
            data: [8.33, 16.33, 24.66,32.99,41.32,49.65,57.98,66.31,74.64,82.97,91.3, 100]
        }, {
            name: 'Realisasi',
            data: [<?php $total = 0; $total += $kinerja_tercapai_bulan->jan; echo $total.','; $total += $kinerja_tercapai_bulan->feb; echo $total.','; $total+=$kinerja_tercapai_bulan->mar; echo $total.','; $total+=$kinerja_tercapai_bulan->apr; echo $total.','; $total+=$kinerja_tercapai_bulan->mei; echo $total.','; $total+=$kinerja_tercapai_bulan->jun; echo $total.','; $total+=$kinerja_tercapai_bulan->jul; echo $total.','; $total+=$kinerja_tercapai_bulan->agu; echo $total.','; $total+=$kinerja_tercapai_bulan->sep; echo $total.','; $total+=$kinerja_tercapai_bulan->okt; echo $total.','; $total+=$kinerja_tercapai_bulan->nov; echo $total.','; $total+=$kinerja_tercapai_bulan->des; echo $total.','; ?>]
        }]
    });
});


$(function () {
    $('#pie1').highcharts({
        chart: {
            type: 'pie',
            options3d: {
                enabled: true,
                alpha: 45,
                beta: 0
            }
        },
        title: {
            text: 'Anggaran'
        },
       
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                depth: 35,
                dataLabels: {
                    enabled: true,
                    format: '{point.name}'
                }
            }
        },
        series: [{
            type: 'pie',
            name: 'Browser share',
            data: [
                ['Tercapai', {{$anggaran_tercapai }}],
              
                {
                    name: 'Sisa',
                    y: {{$anggaran_sisa }},
                    sliced: true,
                    selected: true
                },
                
            ]
        }]
    });
	
	 $('#pie2').highcharts({
        chart: {
            type: 'pie',
            options3d: {
                enabled: true,
                alpha: 45,
                beta: 0
            }
        },
        title: {
            text: 'Kinerja'
        },
       
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                depth: 35,
                dataLabels: {
                    enabled: true,
                    format: '{point.name}'
                }
            }
        },
        series: [{
            type: 'pie',
            name: 'Browser share',
            data: [
                ['Tercapai', {{ $kinerja_sisa }}],
              
                {
                    name: 'Sisa',
                    y: {{ $kinerja_total }},
                    sliced: true,
                    selected: true
                },
                
            ]
        }]
    });
	
});
 </script>

@endsection