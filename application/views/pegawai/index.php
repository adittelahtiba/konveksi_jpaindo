<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">Selamat Datang <?= $pegawai['Nama']; ?></h1>

  <div class="card mb-3" style="maax-width: 540px;">
    <div class="row no-gutters">
      <div class="col-md-4">
        <img src="<?= base_url('assets/img/profile/') . $pegawai['Foto'] ?>" width="300">
        <a class="dropdown-item" data-toggle="modal" data-target="#foto">
          <i class="fas fa-camera fa-sm fa-fw mr-2 text-gray-400"></i>
        </a>
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <h5 class="card-title"><?= $pegawai['Nama']; ?></h5>
          <p class="card-text"><?= $pegawai['IdPeg']; ?></p>
          <p class="card-text"><?= $pegawai['Jabatan']; ?></p>
          <p class="card-text"><?= $pegawai['Email']; ?></p>
          <p class="card-text"><?= $pegawai['NoTelp']; ?></p>
          <p class="text-muted">Since : <?= date('d F Y', $pegawai['WaktuDaftar']); ?></p>
        </div>
      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Foto-->
<div class="modal fade" id="foto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ubah Foto Profile</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <?= form_open_multipart('pegawai/editfotoprofil'); ?>
      <div class="modal-body">
        <input type="text" name="nip" value="<?= $this->session->userdata('id'); ?>" hidden>
        <center>
          <img src="<?= base_url('assets/img/profile/') . $pegawai['Foto'] ?>" width="300">
        </center>
        <div class="form-group row" id="img-form-id">
          <div class="col-sm-10">
            <div class="row x">
              <div class="col-sm-3 img-img">
                <img src="" id="gambarcu" class="img-thumbnail">
              </div>
              <div class="col-sm-9">
                <div class="custom-file">
                  <input type="file" class="form-control" id="GbrPola" name="profil">
                  <label class="custom-file-label" for="GbrPola">Pilih Foto Profil Baru</label>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
        <button class="btn btn-primary" type="submit">Simpan</button></form>
      </div>
    </div>
  </div>
</div>