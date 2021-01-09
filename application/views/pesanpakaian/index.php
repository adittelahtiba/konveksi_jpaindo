<!-- BLOCKS -->
<?php
foreach ($jnspkian as $jns) {
    $foto[] = [$jns['KodeJenis'], $jns['NamaJenis'], $jns['GambarJenis']];
}
?>



<div class="block-main container no-padding-top">
    <div class="row">
        <div class="flash-data" data-flash = "<?= $this->session->flashdata('message') ?>"></div>
        <div class="col-md-3 col-sm-3">
            <div class="block-content space30">
                <img src="<?= base_url('assets'); ?>/img/jenis/<?= $foto[0][2]; ?>" class="img-responsive" alt="" width="270" />
                <div class="text-style2">
                    <h6>Kaos<br></h6>
                    <p><?= $foto[0][1]; ?></p>
                    <a href="<?= base_url('pesanpakaian/pola'); ?>/<?= $foto[0][0]; ?>">Pesan</a>
                </div>
            </div>
            <div class="block-content space30">
                <img src="<?= base_url('assets'); ?>/img/jenis/<?= $foto[1][2]; ?>" class="img-responsive" alt="" width="270" />
                <div class="text-style2">
                    <h6>Kaos<br></h6>
                    <p><?= $foto[1][1]; ?></p>
                    <a href="<?= base_url('pesanpakaian/pola'); ?>/<?= $foto[1][0]; ?>">Pesan</a>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6">
            <div class="home-carousel">
                <?php
                foreach ($jnspkian as $jns) { ?>

                    <div>
                        <img src="<?= base_url('assets/img/jenis'); ?>/<?= $jns['GambarJenis']; ?>" class="img-responsive" alt="" width="570px" length="623px" />
                        <div class="c-text">
                            <h4>Kaos<br></h4>
                            <p><?= $jns['NamaJenis']; ?></p>
                            <a href="<?= base_url('pesanpakaian/pola'); ?>/<?= $jns['KodeJenis']; ?>">Pesan</a>
                        </div>
                    </div>

                <?php } ?>

            </div>


        </div>
        <div class="col-md-3 col-sm-3">
            <div class="block-content space30">
                <img src="<?= base_url('assets'); ?>/img/jenis/<?= $foto[2][2]; ?>" class="img-responsive" alt="" width="270" />
                <div class="text-style2">
                    <h6>Kaos<br></h6>
                    <p><?= $foto[2][1]; ?></p>
                    <a href="<?= base_url('pesanpakaian/pola'); ?>/<?= $foto[2][0]; ?>">Pesan</a>
                </div>
            </div>
            <div class="block-content">
                <img src="<?= base_url('assets'); ?>/img/jenis/<?= $foto[3][2]; ?>" class="img-responsive" alt="" width="270" />
                <div class="text-style2">
                    <h6>Kaos<br></h6>
                    <p><?= $foto[3][1]; ?></p>
                    <a href="<?= base_url('pesanpakaian/pola'); ?>/<?= $foto[3][0]; ?>">Pesan</a>
                </div>
            </div>

        </div>
    </div>
</div>