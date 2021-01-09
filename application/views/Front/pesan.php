<!-- BREADCRUMBS -->
<div class="bcrumbs">
    <div class="container">
        <ul>
            <li><a href="./index2.html">Beranda</a></li>
            <li><a href="./pilih-pola.html">Pilih Pola</a></li>
            <li><a href="./pilih-desain.html"></a>Pilih Desain</li>
        </ul>
    </div>
</div>

<div class="space20"></div>
<!-- DESAIN PAKAIAN -->
<form action="<?= base_url('pesanpakaian/inputPesananbaru'); ?>/<?= $JenisPakaian['KodeJenis']; ?>/<?= $gambar['KdPola']; ?>/<?= $gambar['KdDesain']; ?>" method="post">
    <div class="shop-single">
    <div class="container">
    <div class="row">
    <div class="col-md-12 col-sm-12">
    <div class="row">
    <div class="col-md-5 col-sm-6">                                    
        <div class="sync1">
            <div class="item"> 
                <img src="<?= base_url('assets/img/design/') .$gambar['GbrDesain']; ?>" alt="">
            </div>
        </div>
    </div>
    <div class="col-md-7 col-sm-6">
        <div class="product-single">
            <div class="sub2 text-left">
                <h5>Kaos</h5>
                <h6><?= $JenisPakaian['NamaJenis']; ?></h6>
            </div>
            <div class="space50"></div>
            <div class="row select-wraps">
                <div class="form-group">
                    <div class="table-responsive">            
                        <table class="table table-striped table-sm">
                            <thead>
                                <tr>
                                    <th scope="col">Nama Barang</th>
                                    <th scope="col">Ukuran</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Jumlah</th>
                                    <th scope="col">Sub Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($barang as $brg) { ?>
                                    <tr>
                                        <input type="text" name="barang<?= $gt['Ukuran']; ?>" value="<?= $gt['KdBarang']; ?>" hidden>

                                        <input readonly type="text" id="hrg<?= $gt['Ukuran']; ?>" value="<?= $gt['Harga']; ?>" hidden>
                                        <td>
                                            <td><?= $brg['NamaBrg']; ?></td>
                                            
                                        </td>
                                        <td class="col-md-1 col-sm-1" align="center">
                                            <?= $gt['Ukuran']; ?>
                                        </td>
                                        <td>
                                            <?= $gt['Harga']; ?>
                                        </td>
                                        <td>
                                            <Input type="number" class="form-control" name="jumlah<?= $brg['Ukuran'];?>" id="<?= $brg['Ukuran']; ?>" placeholder="0" value="<?= set_value('jumlah' . $brg['Ukuran']); ?>">
                                        </td>
                                        <td id="ht<?= $brg['Ukuran']; ?>"></td>

                                        <td><input type="text" class="form-control" name="harga<?= $brg['Ukuran']; ?>" id="jml<?= $brg['Ukuran']; ?>" placeholder="0" readonly value="<?= set_value('harga'.$brg['Ukuran']) ?>">
                                        </td>
                                        
                                    </tr>
                                <?php } ?>
                                <tr>
                                    <td colspan="3"></td>
                                    <th valign="bottom" >Total : </th>
                                    <td id="httot">
                                        <input type="text" class="form-control" name="total" id="total" placeholder="0" readonly value="<?= set_value('total'); ?>">
                                        <?php echo form_error('total'); ?>
                                    </td>
                                    <td>
                                        <p align="right" id="ptot"></p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                <div class="space20"></div>
                <h3>JUDUL</h3>
                <div class="space20"></div>
                <table class="table sm">
                    <tbody>
                    <tr>
                        <td class="col-md-4 col-sm-4">Nama</td>
                        <td>
                            <input type="text" name="Nama" value="<?= set_value('Nama'); ?>" class="form-control">
                            <?php echo form_error('Nama'); ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>
                            <input type="text" name="Alamat" value="<?= set_value('Alamat'); ?>" class="form-control">
                            <?php echo form_error('Alamat'); ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Desa</td>
                        <td>
                            <input type="text" name="Desa" value="<?= set_value('Desa'); ?>" class="form-control">
                            <?php echo form_error('Desa'); ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Kecamatan</td>
                        <td>
                            <input type="text" name="Kecamatan" value="<?= set_value('Kecamatan'); ?>" class="form-control">
                            <?php echo form_error('Kecamatan'); ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Kabupaten / Kota</td>
                        <td>
                            <input type="text" name="KabOrKota" value="<?= set_value('KabOrKota'); ?>" class="form-control">
                            <?php echo form_error('KabOrKota'); ?>
                        </td>
                    </tr>
                    <tr>
                        <td>No Telp</td>
                        <td>
                            <input type="text" name="NoTelp" value="<?= set_value('NoTelp'); ?>" class="form-control">
                            <?php echo form_error('NoTelp'); ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>
                            <input type="text" name="Email" value="<?= set_value('Email'); ?>" class="form-control">
                            <?php echo form_error('Email'); ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Deskripsi</td>
                        <td>
                            <textarea name="Deskripsi" class="form-control"><?= set_value('Deskripsi'); ?></textarea>
                            <?php echo form_error('Deskripsi'); ?>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <button type="submit" class="addtobag">Pesan</button>
        </div>
        
        <div class="sep"></div>
        
    </form>
    
</div>
</div>
</div>
<div class="clearfix space80"></div>
</div>
</div>
</div>
</div>

<div class="clearfix space20"></div>