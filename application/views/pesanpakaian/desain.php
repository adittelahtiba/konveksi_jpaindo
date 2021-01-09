<!-- BREADCRUMBS -->
<div class="bcrumbs">
    <div class="container">
        <ul>
            <li><a href="<?= base_url('Front') ?>">Beranda</a></li>
            <li><a href="<?= base_url('pesanpakaian/pola/') . $KodeJenis; ?>">Pilih Pola</a></li>
            <li><a href=""></a>Pilih Desain</li>
        </ul>
    </div>
</div>

<div class="space20"></div>
<!-- PILIH DESAIN -->
<div class=" heading-sub text-center">
    <h5>Pilih Desain</h5>
</div>
<div class="container padding20">
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="product-carousel3">
                <?php foreach ($desain as $d) { ?>
                    <div class="pc-wrap">
                        <div class="product-item">
                            <div class="item-thumb">
                                <div class="tpc-content">
                                    <img src="<?= base_url('assets/img/design/') . $d['GbrDesain']; ?>" class="img-responsive" alt="" />
                                    <div class="tpc-overlay">
                                        <div class="tpc-overlay-inner">
                                            <div class="tpc-info">
                                                <h4><a href="#">Desain 01</a></h4>
                                                <a href="<?= base_url('pesanpakaian/detailbarang'); ?>/<?= $d['KodeJenis']; ?>/<?= $d['KdPola']; ?>/<?= $d['KdDesain']; ?>" class="cart-btn">Pilih</a>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<!-- AKHIR PILIH DESAIN -->
<div class="clearfix space20"></div>