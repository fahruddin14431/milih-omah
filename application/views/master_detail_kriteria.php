<div class="main-content col-md-8" autoscroll="true" bs-affix-target="" init-ripples="">
	<section style="margin:20px">		
		<div class="card" style="padding:20px">

		<!-- message -->
		<?= getAlert('result'); ?>
		<!-- end message -->

			<div class="page-header" style="margin-bottom:0px">
				<h1><i class="md md-description"></i> <?= $sidebar ?> </h1>				
			</div>
			<div>
				<table id="example" class="table table-hover table-bordered table-striped" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>No</th>
							<th>Sub Kritria</th>
							<th>Poin</th>
							<!-- <th>Aksi</th> -->
						</tr>
					</thead>
					<tbody>
						<?php 
							$no = 1;
							foreach($sub_kriteria as $value): 
						?>
						<tr>
							<td><?= $no++."." ?></td>
							<td><?= $value['sub_kriteria'] ?></td>
							<td><?= $value['poin'] ?></td>
							<!-- <td class="text-center">
                           		<a href="<?= site_url() ?>m_kriteria/FormUpdateSubKriteria/<?= $value['id_sub_kriteria'] ?>" class="btn btn-warning" style="color:white" ><i class="fa fa-edit"></i> Ubah</a>                            
                        	</td> -->
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