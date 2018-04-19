<div class="main-content" autoscroll="true" bs-affix-target="" init-ripples="">
	<section style="margin:20px">
		<div class="card col-md-6" style="padding:20px">
        <div class="page-header" style="margin-bottom:0px">
            <h1><i class="md md-people"></i> <?= $sidebar ?> </h1>	
        </div>
        
            <form class="form-floating" method="POST" action="<?= site_url() ?>/m_kriteria/updateSubKriteria">		
            
                <input type="hidden" name="id_sub_kriteria" value="<?= $sub_kriteria[0]['id_sub_kriteria'] ?>">
                <input type="hidden" name="id_kriteria" value="<?= $sub_kriteria[0]['id_kriteria'] ?>">

                <div class="form-group">
					<label class="control-label">Sub Kriteria</label>
					<input type="text" name="sub_kriteria" value="<?= $sub_kriteria[0]['sub_kriteria'] ?>" class="form-control"  required> 
                </div> 

                <div class="form-group">
                    <select name="poin" class="form-control" required>
                        <option value="">-- Pilih Poin --</option>

                        <?php for($i=0; $i<=100; $i+=10): ?>
                        <option <?= ($sub_kriteria[0]['poin']==$i)?"selected":"" ?> value="<?= $i ?>"><?= $i ?></option>
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