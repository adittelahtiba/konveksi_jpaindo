        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
          <div class="row">
          	<div class="col-lg-12">
          	<div class="card shadow mb-4">
            <div class="card-header py-3">
              <a href="<?= base_url('Bahanbaku/add')?>"><h6 class="m-0 font-weight-bold text-primary">Tambah Bahan Baku</h6></a>
              <div class="flash-data" data-flash = "<?= $this->session->flashdata('message') ?>"></div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr align="center">
                      <th>No</th>
                      <th>Kode</th>
                      <th>Nama</th>
                      <th>Harga/m2</th>
                      <th>Tersedia/m2</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                  	<?php $i =1; foreach ($bahanbaku as $bk) : ?>
	                    <tr align="center">
	                      <td><?= $i++; ?></td>
	                      <td><?= $bk['KdBBaku']; ?></td>
	                      <td><?= $bk['NamaBBaku']; ?></td>
	                      <td><?= $bk['HargaPerM2']; ?></td>
	                      <td><?= $bk['TersediaM2']; ?></td>
	                      <td>
	                      	<a href="<?= base_url('Bahanbaku/Edit/'). $bk['KdBBaku']; ?>" class="badge badge-success">Ubah</a> | 
	          				       <a href ="#" class="badge badge-danger btnhapus" id="btnhapus" data-id="<?= $bk['KdBBaku']; ?>">Hapus</a>
	                      </td>
	                    </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
        </div>
          </div>
          </div>
        </div>
        <!-- /.container-fluid -->

      </div>