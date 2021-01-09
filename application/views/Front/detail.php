<!-- BREADCRUMBS -->
<div class="bcrumbs">
    <div class="container">
        <ul>
            <li><a href="<?= base_url(); ?>">Beranda</a></li>
            <li><a href="<?= base_url('Front/daftar'); ?>">Daftar Pesanan</a></li>
        </ul>
    </div>
</div>
<div class="flash-data" data-flash="<?= $this->session->flashdata('message') ?>"></div>


<!-- DESAIN PAKAIAN -->
<div class="shop-single">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="row">
                    <div class="col-md-7 col-sm-6">
                        <div class="product-single">
                            <div class="sub2 text-left">
                                <h5>DETAIL PESANAN <div class="topcart"><span><img src="<?= base_url('assets/img/profile/bell.gif'); ?>" width="30px">
                                        </span>
                                        <div class="cart-info">
                                            <h4><?= $feedback; ?><br><br><br><br><br><br><br>
                                                <center>\(~.~)/</center>
                                        </div>
                                    </div>
                            </div>
                            </h5>
                            <div class="space50"></div>
                            <div class="row select-wraps">
                                <?php echo form_open_multipart('daftarpesanan/buktipembayaran/' . $get_pesananby_id['IdPesanan']); ?>
                                <div class="table-responsive">
                                    <table class="table table-striped text-left">
                                        <tbody>
                                            <tr>
                                                <td class="col-md-3">Id Pesanan</td>
                                                <td width="10px">:</td>
                                                <td><?= $get_pesananby_id['IdPesanan']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Nama Pemesan</td>
                                                <td>:</td>
                                                <td><?= $get_pesananby_id['Nama']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Tanggal Pesan</td>
                                                <td>:</td>
                                                <td><?= $get_pesananby_id['TglPesan']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Deskripsi</td>
                                                <td>:</td>
                                                <td><?= $get_pesananby_id['Deskripsi']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Status Pesanan</td>
                                                <td>:</td>
                                                <td>
                                                    <?php
                                                    if ($get_pesananby_id['StatusPesanan'] == 'T') {
                                                        echo "Menunggu Konfirmasi";
                                                    } else {
                                                        echo "Sudah di Konfirmasi";
                                                    }
                                                    ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Status Pembayaran</td>
                                                <td>:</td>
                                                <td style="font-weight:bold;">
                                                    <?php
                                                    if ($get_pesananby_id['StatusPembayaran'] == 'T') {
                                                        echo "Menunggu Konfirmasi";
                                                    } else {
                                                        echo "Sudah di Konfirmasi";
                                                    }
                                                    ?>
                                                </td>
                                            </tr>
                                            <?php if ($get_pesananby_id['StatusPesanan'] == 'Y') { ?>
                                                <tr>
                                                    <td>Bukti Pembayaran</td>
                                                    <td>:</td>
                                                    <td>
                                                        <?php
                                                        if (!$get_pesananby_id['BuktiPembayaran']) {
                                                            echo "Belum Mengirim Bukti Pembayaran"; ?>
                                                            <input type="file" name="bukti" size="20" />
                                                            <div class="space30"></div>
                                                            <input class="btn btn-black text-left btnknfrm" type="submit" value="Upload">
                                                        <?php
                                                        } else {
                                                            echo "Sudah Mengirim Bukti Pembayaran";
                                                            if ($get_pesananby_id['StatusPembayaran'] == 'T') { ?>
                                                                <input type="file" name="bukti" size="20" />
                                                                <div class="space30"></div>
                                                                <input class="btn btn-black text-left btnknfrm" type="submit" value="Upload">
                                                            <?php  }
                                                        }
                                                        ?>

                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                    <div class="space60"></div>
                                    <table border="0" class="table">
                                        <tr>
                                            <td> Jenis Pakaian</td>
                                            <td> Nama Barang</td>
                                            <td> Ukuran</td>
                                            <td> Harga Satuan</td>
                                            <td> Jumlah</td>
                                            <td> Sub Total</td>
                                        </tr>
                                        <?php foreach ($get_all as $dps) { ?>
                                            <tr>
                                                <td><?= $dps['NamaJenis']; ?></td>
                                                <td><?= $dps['NamaBrg']; ?></td>
                                                <td><?= $dps['Ukuran']; ?></td>
                                                <td>Rp. <?= $dps['Harga']; ?></td>
                                                <td><?= $dps['Jumlah']; ?></td>
                                                <td>Rp. <?= $dps['SubTotal']; ?></td>
                                            </tr>
                                        <?php } ?>
                                        <tr>
                                            <td colspan="4"></td>
                                            <td>Total Harga :</td>
                                            <td>Rp. <?= $get_pesananby_id['TotalHarga']; ?></td>
                                        </tr>
                                    </table>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 col-sm-6">
                        <div class="sync1">
                            <div class="item">
                                <img src="<?= base_url('assets/front') ?>/images/undraw_credit_card_payment_yb88.png">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="clearfix space80"></div>
</div>
</div>
</div>
</div>

<div class="clearfix space20"></div>