        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
          <div class="row">
          	<div class="col-lg-12">
          	<div class="card shadow mb-4">
            <div class="card-header py-3">
              <a  data-toggle="modal" data-target="#newMenuModal"><h6 class="m-0 font-weight-bold text-primary tampilmodaltambah">Tambah Design</h6></a>
              <div class="flash-data" data-flash = "<?= $this->session->flashdata('message') ?>"></div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr align="center">
                      <th>No</th>
                      <th>Kode</th>
                      <th>Pola</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                  	<?php $i =1; foreach ($design as $d) : ?>
	                    <tr align="center">
	                      <td><?= $i++; ?></td>
	                      <td><?= $d['KdDesain']; ?></td>
	                      <td><?= $d['KdPola']; ?></td>
	                      <td>
                          <a href ="#" data-toggle="modal" data-target="#newMenuModal" class="badge badge-success tampilmodalubah" data-id="<?= $d['KdDesain']; ?>" >Edit</a>
	                      	 | 
	          				     <a href ="#" class="badge badge-danger btnhapus" id="btnhapus" data-id="<?= $d['KdDesain']; ?>">Hapus</a>
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


<div class="modal fade" id="newMenuModal" tabindex="-1" role="dialog" aria-labelledby="newMenuModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newMenuModalLabel">Tambah Data Desain</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?= form_open_multipart('Design', ['id' => 'frmid']);?>
        <div class="modal-body">
          <div class="form-group row">
            <label for="KdDesain" class="col-sm-2 col-form-label" id="lblKdDesain">Kode Desain</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="KdDesain" readonly name="KdDesain">
            </div>
          </div>
          <div class="form-group row">
            <label for="KdPola" class="col-sm-2 col-form-label" id="lblKdPola">Kode Pola</label>
            <div class="col-sm-10">
              <select name="KdPola" id="KdPola" class="form-control" name="KdPola">
                <option value="">Select Menu</option>
                <?php foreach ($pola as $p) :?>
                  <option value="<?= $p['KdPola'] ?>"><?= $p['KdPola']; ?></option>
                <?php endforeach; ?>
              </select>
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
                    <input type="file" class="form-control" id="GbrDesain" name="GbrDesain">
                    <label class="custom-file-label" for="GbrDesain">Masukan Gambar</label>
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
