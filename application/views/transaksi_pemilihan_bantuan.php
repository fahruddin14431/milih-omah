<div class="main-content" autoscroll="true" bs-affix-target="" init-ripples="">
	<section style="margin:20px">
		<div class="card" style="padding:20px">
			<div class="page-header" style="margin-bottom:0px">
				<h1><i class="md md-assessment"></i> <?= $sidebar ?> </h1>
				<br>
			</div>
            <div>

				<div class="row">                    
					<div class="col-md-5">

					<?= form_open_multipart('t_pemilihan_bantuan/insert'); ?>

						<div class="form-group">							
							<label>NIK dan Nama Kandidat</label>
							<input type="text"  class="form-control" value="<?= $masyarakat['nik']." - ".$masyarakat['nama'] ?>" required readonly>
							<input type="hidden" name="nik" value="<?= $masyarakat['nik'] ?>">
						</div>
						<br>

						<!-- loop kriteria and sub_kriteria-->
						<?php foreach ($sub_kriteria as $value):?>
						<div class="form-group">							
							<label><?= $value['kriteria'] ?></label>
							<select name="<?= $value['id_kriteria']; ?>" class="form-control" required>
								<option value=""> -- Pilih <?= $value['kriteria']  ?> -- </option>
								<?php foreach ($value['sub_kriteria'] as $detail): ?>
									<option value="<?= $detail['poin'] ?>"> <?= $detail['sub_kriteria']  ?> </option>
								<?php endforeach; ?>
							</select>
						</div>
						<br>
						<?php endforeach; ?>
						<!-- end loop -->

						<div class="form-group">							
							<label>Upload Foto Rumah Bagian Depan</label>
							<input type="file" name="foto_rumah" class="form-control" required>
						</div>
						<br>

						<div class="form-group">							
							<label>Upload Foto Rumah Bagian Dalam</label>
							<input type="file" name="foto_rumah1" class="form-control" required>
						</div>
						<br>


						<div class="form-group">	
							<input type="submit" value="SIMPAN" class="btn btn-success">
						</div>

					<?= form_close(); ?>

					</div>                    
				</div>

            </div>
		</div>
	</section>
</div>