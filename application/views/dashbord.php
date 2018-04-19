<div class="main-content" autoscroll="true" bs-affix-target="" init-ripples="">
	<section style="margin:20px">

		<div class="row">

			<div class="col-lg-3 col-xs-6">
				<div class="small-box light-blue base">
					<div class="inner">
						<h3 class="white-text strong">
							<?= $count_kriteria ?>
						</h3>
						<p>Kriteria</p>
						<br>
					</div>
					<div class="icon">
						<i class="md md-description"></i>
					</div>
					<a href="#" class="small-box-footer">Panel Info
						<i class="fa fa-info-circle"></i>
					</a>
				</div>
			</div>

			<div class="col-lg-3 col-xs-6">
				<div class="small-box lime base">
					<div class="inner">
						<h3 class="white-text strong">
							<?= $count_masyarakat_belum ?>
						</h3>

						<p>Masyarakat <br> Belum</p>
					</div>
					<div class="icon">
						<i class="md md-people"></i>
					</div>
					<a href="<?= site_url() ?>m_masyarakat" class="small-box-footer">Panel Info
						<i class="fa fa-info-circle"></i>
					</a>
				</div>
			</div>

			<div class="col-lg-3 col-xs-6">
				<div class="small-box red base">
					<div class="inner">
						<h3 class="white-text strong">
							<?= $count_masyarakat_kandidat ?>
						</h3>

						<p>Masyarakat <br> Kandidat</p>
					</div>
					<div class="icon">
						<i class="md md-people"></i>
					</div>
					<a href="<?= site_url() ?>m_masyarakat" class="small-box-footer">Panel Info
						<i class="fa fa-info-circle"></i>
					</a>
				</div>
			</div>

			<div class="col-lg-3 col-xs-6">
				<div class="small-box amber base">
					<div class="inner">
						<h3 class="white-text strong">
							<?= $count_masyarakat_pilih ?>
						</h3>

						<p>Masyarakat <br>Pilih</p>
					</div>
					<div class="icon">
						<i class="md md-people"></i>
					</div>
					<a href="<?= site_url() ?>m_masyarakat" class="small-box-footer">Panel Info
						<i class="fa fa-info-circle"></i>
					</a>
				</div>
			</div>			

			<div id="chart_realisasi" class="col-md-6" style="height:330px"></div>
			<div id="chart_masyarakat" class="col-md-6" style="height:330px"></div>
			
		</div>
	</section>
</div>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-3d.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>

<script>
Highcharts.chart('chart_realisasi', {
	chart: {
		type: 'column',
		options3d: {
			enabled: true,
			alpha: 10,
			beta: 25,
			depth: 70
		}
	},
	title: {
		text: 'Jumlah Penerima Bantuan Rumah Pertahun'
	},
	subtitle: {
		text: 'Dari Tahun 2008 sampai <?= date("Y") ?>'
	},
	plotOptions: {
		column: {
			depth: 25
		}
	},
	xAxis: {
		categories:[
			<?php 
			
			foreach ($jumlah_bantuan_pertahun as $tahun => $jumlah) {
				echo $tahun.",";
			}

			?>
		],
		labels: {
			skew3d: true,
			style: {
				fontSize: '16px'
			}
		}
	},
	yAxis: {
		title: {
			text: null
		}
	},
	series: [{
		name: 'Masyarakat',
		data: [
			<?php 
			
			foreach ($jumlah_bantuan_pertahun as $tahun => $jumlah) {
				echo $jumlah.",";
			}

			?>
		]
	}]
});

Highcharts.chart('chart_masyarakat', {
	chart: {
		type: 'pie',
		options3d: {
			enabled: true,
			alpha: 45,
			beta: 0
		}
	},
	title: {
		text: 'Rasio Status Masyarakat Penerima Bantuan'
	},
	tooltip: {
		pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
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
			<?php 
			
			foreach ($jumlah_masyarakat_status as $status => $jumlah) {
				echo "['$status - $jumlah',$jumlah],";
			}

			?>
		]
	}]
});
</script>
<style>
p{
	/* margin-top:40px; */
}
</style>
