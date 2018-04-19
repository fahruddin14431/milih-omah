<div class="main-content" autoscroll="true" bs-affix-target="" init-ripples="">
	<section style="margin:20px">
		<div class="card col-md-6" style="padding:20px">
        <div class="page-header" style="margin-bottom:0px">
            <h1><i class="md md-people"></i> <?= $sidebar ?> </h1>	
        </div>

            <form class="form-floating" method="POST" action="<?= site_url() ?>/m_kriteria/setMinSkor" id="form_ubah_kriteria">		
            
                <input type="hidden" name="id_config" value="<?= $config['id_config'] ?>">

                <div class="form-group">
                    <select name="skor_minimal" class="form-control" required>
                        <option value="">-- Pilih Skor Minimal --</option>

                        <?php for($i=0; $i<=100; $i+=10): ?>
                        <option <?= ($config['skor_minimal']==$i)?"selected":"" ?> value="<?= $i ?>"><?= $i ?></option>
                        <?php endfor ?>

                    </select>
                </div>         

                <div class="form-group form-inline">
					<input type="submit" class="btn btn-success" value="SIMPAN"> 
                    <a href='javascript:history.back(1);' class="btn btn-warning"  style="color:white">Kembali</a>
                </div>

			</form>

        </div>
    </section>
</div>