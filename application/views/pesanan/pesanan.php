<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Pesanan</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <?= $this->session->flashdata('message'); ?>
        <!-- <nav class="navbar navbar-light bg-light">
            <a class="navbar-brand"><small>Show
                    <select class="custom-select mr-sm-2 col-6">
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                        <option value="0">All</option>
                    </select>
                    Entries</small></a>
            <form class="form-inline">
                Search :
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            </form>
        </nav> -->
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="text-center">
                        <tr>
                            <th>ID</th>
                            <th>Tanggal Pesan</th>
                            <th>Total Harga</th>
                            <th>Status Pemesanan</th>
                            <th>Bukti Pembayaran</th>
                            <th>Status Pembayaran</th>
                            <th>ID Pelanggan</th>
                            <th>ID Pegawai</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($pesanan as $ps) { ?>
                            <tr>
                                <td><?= $ps['IdPesanan']; ?></td>
                                <td class="text-center"><?= $ps['TglPesan']; ?></td>
                                <td><?= $ps['TotalHarga']; ?></td>
                                <!-- kolom status pesanan -->
                                <td class="text-center">
                                    <?php if ($ps['BuktiPembayaran']) { ?>
                                        <i class="fas fa-check"></i>
                                    <?php
                                } else {
                                    if ($ps['StatusPesanan'] == 'Y') { ?>
                                            <a href="<?= base_url('pesanan/tampilbahanbaku'); ?>/<?= $ps['IdPesanan']; ?>">
                                                <button class="btn btn-success btn-circle btn-sm">
                                                    <i class="fas fa-check"></i>
                                                </button>
                                            </a>
                                        <?php } else { ?>
                                            <a href="<?= base_url('pesanan/tampilbahanbaku'); ?>/<?= $ps['IdPesanan']; ?>">
                                                <button class="btn btn-warning btn-circle btn-sm">
                                                    <i class="fas fa-exclamation-triangle"></i>
                                                </button>
                                            </a>
                                        <?php }
                                } ?>
                                </td>
                                <!-- akhir kolom status pesanan  -->
                                <td><?= $ps['BuktiPembayaran']; ?></td>
                                <!-- kolom status pembayaran -->
                                <td class="text-center">
                                    <?php if (!$ps['BuktiPembayaran']) { ?>
                                        <i class="fas fa-exclamation-triangle"></i>
                                    <?php
                                } else {
                                    if ($ps['StatusPembayaran'] == 'Y') { ?>
                                            <button class="btn btn-success btn-circle btn-sm TampilBukti1" data-toggle="modal" data-target="#ModalBukti1" data-gbr="<?= $ps['BuktiPembayaran']; ?>" data-idp="<?= $ps['IdPesanan']; ?>" data-idpeg="<?= $pegawai['IdPeg']; ?>">
                                                <i class="fas fa-check"></i>
                                            </button>
                                        <?php } else { ?>
                                            <button class="btn btn-warning btn-circle btn-sm TampilBukti2" data-toggle="modal" data-target="#ModalBukti1" data-gbr="<?= $ps['BuktiPembayaran']; ?>" data-idp="<?= $ps['IdPesanan']; ?>" data-idpeg="<?= $pegawai['IdPeg']; ?>">
                                                <i class="fas fa-exclamation-triangle"></i>
                                            </button>
                                        <?php }
                                } ?>
                                </td>
                                <!-- akhir kolom status pembayaran  -->
                                <td><?= $ps['IdPemesan']; ?></td>
                                <td><?= $ps['IdPegawai']; ?></td>

                                <td class="text-center">
                                    <a href ="#" class="btn btn-danger btn-circle btn-sm hapuspsnn" id="hapuspsnn" data-idp="<?= $ps['IdPesanan']; ?>"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                    
                </table>
            </div>
        </div>
    </div>

    <!-- Modal 1-->
    <div class="modal fade" id="ModalBukti1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="bukti1">Batalkan konfirmasi pembayaran pesanan <strong> <?= $ps['IdPesanan']; ?>?</strong></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="body">
                    <img src="<?= base_url('assets/img/buktipembayaran/'); ?><?= $ps['BuktiPembayaran']; ?>" width="465" class="rounded-0" id="bukti">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <a href="<?= base_url('pesanan/naktifpembayaran'); ?>/<?= $ps['IdPesanan']; ?>/<?= $pegawai['IdPeg']; ?>" id="tblmdlbkt">
                        <button type="button" class="btn btn-primary">Yes</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->