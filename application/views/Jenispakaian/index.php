        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
          <div class="row">
          	<div class="col-lg-12">
          	<div class="card shadow mb-4">
            <div class="card-header py-3">
              <a  data-toggle="modal" data-target="#modaljenis"><h6 class="m-0 font-weight-bold text-primary tampilmodaltambahjenis">Tambah Jenis Pakaian</h6></a>
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
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                  	<?php $i =1; foreach ($jenis as $j) : ?>
	                    <tr align="center">
	                      <td><?= $i++; ?></td>
	                      <td><?= $j['KodeJenis']; ?></td>
	                      <td><?= $j['NamaJenis']; ?></td>
	                      <td>
                          <a href ="#" data-toggle="modal" data-target="#modaljenis" class="badge badge-success tampilmodalubahjenis" data-id="<?= $j['KodeJenis']; ?>" >Ubah</a>
	                      	 | 
	          				     <a href ="#" class="badge badge-danger btnhapusjenis" id="btnhapusjenis" data-id="<?= $j['KodeJenis']; ?>">Hapus</a>
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
      <?= form_open_multipart('Jenispakaian', ['id' => 'frmid']);?>
        <div class="modal-body">
          <div class="form-group row">
            <label for="KodeJenis" class="col-sm-2 col-form-label" id="lblKodeJenis">Kode</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="KodeJenis" readonly name="KodeJenis">
            </div>
          </div>
          <div class="form-group row">
            <label for="NamaJenis" class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="NamaJenis" name="NamaJenis">
            </div>
          </div>
          <div class="form-group row" id="img-form-id">
            <div class="col-sm-10">
              <div class="row x">
                <div class="col-sm-3 img-img">
                  <img src="" id="gambarcu" class="img-thumbnail">
                </div>
                <div class="col-sm-9">
                  <div class="custom-file">
                    <input type="file" class="form-control" id="GambarJenis" name="GambarJenis">
                    <label class="custom-file-label" for="GambarJenis">Masukan Gambar</label>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-success kirim">Tambah</button>
        </div>
      </form>
    </div>
  </div>
</div>
