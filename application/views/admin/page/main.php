<?php $this->load->view('admin/partials/header2'); ?>
<div class="row">
		<div class="col-xl-4 col-md-12 col-12">
          <!-- small box -->
          <div class="small-box bg-purple">
            <div class="inner">
              <h3><?= $totalregist->jumlah ?></h3>

              <p>Akun Registrasi</p>
            </div>
            <div class="icon">
              <i class="fa fa-user-plus"></i>
            </div>
            
          </div>
        </div>
        <div class="col-xl-4 col-md-12 col-12">
          <!-- small box -->
          <div class="small-box bg-blue">
            <div class="inner">
              <h3><?= $totaldaftar->jumlah ?></h3>

              <p>Form Pendaftaran</p>
            </div>
            <div class="icon">
              <i class="fa fa-book"></i>
            </div>
           
          </div>
        </div>
        <!-- ./col -->
        <div class="col-xl-4 col-md-12 col-12">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo 'Rp.'.''.number_format($totaluang->jumlah,0,",",".").',-'   ?></h3>

              <p>Total Uang</p>
            </div>
            <div class="icon">
              <i class="fa fa-money"></i>
            </div>
           
          </div>
        </div>
        <!-- ./col -->
        
        <!-- ./col -->
        
        <!-- ./col -->
      </div>
<!-- Default box -->
<div class="box">
	<div class="box-header with-border">
		<h3 class="box-title">Grafik Pendaftaran</h3>

		<div class="box-tools pull-right">
			<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
				title="Collapse">
				<i class="fa fa-minus"></i></button>
		</div>
	</div>
	<div class="box-body">
	<div id="chart4"></div>
	</div>
	<!-- /.box-body -->
	
	<!-- /.box-footer-->
</div>
<!-- /.box -->

<?php $this->load->view('admin/partials/footer2'); ?>
<script>
	// chart 4
	var options = {
		series: [<?php 
		$koding =[];
		$chartData = [];
        $thn=$this->Settings_model->gettahun()["tahun"] ;
		foreach ($jurusan as  $jurusan) {
		$databulan=$this->User_model->getBulanan($jurusan->kode,$thn);
        foreach ($bulan as $key => $value) {
			
            $dataKey = array_search($value, array_column($databulan, 'bulan'));
            if ($dataKey !== false) { // if we have the data in given date
                $chartData[] = $databulan[$dataKey]->jumlah;
            }else {
                //if there is no record, create default values
               $chartData[] = 0;
            }
				
        }
		
		
		 ?>{
			name: '<?= $jurusan->jurusan ?>',
			data: [<?php foreach ($chartData as $key => $value){ echo '"' . $value. '",'; } ?>]
		},<?php $chartData=[]; } ?>],
		chart: {
			foreColor: '#9ba7b2',
			type: 'bar',
			height: 360
		},
		plotOptions: {
			bar: {
				horizontal: false,
				columnWidth: '55%',
				endingShape: 'rounded'
			},
		},
		dataLabels: {
			enabled: false
		},
		stroke: {
			show: true,
			width: 2,
			colors: ['transparent']
		},
		title: {
			text: 'Grafik Pendaftaran TA. <?= $ta->tahun.'/'.($ta->tahun+1)  ?>',
			align: 'left',
			style: {
				fontSize: '14px'
			}
		},
		colors: ["#212529", '#0d6efd', '#ffc107'],
		xaxis: {
			categories: [<?php foreach ($bulan as $key => $value){ echo '"' . $value. '",';}?>],
		},
		yaxis: {
			title: {
				text: 'Jumlah Pendaftar'
			}
		},
		fill: {
			opacity: 1
		},
		tooltip: {
			y: {
				formatter: function (val) {
					return "" + val + " Pendaftar"
				}
			}
		}
	};
	var chart = new ApexCharts(document.querySelector("#chart4"), options);
	chart.render();
	
</script>
