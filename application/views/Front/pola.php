BREADCRUMBS -->
            <div class="bcrumbs">
                <div class="container">
                    <ul>
                        <li>
                            <a href="<?= base_url('Front') ?>">Beranda</a>
                        </li>
                        <li>
                            <a href="#">Pilih Pola</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="clearfix space20"></div>
            <!-- PILIH POLAAAA -->
            <div class=" heading-sub text-center">
                <h5>Pilih Pola</h5>
            </div>
            <div class="clearfix space20"></div>
            <div class="slider-wrap slider-carousel">
                <div class="top-product-carousel">
                    <?php foreach ($getpola as $gp) { ?>
                        <div class="tpc-content">
                            <img src="<?= base_url('assets/img/pola/') . $gp['GbrPola'] ?>" class="img-responsive" alt=""/>
                            <div class="tpc-overlay">
                                <div class="tpc-overlay-inner">
                                    <div class="tpc-info">
                                        <h4><a href="#">Pola 01</a></h4>
                                        <a href="<?= base_url('Front/single/') .$gp['KdPola'] ?>" class="cart-btn">Pilih</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <!-- AKHIR PILIH POLAAAA -->
            <div class="clearfix space60"></div>
            <!-- TESTIMONI PRODUK -->
            <!-- <div class="featured-products">
                    <div class="container">
                        <div class="row">
                            <div class="heading-sub text-center">
                                <h5><span>Testimoni Produk</span></h5>
                                <p>
                                     Beberapa pakaian yang pernah kami produksi.<br></p>
                            </div>
                            <ul class="filter" data-option-key="filter">
                                <li>
                                    <a class="selected" href="#filter" data-option-value="*">All</a>
                                </li>
                                <?php foreach ($jenis as $j) { ?>
                                    <li>
                                        <a href="#" data-option-value=".<?= $j['NamaJenis'] ?>"><?= $j['NamaJenis'] ?></a>
                                    </li>
                                <?php } ?>
                            </ul>
                            <div id="isotope" class="isotope">
                                <?php foreach ($jenis as $nj) { ?>
                                    <div class="isotope-item <?= $nj['NamaJenis']?>" >
                                        <div class="product-item">
                                            <div class="item-thumb">
                                                <img src="<?= base_url('assets/img/pola/' . $nj['GbrPola']) ?>" class="img-responsive" alt=""/>
                                            </div>
                                            <div class="product-info">
                                                <h4 class="product-title"><a href="<?= base_url('assets/front/') ?>./single-product.html"></a></h4>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div> -->
            <!-- AKHIR TESTIMONI PRODUK -->
            <!-- POLICY -->
            <div class="policy-item" id="policy2">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3 col-sm-3">
                            <div class="pi-wrap">
                                <i class="fa fa-plane"></i>
                                <h4>Gratis Ongkir<span>Pengiriman secara gratis</span></h4>
                                <p>
                                     Dapatkan pengiriman barang pesanan secara gratis untuk daerah Kab. Bandung
                                </p>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-3">
                            <div class="pi-wrap">
                                <i class="fa fa-money"></i>
                                <h4>Jaminan Uang<span>7 hari pengembalian uang</span></h4>
                                <p>
                                     Pengembalian barang dalam 7 hari jika barang yg diterima dalam keadaan rusak
                                </p>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-3">
                            <div class="pi-wrap">
                                <i class="fa fa-clock-o"></i>
                                <h4>Waktu Kerja<span>Buka: 09:00 - Tutup: 22:00</span></h4>
                                <p>
                                     Waktu dan Jam kerja untuk pelayanan offline kami dari hari Senin-Sabtu mulai pukul 09.00-22.00
                                </p>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-3">
                            <div class="pi-wrap">
                                <i class="fa fa-life-ring"></i>
                                <h4>Online 24 Jam<span>Pelayanan online 24 jam sehari</span></h4>
                                <p>
                                     Pelayanan online 24 jam untuk membantu anda dalam bertransaksi
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- AKHIR POLICY