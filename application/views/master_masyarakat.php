<?php 
    $status = $this->uri->segment('3');
?>
<div class="main-content" autoscroll="true" bs-affix-target="" init-ripples="">
<section style="margin:20px">		
    <div class="card" style="padding:20px">

        <!-- message -->
		<?= getAlert('result'); ?>
		<!-- end message -->
        
        <div class="page-header" style="margin-bottom:0px">
            <h1>
                <i class="md <?= $status=='Kandidat'?" md-assignment":"md-people" ?>"></i> 
                <?php
                    if($status == 'Belum' && isAdmin()){
                        echo "Mastering Masyarakat";
                    }elseif ($status == 'Kandidat' && isSurveyor()) {
                        echo "Entry Data Detail Kandidat";
                    }elseif ($status == 'Belum' && isOperator()) {
                        echo "Pilih Kandidat Masyarakat";
                    }elseif (isLurah()) {
                        echo "Pilih Prioritas Masyarakat";
                    }
                ?> 
            </h1>				
            <?php if(isAdmin()): ?>
                <a href="<?= site_url() ?>m_masyarakat/FormAdd" class="btn btn-primary" style="color:white"><i class="fa fa-plus"></i> Tambah</a>                
            <?php endif; ?>
        </div>
        <div>
        
        <?php if (isLurah()): ?>
            <table id="example" class="table table-hover table-bordered table-striped" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th rowspan="2" style="width:5%">No</th>
                        <th rowspan="2">NIK</th>
                        <th rowspan="2">Nama</th>
                        <th rowspan="2">Alamat</th>
                        <th rowspan="2" >Tanggal</th>
                        <th colspan="2">Foto Rumah</th>
                        <th rowspan="2">Skor</th>
                        <th rowspan="2" style="width:10%">Aksi</th>
                    </tr>
                    <tr>                        
                        <th style="width:20%">Depan</th>
                        <th style="width:20%">Dalam</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $no = 1;
                        foreach($masyarakat as $value): 
                    ?>
                    <tr>
                        <td><?= $no++."." ?></td>
                        <td><?= $value['nik'] ?></td>
                        <td><?= $value['nama'] ?></td>
                        <td><?= $value['alamat']." RT ".$value['rt']." RW ".$value['rw'] ?></td>
                        <td><?= $value['tanggal'] ?></td>
                        <td>
                            <img src="<?= base_url().'files/foto_rumah/'.$value['foto_rumah'] ?>" width="100%" height="100%" class="img-responsive zoom">                        
                        </td>
                        <td>
                        <?php if (!empty($value['foto_rumah1'])): ?>
                            <img src="<?= base_url().'files/foto_rumah/'.$value['foto_rumah1'] ?>" width="100%" height="100%" class="img-responsive zoom">                        
                        <?php else:?>
                            <img src="http://wfarm2.dataknet.com/static/resources/icons/set52/ad752e7d.png" width="100%" height="100%" class="img-responsive zoom">                        
                        <?php endif ?>
                        </td>
                        <td><?= $value['hasil'] ?></td>
                        <td class="text-center">
                            <a href="<?= site_url() ?>m_masyarakat/setPernah/<?= $value['nik'] ?>" class="btn light-green" style="color:white" onclick="return confirm('Pilih Penerima Bantuan');"><i class="fa fa-check"></i> Pilih</a>                            
                        </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>

        <?php else: ?>
            <table id="tableServerside" class="table table-hover table-bordered table-striped" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th style="width:5%">No</th>
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Tempat Lahir</th>
                        <th>Alamat</th>
                        <th>Status</th>
                        <?php if(isAdmin()): ?>
                            <th>Aksi</th>
                        <?php endif; ?>
                        <th>Aksi</th>                    
                    </tr>

                </thead>                
            </table>
        <?php endif ?>
        

        </div>
    </div>
</section>
</div>
<script>
//data table
$(document).ready(function(){
    var datatable = $('#tableServerside').DataTable({
        "responsive":true,
        "processing":true,
        "serverSide":true,
        "ajax":{
            url :"<?= base_url().'m_masyarakat/JsonMasyarakat/'.$status?>",
            type:"POST"
        },
        "bSort":false        
    }); 
});

// alert
$(".alert-success").fadeTo(5000, 500).slideUp(500, function(){
    $(".alert-success").slideUp(500);
});

// zoom img
$('.zoom').elevateZoom({
    zoomWindowPosition: 12,
    zoomWindowWidth:330,
    zoomWindowHeight:250,
    easing : true,
    scrollZoom: true
}); 

function triggerMe(){
   return confirm("Hapus Data Masyarakat");
}

</script>