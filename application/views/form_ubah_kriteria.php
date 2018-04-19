<div class="main-content" autoscroll="true" bs-affix-target="" init-ripples="">
	<section style="margin:20px">
		<div class="card col-md-8" style="padding:20px">
        <div class="page-header" style="margin-bottom:0px">
            <h1><i class="md md-people"></i> <?= $sidebar ?> </h1>	
        </div>

            <form class="form-floating" method="POST" action="<?= site_url() ?>/m_kriteria/update" id="form_ubah_kriteria">		
            
                <input type="hidden" name="id_kriteria" value="<?= $id_kriteria ?>">

                <div class="form-group">
					<label class="control-label">Kriteria</label>
					<input type="text" name="kriteria" value="<?= $kriteria ?>" class="form-control" id="letteronly" required> 
                </div>                

                <div class="form-group form-inline">
					<input type="submit" class="btn btn-success" value="SIMPAN"> 
                    <a href='javascript:history.back(1);' class="btn btn-warning"  style="color:white">Kembali</a>
                </div>

			</form>

        </div>
    </section>
</div>

<script>
$(function(){

$("#letteronly" ).keypress(function(e) {
    var key = e.keyCode;
    if (key >= 48 && key <= 57) {
        e.preventDefault();
    }
});

$('#numericonly').keypress(function(e) {
    var verified = (e.which == 8 || e.which == undefined || e.which == 0) ? null : String.fromCharCode(e.which).match(/[^0-9]/);
    if (verified) {e.preventDefault();}
});

$('#form_ubah_kriteria').validate({
    messages:{
        kriteria:{
            required:"Masukkan kriteria"
        }
    }

});

});
</script>
