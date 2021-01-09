<div class=" heading-sub text-center">
        <h5>Pilih Pola</h5>
</div>

<!-- SLIDER -->

<div class="slider-wrap slider-carousel">
        <div class="top-product-carousel">

                <?php
                foreach ($pola as $pl) {
                        ?>

                        <div class="tpc-content">
                                <img src="<?= base_url('assets/img/pola'); ?>/<?= $pl['GbrPola']; ?>" width="270">
                                <div class="tpc-overlay">
                                        <div class="tpc-overlay-inner">
                                                <div class="tpc-info">
                                                        <h4><a href="<?= base_url('pesanpakaian/desain'); ?>/<?= $pl['KodeJenis']; ?>/<?= $pl['KdPola']; ?>"><?= $pl['KdPola']; ?></a></h4>
                                                        <a href="<?= base_url('pesanpakaian/desain'); ?>/<?= $pl['KodeJenis']; ?>/<?= $pl['KdPola']; ?>" class="cart-btn">Pilih</a>
                                                </div>
                                        </div>
                                </div>
                        </div>

                <?php } ?>
        </div>
</div>