<div class="main-content" autoscroll="true" bs-affix-target="" init-ripples="">
	<section style="margin:20px">
		<div class="card col-md-8" style="padding:20px">
        <div class="page-header" style="margin-bottom:0px">
            <h1><i class="md md-people"></i> <?= $sidebar ?> </h1>	
        </div>

			<form class="form-floating" method="POST" action="<?= site_url() ?>/m_masyarakat/update" id="form_tambah_masyarakat">
				<div class="form-group">
					<label class="control-label">NIK</label>
					<input type="text" class="form-control" value="<?= $masyarakat['nik']?>" disabled> 
                    <input type="hidden" name="nik" class="form-control" value="<?= $masyarakat['nik']?>"> 
                </div>

                <div class="form-group">
					<label class="control-label">No KK</label>
					<input type="text" name="no_kk" class="form-control" id="numericonly" value="<?= $masyarakat['no_kk']?>" required> 
                </div>

                <div class="form-group">
					<label class="control-label">Nama</label>
					<input type="text" name="nama" class="form-control" value="<?= $masyarakat['nama']?>" required> 
                </div>

                <br>
                <div class="form-group form-inline">
                    <label class="control-label normal">Jenis Kelamin</label>
                    <div class="radio">
                        <label>
                        <input type="radio" name="jk" value="Lk"  <?= $masyarakat['jk']=="Lk"?"checked":"" ?> required> Laki - laki</label>
                    </div>
                    <div class="radio">
                        <label>
                        <input type="radio" name="jk" value="Pr"  <?= $masyarakat['jk']=="Pr"?"checked":"" ?> required> Perempuan </label>
                    </div>
                    <br>
                    <label id="jk-error" class="error" for="jk"></label>
                </div>

                <div class="form-group">
					<label class="control-label">Tempat Lahir</label>
					<input type="text" name="tempat_lahir" class="form-control" value="<?= $masyarakat['tempat_lahir']?>" required> 
                </div>

                <div class="form-group">
					<label class="control-label">Tanggal Lahir</label>
					<input type="date" name="tgl_lahir" class="form-control" value="<?= $masyarakat['tgl_lahir']?>" required> 
                </div>

                <div class="form-group">							
                    <label>Status Kawin</label>
                    <select name="status_kawin" class="form-control" required>
                        <option value=""> -- Pilih Status Kawin -- </option>
                        <?php foreach ($status_kawin as $value): ?>
                            <option value="<?= $value ?>"  <?= $value==$masyarakat['status_kawin']?"selected":"" ?>> <?= $value ?> </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">							
                    <label>Agama</label>
                    <select name="agama" class="form-control" required>
                        <option value=""> -- Pilih Agama -- </option>
                        <?php foreach ($agama as $value): ?>
                            <option value="<?= $value ?>"  <?= $value==$masyarakat['agama']?"selected":"" ?>> <?= $value ?> </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
					<label class="control-label">Nama Ibu</label>
					<input type="text" name="nama_ibu" class="form-control" value="<?= $masyarakat['nama_ibu']?>" required> 
                </div>

                <div class="form-group">
					<label class="control-label">Nama Ayah</label>
					<input type="text" name="nama_ayah" class="form-control" value="<?= $masyarakat['nama_ayah']?>" required> 
                </div>

                <div class="form-group">
					<label class="control-label">Alamat</label>
					<input type="text" name="alamat" class="form-control" value="<?= $masyarakat['alamat']?>" required> 
                </div>

                <div class="form-group">							
                    <label>RT</label>
                    <select name="rt" class="form-control" required>
                        <option value=""> -- Pilih RT -- </option>
                        <?php foreach ($rt_rw as $value): ?>
                            <option value="<?= $value ?>"  <?= $value==$masyarakat['rt']?"selected":"" ?>> <?= $value ?> </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">							
                    <label>RW</label>
                    <select name="rw" class="form-control" required>
                        <option value=""> -- Pilih RW -- </option>
                        <?php foreach ($rt_rw as $value): ?>
                            <option value="<?= $value ?>"  <?= $value==$masyarakat['rw']?"selected":"" ?>> <?= $value ?> </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
					<label class="control-label">Pekerjaan</label>
					<input type="text" name="pekerjaan" class="form-control" value="<?= $masyarakat['pekerjaan']?>" required> 
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

$('#form_tambah_masyarakat').validate({
    messages:{
        nik:{
            required:"Masukkan NIK"
        },
        no_kk:{
            required:"Masukkan No KK"
        },
        nama:{
            required:"Masukkan Tanggal Lahir"
        },
        jk:{
            required:"Pilih Jenis Kelamin"
        },
        tempat_lahir:{
            required:"Masukkan Tempat Lahir"
        },
        tgl_lahir:{
            required:"Masukkan Tanggal Lahir"
        },
        status_kawin:{
            required:"Masukkan Status Kawin"
        },
        agama:{
            required:"Masukkan Agama"
        },
        nama_ibu:{
            required:"Masukkan Nama Ibu"
        },
        nama_ayah:{
            required:"Masukkan Nama Ayah"
        },
        alamat:{
            required:"Masukkan Nama Ibu"
        },
        rt:{
            required:"Masukkan RT"
        },
        rw:{
            required:"Masukkan RW"
        },
        pekerjaan:{
            required:"Masukkan Pekerjaan"
        },
    }

});

});
</script>
