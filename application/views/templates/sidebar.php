<!-- Sidebar -->
<?php
if ($title == 'Jenis Pakaian' or $title == 'Pola' or $title == 'Design' or $title == 'Barang' or $title == 'Bahan Baku' or $title == 'Bahan Baku Desain') {
    $active = 'active';
    $show = 'show';
    $collapsed = '';

    $active1 = '';
    $show1 = '';
    $collapsed1 = 'collapsed';
} elseif ($title == 'Order Detail Page' or $title ==  'Controling Page' or $title ==  'Detail Pesanan') {
    $active = '';
    $show = '';
    $collapsed = 'collapsed';

    $active1 = 'active';
    $show1 = 'show';
    $collapsed1 = '';
} else {
    $active = '';
    $show = '';
    $collapsed = '';

    $active1 = '';
    $show1 = '';
    $collapsed1 = '';
}
?>
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('pegawai/'); ?>">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3"><strong>AKBAR</strong>INDO</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        <?= $pegawai['Jabatan']; ?>
    </div>

    <?php if ($pegawai['Level'] == 1) { ?>
        <!-- Nav Item - Dashboard -->
        <li class="nav-item <?= $title == 'Dahsboard' ? 'active' : '' ?>">
            <a class="nav-link" href="<?= base_url('pegawai/dasboard'); ?>">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <li class="nav-item <?= $title == 'Pegawai' ? 'active' : '' ?>">
            <a class="nav-link" href="<?= base_url('pegawai/listpegawai'); ?>">
                <i class="fas fa-fw fa-user-tie"></i>
                <span>Pegawai</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">
    <?php } ?>

    <!-- Nav Item - Charts -->
    <li class="nav-item <?= $title == 'Profile' ? 'active' : '' ?>">
        <a class="nav-link" href="<?= base_url('pegawai/'); ?>">
            <i class="fas fa-fw fa-user"></i>
            <span>Profil</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Konveksi
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item <?= $active1 ?>">
        <a class="nav-link <?= $collapsed1 ?>" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-table"></i>
            <span>Pesanan</span>
        </a>
        <div id="collapseTwo" class="collapse <?= $show1 ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Tabel pesanan:</h6>
                <a class="collapse-item <?= $title == 'Controling Page' ? 'active' : '' ?>" href="<?= base_url('pesanan'); ?>">Pesanan</a>
                <a class="collapse-item <?= $title == 'Order Detail Page' ? 'active' : '' ?>" href="<?= base_url('pemesan'); ?>">Pemesan</a>
                <a class="collapse-item <?= $title == 'Detail Pesanan' ? 'active' : '' ?>" href="<?= base_url('detailpesanan'); ?>">Detail Pesanan</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->

    <li class="nav-item <?= $active ?>">
        <a class="nav-link <?= $collapsed ?>" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-table"></i>
            <span>Bahan Baku</span>
        </a>

        <div id="collapseUtilities" class="collapse <?= $show ?>" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">


            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Tabel bahan baku:</h6>
                <a class="collapse-item <?= $title == 'Jenis Pakaian' ? 'active' : '' ?>" href="<?= base_url('Jenispakaian'); ?>">Jenis Pakaian</a>
                <a class="collapse-item <?= $title == 'Pola' ? 'active' : '' ?>" href="<?= base_url('Pola') ?>">Pola</a>
                <a class="collapse-item <?= $title == 'Design' ? 'active' : '' ?>" href="<?= base_url('Design'); ?>">Desain</a>
                <a class="collapse-item <?= $title == 'Barang' ? 'active' : '' ?>" href="<?= base_url('Barang') ?>">Barang</a>
                <a class="collapse-item <?= $title == 'Bahan Baku' ? 'active' : '' ?>" href="<?= base_url('Bahanbaku'); ?>">Bahan Baku</a>
                <a class="collapse-item <?= $title == 'Bahan Baku Desain' ? 'active' : '' ?>" href="<?= base_url('Bahanbakudesain') ?>">Bahan Baku Desain</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Heading -->

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('Detailpesanan/excel'); ?>">
            <i class=" fas fa-fw fa-file-excel"></i>
            <span>Buat Laporan</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Heading -->

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('auth/logout'); ?>" data-toggle="modal" data-target="#logoutModal">
            <i class=" fas fa-fw fa-sign-out-alt"></i>
            <span>Keluar</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->