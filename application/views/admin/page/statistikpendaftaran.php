<?php $this->load->view('admin/partials/header'); ?>


<div class="page-wrapper">
	<div class="page-content">
		<!--breadcrumb-->
		<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
			<div class="breadcrumb-title pe-3">Statistik</div>
			<div class="ps-3">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb mb-0 p-0">
						<li class="breadcrumb-item"><a href="<?= base_url('admin') ?>"><i
									class="bx bx-home-alt"></i></a>
						</li>
						<li class="breadcrumb-item active" aria-current="page"><a href="<?= base_url('pendaftaran') ?>">
								Pendaftaran</a></li>
						<li class="breadcrumb-item active" aria-current="page"><a href="<?= base_url('pendaftaran-detail/'.$kodeprodi.'') ?>"> <?= $nama_jurusan->jurusan ?> </a></li>
						<li class="breadcrumb-item active" aria-current="page">Statistik <?= $nama_jurusan->jurusan ?></li>
					</ol>
				</nav>
			</div>
			<div class="ms-auto">
				<h5> <i class="bx bx-calendar-event text-info"></i> Tahun, <?= $ta->tahun.'/'.($ta->tahun+1)  ?></h5>
			</div>
		</div>
		<!--end breadcrumb-->
		<div class="row">
			<div class="col-xl-9 mx-auto">
                	
				<div class="card">
					<div class="card-body">
						<div id="chart13"></div>
					</div>
				</div>
				<div class="card">
					<div class="card-body">
						<div id="chart1"></div>
					</div>
				</div>
				<div class="card">
					<div class="card-body">
						<div id="chart2"></div>
					</div>
				</div>
				
				<div class="card">
					<div class="card-body">
						<div id="chart7"></div>
					</div>
				</div>
				
			
				
			</div>
		</div>
		<!--end row-->
	</div>
</div>

<?php $this->load->view('admin/partials/footer'); ?>

