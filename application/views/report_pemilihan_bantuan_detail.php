<div class="main-content" autoscroll="true" bs-affix-target="" init-ripples="">
<section style="margin:20px">		
    <div class="card col-md-8" style="padding:20px">
       
        <div class="page-header" style="margin-bottom:0px">
            <h1><i class="md md-assignment"></i> <?= $sidebar ?> </h1>
        </div>

        <div>

            <h3><?= $masyarakat['nama'] ?></h3>

            <?php if (!empty($detail) && !empty($nilai)) : ?>
            
            <!-- detail -->
            <table class="table table-hover table-bordered table-striped" cellspacing="0" width="60%">
                <tr>
                    <th>Kriteria</th>
                    <th>Nilai</th>                
                </tr>

                <?php foreach ($detail as $value): ?>
                <tr>
                    <td><?= $value['kriteria'] ?></td>
                    <td><?= $value['nilai'] ?></td>                
                </tr>
                <?php endforeach?>
                <tr>
                    <td><b>SKOR</b></td>
                    <td><b><?= $nilai ?></b></td>
                </tr>

            </table>

            <?php else : ?>

            <h3>Data Detail Tidak Tersedia</h3>

            <?php endif ?>


            

        </div>

    </div>
</section>
</div>