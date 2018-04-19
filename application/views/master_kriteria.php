<div class="main-content" autoscroll="true" bs-affix-target="" init-ripples="">
	<section style="margin:20px">		
		<div class="card" style="padding:20px">

		<!-- message -->
		<?= getAlert('result'); ?>
		<!-- end message -->

			<div class="page-header" style="margin-bottom:0px">
				<h1><i class="md md-description"></i> <?= $sidebar ?> </h1>				
				<a href="<?= site_url() ?>m_kriteria/FormUbahSkor" class="btn btn-primary" style="color:white"><i class="fa fa-gear"></i> Pengaturan Minimal Skor</a>                
			</div>
			<div>
				<table id="example" class="table table-hover table-bordered table-striped" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th style="width:5%">No</th>
							<th>Id Kritria</th>
							<th>Kriteria</th>
							<th>Bobot</th>
							<th>Normalisasi Bobot</th>
							<th>Status</th>
							<th style="width:20%">Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							$no = 1;
							foreach($kriteria as $value): 
						?>
						<tr>
							<td><?= $no++."." ?></td>
							<td><?= $value['id_kriteria'] ?></td>
							<td><?= $value['kriteria'] ?></td>
							<td class="text-center"><?= $value['bobot']." %" ?></td>
							<td class="text-center"><?= $value['normalisasi_bobot'] ?></td>
							<td class="text-center">
								<span class="label <?= $value['status']=='1'?'green':'amber' ?>">
									<?= $value['status']=='1'?'Aktif':'Tidak Aktif' ?>
								</span>
							</td>
							<td class="text-center">
								<a href="<?= site_url() ?>m_kriteria/detailkriteria/<?= $value['id_kriteria'] ?>" class="btn btn-info" style="color:white"><i class="fa fa-info"></i> Detail</a>
								<!-- <a href="<?= site_url() ?>m_kriteria/FormUpdate/<?= $value['id_kriteria'] ?>" class="btn btn-warning" style="color:white"><i class="fa fa-edit"></i> Ubah</a> -->
							</td>
						</tr>
						<?php endforeach ?>
					</tbody>
				</table>
			</div>
		</div>
	</section>
</div>
<script>
$(".alert-success").fadeTo(5000, 500).slideUp(500, function(){
    $(".alert-success").slideUp(500);
});
</script>