<div class="main-content" autoscroll="true" bs-affix-target="" init-ripples="">
<section style="margin:20px">		
    <div class="card" style="padding:20px">
        <div class="page-header" style="margin-bottom:0px">
            <h1><i class="md md-assignment"></i> <?= $sidebar ?> </h1>
        </div>

        <div>
            <table id="export" class="table table-hover table-bordered table-striped" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Tanggal</th>
                        <th>Skor</th>
                        <th>Status</th>
                        <th>Detail</th>
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
                            <?= !empty($value['hasil'])?$value['hasil']:"<span class='label orange'>Data lama</span>" ?>
                        </td>
                        <td>
                            <span class="label blue"><?= $value['status'] ?></span>
                        </td>
                        <td>
                            <a href="<?= base_url()?>R_pemilihan_bantuan/detail/<?= $value['nik']?>" class="btn light-blue" style="color:white"><i class="fa fa-info-circle"></i> Detail</a>                            
                        </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>

    </div>

</section>
</div>