<!-- highcharts js -->
    <script src="<?= base_url();  ?>assets/tema/plugins/highcharts/js/highcharts.js"></script>
	<script src="<?= base_url();  ?>assets/tema/plugins/highcharts/js/highcharts-more.js"></script>
	<script src="<?= base_url();  ?>assets/tema/plugins/highcharts/js/variable-pie.js"></script>
	<script src="<?= base_url();  ?>assets/tema/plugins/highcharts/js/solid-gauge.js"></script>
	<script src="<?= base_url();  ?>assets/tema/plugins/highcharts/js/highcharts-3d.js"></script>
	<script src="<?= base_url();  ?>assets/tema/plugins/highcharts/js/cylinder.js"></script>
	<script src="<?= base_url();  ?>assets/tema/plugins/highcharts/js/funnel3d.js"></script>
	<script src="<?= base_url();  ?>assets/tema/plugins/highcharts/js/exporting.js"></script>
	<script src="<?= base_url();  ?>assets/tema/plugins/highcharts/js/export-data.js"></script>
	<script src="<?= base_url();  ?>assets/tema/plugins/highcharts/js/accessibility.js"></script>

    <script>
        $(function () {
	"use strict";
	// chart 1
	Highcharts.chart('chart1', {
		chart: {
			plotBackgroundColor: null,
			plotBorderWidth: null,
			plotShadow: false,
			type: 'pie',
			styledMode: true
		},
		credits: {
			enabled: false
		},
		title: {
			text: 'Data Pendaftaran Jurusan  <?= $nama_jurusan->jurusan ?> Berdasarkan Gender'
		},
		tooltip: {
			pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
		},
		accessibility: {
			point: {
				valueSuffix: '%'
			}
		},
		plotOptions: {
			pie: {
				allowPointSelect: true,
				cursor: 'pointer',
				dataLabels: {
					enabled: true,
					format: '<b>{point.name}</b>: {point.percentage:.1f} %'
				}
			}
		},
		series: [{
			name: 'Brands',
			colorByPoint: true,
			data: [{
				name: 'Laki-laki',
				y: <?= $laki->jumlah ?>,
			}, {
				name: 'Perempuan',
				y: <?= $perempuan->jumlah ?>
			}]
		}]
	});
	// chart 2
	// Build the chart
	Highcharts.chart('chart2', {
		chart: {
			plotBackgroundColor: null,
			plotBorderWidth: null,
			plotShadow: false,
			type: 'pie',
			styledMode: true
		},
		credits: {
			enabled: false
		},
		title: {
			text: 'Data Pendaftaran Jurusan  <?= $nama_jurusan->jurusan ?> Berdasarkan Status Pekerjaan'
		},
		tooltip: {
			pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
		},
		accessibility: {
			point: {
				valueSuffix: '%'
			}
		},
		plotOptions: {
			pie: {
				allowPointSelect: true,
				cursor: 'pointer',
				dataLabels: {
					enabled: false
				},
				showInLegend: true
			}
		},
		series: [{
			name: 'Brands',
			colorByPoint: true,
			data: [{
				name: 'Bekerja',
				y: <?= $bekerja->jumlah ?>,
				sliced: true,
				selected: true
			}, {
				name: 'Tidak Bekerja',
				y: <?= $tidakkerja->jumlah ?>
			}]
		}]
	});
		// chart7
	Highcharts.chart('chart7', {
		chart: {
			type: 'bar',
			styledMode: true
		},
		credits: {
			enabled: false
		},
		title: {
			text: 'Data Pendaftaran Jurusan  <?= $nama_jurusan->jurusan ?> '
		},
        subtitle: {
			text: 'Berdasarkan Gaji Orang Tua per Bulan'
		},
		
		xAxis: {
			categories: ['Data'],
			title: {
				text: null
			}
		},
		yAxis: {
			min: 0,
			title: {
				text: 'Penghasilan Orang Tua',
				align: 'high'
			},
			labels: {
				overflow: 'justify'
			}
		},
		tooltip: {
			valueSuffix: ' Orang'
		},
		plotOptions: {
			bar: {
				dataLabels: {
					enabled: true
				}
			}
		},
		legend: {
			layout: 'vertical',
			align: 'right',
			verticalAlign: 'top',
			x: -40,
			y: 80,
			floating: true,
			borderWidth: 1,
			backgroundColor: Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF',
			shadow: true
		},
		credits: {
			enabled: false
		},
		series: [{
			name: '< Rp.1.000.000,-',
			data: [<?= $c3a->jumlah ?>]
		}, {
			name: 'Rp.1.000.000,- s/d Rp.2.500.000,-',
			data: [<?= $c3b->jumlah ?>]
		}, {
			name: 'Rp.2.500.000,- s/d Rp.5.000.000,-',
			data: [<?= $c3c->jumlah ?>]
		}, {
			name: '> Rp.5.000.000,-',
			data: [<?= $c3d->jumlah ?>]
		}]
	});
	// chart 13
	Highcharts.chart('chart13', {
		chart: {
			type: 'areaspline',
			
		},
		credits: {
			enabled: false
		},
		title: {
			text: 'Data Pendaftaran  Perbulan TA.<?= $ta->tahun.'/'.($ta->tahun+1)  ?> '
		},
		subtitle: {
			text: ' Jurusan <?= $nama_jurusan->jurusan ?> '
		},
		xAxis: [{
			categories: [<?php foreach ($bulan as $key => $value)  { echo '"' . $value. '",';}?>],
			crosshair: true
		}],
		tooltip: {
			shared: true
		},
        
		legend: {
			layout: 'vertical',
			align: 'left',
			x: 120,
			verticalAlign: 'top',
			y: 100,
			floating: true,
			backgroundColor: Highcharts.defaultOptions.legend.backgroundColor || // theme
			'rgba(255,255,255,0.25)'
		},
		series: [ {
			name: 'Pendaftar',
			type: 'areaspline',
			data: [<?php foreach ($datachart as $key => $value)  { echo $value. ',';}?>],
			tooltip: {
				valueSuffix: 'Pendaftar'
			}
		}]
	});

	
});

    </script>
