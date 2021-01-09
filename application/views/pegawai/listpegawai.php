<?php if ($pegawai['Level'] == 1) { ?>

    <!-- list pegawai -->

            <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
          <div class="row">
          	<div class="col-lg-12">
          	<div class="card shadow mb-4">
            <div class="card-header py-3">
              <!-- <a  data-toggle="modal" data-target="#modaljenis"><h6 class="m-0 font-weight-bold text-primary tampilmodaltambahjenis">Tambah Pegawai</h6></a> -->
              <div class="flash-data" data-flash = "<?= $this->session->flashdata('message') ?>"></div>
              
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr align="center">
                      <th>No</th>
                      <th>NIP</th>
                      <th>Nama</th>
                      <th>Jabatan</th>
                      <th>Email</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                  	<?php $i =1; foreach ($peg as $j) : ?>
	                    <tr align="center">
	                      <td><?= $i++; ?></td>
	                      <td><?= $j['IdPeg']; ?></td>
	                      <td><?= $j['Nama']; ?></td>
	                      <td><?= $j['Jabatan']; ?></td>
	                      <td><?= $j['Email']; ?></td>
	                      <td>
                          <a href ="#" data-toggle="modal" data-target="#modaljenis" class="badge badge-success tampilmodalubahjenis" data-id="<?= $j['IdPeg']; ?>" >Detail</a>
	                      	 | 
	          				<a href ="#" class="badge badge-danger btnhapusjenis" id="btnhapusjenis" data-id="<?= $j['IdPeg']; ?>">Hapus</a>|<?php if($j['Aktif']=='Y'){ ?><a href ="<?=base_url('pegawai/naktifkan/').$j['IdPeg'];?>" class="badge badge-warning" id="btnhapusjenis" data-id="<?= $j['IdPeg']; ?>">Non Aktifkan</a></td><?php }else{ ?>
                      <a href ="<?=base_url('pegawai/aktifkan/').$j['IdPeg'];?>" class="badge badge-primary" id="btnhapusjenis" data-id="<?= $j['IdPeg']; ?>">Aktifkan</a>
                    <?php } ?>
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
      <!-- End of Main Content -->


<div class="modal fade" id="modaljenis" tabindex="-1" role="dialog" aria-labelledby="modaljenisLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modaljenisLabel">Tambah Data Jenis</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
          <div class="form-group row">
            <label for="IdPeg" class="col-sm-2 col-form-label" id="lblKodeJenis">ID Pegawai</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="IdPeg" readonly name="IdPeg">
            </div>
          </div>
          <div class="form-group row">
            <label for="Nama" class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="Nama" name="Nama" readonly>
            </div>
          </div>
          <div class="form-group row">
            <label for="Jabatan" class="col-sm-2 col-form-label">Jabatan</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="Jabatan" name="Jabatan" readonly>
            </div>
          </div>
          <div class="form-group row">
            <label for="Level" class="col-sm-2 col-form-label">Level</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="Level" name="Level" readonly>
            </div>
          </div>
          <div class="form-group row">
            <label for="NoTelp" class="col-sm-2 col-form-label">No Telp</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="NoTelp" name="NoTelp" readonly>
            </div>
          </div>
          <div class="form-group row">
            <label for="Email" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="Email" name="Email" readonly>
            </div>
          </div>
          <div class="form-group row">
            <label for="Aktif" class="col-sm-2 col-form-label">Status</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="Aktif" name="Aktif" readonly>
            </div>
          </div>
          <div class="form-group row">
            <label for="WaktuDaftar" class="col-sm-2 col-form-label">Tanggal Daftar</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="WaktuDaftar" name="WaktuDaftar" readonly>
            </div>
          </div>
          <div class="form-group row" id="img-form-id">
            <div class="col-sm-10">
              <div class="row x">
              	<label for="WaktuDaftar" class="col-sm-2 col-form-label">Foto Profile</label>
                <div class="col-sm-3 img-img">
                  <img src="" id="Foto" class="img-thumbnail">
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        </div>
      
    </div>
  </div>
</div>


    <!-- akhir list pegawai -->
<?php } else {
    echo "<center><h1>Access Blocked</h1></cemter>";
} ?>